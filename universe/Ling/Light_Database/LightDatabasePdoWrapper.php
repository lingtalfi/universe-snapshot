<?php


namespace Ling\Light_Database;

use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Exception\LightDatabaseException;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService;
use Ling\SimplePdoWrapper\SimplePdoWrapper;

/**
 * The LightDatabasePdoWrapper class.
 */
class LightDatabasePdoWrapper extends SimplePdoWrapper
{

    /**
     * This property holds the pdoException thrown during the connection,
     * or null if such exception was not thrown.
     *
     * @var \PDOException|null
     */
    protected $pdoException;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;





    /**
     * Builds the LightDatabasePdoWrapper instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pdoException = null;
        $this->container = null;
    }





    /**
     * Creates the pdo instance and attaches it to this instance.
     * The settings array expects the following keys:
     *
     * - ?pdo_driver: the pdo driver to use (i.e. mysql, sqlite, ...). The default is mysql.
     *      See the pdo documentation for more details.
     * - pdo_database: the name of the (main) database.
     * - pdo_user: the name of the database user.
     * - pdo_pass: the password for the database user.
     * - ?pdo_host: the host of the pdo dsn if any. For instance: localhost, or 127.0.0.1.
     *          By default the value will be localhost.
     * - ?pdo_socket: the path to socket to use (this replaces the pdo_host setting).
     * - ?pdo_port: the number of the port to connect to.
     * - ?pdo_options: an array of options to pass to the pdo instance.
     *      Available options are the based on the php pdo options.
     *      The currently implemented options are the following:
     *      - persistent: bool
     *      - errmode: string (warning|exception|silent)
     *      - initCommand: string, example: SET NAMES 'UTF8'   (the initCommand option is specific to the mysql driver)
     *
     *
     *
     * Note: as for now, only the driver invocation technique is used to create the DSN (i.e. the
     * uri invocation and aliasing technique are not yet implemented).
     *
     *
     * If the pdo connection fails, a LightDatabaseException exception is thrown,
     * which doesn't reveal the pdo credentials, for security reason.
     * Note: if you want to get the error message of the original exception, you can access it using the
     * getConnectionException method.
     *
     *
     *
     * @param array $settings
     * @throws LightDatabaseException
     *
     */
    public function init(array $settings)
    {

        $driver = $settings['pdo_driver'] ?? 'mysql';

        //--------------------------------------------
        // DSN
        //--------------------------------------------
        $dsn = $driver . ":dbname=" . $settings['pdo_database'];
        if (array_key_exists('pdo_socket', $settings)) {
            $dsn .= ';unix_socket=' . $settings['pdo_socket'];
        } else {
            $host = $settings['pdo_host'] ?? "localhost";
            $dsn .= ';host=' . $host;
        }
        if (array_key_exists('pdo_port', $settings)) {
            $dsn .= ';port=' . $settings['pdo_port'];
        }


        //--------------------------------------------
        // CONNEXION
        //--------------------------------------------
        $options = [];
        if (array_key_exists("pdo_options", $settings)) {
            foreach ($settings['pdo_options'] as $k => $v) {
                switch ($k) {
                    case "errmode":
                        if ('warning' === $v) {
                            $v = \PDO::ERRMODE_WARNING;
                        } elseif ('exception' === $v) {
                            $v = \PDO::ERRMODE_EXCEPTION;
                        } elseif ('silent' === $v) {
                            $v = \PDO::ERRMODE_SILENT;
                        } else {
                            throw new LightDatabaseException("Unknown errmode: $v (possible values are warning, exception or silent.");
                        }
                        $options[\PDO::ATTR_ERRMODE] = $v;
                        break;
                    case "initCommand":
                        $options[\PDO::MYSQL_ATTR_INIT_COMMAND] = $v;
                        break;
                    case "persistent":
                        $options[\PDO::ATTR_PERSISTENT] = $v;
                        break;
                }
            }
        }


        try {
            $pdo = new \PDO($dsn, $settings['pdo_user'], $settings['pdo_pass'], $options);
            $this->setConnexion($pdo);
        } catch (\PDOException $e) {
            $this->pdoException = $e;
            throw new LightDatabaseException("A problem occurred while trying to connect to the database.");
        }
    }


    /**
     * Returns the error message of the original exception thrown if the pdo connection failed during call to the
     * init method.
     * Or an empty string by default, or if the connexion went ok.
     *
     * @return \PDOException|null
     */
    public function getConnectionException(): ?\PDOException
    {
        return $this->pdoException;
    }




    //--------------------------------------------
    // ROW RESTRICTION PROTECTED SET
    //--------------------------------------------
    /**
     * Same as insert method, but triggers @page(the user row restriction checking) before hand (if available).
     *
     * @param $table
     * @param array $fields
     * @param array $options
     * @return false|string
     * @throws \Exception
     */
    public function pinsert($table, array $fields = [], array $options = [])
    {
        /**
         * @var $urr LightUserRowRestrictionService
         */
        $urr = $this->container->get("user_row_restriction");
        $urr->checkRestrictions("insert", $table, $fields, $options);
        return parent::insert($table, $fields, $options);
    }


    /**
     * Same as replace method, but triggers @page(the user row restriction checking) before hand (if available).
     *
     * @param $table
     * @param array $fields
     * @param array $options
     * @return false|string
     * @throws \Exception
     */
    public function preplace($table, array $fields = [], array $options = [])
    {
        /**
         * @var $urr LightUserRowRestrictionService
         */
        $urr = $this->container->get("user_row_restriction");
        $urr->checkRestrictions("replace", $table, $fields, $options);
        return parent::replace($table, $fields, $options);
    }


    /**
     * Same as update method, but triggers @page(the user row restriction checking) before hand (if available).
     *
     * @param $table
     * @param array $fields
     * @param null $whereConds
     * @param array $markers
     * @return bool
     * @throws \Exception
     */
    public function pupdate($table, array $fields, $whereConds = null, array $markers = [])
    {
        /**
         * @var $urr LightUserRowRestrictionService
         */
        $urr = $this->container->get("user_row_restriction");
        $urr->checkRestrictions("update", $table, $fields, $whereConds, $markers);
        return parent::update($table, $fields, $whereConds, $markers);
    }


    /**
     *
     * Same as delete method, but triggers @page(the user row restriction checking) before hand (if available).
     *
     * @param $table
     * @param null $whereConds
     * @param array $markers
     * @return false|int
     * @throws \Exception
     */
    public function pdelete($table, $whereConds = null, $markers = [])
    {
        /**
         * @var $urr LightUserRowRestrictionService
         */
        $urr = $this->container->get("user_row_restriction");
        $urr->checkRestrictions("delete", $table, $whereConds, $markers);
        return parent::delete($table, $whereConds, $markers);
    }


    /**
     * Same as fetch method, but triggers @page(the user row restriction checking) before hand (if available).
     *
     * @param $query
     * @param array $markers
     * @param null $fetchStyle
     * @return array|false
     * @throws \Exception
     */
    public function pfetch($query, array $markers = [], $fetchStyle = null)
    {
        /**
         * @var $urr LightUserRowRestrictionService
         */
        $urr = $this->container->get("user_row_restriction");
        $urr->checkRestrictions("fetch", $query, $markers, $fetchStyle);
        return parent::fetch($query, $markers, $fetchStyle);
    }


    /**
     *
     * Same as fetchAll method, but triggers @page(the user row restriction checking) before hand (if available).
     *
     * @param $query
     * @param array $markers
     * @param null $fetchStyle
     * @param null $fetchArg
     * @param array $ctorArgs
     * @return array|false
     * @throws \Exception
     */
    public function pfetchAll($query, array $markers = [], $fetchStyle = null, $fetchArg = null, array $ctorArgs = [])
    {
        /**
         * @var $urr LightUserRowRestrictionService
         */
        $urr = $this->container->get("user_row_restriction");
        $urr->checkRestrictions("fetchAll", $query, $markers, $fetchStyle, $fetchArg, $ctorArgs);
        return parent::fetchAll($query, $markers, $fetchStyle, $fetchArg, $ctorArgs);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onSuccess(string $type, string $table, string $query, array $arguments, $return = true)
    {

        $eventType = $type;
        if ('insert' === $eventType || 'replace' === $eventType) {
            $eventType = 'create';
        }

        //--------------------------------------------
        // dispatching the event
        //--------------------------------------------
        $event = LightEvent::createByContainer($this->container);
        $event->setVar('table', $table);
        $event->setVar('action', $type);
        $event->setVar('query', $query);
        $event->setVar('arguments', $arguments);
        $event->setVar('return', $return);
        /**
         * @var $dispatcher LightEventsService
         */
        $dispatcher = $this->container->get("events");
        $eventName = 'Light_Database.' . implode('_', [
                'on',
                $table,
                $eventType,
            ]);
        $dispatcher->dispatch($eventName, $event);
    }
}