<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/config/require.php');

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

    public function __construct() 
    {
        $this->initRequires();
        $this->routing = new Routing();
    }

    private function initRequires() 
    {
        $this->require = new RequireContainer();
    }

    private function initDatabaseConnection() 
    {

    }
}

