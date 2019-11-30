<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");

$config = new Config();

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
       	echo 'Home';
        break;
    case '' :
        echo 'Home';
        break;
    case '/about' :
        echo 'About';
        break;
    default:
        echo '404';
        break;
}
