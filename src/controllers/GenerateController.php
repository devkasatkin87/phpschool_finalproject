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
        
          $resultDbTopics = $this->setArticlesToDb($db, $faker);  
//        $resultDbAuthors = $this->setAuthorsToDb($db, $faker);
//        $resultDbTopics = $this->setTopicsToDb($db, $faker);
        echo "The Database has been generating!";
        
        return true;

    }
    
    private function setArticlesToDb ($db, $faker) : bool
    {
        
        if (is_object($db)){
            
            $sql = ("INSERT INTO articles (title, date_published, content, img, views, topic_id, author_id) VALUES (:title, :date, :content, :img, :views, :topic_id, :author_id)");
            
            for ($i = 0; $i < 1; $i++) {

                $stm = $db->prepare($sql);
                
                $title = $faker->sentence;
                $date = $this->randomDate('2018-11-29', '2000-11-29');
                $content = $faker->text;
                $img = $faker->image();
                $views = mt_rand(0,1000);
                $topicId = mt_rand(1,30);
                $authorId = mt_rand(1,5000);

                $stm->bindParam(':title', $title);
                $stm->bindParam(':date', $date);
                $stm->bindParam(':content', $content);
                $stm->bindParam(':img', $img);
                $stm->bindParam(':views', $views);
                $stm->bindParam(':topic_id', $topicId);
                $stm->bindParam(':author_id', $authorId);

                $stm->execute();
                
                $id = $i;
            }
            return true;
        }
        return false;
    }
    
    private function setAuthorsToDb($db, $faker)
    {
        if (is_object($db)){
            
            $sql = ("INSERT INTO authors (first_name, second_name) VALUES (:first, :second)");
            
            for ($i = 0; $i < 5000; $i++) {

                $stm = $db->prepare($sql);
                
                $first = $faker->firstName;
                $second = $faker->lastName;

                $stm->bindParam(':first', $first);
                $stm->bindParam(':second', $second);

                $stm->execute();
            }
            return true;
        }
        return false;
    }
    
    private function setTopicsToDb($db,$faker)
    {
        if (is_object($db)){
            
            $sql = ("INSERT INTO topics (title) VALUES (:title)");
            
            for ($i = 0; $i < 30; $i++) {

                $stm = $db->prepare($sql);
                
                $title = $faker->company;

                $stm->bindParam(':title', $title);

                $stm->execute();
            }
            return true;
        }
        return false;
    }
    
    // Find a randomDate between $start_date and $end_date
    private function randomDate($start_date, $end_date) {
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d', $val);
    }

}
