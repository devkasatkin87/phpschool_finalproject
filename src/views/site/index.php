<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<div class="container">
    <div class="row">
        <!--Title-->
        <div class="title col-sm-12">
            <h1 class="text-center">
                Catalogue of articles
            </h1>
        </div><!--end Title-->
    </div>
    <div class="row">
        <div class="content content_articles col-md-3">
        </div>
        <div class="content content_authors col-md-3">
            <div class="row"><h3>Tags Cloud Authors</h3></div>
            <div class='row'>
                <?php foreach ($authorsList as $author): ?>
                    <ul>
                        <li><p><?= $author['name']; ?></p></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="content content_topics col-md-3">
            <div class="row"><h3>Tags Cloud Topics</h3></div>
            <div class='row'>
                <?php foreach ($topicsList as $topic): ?>
                    <ul>
                        <li><p><?= $topic['title']; ?></p></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="content content_datePubleshed col-md-3">
        </div>
    </div>
</div>
<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

