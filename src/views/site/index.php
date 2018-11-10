<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<?php 
/**  
 * @param $authorsList src\models\Authors; 
 * @param $articlesList src\models\Articles; 
 */ ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="paginationAuthors.js"></script>


<div class="container">
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
                <h3>Catalog of articles</h3>
            </div>
            <div class="row"></div>
        </div>
        <div class="content content_authors col-md-3">
            <div class="row"><h3 class="text-center">Authors</h3></div>
            <div class='row'>
                <ul  id="authors">
                    <?php foreach ($authorsList as $author): ?>
                            <li>
                                    <?= $author['second_name'].' '.$author['first_name'];?>
                            </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="row">
                <div id="loadNextAuthors" type="button" class="btn btn-info">Show next authors</div>
            </div>
        </div>
        <div class="content content_topics col-md-3">
            <div class="row"><h3>Topics</h3></div>
            <div class='row'>
            </div>
        </div>
        <div class="content content_datePubleshed col-md-3">
            <div class="row">
                <h3>Date of publication</h3>
            </div>
            <div class="row">
                <ul  id="dates">
                    <?php foreach ($articlesList as $article): ?>
                        <li>
                            <?= $article['date_published']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>    
            </div>
            <div class="row">
                <div id="loadNextDates" type="button" class="btn btn-info">Show next dates</div>
            </div>
        </div>
    </div>
</div>
<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

