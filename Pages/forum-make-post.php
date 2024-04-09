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
      <div class="container-fluid mt-3">
        <div class="row align-center">
          <div class="col">
            <h1>Добавяне на публикация</h1>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col">
                  <h2 style="text-align:center; padding-top:5%;">РЕГИСТРАЦИЯ</h2>
                </div>
              </div>
						  <div class="row mt-2">
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="fName" name="firstName" placeholder="Име">
                      <label for="fName">Заглавие</label>
                  </div>
                </div>
              </div>
						  <div class="row mt-2">
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="fName" name="firstName" placeholder="Публикация">
                  </div>
                </div>
              </div>
              <div class="row mt-3 align-center">
                <div class="col">
                  <input class="btn btn-primary" type="submit" name="submit" value="Публикуване">  
                </div>
              </div>
          </div>
        </div>
      </div>
    </main>
</body>