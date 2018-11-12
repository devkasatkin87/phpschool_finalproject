<?php

use src\components\Db;
use src\models\Authors;
use src\models\Articles;
use src\models\Topics;
use src\models\ArticlesToTopics;
use src\models\ArticlesToAuthors;

class SiteController 
{
    
    public function actionIndex() {
        
        Db::connection();
        
        $authorsList = [];
        $articlesDateList = [];
        $topicsList = [];
        $articlesList = [];
        
        $modelAuthors = new Authors();
        $modelArticles = new Articles();
        $modelTopics = new Topics();
        
        $authorsList = $modelAuthors->getLimitAuthorsSortByName(0);
        $articlesDateList = $modelArticles->getLimitDates(0);
        $topicsList = $modelTopics->getTopicsSortByCountArticles(0);
        $articlesList = $modelArticles->getArticles(0);
        
        require_once ROOT.'/src/views/site/index.php';
        
        return true;
    }
    
    public function actionArticle($id) 
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
        
        require_once ROOT.'/src/views/site/article.php';
        
        return true;
    }
    
}
