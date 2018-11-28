<?php


namespace src\components\redis;

use Predis\Client;

class RedisEntity {

    public static function connection()
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
