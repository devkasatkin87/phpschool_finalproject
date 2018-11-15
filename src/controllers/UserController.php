<?php

use src\models\User;
use src\components\Db;

class UserController 
{
    
    public function actionLogin()
    {
        
        $db = Db::connection();
        
        $username = '';
        $password = '';
        $errors = false;
        
        $userModel = new User();
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $userId = $userModel->getUserId($username, $password);
            $isAdmin = $userModel->isAdmin($userId);
            
            if ($userId == false){
                $errors[] = 'Error in username or password';
            }else{
                $userModel->auth($userId, $isAdmin);
                var_dump($_SESSION);die;
                if ($isAdmin == 1){
                    header("Location: /article/create");
                }
                
                header("Location: /");
            }
        }
        
        require_once ROOT.'/src/views/user/login.php';        
        return true;
    }
    
    public function actionLogout() {
        unset($_SESSION['user']);
        header("Location: /");
    }
    
}
