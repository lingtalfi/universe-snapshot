<?php


namespace Ling\Light_RealGenerator\Generator;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;
use Ling\Light_RealGenerator\Util\RepresentativeColumnFinderUtil;
use Ling\SqlWizard\Tool\SqlWizardGeneralTool;
use Ling\SqlWizard\Util\MysqlStructureReader;

/**
 * The ListConfigGenerator class.
 */
class ListConfigGenerator extends BaseConfigGenerator
{

    /**
     * This property holds the table aliases used inside the context of the getFileContent method.
     * @var array
     */
    private $_aliases;

    /**
     * This property holds the column aliases used inside the context of the getFileContent method.
     * @var array
     */
    private $_colAliases;


    /**
     * Generates the list configuration files according to the given @page(configuration block).
     * @param array $config
     * @throws \Exception
     */
    public function generate(array $config)
    {
        $this->setConfig($config);
        $tables = $this->getTables();

        $appDir = $this->container->getApplicationDir();
        $targetDir = $this->getKeyValue("list.target_dir");
        $targetDir = str_replace('{app_dir}', $appDir, $targetDir);

        $this->debugLog("Generating " . count($tables) . " list config(s) in the following directory: " . $this->getSymbolicPath($targetDir) . ".");

        foreach ($tables as $table) {
            $content = $this->getFileContent($table);
            $fileName = $table . ".byml";
            $path = $targetDir . '/' . $fileName;
            FileSystemTool::mkfile($path, $content);
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the content of the config file for the given table.
     *
     * @param string $table
     * @return string
     * @throws \Exception
     */
    protected function getFileContent(string $table): string
    {

        $this->_aliases = [];
        $this->_colAliases = [];

        //--------------------------------------------
        //
        //--------------------------------------------
        $arr = [];
        $identifier = "default";
        $main = [];
        $main['table'] = $table;
        $database = $this->getKeyValue('database_name', false, null);


        $pluginName = $this->getKeyValue('plugin_name');
        $listActionGroupsPluginName = $this->getKeyValue('list.list_action_groups_plugin_name', false, $pluginName);
        $listGeneralActionsPluginName = $this->getKeyValue('list.list_general_actions_plugin_name', false, $pluginName);
        $useMicroPermission = $this->getKeyValue('list.use_micro_permission', false, true);
        $ignoreColumns = $this->getKeyValue("list.ignore_columns.$table", false, []);
        $globalIgnoreColumns = $this->getKeyValue("ignore_columns.$table", false, []);
        $useActionColumn = $this->getKeyValue("list.use_action_column", false, true);
        $useCheckboxColumn = $this->getKeyValue("list.use_checkbox_column", false, true);
        $columnActionName = $this->getKeyValue("list.column_action_name", false, '_action');
        $columnCheckboxName = $this->getKeyValue("list.column_checkbox_name", false, '_checkbox');
        $columnActionLabel = $this->getKeyValue("list.column_action_label", false, "Actions");
        $rowsRendererIdentifier = $this->getKeyValue("list.rows_renderer_identifier", false);
        $rowsRendererClass = $this->getKeyValue("list.rows_renderer_class", false);
        $rowsRendererTypeAliases = $this->getKeyValue("list.rows_renderer_type_aliases", false, []);
        $rowsRendererTypesGeneral = $this->getKeyValue("list.rows_renderer_types_general", false, []);
        $rowsRendererTypesSpecific = $this->getKeyValue("list.rows_renderer_types_specific.$table", false, []);
        $commonRepresentativeMatches = $this->getKeyValue("list.common_representative_matches", false, [
            'name',
            'label',
            'identifier',
        ]);
        $useCrossColumns = $this->getKeyValue("list.use_cross_columns", false, true);
        $crossColumnFkFormat = $this->getKeyValue("list.cross_column_fk_format", false, 'concat($fk, \'. \', $rc)');
        $crossColumnHubLinkControllerFormat = $this->getKeyValue("list.cross_column_hub_link_controller_format", false, 'Generated/{Table}Controller');
        $crossColumnHubLinkTablePrefix2Plugin = $this->getKeyValue("list.cross_column_hub_link_table_prefix_2_plugin", false, []);
        $relatedLinks = $this->getKeyValue("list.related_links", false, []);
        $listTitle = $this->getKeyValue("list.title", false, "{Label} list");
        $useRowRestriction = $this->getKeyValue("list.use_row_restriction", false, false);
        $queryErrorShowDebugInfo = $this->getKeyValue("list.query_error_show_debug_info", false, false);


        $ignoreColumns = array_unique(array_merge($globalIgnoreColumns, $ignoreColumns));


        $tableInfo = $this->getTableInfo($table);


        $tableRic = $tableInfo['ric'];
        $main['ric'] = $tableRic;
        $dbName = $tableInfo['database'];
        $columns = array_merge(array_diff($tableInfo['columns'], $ignoreColumns));

        $mainTableAlias = $this->findAlias($table);
        $main['table'] .= " " . $mainTableAlias;


        $baseFields = array_map(function ($v) use ($mainTableAlias) {
            return $mainTableAlias . "." . $v;
        }, $columns);

        $baseJoins = [];
        $fkToConcat = [];
        $crossColumnLabels = [];
        $hiddenColumns = [];
        $fkCrossColumnRenderTypes = [];
        $crossColumnAlias2OpenAdminDataTypes = [];

        /**
         * We actually don't want a column alias to be an existing columns name
         */
        $this->_colAliases = $tableInfo['columns'];


        if (true === $useCrossColumns) {

            $foreignKeysInfo = $tableInfo['foreignKeysInfo'];
            $reprFinder = new RepresentativeColumnFinderUtil();
            $reprFinder->setContainer($this->container);
            $reprFinder->setCommonMatches($commonRepresentativeMatches);
            $fkToRepresentative = [];
            $tableToAlias = [];

            if ($foreignKeysInfo) {
                $tableToAlias[$dbName . "." . $table] = $mainTableAlias;

                foreach ($foreignKeysInfo as $fk => $referencedInfo) {

                    //--------------------------------------------
                    // base fields
                    //--------------------------------------------
                    list($rfDb, $rfTable, $rfCol) = $referencedInfo;
                    $crossColumnAlias = $this->findRepresentativeColumnAlias($fk);

                    $representativeCol = $reprFinder->findRepresentativeColumn($rfTable);
                    $fkToRepresentative[$fk] = $representativeCol;
                    $rfTableAlias = $this->findAlias($rfTable);
                    $tableToAlias[$rfDb . '.' . $rfTable] = $rfTableAlias;
                    $rfTablePascalCase = CaseTool::toPascal($rfTable);

                    $sConcat = str_replace([
                        '$fk',
                        '$rc',
                    ], [
                        $mainTableAlias . '.' . $fk,
                        $rfTableAlias . "." . $representativeCol,
                    ], $crossColumnFkFormat);

                    $fkToConcat[$fk] = $sConcat;
                    $baseFields[] = "$sConcat as $crossColumnAlias";


                    //--------------------------------------------
                    // base joins
                    //--------------------------------------------
                    $baseJoins[] = "inner join $rfTable $rfTableAlias on $mainTableAlias.$fk=$rfTableAlias.$rfCol";


                    //--------------------------------------------
                    // cross column labels
                    //--------------------------------------------
                    $crossColumnLabels[$crossColumnAlias] = $this->getTableLabel($rfTable);


                    //--------------------------------------------
                    // data types
                    //--------------------------------------------
                    /**
                     * Assuming the string type is used, since a cross column will probably use concat.
                     */
                    $crossColumnAlias2OpenAdminDataTypes[$crossColumnAlias] = "string";


                    //--------------------------------------------
                    // hidden columns
                    //--------------------------------------------
                    $hiddenColumns[] = $fk;


                    //--------------------------------------------
                    // render types
                    //--------------------------------------------

                    $crossColumnPluginName = $pluginName;
                    $fkTablePrefix = SqlWizardGeneralTool::getTablePrefix($rfTable);
                    if (null !== $fkTablePrefix && array_key_exists($fkTablePrefix, $crossColumnHubLinkTablePrefix2Plugin)) {
                        $crossColumnPluginName = $crossColumnHubLinkTablePrefix2Plugin[$fkTablePrefix];
                    }


                    $fkCrossColumnRenderTypes[$crossColumnAlias] = [
                        "type" => "Light_Realist.hub_link",
                        "text" => null,
                        "url_params_add_keys" => [
                            /**
                             * assuming the foreign key is composed of only one column which is also the ric
                             * of the referenced table (which probably isn't always the case, but I'm tired for now,
                             * we will implement later when the case concretely happens).
                             */
                            $rfCol => $fk,
                        ],
                        "url_params" => [
                            'plugin' => $crossColumnPluginName,
                            'controller' => str_replace([
                                '{Table}',
                            ], [
                                $rfTablePascalCase,
                            ], $crossColumnHubLinkControllerFormat),
                            'm' => "f",
                        ],
                    ];
                }
            }
        }
        $main['base_fields'] = $baseFields;
        if ($baseJoins) {
            $main['base_joins'] = $baseJoins;
        }


        $genericTags = $this->getGenericTagsByTable($table);
        ArrayTool::replaceRecursive($genericTags, $relatedLinks);
        $listTitle = str_replace(array_keys($genericTags), array_values($genericTags), $listTitle);


        if ('openAdminOne') {
            //--------------------------------------------
            // ORDER
            //--------------------------------------------
            $main['order'] = [
                "col_order" => '$column $direction',
            ];


            //--------------------------------------------
            // WHERE
            //--------------------------------------------
            $sGeneralSearch = '';
            foreach ($columns as $col) {
                if ('' !== $sGeneralSearch) {
                    $sGeneralSearch .= ' or' . PHP_EOL;
                }

                $hasConcat = false;
                if (true === $useCrossColumns) {
                    if (array_key_exists($col, $fkToConcat)) {
                        $col = $fkToConcat[$col];
                        $hasConcat = true;
                    }
                }
                if (false === $hasConcat) {
                    $sGeneralSearch .= "$mainTableAlias.$col like :%expression%";
                } else {
                    $sGeneralSearch .= "$col like :%expression%";
                }
            }

            $main['where'] = [
                "general_search" => $sGeneralSearch,
                "generic_filter" => '$column $operator :operator_value',
                "generic_sub_filter" => '$column like :%operator_value%',
            ];


            // deprecated and replaced with in_rics
//            if ('id' === $autoIncrementedKey) {
//                $main['where']['in_ids'] = 'id in ($ids)';
//            }
            $main['where']['open_parenthesis'] = '(';
            $main['where']['close_parenthesis'] = ')';
            $main['where']['and'] = 'and';
            $main['where']['or'] = 'or';

            $sInRics = implode(' and ', array_map(function ($v) use ($mainTableAlias) {
                return "$mainTableAlias.$v like :$v";
            }, $tableRic));
            $main['where']['in_rics'] = '(' . $sInRics . ')';


            //--------------------------------------------
            // LIMIT
            //--------------------------------------------
            $main['limit'] = [
                "page" => '$page',
                "page_length" => '$page_length',
            ];


            //--------------------------------------------
            // OPTIONS
            //--------------------------------------------
            $main['options'] = [
                "wiring" => [],
                "default_limit_page" => 1,
                "default_limit_page_length" => 20,
                "tag_options" => [
                    "generic_filter" => [
                        "operator_and_value" => [
                            "source" => "operator",
                            "target" => "operator_value",
                        ],
                    ],
                ],
            ];


            //--------------------------------------------
            // MISCELLANEOUS
            //--------------------------------------------
            $main['plugin'] = $pluginName;
            $main['csrf_token'] = [
                "name" => 'realist-request',
                "value" => 'REALIST(Light_Realist, csrf_token, realist-request)',
            ];
            $main['use_micro_permission'] = $useMicroPermission;
            $main['use_row_restriction'] = $useRowRestriction;
            $main['query_error_show_debug_info'] = $queryErrorShowDebugInfo;


            //--------------------------------------------
            // RENDERING
            //--------------------------------------------
            $listGeneralActions = [
                [
                    'action_id' => "$listGeneralActionsPluginName.realist-generate_random_rows",
                    'text' => "Generate",
                    'icon' => "fas fa-spray-can",
                    'csrf_token' => true,
                ],
                [
                    'action_id' => "$listGeneralActionsPluginName.realist-save_table",
                    'text' => "Save table content",
                    'icon' => "fas fa-download",
                    'csrf_token' => true,
                ],
                [
                    'action_id' => "$listGeneralActionsPluginName.realist-load_table",
                    'text' => "Load table content",
                    'icon' => "fas fa-upload",
                    'csrf_token' => true,
                ],
            ];
            $listActionGroups = [
                [
                    'action_id' => "$listActionGroupsPluginName.realist-print",
                    'text' => "Print",
                    'icon' => "fas fa-print",
                    'csrf_token' => true,
                ],
                [
                    'action_id' => "$listActionGroupsPluginName.realist-delete_rows",
                    'text' => "Delete",
                    'icon' => "far fa-trash-alt",
                    'csrf_token' => true,
                ],
                [
                    'action_id' => "$listActionGroupsPluginName.realist-edit_rows",
                    'text' => "Edit",
                    'icon' => "fas fa-edit",
                    'csrf_token' => true,
                ],
                [
                    'text' => "Share",
                    'icon' => "fas fa-share-square",
                    'items' => [
                        [
                            'action_id' => "$listActionGroupsPluginName.realist-rows_to_ods",
                            'text' => "OpenOffice ods",
                            'icon' => "far fa-file-alt",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$listActionGroupsPluginName.realist-rows_to_xlsx",
                            'text' => "Excel xlsx",
                            'icon' => "far fa-file-excel",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$listActionGroupsPluginName.realist-rows_to_xls",
                            'text' => "Excel xls",
                            'icon' => "far fa-file-excel",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$listActionGroupsPluginName.realist-rows_to_html",
                            'text' => "Html",
                            'icon' => "far fa-file-code",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$listActionGroupsPluginName.realist-rows_to_csv",
                            'text' => "Csv",
                            'icon' => "fas fa-file-csv",
                            'csrf_token' => true,
                        ],
                        [
                            'action_id' => "$listActionGroupsPluginName.realist-rows_to_pdf",
                            'text' => "Pdf",
                            'icon' => "far fa-file-pdf",
                            'csrf_token' => true,
                        ],
                    ],
                ],
            ];


            $dataTypes = $this->toOpenAdminDataTypes($tableInfo['types'], $table);
            if (true === $useCrossColumns) {
                $dataTypes = array_merge($dataTypes, $crossColumnAlias2OpenAdminDataTypes);
            }


            if (true === $useActionColumn) {
                $dataTypes[$columnActionName] = '_action';
            }


            /**
             * Note: we don't add the checkbox in the labels, as it might conflict with the checkbox widget of the renderer.
             * See the realist conception notes for more info.
             */
            $columnLabels = $this->createColumnLabels($columns, $table);
            if (true === $useCrossColumns) {
                $columnLabels = array_merge($columnLabels, $crossColumnLabels);
            }

            if (true === $useActionColumn) {
                $columnLabels[$columnActionName] = $columnActionLabel;
            }


            $rowsRenderer = [];
            if (null !== $rowsRendererClass) {
                $rowsRenderer['identifier'] = $rowsRendererClass;
            } else {
                if (null === $rowsRendererIdentifier) {
                    $rowsRendererIdentifier = $pluginName;
                }
                $rowsRenderer['identifier'] = $rowsRendererIdentifier;
            }


            $rowsRendererTypes = array_replace($rowsRendererTypesGeneral, $rowsRendererTypesSpecific);
            $this->convertTypeAliases($rowsRendererTypes, $rowsRendererTypeAliases, $table);


            $rowsRendererTypes = array_merge($rowsRendererTypes, $fkCrossColumnRenderTypes);


            if ($rowsRendererTypes) {
                $rowsRenderer['types'] = $rowsRendererTypes;
            }


            if (true === $useCheckboxColumn) {
                $rowsRenderer['checkbox_column'] = [
                    'name' => $columnCheckboxName,
                ];
            }

            if (true === $useActionColumn) {
                $rowsRenderer['action_column'] = [
                    'name' => $columnActionName,
                ];
            }


            $main['rendering'] = [
                "title" => $listTitle,
                "list_general_actions" => $listGeneralActions,
                "list_action_groups" => $listActionGroups,
                "list_renderer" => [
                    'identifier' => $pluginName,
                ],
                "responsive_table_helper" => [
                    'collapsible_column_indexes' => 'admin',
                ],
                "open_admin_table" => [
                    'widget_statuses' => [
                        'debug_window' => true,
                        'global_search' => true,
                        'advanced_search' => true,
                        'toolbar' => true,
                        'table' => true,
                        'head' => true,
                        'head_sort' => true,
                        'checkbox' => true,
                        'neck_filters' => true,
                        'pagination' => true,
                        'number_of_items_per_page' => true,
                        'number_of_rows_info' => true,
                    ],
                    'data_types' => $dataTypes,
                ],
                "column_labels" => $columnLabels,
                "hidden_columns" => $hiddenColumns,
                "rows_renderer" => $rowsRenderer,
                "related_links" => $relatedLinks,
            ];


        } else {
            throw new LightRealGeneratorException("Don't know how to generate this style yet.");
        }


        $arr[$identifier] = $main;
        return BabyYamlUtil::getBabyYamlString($arr);
    }


    /**
     * Returns an array of columnName => openAdminDataType,
     * with openAdminDataType being an @page(open admin data type).
     *
     * The options are:
     * - useCustomTypes: bool=true. Whether to use custom types defined in the configuration if available.
     *                  If false, the custom types won't be used.
     *
     *
     * @param array $types
     * @param string $table
     * @param array $options
     * @return array
     * @throws \Exception
     */
    protected function toOpenAdminDataTypes(array $types, string $table, array $options = []): array
    {
        $customTypes = $this->getKeyValue("list.open_admin_table_column_types.$table", false, []);
        array_walk($types, function (&$v, $k) use ($customTypes) {

            if (array_key_exists($k, $customTypes)) {
                $v = $customTypes[$k];
            } else {
                $v = $this->getOpenAdminDataTypeBySqlType($v);
            }
        });
        return $types;
    }


    /**
     * Returns the openAdmin data type corresponding to the given sql type.
     *
     * @param string $sqlType
     * @return string
     */
    protected function getOpenAdminDataTypeBySqlType(string $sqlType): string
    {
        $p = explode('(', $sqlType, 2);
        $simpleType = trim(array_shift($p));
        switch ($simpleType) {
            case "tinyint":
            case "smallint":
            case "mediumint":
            case "int":
            case "integer":
            case "bigint":
            case "decimal":
            case "float":
            case "double":
                $v = 'number';
                break;
            case "date":
                $v = 'date';
                break;
            case "datetime":
            case "timestamp":
                $v = 'datetime';
                break;
            case "bit":
            case "bool":
            case "boolean":
                $v = 'enum';
                break;
            default:
                $v = 'string';
                break;
        }
        return $v;
    }

    /**
     * Returns an array of columnName => label.
     *
     * @param array $columns
     * @param string $table
     * @return array
     * @throws \Exception
     */
    protected function createColumnLabels(array $columns, string $table): array
    {

        $ret = [];
        $customLabels = $this->getKeyValue("list.column_labels.$table", false, []);
        foreach ($columns as $col) {
            if (array_key_exists($col, $customLabels)) {
                $label = $customLabels[$col];
            } else {
                if ('id' === $col) {
                    $label = '#';
                } else {
                    $label = str_replace('_', ' ', ucfirst(strtolower($col)));
                }
            }
            $ret[$col] = $label;
        }
        return $ret;
    }


    /**
     * Transform the given types array in place, by replacing the alias notation ($alias) with the referenced values.
     * Also replace generic tags by their values.
     * See the @page(getGenericTagsByTable method) for more info.
     *
     * @param array $types
     * @param array $rowsRendererTypeAliases
     * @param string $table
     * @throws \Exception
     */
    protected function convertTypeAliases(array &$types, array $rowsRendererTypeAliases, string $table)
    {
        $tags = $this->getGenericTagsByTable($table);
        array_walk($types, function (&$v, $k) use ($rowsRendererTypeAliases, $table, $tags) {
            if (is_string($v) && '$' === substr($v, 0, 1)) {
                $alias = substr($v, 1);
                if (array_key_exists($alias, $rowsRendererTypeAliases)) {
                    $v = $rowsRendererTypeAliases[$alias];
                } else {
                    throw new LightRealGeneratorException("Type alias not defined: $alias with table $table.");
                }
            }

            if (is_string($v)) {
                $v = str_replace(array_keys($tags), array_values($tags), $v);
            } elseif (is_array($v)) {
                ArrayTool::replaceRecursive($tags, $v);
            }
        });
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a unique alias corresponding to the given table.
     * The basic algorithm used is the following:
     *
     * - remove the table prefix if any
     * - split by underscore, and take the first letter of each word.
     *          So for instance this table name: user_has_permission becomes uhp
     *          That's the natural alias
     * - add an auto-incremented to the natural alias found in the last step if necessary (to ensure uniqueness)
     *
     *
     * @param string $table
     * @return string
     * @throws \Exception
     */
    private function findAlias(string $table): string
    {
        $tableNoPrefix = $this->getTableWithoutPrefix($table);
        $p = explode('_', $tableNoPrefix);
        $alias = array_reduce($p, function ($carry, $item) {
            if (null === $carry) {
                $carry = '';
            }
            $carry .= substr($item, 0, 1);
            return $carry;
        });

        if (true === in_array($alias, $this->_aliases, true)) {
            $c = 2;
            $numberedAlias = $alias . $c;
            while (true === in_array($numberedAlias, $this->_aliases)) {
                $numberedAlias = $alias . ++$c;
            }
            $alias = $numberedAlias;
        }

        if (false === in_array($alias, $this->_aliases, true)) {
            $this->_aliases[] = $alias;
        }
        return $alias;
    }

    /**
     * Returns a unique column alias, based on the given foreign key.
     * It basically adds the "_plus" suffix to the given foreign key,
     * potentially followed by an auto-incremented number (to ensure uniqueness).
     *
     *
     * @param string $foreignKey
     * @return string
     */
    private function findRepresentativeColumnAlias(string $foreignKey): string
    {
        $alias = $foreignKey . "_plus";
        if (in_array($alias, $this->_colAliases)) {
            $c = 2;
            $numberedAlias = $alias . $c;
            while (true === in_array($numberedAlias, $this->_colAliases, true)) {
                $numberedAlias = $alias . ++$c;
            }
        }

        if (false === in_array($alias, $this->_colAliases, true)) {
            $this->_colAliases[] = $alias;
        }
        return $alias;
    }


    /**
     * Returns a default label associated with the given table name.
     *
     * @param string $table
     * @return string
     * @throws \Exception
     */
    private function getTableLabel(string $table): string
    {
        $tableNoPrefix = $this->getTableWithoutPrefix($table);
        $p = explode('_', $tableNoPrefix);
        return ucfirst(implode(' ', $p));

    }
}