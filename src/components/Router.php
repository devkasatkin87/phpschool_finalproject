<?php

namespace src\components;

/**
 * Manage page navigation
 * @var $routes array Paths to controllers and actions
 */
class Router 
{
    
    private $routes;
    
    public function __construct($routesPath) 
    {
        
        $this->routes = require_once ($routesPath);
        
    }
    
    /**
     * Get clean URI without "/"
     * 
     * @return string
     * 
     *      */
    private function getURI() : string
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    /**
     * Call user function with controller and action 
     * 
     *      */
    public function run()
    {
        $uri = $this->getURI();
        
        foreach ($this->routes as $uriPattern => $path) {
            
            if (preg_match("~$uriPattern~", $uri)){                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segment = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segment).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segment));
                $parameters = $segment;
                $controllerFile = dirname(__DIR__).'/controllers/'.$controllerName.'.php';
                
                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if($result != null){
                    break;
                }
            }
        }
        
    }
    
    
    
    
}
