<?php

class ServerFunctions implements ControllerInterface
{
    /**
     * @var Config
    */
    private $config;

    /**
     * @var array
     */
    private $params;

    public function init(Title $title, Config $config, array $params)
    {
        $this->config = $config;
        $this->params = $params;
        $title->setTitle("Server Functions");
    }

    public function createView()
    {
        if (isset($_POST['restart_server'])) {
            if (isset($_POST['restart_server_checkbox'])) {
                // Restart TS
            } else {
                // Dont restart throw message
            }
        }

        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Server/ServerFunctions/ServerFunctions.php");
    }
}
