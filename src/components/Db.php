<?php

namespace src\components;
use PDO;
class Db 
{
    /**
     * Return handle connection to DB
     * @return PDO
     */
    public static function connection()
    {
        $pdo = null;
        
        //Add file with params for DB
        $paramsPath = dirname(__DIR__).'/config/db_param.php';
        $params = require_once ($paramsPath);
        
        $dsn = "mysql:host={$params['host']};port={$params['port']};dbname={$params['dbname']};charset={$params['charset']}";
        
        $options = $params['options'];
        
        $pdo = new PDO($dsn, $params['user'], $params['password'], $options);
       
        return $pdo;
    }
}
