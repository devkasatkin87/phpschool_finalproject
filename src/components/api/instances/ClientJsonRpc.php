<?php

namespace src\components\api\instances;

use Datto\JsonRpc\Client;

class ClientJsonRpc {
    
    public static $client;
    
    
    /**
     * 
     * @param int $currentId Current Article Id
     * @param array $ids Articles were filtered by topic
     * @param string $method Name of processing method
     *      */
    public static function createMessageIds(int $currentId, array $ids, string $method)
    {
        $idRequest = 1;
        
        self::$client = new Client();
        self::$client->query($idRequest, $method, [$currentId,$ids]);
        $message = self::$client->encode();
        
        return $message;

    }
}
