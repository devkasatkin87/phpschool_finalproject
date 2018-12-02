<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__.'/vendor/autoload.php';

use src\components\router\RouterControl;
use src\components\router\RouterEntity;

define('ROOT', dirname('__FILE__'));
ini_set('max_execution_time', 900);

$sessionParams = require_once __DIR__.'/src/components/redis/storage/config.php';

$session = new src\components\redis\storage\Session($sessionParams);

$session->start();

//Define path to routes (/src/config)
$routesPath = __DIR__.'/src/config/routes.php';

//RUN Application
$router = new RouterControl(new RouterEntity($routesPath));

if (!$router->run()){
    echo "<h2>Error 404. <i>Page not found!</i></h2>";
}

