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
        </div>
        <div class="content content_topics col-md-3">
            <?php foreach ($topicsList as $field => $value):?>
            <p><?=$field;?><i><?=$value;?></i></p>
            <?php endforeach;?>
        </div>
        <div class="content content_datePubleshed col-md-3">
        </div>
    </div>
</div>
<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

