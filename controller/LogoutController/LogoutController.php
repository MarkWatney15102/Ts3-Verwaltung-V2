<?php 

class LogoutController implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    public function init(Title $title, Config $config, array $params)
    {
        $this->config = $config;
        $title->setTitle("Logout");

        unset($_SESSION['UID']);

        Redirect::to("/login");
    }

    public function createView()
    {
        
    }
}
