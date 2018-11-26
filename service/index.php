<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('ROOT', dirname('__FILE__'));

require_once ROOT.'/src/API/configs/mainConfig.php';
require_once ROOT.'/vendor/autoload.php';

use src\API\instances\JsonRPCServer;

print_r(JsonRPCServer::run());
    

