<?php

namespace src\models;

use ActiveRecord\Model;

class Authors extends Model{
    
    const SHOW_AUTHORS_BY_DEFAULT = 10;
    
    /**
     * 
     * @param int $offset
     * @return array 
     *      */
     public function getLimitAuthorsSortByName(int $offset) : array
    {
        $modelObj = [];
        $list = [];
        
            $modelObjs = self::find('all', ['limit' => self::SHOW_AUTHORS_BY_DEFAULT, 'order' => 'second_name asc', 'offset' => $offset]);
        
            foreach ($modelObjs as $modelObj) {
                $list[] = $modelObj->attributes();
            }
            
            return $list;
    }
    
}