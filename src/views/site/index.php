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
                    Main Page
                </h1>
            </div><!--end Title-->
        </div>
      
        <div class="row">
            <div class="content content_articles col-md-3">
                <div class="row">
                    <h4 class="text-center">Articles</h4>
                </div>
                <div class="row">
                    <ol id="articles">
                        <?php foreach ($articlesList as $article): ?>
                            <li>
                                <a href="/article/<?= $article['id'] ?>"><?= $article['title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <div class="row">
                    <div id="loadNextArticles" type="button" class="btn btn-info">Show next articles</div>
                </div>
            </div>
            <div class="content content_authors col-md-3">
                <div class="row"><h4 class="text-center">Tags: Authors</h4></div>
                <div class='row'>
                    <ol  id="authors">
                        <?php foreach ($authorsList as $author): ?>
                            <li>
                                <?= $author['second_name'] . ' ' . $author['first_name']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <div class="row">
                    <div id="loadNextAuthors" type="button" class="btn btn-info">Show next authors</div>
                </div>
            </div>
            <div class="content content_topics col-md-3">
                <div class="row"><h4 class="text-center">Tags: Topics</h4></div>
                <div class='row'>
                    <ol  id="topics">
                        <?php foreach ($topicsList as $topic): ?>
                            <li>
                                <?= $topic['title'] . ' ' . $topic['articles_count']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <div class="row">
                    <div id="loadNextTopics" type="button" class="btn btn-info">Show next topics</div>
                </div>
            </div>
            <div class="content content_datePubleshed col-md-3">
                <div class="row">
                    <h4>Tags: Date of publication</h4>
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
                <div class="row">
                    <div id="loadNextDates" type="button" class="btn btn-info">Show next dates</div>
                </div>
            </div>
        </div>
    <?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

