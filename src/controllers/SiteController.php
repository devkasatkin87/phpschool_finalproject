<?php

use ActiveRecord\Config;
use src\components\Db;
use src\models\Topics;
use \src\models\Authors;

class SiteController {
    
    public function actionIndex() {
        
        Db::connection();
        
        $topicsList = [];
        $authorList = [];
        
        $modelTopics = new Topics();
        
        $topicsObj = $modelTopics::find('all');
        
        foreach ($topicsObj as $topics){
            $topicsList[] = $topics->attributes();
        }
        
        //var_dump($topicsList);die;
        $modelAuthors = new Authors();
        
        $authorsObj = $modelAuthors::find('all');
        
        foreach ($authorsObj as $author){
            $authorsList[] = $author->attributes();
        }
        
        require_once ROOT.'/src/views/site/index.php';
        
        return true;
    }
    
}
