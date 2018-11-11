<?php

namespace src\models;

use ActiveRecord\Model;

class Articles extends Model
{
    const SHOW_DATES_BY_DEFAULT = 10;
    const SHOW_ARTICLES_BY_DEFAULT = 15;
    
    /**
     * 
     * @param int $offset
     * @return array 
     */
    public function getLimitDates(int $offset) : array
    {
        $modelObj = [];
        $list = [];

        $modelObjs = self::find('all', ['limit' => self::SHOW_DATES_BY_DEFAULT, 'order' => 'date_published desc', 'offset' => $offset]);
        
        $list = $this->parseArrayOfDbObj($modelObjs);
        return $list;
    }
    
    public function getArticles(int $offset) : array
    {
        $modelObj = [];
        $list = [];

        $modelObjs = self::find('all', ['limit' => self::SHOW_ARTICLES_BY_DEFAULT, 'offset' => $offset]);
        
        $list = $this->parseArrayOfDbObj($modelObjs);
        return $list;
    }


    /**
     * Service method which parse array of objects
     * @param array $objs Array of objects
     * @return array 
     *      */
    private function parseArrayOfDbObj(array $objs) : array
    {
        foreach ($objs as $obj) {
            $list[] = $obj->attributes();
        }

        return $list;
    }
}
