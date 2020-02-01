<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/config/require.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/const.php');

use Medoo\Medoo;

class Config
{
    /**
     * @var array
     */
    private $databaseConfig;

    /**
     * @var RequireContainer
     */
    private $requies;

    /**
     * @var Routing
     */
    public $routing;

    /**
     * @var Medoo
     */
    public $database;

    /**
     * @var Redirect
     */
    public $redirect;

    /**
    * @var TeamSpeak3
    */
    public $ts;

    /**
    * @var UserModel
    */
    public $user;

    /**
    * @var ActionLogger
    */
    public $logger;

    /**
     * @var Includer
     */
    public $includer;

    /**
     * @var Permissions
     */
    public $permissions;

    public function __construct()
    {
        $this->initRequires();
        $this->routing = new Routing($this);
        $this->redirect = new Redirect($this);
        $this->logger = new ActionLogger($this);
        $this->includer = new Includer();

        $this->initDatabaseConnection();
        $this->initTsQueryConnection();

        $this->permissions = new Permissions($this, $_SESSION['UID']);
    }

    private function initRequires()
    {
        $this->require = new RequireContainer();
    }

    private function initDatabaseConnection()
    {
        $this->databaseConfig = [
            'database_type' => 'mysql',
            'database_name' => 'ts3',
            'server' => '127.0.0.1',
            'username' => 'root',
            'password' => ''
        ];

        $database = new Medoo(
            $this->databaseConfig
        );

        $this->database = $database;
    }

    private function initTsQueryConnection()
    {
        $ts = TeamSpeak3::factory("serverquery://serveradmin:oNMyA1DC@127.0.0.1:10011/?server_port=9987&nickname=Ts3Control");
        $this->ts = $ts;
    }

    public function setUser(UserModel $user)
    {
        $this->user = $user;
    }

    public function getDatabaseName(): string
    {
        return $this->databaseConfig['database_name'];
    }

    public function getPhpVersion()
    {
        return phpversion();
    }
}
