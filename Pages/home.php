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
    <title>Начало</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body class="home-background">
    <header>
      <?php 
      include "../components/header.html" 
      ?>
    </header>
    <main>
        <div class="container-fluid mt-5">
			<div class="row">
				<div class="col-12 col-md-6">
                    <div class="container-fluid" >
                        <div class="row align-center">
                            <div class="col">
                                <img class="home-image img-fluid" src="../../diplomna/Images/uni-bg-logo-white.png" alt="uni.bg logo">
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col home-quote-padding">
                                <p class="home-quote"><q>Посоката, в която се насочва образованието на един човек от самото начало, ще предопредели бъдещия му живот.</q> - Платон</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pt-2 align-center">
                            <?php
                            if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) { ?>
                                <a href="universities.php" class="btn btn-outline-light">Университети</a>
                                <a href="profile.php" class="btn btn-light">Профил</a>
                            <?php } else { ?>
                                <a href="universities.php" class="btn btn-outline-light">Продължи като гост</a>
                                <a href="login.php" class="btn btn-light">Вход</a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
    </main>
</body>
</html>