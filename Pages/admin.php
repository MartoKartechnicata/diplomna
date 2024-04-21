<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>
        main{
            min-height: 90vh;
        }
    </style>
</head>
<body>
    <header>
        <?php include "../Components/header.html" ?>
    </header>
    <main>
        
        <div class="container-fluid mt-2 text-center">
        <h1>Админ панел</h1>
			<div class="row mt-5">
				<div class="col">
                <a href="admin-add-uni.php" class="btn btn-primary ml-5">Добави университет</a>
                </div>
            </div>
            <div class="row mt-2">
				<div class="col">
                <a href="admin-add-major.php" class="btn btn-primary ml-5">Добави специалност</a>
                </div>
            </div>
            <div class="row mt-2">
				<div class="col">
                <a href="admin-manage-majors.php" class="btn btn-primary ml-5">Управление на Специалности</a>
                </div>
            </div>
        </div>
    </main>
</body>
