<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-sm-12">
        <div class="title">
            <h3>Добавить статью:</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="alert alert-success">
        <?php if(isset($message)): ?>
            <p><?= $message; ?></p>
        <?php endif; ?>
    </div>
</div>
<form enctype="multipart/form-data" action="#" method="post">
  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="author">Автор</label>
    <input type="text" name="author" class="form-control" id="author" placeholder="Enter author">
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
        <label for="content">Содержание</label>
        <textarea class="form-control" name="content" id="content" rows="6"></textarea>
    </div>
    <div class="form-group">
        <label for="img">Добавить изображение</label>
        <input type="file" class="form-control-file" id="img" name="image">
    </div>
    <input id="add" type="submit" name="submit" class="btn btn-primary" value="Добавить">
</form>
<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

