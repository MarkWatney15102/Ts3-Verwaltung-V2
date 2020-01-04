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
    $editUser = new UserModel($this->config, $_GET['user_id']);

    if (isset($_POST['change_user_active_state'])) {
      $editUser->setActive((int)$_POST['change_to']);
    }
    require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Account/UserProfile/userprofile.php");
  }
}
