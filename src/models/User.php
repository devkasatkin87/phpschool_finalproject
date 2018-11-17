<?php

namespace src\models;

use ActiveRecord\Model;
use interfaces\Validate;


class User extends Model 
{
    
    /**
     * 
     * @param string $name 
     * @param string $password
     * @param int $isAdmin
     * @return bool
     *      */
    public function checkData($name, $password, $isAdmin = 0) : bool 
    {
        if ($this->checkUsername($name)){
            if ($this->checkPassword($password)){
                if($this->checkIsAdmin($isAdmin)){
                    return true;
                }
            }
        }
        return false;
    }
    
    /**

     * @param string $name 
     * @param string $password
     * @return int || bool
     *      */
    public function getUserId($name, $password)
    {   
        $id = 0;
        
        $isTrue = $this->checkData($name, $password);
        
        if($this->checkData($name, $password)){
            
            $conditions = [
                'conditions' => ['username=?', $name]
                ];

            $attr = self::first('all', $conditions);
            $attr = $attr->attributes();
            //var_dump($attr['password']);die;
            
            if ($attr == null || !(password_verify($password, $attr['password']))){
                return false;
            }
            
            $id = $attr['id'];
            
            return $id;
        }
        
        return false;
    }

    /**
     * 
     * @param string $username
     * @param int $isAdmin
     *      */
    public function auth($username, $isAdmin)
    {
        $_SESSION['user'] = $username;
        $_SESSION['is_admin'] = $isAdmin;
        
    }
    
    public function isAdmin(int $id) : int
    {
        if (is_int($id)){
            $attr = self::first('all', ['conditions' => ['id=?', $id]]);
            if($attr == null){
                return false;
            }
            $attr = $attr->attributes();
            return $attr['is_admin'];
        }
        
        return false;
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
    public function checkUsernameExist(string $username) : bool
    {
        $condition = [
            'conditions' => ['username =?', $username],
        ];
        
       if (is_string($username)){
           if(self::first('all',$condition)){
               return true;
           }
       }
       
       return false;
    }
}
