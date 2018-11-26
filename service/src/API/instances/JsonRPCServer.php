<?php

namespace src\API\instances;

use src\handler\TopArticles;
use Datto\JsonRpc\Server;

class JsonRPCServer 
{
    public static $server;
    
    /**
     * Create and send response 
     *
     */
    public static function run()
    {   
        self::$server = new Server(new TopArticles());
        $request = file_get_contents('php://input');
        $reply = self::$server->reply($request);
        return $reply;
    }

}
