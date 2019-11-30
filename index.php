<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");

$config = new Config();
$config->routing->redirect($_SERVER['REQUEST_URI']);


