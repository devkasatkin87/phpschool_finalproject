<?php

use src\components\Db;
use src\models\Authors;
use src\models\Articles;
use src\models\Topics;
use Datto\JsonRpc\Client;

class ArticleController 
{

    /**
     * @param int $id
     */
    public function actionView($id) 
    {
        Db::connection();
        
        $modelArticles = new Articles();
        $modelTopics = new Topics();
        $modelAuthors = new Authors();
        
        $article = $modelArticles->getArticleById($id);
        $article = $article->attributes();
        
        $topicId = $article['topic_id'];
        
        $topic = $modelTopics->getTopicTitleById($topicId);
        
        $authorId = $article['author_id'];
        $author = $modelAuthors->getAuthorNameById($authorId);
        
        $currentTopicsArticlesIds = $modelArticles->getArticlesIdByTopicId($topicId);
        
        //$topArticles = $modelArticles->getTopArticlesByCurrentCategory(10, $topicId);
        
//        require_once ROOT.'/src/components/client.php';
        
        require_once ROOT.'/src/views/site/article.php';
        
        return true;
    }
    
    public function actionAdd()
    {
        $db = Db::connection();
        
        $title = '';
        $author = '';
        $topic = '';
        $content = '';
        $date = '';
        $img = '';
        $errors = [];

        $modelTopics = new Topics();
        $modelArticle = new Articles();
        $modelAuthors = new Authors();
        
        $topics = $modelTopics->getAllTopics();
        
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $topic = $_POST['topic'];
            $content = $_POST['content'];
            $image = 'image';
            $date = date('Y-m-d', time());
            
            $result = $modelArticle->add($title, $content, $author, $topic, $date, $image);
            
        }
        
        require_once ROOT.'/src/views/article/controll/forms/add.php';
        return true;
    }
    
    public function actionUpdate($id)
    {
        $db = Db::connection();
        
        $title = '';
        $author = '';
        $topic = '';
        $content = '';
        $date = '';
        $img = '';
        $errors = [];
        
        $modelTopics = new Topics();
        $modelAuthors = new Authors();
        $modelArticles = new Articles();
        
        $topics = $modelTopics->getAllTopics();
        
        $articleObj = $modelArticles->getArticleById($id);
        $article = $articleObj->attributes();
        
        $author = $modelAuthors->getAuthorNameById($article['author_id']);
        
        if(isset($_POST['submit'])) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $topic = $_POST['topic'];
            $content = $_POST['content'];
            $image = 'image';
            $date = date('Y-m-d', time());
            
            $result = $articleObj->update($title, $content, $author, $topic, $date, $image);
            
//            //Send requests Datto\JsonRpc\Client
//            $client = new Client();
//            $client->query(1, 'updateArticle', [$id]);
//            $message = $client->encode();
//            
//            $guzzle = new GuzzleHttp\Client();
//            $send = $guzzle->post('http://topgenerator-webserver/', ['body' => $message]);
//            $reply = $send->getBody();
            $this->sendMessageJson($id, 'updateArticle');
        }
        
        require_once ROOT.'/src/views/article/controll/forms/update.php';
        return true;
    }
    
    public function actionDelete($id)
    {
        $db = Db::connection();
        
        $modelArticle = new Articles();
        
        $modelArticle->remove($id);
        
        //require_once ROOT.'/src/views/article/controll/forms/delete.php';
        return true;
    }
    
    public function actionControll()
    {
        require_once ROOT.'/src/views/article/controll/index.php';
        return true;
    }
    
    /**
     * Send requests and get response from Service use Datto\JsonRpc\Client
     * @param int $id
     * @param string $method
     * @return bool
     */
    private function sendMessageJson(int $id, string $method)
    {
        
        $client = new Client();
        $client->query(1, $method, [$id]);
        $message = $client->encode();

        $guzzle = new GuzzleHttp\Client();
        $send = $guzzle->post('http://topgenerator-webserver/', ['body' => $message]);
        $reply = $send->getBody();
        
        return true;
    }
}
