<?php

//View Errors
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once dirname(__DIR__,2).'/vendor/autoload.php';

use src\models\Articles;

if (isset ($_POST['result'])){
    $ids = $_POST['result'];
    echo "done";
}
$db = src\components\Db::connection();
$model = new Articles();
$keys = array_keys($ids);
$el = 0;
foreach ($keys as $key){
    $top[$el]['id'] = $keys[$el];
    $top[$el]['views'] = $ids[$keys[$el]];
    $el++;
}
foreach ($top as $element){
    if ($element ==''){
        return true;
    }
    $model->updateViews($element['id'], (int)$element['views']);
}
return true;