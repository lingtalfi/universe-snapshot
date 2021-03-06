<?php


namespace Ling\Light_UserData\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\Light_UserData\Api\Custom\Classes\CustomLightUserDataBaseApi;
use Ling\Light_UserData\Api\Generated\Interfaces\ResourceHasTagApiInterface;



/**
 * The ResourceHasTagApi class.
 */
class ResourceHasTagApi extends CustomLightUserDataBaseApi implements ResourceHasTagApiInterface
{


    /**
     * Builds the ResourceHasTagApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "luda_resource_has_tag";
    }




    /**
     * @implementation
     */
    public function insertResourceHasTag(array $resourceHasTag, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $resourceHasTag);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'resource_id' => $resourceHasTag["resource_id"],
				'tag_id' => $resourceHasTag["tag_id"],

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select resource_id, tag_id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $resourceHasTag);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'resource_id' => $res["resource_id"],
				'tag_id' => $res["tag_id"],

                ];
            }
            throw $e;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where resource_id=:resource_id and tag_id=:tag_id", [
            "resource_id" => $resource_id,
				"tag_id" => $tag_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with resource_id=$resource_id, tag_id=$tag_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getResourceHasTag($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);


        $ret = $this->pdoWrapper->fetch($q, $markers);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                $e = new \RuntimeException("Row not found, inspect the exception for more details.");
                $e->where = $where;
                $e->q = $q;
                $e->markers = $markers;
                throw $e;
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }



    /**
     * @implementation
     */
    public function getResourceHasTags($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getResourceHasTagsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getResourceHasTagsColumns($columns, $where, array $markers = [])
    {
        $sCols = $columns;
        if (is_array($sCols)) {
            $sCols = '`' . implode("`,`", $columns) . '`';
        }
        $q = "select $sCols  from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getResourceHasTagsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }










    /**
     * @implementation
     */
    public function updateResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, array $resourceHasTag)
    { 
        $this->pdoWrapper->update($this->table, $resourceHasTag, [
            "resource_id" => $resource_id,
			"tag_id" => $tag_id,

        ]);
    }



    /**
     * @implementation
     */
    public function delete($where = null, array $markers = [])
    {
        return $this->pdoWrapper->delete($this->table, $where, $markers);

    }

    /**
     * @implementation
     */
    public function deleteResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "resource_id" => $resource_id,
			"tag_id" => $tag_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteResourceHasTagByResourceId(int $resource_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "resource_id" => $resource_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteResourceHasTagByTagId(int $tag_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "tag_id" => $tag_id,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteResourceHasTagByResourceIds(array $resource_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("resource_id")->in($resource_ids));
    }

    /**
     * @implementation
     */
    public function deleteResourceHasTagByTagIds(array $tag_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("tag_id")->in($tag_ids));
    }






}
