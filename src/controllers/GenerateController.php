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
        
//        $resultDbTopics = $this->setArticlesToDb($db, $faker);
        
//        $this->generateTableArticlesToTopics($db);
//        
//        $this->updateTableArtirclesToTopics($db);
        
//        $this->generateTableArticlesToAuthors($db);
        
        
        echo "The Database has been generating!";
        
        return true;

    }
    
    private function setArticlesToDb ($db, $faker) : bool
    {
        
        if (is_object($db)){
            
            $sql = ("INSERT INTO articles (title, date_published, content, img, views, topic_id, author_id) VALUES (:title, :date, :content, :img, :views, :topic_id, :author_id)");
            
            for ($i = 0; $i < 5000; $i++) {

                $stm = $db->prepare($sql);
                
                $title = $faker->sentence;
                $date = $faker->year;
                $content = $faker->text;
                $img = $faker->image();
                $views = mt_rand(0,50000);
                $topicId = mt_rand(1,40);
                $authorId = mt_rand(1,4034);

                $stm->bindParam(':title', $title);
                $stm->bindParam(':date', $date);
                $stm->bindParam(':content', $content);
                $stm->bindParam(':img', $img);
                $stm->bindParam(':views', $views);
                $stm->bindParam(':topic_id', $topicId);
                $stm->bindParam(':author_id', $authorId);

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

            $sqlSetId = "INSERT INTO articles_to_topics (article_id, topic_id) VALUES (:article, :topic)";

            foreach ($ids as $id){
                $topic = mt_rand(1, 36);
                $stm = $db->prepare($sqlSetId);
                $stm->bindParam(':article', $id['id']);
                $stm->bindParam(':topic', $topic);                
                $stm->execute();
            }
        }
    }
    
        private function generateTableArticlesToAuthors ($db)
    {
        if (is_object($db)){
            
            $sqlGetId = "SELECT id FROM articles";
            
            $stmt = $db->query($sqlGetId);
            //Установка fetch mode
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $ids = $stmt->fetchAll();
            
//            var_dump($ids);die;

            $sqlSetId = "INSERT INTO articles_to_authors (article_id, author_id) VALUES (:article, :author)";

//            $author = mt_rand(1, 69);
//            var_dump($author);
//            $stm = $db->prepare($sqlSetId);
//            var_dump($stm);
//            $id = 3;
//            $stm->bindParam(':article', $id);
//            $stm->bindParam(':author', $author);
//            $stm->execute();

            foreach ($ids as $id){
                $author = mt_rand(1, 69);
                $stm = $db->prepare($sqlSetId);
                $stm->bindParam(':article', $id['id']);
                $stm->bindParam(':author', $author);                
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
