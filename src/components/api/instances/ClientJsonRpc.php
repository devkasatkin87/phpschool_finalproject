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
    
    /**
     * Send requests and get response from Service use Datto\JsonRpc\Client
     * @param int $id
     * @param string $method
     * @return string
     */
    public static function sendMessageId(int $id, string $method)
    {
        
        $client = new Client();
        $client->query(1, $method, [$id]);
        $message = $client->encode();

        $guzzle = new \GuzzleHttp\Client;
        $send = $guzzle->post('http://topgenerator-webserver/', ['body' => $message]);
        $reply = $send->getBody();
        
        return true;
    }
    
    /**
     * Send requests and get response from Service use Datto\JsonRpc\Client
     * @param int $id
     * @param string $method
     * @return string
     */
    public static function sendMessageArray(array $data, string $method)
    {
        
        $client = new Client();
        $client->query(1, $method, [$data]);
        $message = $client->encode();

        $guzzle = new \GuzzleHttp\Client;
        $send = $guzzle->post('http://topgenerator-webserver/', ['body' => $message]);
        $reply = $send->getBody();
        
        return true;
    }
}
