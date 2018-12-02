<?php require_once ROOT . '/src/views/layouts/header.php'; ?>
<?php /**
 * @param array $errors src\models\User; 
 */ ?>

<div class="row">
    <h3 class="login_title">Регистрация:</h3>
</div>
<div class="row">
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?= $error; ?> </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<div class="row">
    <form action="#" method="post">
        <div class="form-group row">
            <label for="inputLogin" class="col-sm-6 col-form-label">Имя пользователя</label>
            <div class="col-sm-10">
                <input type="login" name="username" class="form-control" id="inputLogin" placeholder="Login" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-6 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" name= "password" class="form-control" id="inputPassword" placeholder="Password" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="admin">Права администратора?</label>
            <select class="form-control" name="is_admin" id="admin">
                <option value="1">Да</option>
                <option value="0">Нет</option>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-outline-secondary" value="Регистрация">
            </div>
        </div>
    </form>
</div>
</div>
<?php require_once ROOT . '/src/views/layouts/footer.php'; ?>



