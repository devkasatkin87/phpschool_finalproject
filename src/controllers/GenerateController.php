<?php

use Faker\Factory;
use src\components\Db;

class GenerateController
{
    
    public function actionIndex()
    {
        try{
            
            $db = Db::connection();
            
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
        
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            //$resultDbTopics = $this->setDataToDb($db, $faker);
        }
        
        echo "The Database has been generating!";
        
        return true;

    }
    
    private function setDataToDb ($db, $faker) : bool
    {
        
        if (is_object($db)){
            
            $sql = ("INSERT INTO articles (title, date_published, content, img, views) VALUES (:title, :date, :content, :img, :views)");

            for ($i = 0; $i < 1000; $i++) {

                $stm = $db->prepare($sql);
                $title = $faker->sentence;
                $date = $faker->date('Y-m-d');
                $content = $faker->text;
                $img = $faker->imageUrl();
                $views = 1;
                $stm->bindParam(':title', $title);
                $stm->bindParam(':date', $date);
                $stm->bindParam(':content', $content);
                $stm->bindParam(':img', $img);
                $stm->bindParam(':views', $views);
                $stm->execute();
            }
            return true;
        }
        return false;
    }
    
}
