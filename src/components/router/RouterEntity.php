<?php

namespace src\components\router;

class RouterEntity {
    private $routes;
    private $controllerName;
    private $actionName;
    private $controllerFile;
    
    public function __construct($routesPath) 
    {
        
        $this->routes = require_once ($routesPath);
        
    }
    
    /**
     * 
     * @return array 
     */
    function getRoutes() : array {
        return $this->routes;
    }

    /**
     * 
     * @return string
     */
    function getControllerName() : string {
        return $this->controllerName;
    }

    /**
     * 
     * @return string
     */
    function getActionName() : string {
        return $this->actionName;
    }

    /**
     * 
     * @return string
     */
    function getControllerFile() : string {
        return $this->controllerFile;
    }

    /**
     * 
     * @param array $routes
     */
    function setRoutes(array $routes) {
        $this->routes = $routes;
    }

    /**
     * 
     * @param string $controllerName
     */
    function setControllerName(string $controllerName) {
        $this->controllerName = $controllerName;
    }

    /**
     * 
     * @param string $actionName
     */
    function setActionName(string $actionName) {
        $this->actionName = $actionName;
    }

    /**
     * 
     * @param string $controllerFile
     */
    function setControllerFile(string $controllerFile) {
        $this->controllerFile = $controllerFile;
    }

}
