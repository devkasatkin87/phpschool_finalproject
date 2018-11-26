<?php
//Client for Service GetTopArticle

//View Errors
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

define('ROOT', dirname('__FILE__'));
require_once dirname(__DIR__,2) . '/vendor/autoload.php';

use src\models\Articles;
use src\components\api\instances\ClientJsonRpc;
use src\models\Topics;

$db = src\components\Db::connection();

$modelArticles = new Articles();

$articleId = $_POST['article_id'];
$method = $_POST['method'];

$topicId = $modelArticles->getTopicIdByArticleId($articleId);

$ids = $modelArticles->getArticlesIdByTopicId($topicId);

echo ClientJsonRpc::createMessageIds($articleId, $ids, $method); 

?>
