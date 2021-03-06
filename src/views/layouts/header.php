<?php 
    use src\models\User;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/web/css/bootstrap.min.css">
    <title>Catalog of articles</title>
  </head>
  <body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="http://myproject.ll:8080">Каталог статей</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if(User::isGuest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/login">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/register">Регистрация</a>
                        </li>
                    <?php endif; ?>
                    <?php if(User::checkAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/office">Персональная страница</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout">Выход</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
