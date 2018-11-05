<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__.'/vendor/autoload.php';

use src\components\Router;

define('ROOT', dirname('__FILE__'));

//Define path to routes (/src/config)
$routesPath = __DIR__.'/src/config/routes.php';

$router = new Router($routesPath);

$router->run();

