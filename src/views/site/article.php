<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<?php
/**
 * @param src\models\Articles $article
 * @param src\models\Topics $topic 
 * @param src\models\Authors $author
 *  */
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="/web/js/serviceViews.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="title text-center">
                    <h3>Article # <i id="article_id"><?= $article['id']; ?></i></h3>
                    <h4><p><?= $article['title']; ?></p></h4>
                </div>
            </div>
        </div>
        <?php if(src\models\User::checkAdmin()): ?>
        <div class="row">
            <a href="/article/controll/update/<?= $article['id'];?>" class="btn btn-outline-secondary">Редактировать статью</a>
            <a href="/article/controll/delete/<?= $article['id'];?>" class=" ml-2 btn btn-outline-secondary">Удалить статью</a>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="serviceData">
                        <div class="category"><b>Тема:</b> <?= $topic; ?></div>
                        <div class="date"><b>Дата публикации: </b><?= $article['date_published']; ?></div>
                        <div class="author"><b>Автор: </b><?= $author; ?></div>
                        <div class="views"><b>Просмотры: </b><i  id="article_views"><?= $article['views']+1;?></i></div>
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <div class="images">
                            <img src="/<?=$article['img'];?>" alt="picture" style="width: 300px">
                        </div>
                        <div class="text"><?= $article['content']; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="top-articles">
                    <div class="title  text-center">
                        <h4>ТОП 10 статей:</h4>
                    </div>
                    <div class="row">
                        <div class="Topcontent" id="top10">
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

