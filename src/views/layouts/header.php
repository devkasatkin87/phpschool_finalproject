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
            <a class="navbar-brand" href="http://myproject.ll:8080">Catalog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Hello, <?= $_SESSION['user']; ?></a>
                        </li>
                        <?php if ($_SESSION['is_admin'] == 1): ?>
                            <div class="btn btn-outline-success mx-5"><a href="http://admin.myproject.ll:8080/article/controll">Admin Panel</a></div>
                        <?php endif; ?>    
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout">Sign Out</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/login">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/register">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
                    <?php var_dump($_SESSION);?>
            </div>
        </nav>
