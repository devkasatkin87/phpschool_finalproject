<?php

namespace src\components\redis;

use Predis\Client;

class Connection 
{
    /**
     * 
     * Coonection to Redis
     * 
     *      */
    public static function getConnection()
    {
        try {
            
            $config = require_once __DIR__.'/config.php';
            
            $redis = new Client($config);
            
            return $redis;
            
        } catch (Exception $exc) {
            echo "Connection Error: ";
            echo $exc->getMessage();
        }
        }
}
