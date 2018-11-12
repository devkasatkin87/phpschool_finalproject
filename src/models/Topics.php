<?php

namespace src\models;

use ActiveRecord\Model;
use SplQueue;

class Topics extends Model
{       
    const SHOW_TOPICS_BY_DEFAULT = 10;
    
    /**
     * 
     * @param int $offset
     * 
     * @return array 
     */
    
    public function getTopicsSortByCountArticles(int $offset) : array 
    {
        $modelObjs = [];
        $list = [];
        
        $modelObjs = self::find('all', ['limit' => self::SHOW_TOPICS_BY_DEFAULT, 'order' => 'articles_count asc', 'offset' => $offset]);
        
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
}
