<?php
    header("Content-Security-Policy: script-src 'unsafe-inline' 'unsafe-eval';");
    require_once("./lib/database.php");
    require_once("./lib/router.php");
    $router = new router();
    echo $router->get(@$_SERVER['REQUEST_URI']);
?>