<head>
    <?php 
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");

    $config = new Config();

    IncluderProvider::loadDependencies();
    ?>
</head>
<body>
    <?php

    $loginChecker = new LoginChecker($config);
    $config->routing->rout($_SERVER['REQUEST_URI']);

    ?>
</body>