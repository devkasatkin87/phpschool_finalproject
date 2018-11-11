<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once dirname(__DIR__,3).'/vendor/autoload.php';

use src\components\Db;
use src\models\Articles;

$offset = $_POST['num'];

if (is_numeric($offset)){
    $db = Db::connection();

    $model = new Articles();

    getAdditionalArticles($model, $offset);

}       

/**
 * 
 * @param Articles $model
 * @param int $offset 
 * @return void
 *  */
function getAdditionalArticles(Articles $model, int $offset) : void
{
    $articlesList = $model->getArticles($offset);

    foreach ($articlesList as $article){
        $offset++;
        echo "<li><a href=\"/article/{$article['id']}\">{$article['title']}</a></li>";
    }
}