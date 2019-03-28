<?php


namespace Ling\Deploy\Application;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\Application;
use Ling\Deploy\Command\DeployGenericCommand;
use Ling\Deploy\Exception\DeployException;

/**
 * The DeployApplication class.
 *
 * The console program used to deploy your local website to production servers.
 *
 * General options (apply to all commands)
 * ------------
 *
 * - ?dir=$dir. Sets the project directory. If not set, the default is the current directory.
 * - -x: if set, the x flag will tell the application to use the exit status system.
 *          This means that after a command is executed, the exit function of php is called
 *          with the status code returned by the command (0 by default).
 * - ?indent=int. Sets the base indent level for the command.
 *
 *
 *
 *
 *
 *
 */
class DeployApplication extends Application
{


    /**
     * This property holds the identifier of the current project.
     * @var string = null
     */
    private $projectIdentifier;

    /**
     * This property holds the base indent level for this instance.
     * @var int = 0
     */
    private $baseIndentLevel;

    /**
     * Builds the DeployApplication instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->projectIdentifier = null;
        $this->baseIndentLevel = 0;
        $this->registerCommand("Ling\Deploy\Command\BackupDatabaseCommand", "backup-db");
        $this->registerCommand("Ling\Deploy\Command\CleanBackupDatabaseCommand", "clean-backup-db");

        $this->registerCommand("Ling\Deploy\Command\ShowConfCommand", "conf");
        $this->registerCommand("Ling\Deploy\Command\CreateDatabaseCommand", "create-db");

        $this->registerCommand("Ling\Deploy\Command\DiffCommand", "diff");
        $this->registerCommand("Ling\Deploy\Command\DiffBackCommand", "diffback");

        $this->registerCommand("Ling\Deploy\Command\DropDatabaseCommand", "drop-db");

        $this->registerCommand("Ling\Deploy\Command\FetchCommand", "fetch");
        $this->registerCommand("Ling\Deploy\Command\FetchBackupDatabaseCommand", "fetch-backup-db");

        $this->registerCommand("Ling\Deploy\Command\HelpCommand", "help");
        $this->registerCommand("Ling\Deploy\Command\ListBackupDatabaseCommand", "list-backup-db");
        $this->registerCommand("Ling\Deploy\Command\CreateMapCommand", "map");
        $this->registerCommand("Ling\Deploy\Command\PushCommand", "push");
        $this->registerCommand("Ling\Deploy\Command\PushBackupDatabaseCommand", "push-backup-db");
        $this->registerCommand("Ling\Deploy\Command\RemoveFilesCommand", "remove");

        $this->registerCommand("Ling\Deploy\Command\RestoreBackupDatabaseCommand", "restore-backup-db");

        $this->registerCommand("Ling\Deploy\Command\UnzipCommand", "unzip");
        $this->registerCommand("Ling\Deploy\Command\ZipFilesCommand", "zip");
        $this->registerCommand("Ling\Deploy\Command\ZipBackupCommand", "zip-backup");

    }


    /**
     * Returns the baseIndentLevel of this instance.
     *
     * @return int
     */
    public function getBaseIndentLevel(): int
    {
        return $this->baseIndentLevel;
    }

    /**
     * Returns the projectIdentifier of this instance.
     *
     * @return string
     */
    public function getProjectIdentifier(): string
    {
        return $this->projectIdentifier;
    }


    /**
     * Returns the configuration array for the current project.
     *
     * It is assumed that the project is defined.
     * If not, an exception will be thrown.
     *
     *
     * All projects configuration is stored in one centralized file:
     *
     *  ~/.deploy/deploy-conf.byml
     *
     *
     * Exceptions will be thrown if this file doesn't exist.
     * Exceptions will also be thrown if the file exist but the project identifier is not configured.
     * Exceptions will also be thrown if the mandatory project configuration keys are not found. Those mandatory
     * configuration keys are:
     *
     * - root_dir: the root path to the project application on the local machine
     * - ssh_config_id: the ssh identifier of the **~/.ssh/config** file to use to connect through the remote project via ssh
     * - remote_root_id: the root path to the project application on the remote machine
     *
     *
     * The returned configuration array is always merged with default values, so that
     * the maintainer of the project doesn't have to type explicitly all option key/value pairs.
     *
     *
     * The default configuration for a project is the following (see the documentation for more details):
     *
     * ```txt
     * map-conf:
     *      ignoreHidden: true
     *      ignoreNames: []
     *      ignorePaths: []
     * ```
     *
     *
     *
     * @return array
     * @throws DeployException
     */
    public function getProjectConf()
    {
        if (null !== $this->projectIdentifier) {

            $conf = $this->getConf();
            $projectConf = BDotTool::getDotValue('projects.' . $this->projectIdentifier, $conf);
            if (null !== $projectConf) {

                if (array_key_exists('root_dir', $projectConf)) {
                    if (array_key_exists('ssh_config_id', $projectConf)) {
                        if (array_key_exists('remote_root_dir', $projectConf)) {


                            if (false === array_key_exists('map-conf', $projectConf)) {
                                $projectConf['map-conf'] = [];
                            }

                            if (false === array_key_exists('ignoreName', $projectConf['map-conf'])) {
                                $projectConf['map-conf']['ignoreName'] = [];
                            }

                            if (false === array_key_exists('ignorePath', $projectConf['map-conf'])) {
                                $projectConf['map-conf']['ignorePath'] = [];
                            }

                            if (false === array_key_exists('ignoreHidden', $projectConf['map-conf'])) {
                                $projectConf['map-conf']['ignoreHidden'] = true;
                            }
                            return $projectConf;
                        } else {
                            throw new DeployException("<b>remote_root_dir</b> configuration key missing for project <b>" . $this->projectIdentifier . "</b>.");
                        }
                    } else {
                        throw new DeployException("<b>ssh_config_id</b> configuration key missing for project <b>" . $this->projectIdentifier . "</b>.");
                    }
                } else {
                    throw new DeployException("<b>root_dir</b> configuration key missing for project <b>" . $this->projectIdentifier . "</b>.");
                }
            } else {
                throw new DeployException("Project <b>" . $this->projectIdentifier . "</b> was not defined in the configuration file.");
            }

        } else {
            throw new DeployException("The project identifier is not defined.");
        }
    }


    /**
     * Returns the configuration array
     * @return array
     * @throws DeployException
     */
    public function getConf()
    {
        $confFile = $this->getConfPath();
        if (file_exists($confFile)) {
            return BabyYamlUtil::readFile($confFile);
        } else {
            throw new DeployException("The deploy configuration file was not found in <b>$confFile</b>.");
        }
    }

    /**
     * Returns the path to the @concept(configuration file).
     * @return string
     */
    public function getConfPath()
    {
        return "/komin/jin_site_demo/tmp/deploy.conf.byml";
        return "~/.deploy/deploy-conf.byml";
    }


    /**
     * @overrides
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        if (null !== ($projectId = $input->getOption("p"))) {
            $this->projectIdentifier = $projectId;
        }


        if (null !== ($indent = $input->getOption("indent"))) {
            $this->baseIndentLevel = $indent;
        }

        if (true === $input->hasFlag("x")) {
            $this->setUseExitStatus(true);
        }


        //--------------------------------------------
        //
        //--------------------------------------------
        parent::run($input, $output);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {
        if ($command instanceof DeployGenericCommand) {
            $command->setApplication($this);
        } else {
            throw new DeployException("All commands must inherit from Ling\Deploy\Command\DeployGenericCommand.");
        }
    }


}





