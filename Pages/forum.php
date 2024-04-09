<?php


session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>Форум</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="https://kit.fontawesome.com/9ca68eee12.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <?php 
      include "../components/header.html" 
      ?>
    </header>
    <main>
        <div class="container-fluid">
        <?php if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) { ?>
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <form action="search.php?searching=true" method="POST" class="form-inline input-group uni-search">
                        <input class="form-control"  name="city-search" type="search" placeholder="Търси публикации" value="">
                        <input type="submit" value="Търсене" class="btn btn-outline-primary input-group-addon">
                    </form>
                    <a href="forum-make-post.php" class="btn btn-primary" style="margin-left: 1vh !important;">Добави Публикация</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container mt-5 no-profile">
            <div class="row">
                <div class="col">
                    <h2>За да четете или да публикувате във форума ви трябва потребителски профил: </h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <a href="registration.php" class="btn btn-primary">Регистрация</a>
                    <a href="login.php" class="btn btn-primary">Влизане</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </main>
</body>