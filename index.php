<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__.'/vendor/autoload.php';

use src\components\router\RouterControl;
use src\components\router\RouterEntity;
use src\components\redis\RedisSessionHandler;
use Predis\Client;

define('ROOT', dirname('__FILE__'));

$sessionParams = require_once __DIR__.'/src/components/redis/storage/config.php';

$session = new src\components\redis\storage\Session($sessionParams);

$session->start();

//Define path to routes (/src/config)
$routesPath = __DIR__.'/src/config/routes.php';

//RUN Application
$router = new RouterControl(new RouterEntity($routesPath));

$router->run();

