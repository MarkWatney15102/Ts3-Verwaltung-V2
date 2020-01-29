<?php

class UserProfile implements ControllerInterface
{
  /**
  * @var Config
  */
  private $config;

  /**
   * @var array
   */
  private $params;

  public function init(Title $title, Config $config, array $params)
  {
    $this->config = $config;
    $this->params = $params;
    $title->setTitle("User Profile");
  }

  public function createView()
  {
    $editUser = new UserModel($this->config, $this->params['url_param']);

    if (isset($_POST['change_user_active_state'])) {
      $editUser->setActive((int)$_POST['change_to']);
    }
    require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Account/UserProfile/userprofile.php");
  }
}
