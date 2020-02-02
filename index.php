<head>
</head>
<?php
  session_start();
  require_once($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");

  $config = new Config();
  $loginChecker = new LoginChecker($config);
  $config->routing->rout($_SERVER['REQUEST_URI']);

?>
