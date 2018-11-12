<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once dirname(__DIR__,3).'/vendor/autoload.php';

use src\components\Db;
use src\models\Topics;

$offset = $_POST['numTopics'];

if (is_numeric($offset)){
    $db = Db::connection();

    $model = new Topics();

    getAdditionalTopics($model, $offset);

}       

/**
 * 
 * @param Topics $model
 * @param int $offset 
 * @return void
 *  */
function getAdditionalTopics(Topics $model, int $offset) : void
{
    $topicsList = $model->getTopicsSortByCountArticles($offset);

    foreach ($topicsList as $topic){
        $offset++;
        echo "<li>{$topic['title']} {$topic['articles_count']}</li>";
    }
}