<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('ROOT', dirname('__FILE__',1));
require_once __DIR__.'/../../vendor/autoload.php';

$redis = new \src\components\redis\Controller();

for ($i = 1; $i < 62652; $i++){
    $redis->getsetRecord($i, 1);
}

