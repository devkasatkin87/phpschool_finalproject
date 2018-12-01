<?php

namespace src\components\loader;

class LoaderEntity 
{

    private $name;
    private $type;
    private $path;
    private $error;

    public function __construct($name, $type, $path) 
    {
        $this->name = $name;
        $this->type = $type;
        $this->path = $path;
    }

    function getName() 
    {
        return $this->name;
    }

    function getType() 
    {
        return $this->type;
    }

    function getPath() 
    {
        return $this->path;
    }
    
    function getError() 
    {
        return $this->error;
    }

    function setName($name) 
    {
        $this->name = $name;
    }

    function setType($type) 
    {
        $this->type = $type;
    }

    function setPath($path) 
    {
        $this->path = $path;
    }
    
    function setError($error) 
    {
        $this->error = $error;
    }

}
