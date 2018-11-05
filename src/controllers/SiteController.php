<?php

//namespace src\controllers;

class SiteController {
    
    public function actionIndex() {
        
        echo "<h3>Main Page from rout: scr\controllers\SiteController\actionIndex</h3>";
        echo "<p>Maybe include some interesting articles</p>";
        
        return true;
    }
    
}
