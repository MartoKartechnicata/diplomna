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
        <?php include "../Components/header.html" ?>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col align-center">
                <img class="home-image" src="../../diplomna/Images/uni-bg-logo.png" alt="USF logo" >
                </div>
            </div>
            <div class="row">
                <div class="col align-center">
                <h1 class="logo-blue">Добре дошли!</h1>
                </div>
            </div>
            <div class="row mt-3">
            <div class="col align-center">
            <button type="button" class="btn btn-primary btn-nav" onclick="window.location.href = 'registration.php';">Регистрация</button>
            <button type="button" class="btn btn-primary btn-nav" onclick="window.location.href = 'home.php';">Продължи като гост</button>            
            </div>
            </div>
        </div>
    </main>

</body>
</html>