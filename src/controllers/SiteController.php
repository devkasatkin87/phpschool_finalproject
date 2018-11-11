<?php

use src\components\Db;
use src\models\Authors;
use src\models\Articles;
use src\models\Topics;

class SiteController {
    
    public function actionIndex() {
        
        Db::connection();
        
        $authorsList = [];
        $articlesDateList = [];
        $topicsList = [];
        $articlesList = [];
        
        $modelAuthors = new Authors();
        $modelArticles = new Articles();
        $modelTopics = new Topics();
        
        $authorsList = $modelAuthors->getLimitAuthorsSortByName(0);
        $articlesDateList = $modelArticles->getLimitDates(0);
        $topicsList = $modelTopics->getTopicsSortByCountArticles(0);
        $articlesList = $modelArticles->getArticles(0);
        
        require_once ROOT.'/src/views/site/index.php';
        
        return true;
    }
    
}
