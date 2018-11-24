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
     * 
     * @param int $id
     * @return Object Articles
     */
    public function getArticleById(int $id) : Articles
    {
        $articleObj = self::find([$id]);
        
        return $articleObj;
    }
    
    /**
     * @param int $top
     * @param int $topic_id
     * @return array
     */
    public function getTopArticlesByCurrentCategory(int $top, int $topicId) : array
    {
        $objs = [];
        $list = [];
        
        $conditions = [
            'conditions' => ['topic_id=?',$topicId],
            'order' => 'views desc',
            'limit' => $top
            ];
        
        $objs = self::find('all', $conditions);
        
        $list = $this->parseArrayOfDbObj($objs);
        
        return $list;
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
    
    /**
     * 
     * @return bool
     */
    public function checkEnterData($title, $content, $author) {
        if ($this->checkTitle($title) && $this->checkContent($content) && $this->checkAuthor($author)){
            return true;
        }
        return false;
    }
    
    /**
     * 
     * @param string $title
     * @return bool
     * 
     *      */
    private function checkTitle($title) : bool
    {
        if (is_string($title) && (strlen($title)>=2)){
            return true;
        }
        
        return false;
    }
    
    /**
     * 
     * @param string $content
     * @return bool
     * 
     *      */
    private function checkContent($content) : bool
    {
        if (is_string($content) && (strlen($content)>=2)){
            return true;
        }
        
        return false;
    }
    
    /**
     * 
     * @param string $author
     * @return bool
     * 
     *      */
    private function checkAuthor($author) : bool
    {
        if (is_string($author) && (strlen($author)>=2)){
            return true;
        }
        
        return false;
    }
    
    /**
     * 
     * @param string $title
     * @param string $content
     * @param string $author
     * @param int $topic
     * @param string $date
     * @param string $image
     * @return array
     *      */
    public function add($title, $content, $author, $topic, $date, $image)
    {
        $message = '';
        $modelAuthors = new Authors();
        
        if ($this->checkEnterData($title, $content, $author)) {
            
            $authorId = $modelAuthors->add($author);
            
            $article = Articles::create([
                        'title' => $title,
                        'date_published' => $date,
                        'content' => $content,
                        'img' => $image,
                        'views' => 0,
                        'author_id' => $authorId,
                        'topic_id' => $topic,
            ]);
            $message = 'Article has been added';
            header("Location: /article/controll");
        } else {
            $message = "Error in data";
        }
        
        return $message;
    }
    
    /**
     * 
     * @param string $title
     * @param string $content
     * @param string $author
     * @param int $topic
     * @param string $date
     * @param string $image
     * @return array || bool
     *      */
    public function update($title, $content, $author, $topic, $date, $image)
    {
        $errors = [];
        $modelsAuthor = new Authors();
        
        if ($this->checkEnterData($title, $content, $author)){
            
            $authorId = $modelsAuthor->add($author);
            
            $result = $this->update_attributes([
                    'title' => $title,
                    'date_published' => $date,
                    'content' => $content,
                    'img' => $image,
                    'views' => 0,
                    'author_id' => $authorId,
                    'topic_id' => $topic
                ]);
            
            header("Location: /article/controll");
            exit();
        }else{
            $errors[] = 'Errors in data!';
        }
        
    }
    
    /**
     * 
     * @param int $id
     * @return bool
     *      */
    public function remove($id)
    {
        $condtition = ['conditions' =>[ 'id=?', $id]];
        
        $result = $this->delete_all($condtition);
        
        header("Location: /");
    }
    
    /**
     * 
     * @param int $topicId
     * @return array
     *      */
    public function getArticlesIdByTopicId(int $topicId) : array
    {
        $objs = [];
        $list = [];
        $ids = [];
        
        $conditions = [
            'conditions' => ['topic_id=?',$topicId],
            'select' => 'id'
            ];
        
        $objs = self::find('all', $conditions);
        
        $list = $this->parseArrayOfDbObj($objs);
        
        foreach ($list as $l){
            $ids[] = $l['id'];
        }
        
        return $ids;
    }
    
    public function getTopicIdByArticleId(int $articleId)  : int
    {
        $conditions = [
            'conditions' => ['id=?',$articleId],
            'select' => 'topic_id'
            ];
        
        $attr = self::find('first', $conditions)->attributes();
        
        $id = $attr['topic_id'];
        
        return $id;
        
    }
    
    
}
