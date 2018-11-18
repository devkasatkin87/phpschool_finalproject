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
        
         $modelObjs = self::find('all', ['limit' => self::SHOW_AUTHORS_BY_DEFAULT, 'order' => 'first_name asc', 'offset' => $offset]);
        //$modelObjs = self::find('all', ['order' => 'first_name asc']);
            foreach ($modelObjs as $modelObj) {
                $list[] = $modelObj->attributes();
            }
            
            return $list;
    }
    
    /**
     * 
     * @param int $id
     * @return string 
     */
    public function getAuthorNameById(int $id) : string
    {
        $object = self::find('all', ['id' => $id]);
        $attributes = $object[0]->attributes();
        $name = "{$attributes['first_name']} {$attributes['second_name']}";
        return $name;
    }
    
    /**
     * 
     * @param array $fullname
     * @return object
     *      */
    public function getAuthorByName(array $fullname)
    {
        return self::first('all', ['conditions' => ['first_name like ? and second_name like ?', $fullname[0], $fullname[1]]]);
    }

    /**
     * 
     * @param string $firstName
     * @param string $secondName
     * @return int || bool
     *      */
    public function add(string $name) : int
    {
        $authorName = $this->createAuthorName($name);
        
        $found = $this->getAuthorByName($authorName);
        
        var_dump($found);
        
        if (isset($find)){
            $authorId = $found->attributes();
            return $authorId;
        }else{
            $author = Authors::create([
                'first_name' => $authorName[0],
                'second_name' => $authorName[1]
            ]);
            $author = $author->attributes();
            $authorId = $author['id'];
            return $authorId;
        }
    }
    
    /**
     * 
     * @param string $name
     * @return array
     * 
     *      */
    private function createAuthorName(string $name) : array
    {
        $authorName = explode(' ', $name);

        if (count($authorName) < 2) {
                $authorName[1] = '';
        }
        
        return $authorName;
    }
    
}