<?php

namespace src\components\router;

use src\components\router\RouterEntity;

class RouterControl {
    
    private $routerEntity;
    
    public function __construct(RouterEntity $routerEntity) {
        $this->routerEntity = $routerEntity;
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
     * @return bool
     */
    public function run() : bool
    {
        $uri = $this->getURI();
        
        $this->setRouting($uri, $this->routerEntity->getRoutes());
        
        return true;
    }
    
    public function setRouting($uri, $routes)
    {
        var_dump($uri);
        var_dump($routes);
        foreach ($this->routerEntity->getRoutes() as $uriPattern => $path) {
            var_dump($uriPattern);
            var_dump($path);
            if (preg_match("~$uriPattern~", $uri)){                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                var_dump($internalRoute);
                $segment = explode('/', $internalRoute);
                var_dump($segment);
                $parameters = $this->setRoutsParams($segment);
                
                $this->includeControllerFile();
                    
                $nameControllerObject = $this->routerEntity->getControllerName();       
                $actionName = $this->routerEntity->getActionName();
                
                $controllerObject = new $nameControllerObject();
                
                var_dump($this->routerEntity->getActionName());
                var_dump($this->routerEntity->getControllerName());

                $result = call_user_func_array(array($controllerObject,$actionName), $parameters);
                var_dump($result);
                
                if($result != false){
                    break;
                }
            }
        }
    }
    
    /**
     * Set controller name and action name from given array
     * @param array $segment
     * @return mixed
     */
    public function setRoutsParams(array $segment)
    {
        $controllerName = ucfirst(array_shift($segment).'Controller');
        $this->routerEntity->setControllerName($controllerName);
        
        $actionName = 'action'.ucfirst(array_shift($segment));
        $this->routerEntity->setActionName($actionName);
        
        $parameters = $segment;
        
        $controllerFile = dirname(__DIR__,2).'/controllers/'.$controllerName.'.php'; 
       
        $this->routerEntity->setControllerFile($controllerFile);
        
        return $parameters;
    }
    
    /**
     * Include file with controller class
     * @return bool
     */
    public function includeControllerFile() : bool
    {
        if(file_exists($this->routerEntity->getControllerFile())){
            include_once ($this->routerEntity->getControllerFile());
            return true;
        }
        return false;
    }

}
