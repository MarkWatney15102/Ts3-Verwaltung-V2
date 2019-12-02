<?php 

class LogoutController implements ControllerInterface
{
    public function init(Title $title, Config $config)
    {
        $title->setTitle("Logout");
    }

    public function createView()
    {
        
    }
}
