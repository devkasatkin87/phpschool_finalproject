<?php require_once ROOT . '/src/views/layouts/header.php'; ?>
<?php /**
 * @param array $errors src\models\User; 
 */ ?>

<div class="row">
    <h3 class="login_title">Sign Up:</h3>
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
            <label for="inputLogin" class="col-sm-6 col-form-label">Login</label>
            <div class="col-sm-10">
                <input type="login" name="username" class="form-control" id="inputLogin" placeholder="Login" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-6 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name= "password" class="form-control" id="inputPassword" placeholder="Password" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="admin">Do you want to give user an admin rigts?</label>
            <select class="form-control" name="is_admin" id="admin">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="Sign up">
            </div>
        </div>
    </form>
</div>
<?php require_once ROOT . '/src/views/layouts/footer.php'; ?>



