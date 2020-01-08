<?php 

class CreateNote implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    public function init(Title $title, Config $config)
    {
        $this->config = $config;
        $title->setTitle("Create Note");
    }

    public function createView()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/CreateNote/CreateNote.php");
    }
}

