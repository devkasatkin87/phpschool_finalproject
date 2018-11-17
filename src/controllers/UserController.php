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
            
            $user = $userModel->getUser($username, $password);
            
            if ($user == false){
                $errors[] = 'Error in username or password';
            }else{
                $userModel->auth($user['id'], $user['is_admin']);
                header("Location: /user/office");
            }
        }
        
        require_once ROOT.'/src/views/user/login.php';        
        return true;
    }
    
    public function actionLogout() {
        unset($_SESSION['user']);
        unset($_SESSION['is_admin']);
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
                    
                    $user = $modelUser::create([
                    'username' => $username,
                    'password' => $password,
                    'is_admin' => $isAdmin
                    ]);
                    
                    $user = $user->attributes();
                
                    $result = $modelUser->auth($user['id'], $user['is_admin']);
                
                    header("Location: /user/office");
                
                }else{
                    $errors[] = "Username has already used";
                }
            }else{
                $errors[] = "Error in username or password";
            }
        }
        
        require_once ROOT.'/src/views/user/registration.php';        
        return true;
    }
    
    public function actionIndex() {
        
        $db = Db::connection();
        
        $userModel = new User();
        
        $userId = $userModel->checkLogged();
        $userAdmin = $userModel->checkAdmin();
        
        $user = $userModel->getUserById($userId);
        
        require_once ROOT.'/src/views/user/office/index.php';
        return true;
    }
}

