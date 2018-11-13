<?php

namespace src\models;

use ActiveRecord\Model;
use interfaces\Validate;


class User extends Model implements Validate{
    
    public function checkData(array $data) 
    {
        
    }

    /*
     * Check username
     * @param string $name
     * @return bool
     */
    private function checkUsername(string $name) : bool
    {
        if (is_string($name)){
            if (strlen($name)>=2){
                return true;
            }    
        }
        
        return false;
    }
    
    /*
     * Check password
     * @param string $password
     * @return bool
     */
    private function checkPassword(string $password) : bool
    {
        if (is_string($password)){
            if(strlen($password)>=6){
                return true;
            }
        }
        return false;        
    }
    
    /**
     * Check is admin?
     * @param int $right
     * @return bool
     */
    private function checkIsAdmin(int $right) : bool
    {
        if (is_int($right)){
            if ($right == 1 || $right == 0){
                return true;
            }
        }
        return false;
    }
    
    /**
     * Check is username exist
     * @param string $username
     * @return bool
     */
    private function checkUsernameExist(string $username) : bool
    {
        $condition = [
            'condition' => ['username =?', $username],
        ];
        
       if (is_string($username)){
           if(self::find('all',$condition)){
               return true;
           }
       }
       
       return false;
    }
}
