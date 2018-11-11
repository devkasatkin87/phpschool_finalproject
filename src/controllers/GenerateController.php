<?php

use Faker\Factory;
use src\components\Db;

class GenerateController
{
    
    public function actionIndex()
    {
        try{
            
            $db = new PDO('mysql:host=mysql;dbname=myproject', 'dbuser', '123456');
            
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
        
        $faker = Factory::create();
        
//        for ($i = 0; $i < 2; $i++) {
//            $resultDbTopics = $this->setDataToDb($db, $faker);
//        }
        
//        $this->generateTableArticlesToTopics($db);
//        
//        $this->updateTableArtirclesToTopics($db);
        
        echo "The Database has been generating!";
        
        return true;

    }
    
    private function setDataToDb ($db, $faker) : bool
    {
        
        if (is_object($db)){
            
            $sql = ("INSERT INTO authors (first_name, second_name) VALUES (:first, :second)");
            
            for ($i = 0; $i < 17; $i++) {

                $stm = $db->prepare($sql);
                
                $first = $faker->firstName;
                $second = $faker->lastName;;

                $stm->bindParam(':first', $first);
                $stm->bindParam(':second', $second);

                $stm->execute();
            }
            return true;
        }
        return false;
    }
    
    private function generateTableArticlesToTopics ($db)
    {
        if (is_object($db)){
            
            $sqlGetId = "SELECT id FROM articles";
            
            $stmt = $db->query($sqlGetId);
            //Установка fetch mode
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $ids = $stmt->fetchAll();

            $sqlSetId = "INSERT INTO articlesToTopics (article_id, topic_id) VALUES (:article, :topic)";

            foreach ($ids as $id){
                $topic = mt_rand(1, 36);
                $stm = $db->prepare($sqlSetId);
                $stm->bindParam(':article', $id['id']);
                $stm->bindParam(':topic', $topic);                
                $stm->execute();
            }
        }
    }
    
    public function updateTableArtirclesToTopics ($db) 
    {
        if (is_object($db)){
            
            $sqlGetcountArticles = "SELECT topic_id, COUNT(article_id) FROM articlesToTopics GROUP BY topic_id";
            
            $stmt = $db->query($sqlGetcountArticles);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $countArticles = $stmt->fetchAll();
            
            $sqlUpdateTopicsTable = "UPDATE topics SET articles_count = :count WHERE id = :id ";
            
            foreach ($countArticles as $countArticle) {
                $stmt = $db->prepare($sqlUpdateTopicsTable);
                $stmt->bindParam(':count', $countArticle['COUNT(article_id)']);
                $stmt->bindParam(':id', $countArticle['topic_id']);
                $stmt->execute();
            }
            
        }
    }
    
}
