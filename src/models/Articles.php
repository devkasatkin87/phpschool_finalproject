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
    
}
