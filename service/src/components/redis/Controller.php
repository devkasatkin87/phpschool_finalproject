<?php

namespace src\components\redis;

use src\components\redis\Connection;

class Controller {
    
    public $connection;
    
    public function __construct() {
        $this->connection = Connection::getConnection();
    }
    
    /**
     * 
     * @param string $id
     * @param int $views
     * @return bool
     * 
     *      */
    public function addRecord(string $id, int $views) : bool
    {
        $this->connection->set("article:$id", $views);

        return true;
                
    }
    
    /**
     * 
     * @param string $id
     * @return int
     *      */
    public function getRecord(string $id)
    {
        return $this->connection->get("article:$id");
    }
    
    public function keyExist(string $id){
        return $this->connection->exists("article:$id");
    }

        /**
     * 
     * @param string $id
     * 
     */
    public function incrementRecord(string $id)
    {
        $this->connection->incr("article:$id");
        return true;
    }
    
    /**
     * @param array $ids Articles were sorted by topic
     * @param int $numbTop
     * @return array
     */
    public function getSortedViewsByIds(array $ids, int $numbTop)
    {
        $views = [];
        $top = [];
        
        foreach ($ids[0] as $id){
            if ($this->keyExist($id)){
                $views[$id] = $this->getRecord($id);
            }
        }
        
        arsort($views);

        $top = array_slice($views, 0, $numbTop, true);

        return $top;
        
    }
    
    /**
     * @param $id
     * @param $value
     * @return bool
     *      */
    public function getsetRecord($id, $value)
    {
        $this->connection->getset("article:$id", $value);
        return true;
    }
    
    /**
     * @param $id
     * @return bool
     *      */
    public function deleteRecord($id)
    {
        $this->connection->del("article:$id");
        return true;
    }
}
