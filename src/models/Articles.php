<?php

namespace src\models;

use ActiveRecord\Model;

class Articles extends Model
{
    
    public $id;
    public $title;
    public $date_published;
    public $content;
    public $img;
    public $views;
    
    public function setAttributes($obj) {
    
        $attr = $obj->attributes();
        
        $this->id = $attr['id'];        
    }
    
}
