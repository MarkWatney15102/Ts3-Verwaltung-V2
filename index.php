<head>
<link rel="stylesheet" href="dist/css/build.css">
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</head>
<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");

    $config = new Config();

    $config->routing->redirect($_SERVER['REQUEST_URI']);

    if (isset($_SESSION['UID'])) {
        $user = new UserModel($config, $_SESSION['UID']);
    }

?>
