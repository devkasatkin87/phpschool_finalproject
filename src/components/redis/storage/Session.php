<?php

namespace src\components\redis\storage;

class Session {
    
    private $config;
    
    public function __construct(array $config) {
        
        $this->config = $config;
    }
    
    /**
     * Session start
     * @return bool
     */
    public function start()
    {
        //Define session storage 
        ini_set('session.save_handler', $this->config['storage']);
        ini_set('session.save_path', $this->config['host']);
        
        $currentCookieParams = session_get_cookie_params();

        session_set_cookie_params(
                $currentCookieParams["lifetime"], 
                $currentCookieParams["path"], 
                $this->config['rootDomain'], 
                $currentCookieParams["secure"], 
                $currentCookieParams["httponly"]
        );

        session_start();
        
        return true;
    }
    
}
