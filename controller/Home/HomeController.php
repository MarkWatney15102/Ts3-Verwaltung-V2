<?php 

class HomeController implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    public function init(Title $title, Config $config)
    {
        $this->config = $config;
        $title->setTitle("Home");
    }

    public function createView()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Home/home.php");
    }
}