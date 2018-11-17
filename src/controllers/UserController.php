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
                $userModel->auth($username, $isAdmin);
                header("Location: /");
            }
        }
        
        require_once ROOT.'/src/views/user/login.php';        
        return true;
    }
    
    public function actionLogout() {
        unset($_SESSION['user']);
        unset($_SESSION['is_admin']);
        session_destroy();
        session_write_close();
        header("Location: /");
    }
    
    public function actionRegister()
    {
        $db = Db::connection();
        
        $username = '';
        $password = '';
        $isAdmin = 0;
        $errors = false;
        
        if (isset($_POST['submit'])){
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isAdmin = $_POST['is_admin'];
            
            $modelUser = new User();
            if($modelUser->checkData($username, $password, $isAdmin)){
                if(!$modelUser->checkUsernameExist($username)){
                    $password = password_hash($password,PASSWORD_DEFAULT);
                    $modelUser::create([
                    'username' => $username,
                    'password' => $password,
                    'is_admin' => $isAdmin
                    ]);
                $modelUser->auth($username, $isAdmin);
                
                header("Location : /");
                }
            }else{
                $errors[] = "Username has already used or has errors in username or password!";
            }
        }
        
        require_once ROOT.'/src/views/user/registration.php';        
        return true;
    }
}

