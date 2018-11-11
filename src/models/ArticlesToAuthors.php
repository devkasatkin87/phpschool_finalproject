<?php

namespace src\models;

use ActiveRecord\Model;

class ArticlesToAuthors extends Model
{
    /**
     * 
     * @param int $article_id
     * @return int
     */
    public function getAuthorIdByArticleId(int $article_id) : int
    {
        $attributes = self::find('all', ['article_id' => $article_id]);
        $attributes = $attributes[0]->attributes();
        
        return $attributes['author_id'];
    }    
}
