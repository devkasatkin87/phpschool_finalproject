<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__.'/vendor/autoload.php';

use src\components\router\RouterControl;
use src\components\router\RouterEntity;
use src\components\redis\RedisSessionHandler;

define('ROOT', dirname('__FILE__'));

$sessHandler = new RedisSessionHandler();

session_set_save_handler($sessHandler);

session_start();

var_dump($_SESSION['user']);

//Define path to routes (/src/config)
$routesPath = __DIR__.'/src/config/routes.php';

//RUN Application
$router = new RouterControl(new RouterEntity($routesPath));

$router->run();

