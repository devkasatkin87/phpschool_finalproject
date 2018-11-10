<?php

use src\components\Db;
use src\models\Authors;
use src\models\Articles;

class SiteController {
    
    public function actionIndex() {
        
        Db::connection();
        
        $authorsList = [];
        $articlesList = [];
        
        $modelAuthors = new Authors();
        $modelArticles = new Articles();
        
        $authorsList = $modelAuthors->getLimitAuthorsSortByName(0);
        $articlesList = $modelArticles->getLimitDates(0);
        
        require_once ROOT.'/src/views/site/index.php';
        
        return true;
    }
    
}
