<?php

class UserProfile implements ControllerInterface
{
  /**
  * @var Config
  */
  private $config;

  public function init(Title $title, Config $config)
  {
    $this->config = $config;
    $title->setTitle("User Profile");
  }

  public function createView()
  {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Account/UserProfile/userprofile.php");
  }
}
