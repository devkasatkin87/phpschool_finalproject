<?php

namespace src\components;

use PDO;
use ActiveRecord\Config;

class Db 
{
    /**
     * Return handle connection to DB
     * @return bool
     */
    public static function connection()
    {   
        ///Add file with params for DB
        
        Config::initialize(function($cfg) {
            $paramsPath = dirname(__DIR__).'/config/db_param.php';
            $params = require_once ($paramsPath);   
            $cfg->set_model_directory(__DIR__.'/../models');
            $cfg->set_connections(
                [
                    'development' => "mysql://{$params['user']}:{$params['password']}@{$params['host']}/{$params['dbname']}",
                ]
            );
        });
        
        return true;
    }
}
