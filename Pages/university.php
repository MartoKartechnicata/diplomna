<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "diplomnarabota";

try {
    $connection = mysqli_connect($servername, $username, $password,$database);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>TEst</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ca68eee12.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
      <?php 
      include "../components/header.html" 
      ?>
    </header>
    <main>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city_search = $_POST['uni-info'];
    
    }
    ?>
    </main>
</body>
</html>