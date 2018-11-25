<?php require_once ROOT.'/src/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-sm-12">
        <div class="title">
            <h3>Update article:</h3>
        </div>
    </div>
</div>
<div class="row"><div id="state" class="state"></div></div>
<div class="row">
    <?php if (isset($errors)) :?>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>    
    <?php endif; ?>
</div>
<form id="form" action="#" method="post">
    <div class="form-group">
        <label>Article # <i id="article_id"><?= $article['id'];?></i></label>
    </div>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="<?= $article['title']; ?>">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" class="form-control" id="author" placeholder="Enter author" value="<?= $author; ?>">
  </div>
    <div class="form-group">
        <label for="topic">Topic</label>
        <select class="form-control" name="topic" id="topic">
            <?php foreach ($topics as $topic): ?>
            <option value="<?= $topic['id']; ?>"><?= $topic['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="6"><?= $article['content']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="img">Image</label>
        <input type="file" class="form-control-file" id="img">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Update article">
</form>

<?php require_once ROOT.'/src/views/layouts/footer.php'; ?>

