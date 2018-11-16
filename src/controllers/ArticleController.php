<?php

use src\components\Db;
use src\models\Authors;
use src\models\Articles;
use src\models\Topics;
use src\models\ArticlesToTopics;
use src\models\ArticlesToAuthors;

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
        $modelArticlesToTopic = new ArticlesToTopics();
        $modelAuthors = new Authors();
        $modelArticlesToAuthors = new ArticlesToAuthors();
        
        $article = $modelArticles->getArticleById($id);
        $article = $article->attributes();

        $topicId = $modelArticlesToTopic->getTopicIdByArticleId($id);
        $topic = $modelTopics->getTopicTitleById($topicId);
        
        $authorId = $modelArticlesToAuthors->getAuthorIdByArticleId($id);
        $author = $modelAuthors->getAuthorNameById($authorId);
        
        $articlesIds = $modelArticlesToTopic->getArticlesByTopicId($topicId);
        
        $topArticles = $modelArticles->getTopArticlesByCategory(10, $articlesIds);
        
        
        require_once ROOT.'/src/views/site/article.php';
        
        return true;
    }
    
    public function actionCreate()
    {
        require_once ROOT.'/src/views/article/create.php';
        
        return true;
    }
    
    public function actionControll()
    {
        echo "Controll";
        return true;
    }
    
}
