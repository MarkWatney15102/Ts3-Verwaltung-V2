<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/config/require.php');

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

    public function __construct() 
    {
        $this->initRequires();
        $this->routing = new Routing($this);
        $this->redirect = new Redirect($this);

        $this->initDatabaseConnection();
    }

    private function initRequires() 
    {
        $this->require = new RequireContainer();
    }

    private function initDatabaseConnection() 
    {
        $database = new Medoo(
            [
                'database_type' => 'mysql',
                'database_name' => 'ts3',
                'server' => '127.0.0.1',
                'username' => 'root',
                'password' => ''
            ]
        );

        $this->database = $database;
    }
}

