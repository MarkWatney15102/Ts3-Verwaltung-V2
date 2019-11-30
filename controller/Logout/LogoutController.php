<?php 

class LogoutController implements ControllerInterface
{
    public function init(Title $title)
    {
        $title->setTitle("Logout");
    }
}
