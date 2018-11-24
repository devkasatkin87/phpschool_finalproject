<?php

namespace src\components\api\instances;

use Datto\JsonRpc\Client;

class ClientJsonRpc {
    
    public static $client;
    
    public static function createMessageIds(array $ids, string $method)
    {
        $idRequest = 1;
        
        self::$client = new Client();
        self::$client->query($idRequest, $method, [1,$ids]);
        $message = self::$client->encode();
        
        return $message;

    }
}
