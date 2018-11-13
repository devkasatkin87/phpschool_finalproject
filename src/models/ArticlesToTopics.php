<?php

namespace src\models;

use ActiveRecord\Model;

class ArticlesToTopics extends Model {
    
    const SHOW_TOP_ARTICLES_DEFAULT = 10;


    /**
     * 
     * @param int $article_id
     * @return int
     */
    public function getTopicIdByArticleId(int $article_id) : int
    {
        $attributes = self::find('all', ['article_id' => $article_id]);
        $attributes = $attributes[0]->attributes();
        
        return $attributes['topic_id'];
    }
    
    public function getArticlesByTopicId(int $topicId) : array
    {
        $list = [];
        $listObj = [];
        $conditions = [
            'conditions' => ['topic_id=?', $topicId],
            'limit' => 10
        ];
        
        
        $listObj = self::all($conditions);
        
        foreach ($listObj as $obj) {
            $list[] = $obj->attributes();
        }
        
        return $list;
    }
    
}
