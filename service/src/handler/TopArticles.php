<?php

namespace src\handler;
use Datto\JsonRpc\Evaluator;
use Datto\JsonRpc\Exceptions\ArgumentException;
use Datto\JsonRpc\Exceptions\MethodException;
use src\components\redis\Controller;

class TopArticles implements Evaluator
{
    /**
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public function evaluate($method, $arguments) {
        if (count($arguments) < 1 ) {
            throw new ArgumentException();
        }

        switch ($method) {
            case 'getTopArticles':
                $result = $this->getTopArticles(...$arguments);
                break;
            case 'updateArticle':
                $result = $this->updateArticle(...$arguments);
                break;
            case 'addArticles':
                $result = $this->addArticle(...$arguments);
                break;
            default:
                throw new MethodException();
        }
        return $result;
    }

    public function getTopArticles(...$arguments)
    {
        $params = [];
        
        $redis = new Controller();
        
        foreach ($arguments as $param){
            $params[] = $param;
        }
        //Get id from current article
        $currentId = array_shift($params);
        //Get array of ids which was selected by topic
        $ids = $params;
        
        //Numb of Top articles
        $top = 10;

        $result = $redis->incrementRecord($currentId);
        
        $result = $redis->getSortedViewsByIds($ids, $top);
        
        return $result;
    }
    
    public function addArticle($id)
    {
        $redis = new Controller();
        
        $redis->addRecord($id, 0);
    }
    
    public function updateArticle($id)
    {
        $redis = new Controller();
        
        $result = $redis->getsetRecord($id, 0);
    }
    

}
