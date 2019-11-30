<?php

class LoginController implements ControllerInterface
{
    public function init(Title $title)
    {
        $title->setTitle("Login");
    }
}
