<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-12">
        <h3>Personal office</h3>
        <p>Hello, <?=$user['username'];?>!</p>
    </div>
</div>
    
        <?php if($userAdmin):?>
        <div class="row">
            <div class="col-sm-1">
                    <div class="controll">
                        <a href="http://admin.myproject.ll:8080/article/controll/add" class="btn btn-outline-secondary">Add article</a>
                    </div>
            </div>
            <div class="col-sm-1">
                <div class="catalog">
                    <a href="http://admin.myproject.ll:8080/" class="btn btn-outline-secondary">Catalog</a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-sm-1">
                <div class="catalog">
                    <a href="http://myproject.ll:8080/" class="btn btn-outline-secondary">Catalog</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>
