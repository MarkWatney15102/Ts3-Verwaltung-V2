<?php

class AccountList implements ControllerInterface
{
  /**
   * @var Config
   */
  private $config;

  public function init(Title $title, Config $config)
  {
      $this->config = $config;
      $title->setTitle("Home");
  }

  public function createView()
  {
    $accounts = $this->getAccounts();

    require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Account/AccountList/accountlist.php");
  }

  private function getAccounts()
  {
    $data = $this->config->database->select("user_login", [
      'user_id',
      'reg_mail',
      'username'
    ]);

    return $data;
  }
}
