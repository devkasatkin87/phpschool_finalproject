<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<?php
/**
 * @param src\models\Articles $article
 * @param src\models\Topics $topic 
 * @param src\models\Authors $author
 *  */
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="/web/js/createTop.js"></script>
<body>
    <p id="test">Response:</p>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="title text-center">
                    <h3>Article # <i id="article_id"><?= $article['id']; ?></i></h3>
                    <p><?= $article['title']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="/article/controll/update/<?= $article['id'];?>" class="btn btn-outline-secondary">Update article</a>
            <a href="/article/controll/delete/<?= $article['id'];?>" class=" ml-2 btn btn-outline-secondary">Delete article</a>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="serviceData">
                        <div class="category">Topic: <?= $topic; ?></div>
                        <div class="date">date of publication of the article: <?= $article['date_published']; ?></div>
                        <div class="author">By: <?= $author; ?></div>
                        <div class="views">Views: <i  id="article_views"><?= $article['views'];?></i></div>
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <div class="images">
                            <img src="<?=$article['img'];?>" alt="picture" style="width: 40%">
                        </div>
                        <div class="text"><?= $article['content']; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="top-articles">
                    <div class="title  text-center">
                        <h4>Top 10 of articles:</h4>
                    </div>
                    <div class="row">
                        <div class="Topcontent">
                            <ul>
                                <?php foreach ($topArticles as $topArticle): ?>
                                    <li><?= "{$topArticle['title']} Views: {$topArticle['views']}";?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>

<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

