<?php

use src\models\Topics;

class SiteController {
    
    public function actionIndex() {
        
        echo 'SiteController/actionIndex'.PHP_EOL;
        
        $connections = ['development' => 'mysql://dbuser:123456@mysql/myproject'];
        
        // initialize ActiveRecord
        ActiveRecord\Config::initialize(function($cfg) use ($connections)
        {
            $cfg->set_model_directory(__DIR__.'/../models');
            $cfg->set_connections($connections);
        });
        
        $modelArticles = new \src\models\Articles();
        
        $articles = $modelArticles->find(10)->attributes();
        
        $topics = new Topics();
        $res = $topics->find(4)->attributes();
        echo "<pre>";
        print_r($res);
        echo "</pre>";
        
        foreach ($res as $k => $v){
            print_r("key: $k \n");
            print_r("value: $v \n");
        }
        
        echo "<pre>";
        print_r($articles);
        echo "</pre>";
    }
    
}
