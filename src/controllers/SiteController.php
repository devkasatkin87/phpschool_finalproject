<?php

use src\components\Db;
use src\models\Authors;
use src\components\pagination\PaginationControl;
use src\components\pagination\PaginationEntity;

class SiteController {
    
    public function actionIndex() {
        
        Db::connection();
        
        $authorsList = [];
        
        $modelAuthors = new Authors();
        
        $authorsList = $modelAuthors->getAllAuthorsSortByName();
        
        $total = $modelAuthors->getTotalAmountAuthors();
        
        $pagination = new PaginationControl(new PaginationEntity($total, 1, Authors::SHOW_BY_DEFAULT, 'page-'));
        
        require_once ROOT.'/src/views/site/index.php';
        
        return true;
    }
    
}
