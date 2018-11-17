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
    public function getUser(string $name, string $password)
    {   
        $id = 0;
        
        $isTrue = $this->checkData($name, $password);
        
        if($this->checkData($name, $password)){
            
            $conditions = [
                'conditions' => ['username=?', $name]
                ];

            $user = self::first('all', $conditions);
            $user = $user->attributes();
            
            if ($user == null || !(password_verify($password, $user['password']))){
                return false;
            }
            
            return $user;
        }
        
        return false;
    }
    
    /**
     * 
     * @param int $id
     * return array || bool
     *      */
    
    public function getUserById(int $id)
    {
        $id = intval($id);
        
        $conditions = [
            'conditions' => ['id=?', $id]
        ];
        
        $user = self::first('all', $conditions);
        
        $user = $user->attributes();
        
        if ($user == null)
        {
            return false;
        }
        return $user;
    }

    /**
     * 
     * @param string $username
     * @param int $isAdmin
     * @return true
     *      */
    public function auth($userId,$isAdmin) : bool
    {
        $_SESSION['user'] = $userId;
        $_SESSION['is_admin'] = $isAdmin;
        
        return true;
        
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
    
    /**
     * 
     * @return int User id
     *      */
    public function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        
        header("Location: /user/login");
    }
    
    /**
     * 
     * @return int || bool user is admin?
     *      */
    public function checkAdmin()
    {
        if (isset($_SESSION['is_admin'])){
            return $_SESSION['is_admin'];
        }
        
        return false;
    }
    
    /**
     * 
     * @return bool
     *      */
    public static function isGuest() : bool
    {
        if (isset($_SESSION['user']))
        {
            return false;
        }
        
        return true;
    }
}
