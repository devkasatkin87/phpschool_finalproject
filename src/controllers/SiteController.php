<?php

use ActiveRecord\Config;
use src\components\Db;
use src\models\Topics;
use \src\models\Authors;

class SiteController {
    
    public function actionIndex() {
        
        Db::connection();
        
        $topicsList = [];
        
        $modelTopics = new Topics();
        
        $topicsList = $modelTopics::all();
        
        
        $modelAuthors = new Authors();
        
        require_once ROOT.'/src/views/site/index.php';
        
        return true;
    }
    
}
