<?php 

class LogoutController implements ControllerInterface
{
    public function init(Title $title, Config $config, array $params)
    {
        $title->setTitle("Logout");
    }

    public function createView()
    {
        
    }
}
