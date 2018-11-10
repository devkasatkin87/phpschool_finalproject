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
        
        for ($i = 0; $i < 2; $i++) {
            $resultDbTopics = $this->setDataToDb($db, $faker);
        }
        
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
    
    private function generateTableArticlestoTopics ()
    {
        
    }        
    
}
