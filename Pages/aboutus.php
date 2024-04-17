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
    <title>За нас</title>
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
            <div class="row text-center mb-3">
                <div class="col">
                    <h1>За нас</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card border-primary">
                        <div class="row card-body">
                            <div class="col d-flex flex-column">
                                <img class="img-fluid" src="../Images/uktc.jpg" alt="sans"/>
                            </div>
                            <div class="col-7 d-flex flex-column">
                                <h3 class="card-title">Екип и идея</h3>
                                <p class="card-text">Проектът uni.bg е създаден като дипломен проект от Мартин Йорданов, възпитаник на Националната Професионална Гимназия по Компютърни Технологии и Системи в град Правец. Става въпрос за изключително умно, възпитано, здраво, усърдно, работливо и способно момче. Идеята на проекта идва от моя личен опит. Тъй като на мен ми предстои да кандидатствам в университет, установих, че няма качествен онлайн справочник, чрез който да се проучат висшите учебни заведения в България. Именно затова избрах това за тема на моята дипломна работа. Идеята ми е чрез този сайт да предоставя на бъдещите кандидатстуденти добра и пълна база данни с университетите в България, чрез която могат да намерят това, което търсят относно продължаването на образованието им след 12 клас. </p>         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="card border-primary">
                        <div class="row card-body">
                            <div class="col d-flex flex-column">
                                <h2 class="card-title mb-2 uni-card-header">Контакти</h2>
                                <p class="card-text uni-contacts-text"><i class='fas mr'>&#xf3c5;</i> НПГ по КТС, Правец</p>
                                <p class="card-text uni-contacts-text"><i class="fa-solid fa-envelope"></i> +359/0 87 817 2705</p>
                                <p class="card-text uni-contacts-text"><i class="fa-solid fa-phone"></i> marti170705@gmail.com</p>         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>