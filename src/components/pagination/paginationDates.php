<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once dirname(__DIR__,3).'/vendor/autoload.php';

use src\components\Db;
use src\models\Articles;

$offset = $_POST['numDates'];

if (is_numeric($offset)){
    $db = Db::connection();

    $model = new Articles();

    getAdditionalDates($model, $offset);

}       

/**
 * 
 * @param Articles $model
 * @param int $offset 
 * @return void
 *  */
function getAdditionalDates(Articles $model, int $offset) : void
{
    $articlesList = $model->getLimitDates($offset);

    foreach ($articlesList as $article){
        $offset++;
        echo "<li>{$article['date_published']}</li>";
    }
}