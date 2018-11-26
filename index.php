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

//use predis session storage
ini_set('session.save_handler', 'redis');
ini_set('session.save_path', "tcp://redis:6379");
try {

    $redisConfig = require_once __DIR__.'/src/config/redis_config.php';

    $redis = new Predis\Client($redisConfig);
    
} catch (Exception $exc) {
    echo "Connection Error: ";
    echo $exc->getMessage();
}

$redis->set('test:2', 111);

$prefix = 'PHPSESSID:';
$sessHandler = new RedisSessionHandler($redis, $prefix);
$sessHandler->ttl = ini_get('session.gc_maxlifetime');

session_set_save_handler($sessHandler);
session_start();

//Define path to routes (/src/config)
$routesPath = __DIR__.'/src/config/routes.php';

//RUN Application
$router = new RouterControl(new RouterEntity($routesPath));

$router->run();

