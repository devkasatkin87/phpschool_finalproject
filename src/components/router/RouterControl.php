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
        
        $result = $this->setRouting($uri, $this->routerEntity->getRoutes());
        
        if ($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function setRouting($uri, $routes)
    {
        foreach ($this->routerEntity->getRoutes() as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)){                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segment = explode('/', $internalRoute);

                $parameters = $this->setRoutsParams($segment);
                
                $this->includeControllerFile();
                    
                $nameControllerObject = $this->routerEntity->getControllerName();       
                $actionName = $this->routerEntity->getActionName();

                $controllerObject = new $nameControllerObject();

                $result = call_user_func_array(array($controllerObject,$actionName), $parameters);
                
                if($result != false){
                    return true;
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
