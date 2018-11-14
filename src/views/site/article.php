<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<?php
/**
 * @param src\models\Articles $article
 * @param src\models\Topics $topic 
 * @param src\models\Authors $author
 *  */
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="title text-center">
                    <h3>Article # <?= $article['id']; ?></h3>
                    <p><?= $article['title']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="serviceData">
                        <div class="category">Topic: <?= $topic; ?></div>
                        <div class="date">date of publication of the article: <?= $article['date_published']; ?></div>
                        <div class="author">By: <?= $author; ?></div>
                        <div class="views">Views: <?= $article['views'];?></div>
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
                                    <li><?= $topArticle['title'];?></li>
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

