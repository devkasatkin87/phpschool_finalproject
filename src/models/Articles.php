<?php

namespace src\models;

use ActiveRecord\Model;

class Articles extends Model
{
    const SHOW_DATES_BY_DEFAULT = 10;
    
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

        foreach ($modelObjs as $modelObj) {
            $list[] = $modelObj->attributes();
        }

        return $list;
    }
}
