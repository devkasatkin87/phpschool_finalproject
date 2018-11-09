<?php

namespace src\models;

use ActiveRecord\Model;

class Authors extends Model{
    
     const SHOW_BY_DEFAULT = 10;
    
    /**
     * 
     * 
     * @return array 
     *      */
     public function getAllAuthorsSortByName() : array
    {
        $modelObj = [];
        $list = [];
        
            $modelObjs = self::find('all', ['order' => 'second_name asc']);
        
            foreach ($modelObjs as $modelObj) {
                $list[] = $modelObj->attributes();
            }
            
            return $list;
    }
    
    public function getTotalAmountAuthors()
    {
        return count($this->getAllAuthorsSortByName());
      
    }
    
}
