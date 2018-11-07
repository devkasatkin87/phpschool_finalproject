<?php

return [
    'host' => 'mysql',
    'port' => '3306',
    'dbname' => 'myproject',
    'charset' => 'utf8',
    'user' => 'dbuser',
    'password' => '123456',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
];