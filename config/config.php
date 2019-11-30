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

    public function __construct() 
    {
        $this->initRequires();
    }

    private function initRequires() 
    {
        $this->require = new RequireContainer();
    }

    private function initDatabaseConnection() 
    {

    }
}

