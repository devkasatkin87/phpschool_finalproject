<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-sm-12">
        <div class="title">
            <h3>Редактировать статью:</h3>
        </div>
    </div>
</div>
<div class="row"><div id="state" class="state"></div></div>
<div class="row">
    <div class="alert alert-success">
        <?php if(isset($message)): ?>
            <p><?= $message; ?></p>
        <?php endif; ?>
    </div>
</div>
<form enctype="multipart/form-data" id="form" action="#" method="post">
    <div class="form-group">
        <label>Article # <i id="article_id"><?= $article['id'];?></i></label>
    </div>
  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="<?= $article['title']; ?>">
  </div>
  <div class="form-group">
    <label for="author">Автор</label>
    <input type="text" name="author" class="form-control" id="author" placeholder="Enter author" value="<?= $author; ?>">
  </div>
    <div class="form-group">
        <label for="topic">Тема</label>
        <select class="form-control" name="topic" id="topic">
            <?php foreach ($topics as $topic): ?>
            <option value="<?= $topic['id']; ?>"><?= $topic['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="content">Содержимое</label>
        <textarea class="form-control" name="content" id="content" rows="6"><?= $article['content']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="img">Добавить изображение</label>
        <input type="file" class="form-control-file" id="img" name="image">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Редактировать">
</form>

<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

