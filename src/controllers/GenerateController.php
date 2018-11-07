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
       
        $sql = ("INSERT INTO articles (author, topic, date_published, content, image) VALUES (:name, :topic, :date, :text, :img)");

        for ($i = 0; $i < 650; $i++) {
            for($j = 0; $j < 650; $j++){
            
                $stm = $db->prepare($sql);
                $name = $faker->name;
                $title = $faker->sentence;
                $date = $faker->date("Y-m-d");
                $text = $faker->text;
                $img = $faker->fileExtension;

                $stm->bindParam(':name', $name);
                $stm->bindParam(':topic', $title);
                $stm->bindParam(':date', $date);
                $stm->bindParam(':text', $text);
                $stm->bindParam(':img', $img);

                $stm->execute();
            }
        }

        echo "The Database has been generating!";
        
        return true;

    }
    
}
