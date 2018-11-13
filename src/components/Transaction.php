<?php

namespace src\components;

abstract class Transaction 
{
    
    private $responses;
    
    public function __construct() 
    {
        $responses = new \SplQueue();
    }
    
    /**
     * @return SplQueue
     *      */
    
    function getResponses() 
    {
        return $this->responses;
    }

    /**
     * 
     * @param SplQueue $responses
     *      */
    function setResponses($responses) 
    {
        $this->responses = $responses;
    }

    /**
     * Call some functions which are dependent on each other
     * 
     * 
     */
    public function begin();
    
    public function rollback();
    
}
