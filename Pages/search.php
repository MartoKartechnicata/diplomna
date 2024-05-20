<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "diplomnarabota";

$connection = mysqli_connect($servername, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>Резултати от търсене</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ca68eee12.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <?php include "../components/header.html"; ?>
</header>
<main>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city_search = $_POST['city-search'];
    $major_search = $_POST['major-search'];

    if (!$major_search && !$city_search) {
        header("Location: universities.php");
        exit();
    } elseif (!$major_search) {
        $uniSearch = "SELECT * FROM university WHERE City='$city_search'";
    } elseif (!$city_search) {
        $uniSearch = "SELECT * FROM university 
                      JOIN university_majors ON university.id = university_majors.university_id 
                      JOIN major ON university_majors.major_id = major.id 
                      WHERE major.major = '$major_search'";
    } else {
        $uniSearch = "SELECT * FROM university 
                      JOIN university_majors ON university.id = university_majors.university_id 
                      JOIN major ON university_majors.major_id = major.id 
                      WHERE major.major = '$major_search' AND university.City = '$city_search'";
    }

    $result = mysqli_query($connection, $uniSearch);
    ?>
    <div class="container-fluid universities-container-fluid mt-3">
        <div class="row">
            <div class="col">
                <h2 class="align-center">Резултати от търсене</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col d-flex justify-content-center">
                <form action="search.php" method="POST" class="form-inline input-group uni-search">
                    <input class="form-control" name="city-search" type="search" placeholder="Търси по град" value="<?php echo $city_search ?>">
                    <input class="form-control" name="major-search" type="search" placeholder="Търси по специалност" value="<?php echo $major_search ?>">
                    <input type="submit" value="Търсене" class="btn btn-outline-primary input-group-addon">
                </form>
            </div>
        </div>
        <div class="row mt-5">
    <?php
    if (mysqli_num_rows($result) == 0) { ?>
        <h4 class="align-center">Няма намерени резултати</h4>
    <?php } else {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="col-4 mb-4 d-flex justify-content-center">
                <div class="card border-primary" style="width: 29rem; height: 28rem">
                    <img src="../Images/<?php echo $row['Picture'] ?>" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $row['Name']." - ".$row['City'] ?></h5>
                        <p class="card-text"><i style='font-size:17px' class='fas'>&#xf3c5;</i> <?php echo $row['Address'] ?></p>
                        <div class="mt-auto">
                            <form action="university.php?uni=<?php echo $row['university_id'] ?>" method="POST" class="form-inline input-group uni-search">
                                <input type="hidden" name="uni_id" value="<?php echo $row['university_id']; ?>">
                                <input type="submit" value="Виж повече" class="btn btn-primary input-group-addon" style="border-radius: 5px !important;">
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        <?php }
    }
}
?>
</main>
</body>
</html>
