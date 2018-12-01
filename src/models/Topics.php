<?php

namespace src\models;

use ActiveRecord\Model;

class Topics extends Model
{       
    const SHOW_TOPICS_BY_DEFAULT = 10;
    
    /**
     * 
     * @param int $offset
     * 
     * @return array 
     */
    public function getTopics(int $offset) : array 
    {
        $modelObjs = [];
        $list = [];
        
        $modelObjs = self::find('all', ['limit' => self::SHOW_TOPICS_BY_DEFAULT,'offset' => $offset]);
        
        foreach ($modelObjs as $modelObj) {
            $list[] = $modelObj->attributes();
        }

        return $list;
    }

        /**
     * 
     * @param int $id
     * @return string 
     *      */
    public function getTopicTitleById(int $id) : string
    {
        $topic = self::find('all', ['id' => $id]);
        $topic = $topic[0]->attributes();
        return $topic['title'];
    }
    
    /**
     * 
     * @return array
     *      */
    public function getAllTopics() : array
    {
        $objTopics = self::all();
        
        foreach ($objTopics as $obj) {
            
            $topics[] = $obj->attributes();
        }
        
        return $topics;
    }
    
    /**
     * Service method which parse array of objects
     * @param array $objs Array of objects
     * @return array 
     */
    private function parseArrayOfDbObj(array $objs) : array
    {
        $list = [];
        
        foreach ($objs as $obj) {
            $list[] = $obj->attributes();
        }

        return $list;
    }
}
