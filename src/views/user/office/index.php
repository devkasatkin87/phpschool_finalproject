<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-12">
        <h3>Personal office</h3>
        <p>Hello, <?=$user['username'];?>!</p>
    </div>
</div>
    
        <?php if($userAdmin):?>
        <div class="row">
            <div class="form-group"><div class="controll"><a href="http://admin.myproject.ll:8080/article/controll" class="btn btn-outline-secondary">Admin panel</a></div></div>
        </div>
        <div class="row">
            <div class="catalog"><a href="http://admin.myproject.ll:8080/" class="btn btn-outline-secondary">Catalog</a></div>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="catalog"><a href="http://myproject.ll:8080/" class="btn btn-outline-secondary">Catalog</a></div>
        </div>
        <?php endif; ?>
<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>
