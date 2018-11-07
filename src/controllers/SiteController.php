<?php

use src\components\Db;

class SiteController {
    
    public function actionIndex() {
        
        echo "Connection to DB:".PHP_EOL;
        
        try{
            
            $db = Db::connection();
            echo 'connection done!';
            
        } catch (PDOException $error) {
            
            echo $error->getMessage();
        }
        
        return true;
    }
    
}
