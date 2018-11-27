<?php

namespace src\components\redis;

use SessionHandlerInterface;
use Predis\Client;

class RedisSessionHandler implements SessionHandlerInterface
{
    public $ttl = 1800; // 30 minutes default
    protected $db;
    protected $prefix;

    public function __construct(Client $db, $prefix = 'PHPSESSID:') 
    {
        $this->db = $db;
        $this->prefix = $prefix;
    }
    
    public function open($savePath, $sessionName) 
    {
        return true;
    }
    
    public function close() 
    {
        $this->db = null;
        unset($this->db);
        return true;
    }
    
    public function read($id) 
    {
        $id = $this->prefix . $id;
        $sessData = $this->db->get($id);
        $this->db->expire($id, $this->ttl);
        return $sessData;
    }
    
    public function write($id, $data) 
    {
        $id = $this->prefix . $id;
        $this->db->set($id, $data);
        $this->db->expire($id, $this->ttl);
        return true;
    }
    
    public function destroy($id) 
    {
        $this->db->del($this->prefix . $id);
        return true;
    }
    
    public function gc($maxLifetime) 
    {
        return true;
    }
}
