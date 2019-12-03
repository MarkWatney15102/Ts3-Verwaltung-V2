<?php

class LoginController implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    public function init(Title $title, Config $config)
    {
        $this->config = $config;
        $title->setTitle("Login");
    }

    public function createView()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Login/login.php");

        if (isset($_POST['signIn'])) {
            $login = new Login($_POST['username'], $_POST['password'], $this->config);
            $login->checkLoginData();

            if ($login->isAuth()) {
                $this->config->redirect->redirect("/");
            } else {
                
            }
        }
    }
}
