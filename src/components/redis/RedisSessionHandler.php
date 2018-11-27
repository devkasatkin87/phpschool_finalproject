<?php

namespace src\components\redis;

use SessionHandlerInterface;

class RedisSessionHandler implements SessionHandlerInterface
{
    public $ttl = 1800; // 30 minutes default
    protected $db;
    protected $prefix;

    public function open($savePath, $sessionName) {
        return true;
    }
    public function close() {
        return true;
    }
    public function read($id) {
        
        return 'sessData';
    }
    public function write($id, $data) {
        return true;
    }
    public function destroy($id) {
        return true;
    }
    public function gc($maxLifetime) {
        return true;
    }
}
