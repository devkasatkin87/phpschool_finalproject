<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once dirname(__DIR__,3).'/vendor/autoload.php';

use src\components\Db;
use src\models\Authors;

$offset = $_POST['numAuthors'];
var_dump($offset);
if (is_numeric($offset)){
    $db = Db::connection();

    $model = new Authors();

    getAdditionalAuthors($model, $offset);

}       

/**
 * 
 * @param Authors $model
 * @param int $offset 
 * @return void
 *  */
function getAdditionalAuthors(Authors $model, int $offset) : void
{
    $authorsList = $model->getLimitAuthorsSortByName($offset);

    foreach ($authorsList as $author){
        $offset++;
        echo "<li>{$author['second_name']} {$author['first_name']}</li>";
    }
}