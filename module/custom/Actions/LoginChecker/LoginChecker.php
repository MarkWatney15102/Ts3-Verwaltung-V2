<?php

class LoginChecker
{
  function __construct(Config $config)
  {
    if (isset($_SESSION['UID'])) {
      $user = new UserModel($config, $_SESSION['UID']);
      $config->setUser($user);
    } else {
      if ($_SERVER['REQUEST_URI'] != "/login") {
        $config->redirect->redirect("/login");
      }
    }
  }
}
