<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<?php 
/**  
 * @param array $authorsList src\models\Authors; 
 * @param array $articlesDateList src\models\Articles;
 * @param array $articlesList src\models\Articles;
 * @param array $topicsList src\models\Articles;
 */ ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="/web/js/pagination.js"></script>

        <div class="row">
            <!--Title-->
            <div class="title col-sm-12">
                <h1 class="text-center">
                    Главная страница
                </h1>
            </div><!--end Title-->
        </div>
        <div class="row">
            <div class="content content_articles col-md-12">
                    <h4 class="text-center">Каталог статей</h4>
                    <div class="row" style="background: #f9f8f8">
                    <ol id="articles">
                        <?php foreach ($articlesList as $article): ?>
                            <li>
                                <a class="badge badge-light" href="/article/<?= $article['id'] ?>"><h5><?= $article['title']; ?></h5></a>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <div class="row">
                    <div id="loadNextArticles" type="button" class="btn btn-outline-secondary">+ Статьи</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content content_authors col-md-4">
                <div class="row"><h4 class="text-center">Облако тегов: Авторы</h4></div>
                <div class='row'>
                    <ol  id="authors">
                        <?php foreach ($authorsList as $author): ?>
                            <li>
                                <?= $author['second_name'] . ' ' . $author['first_name']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                    <div id="loadNextAuthors" type="button" class="btn btn-outline-secondary">+ Авторы</div>
            </div>
            <div class="content content_topics col-md-4">
                <div class="row"><h4 class="text-center">Облако тегов: Темы</h4></div>
                <div class='row'>
                    <ol  id="topics">
                        <?php foreach ($topicsList as $topic): ?>
                            <li>
                                <?= $topic['title']; ?> <i>(<?= $topic['count(*)'];?>)</i>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                    <div id="loadNextTopics" type="button" class="btn btn-outline-secondary">+ темы</div>
            </div>
            <div class="content content_datePubleshed col-md-4">
                <div class="row">
                    <h4>Облако тегов: Дата публикации</h4>
                </div>
                <div class="row">
                    <ol  id="dates">
                        <?php foreach ($articlesDateList as $article): ?>
                            <li>
                                <?= $article['date_published']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>    
                </div>
                    <div id="loadNextDates" type="button" class="btn btn-outline-secondary">+ Даты</div>
            </div>
        </div>
    <?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

