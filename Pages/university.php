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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uni_id = $_POST['uni_id'];
    $university = "SELECT * FROM university where id='$uni_id'";
    $result = mysqli_query($connection, $university);
    $row = $result->fetch_assoc();
    $majors = "SELECT * FROM major join university_majors on major.id=major_id
    join university on university_id=university.id where university.id='$uni_id'";
    $resultMajors = mysqli_query($connection, $majors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title><?php echo $row['Name'] ?></title>
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
        <div class="container-fluid mt-1">
            <div class="row">
                <div class="col">
                    <div class="card border-primary" style="border-top: none; border-top-left-radius: 0px; border-top-right-radius: 0px;">
                        <div class="row card-body">
                            <div class="col d-flex flex-column">
                                <img class="uni-image img-fluid" src="../Images/<?php echo $row['Picture'] ?>" alt="sans"/>
                            </div>
                            <div class="col-12 col-md-7 d-flex flex-column">
                                <h2 class="card-title"><?php echo $row['Name']." - ".$row['City'] ?></h2>
                                <p class="card-text"><?php echo $row['Description'] ?></p>
                            <div class="mt-auto align-right">
                                <a href="<?php echo $row['site'] ?>" class="btn btn-primary align-right" target="_blank">Официален Сайт</a>
                            </div>                 
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <div class="card border-primary" style="border-right: none; border-bottom-right-radius: 0px; border-top-right-radius: 0px;">
                        <div class="row card-body overflow-auto uni-card-height">
                            <div class="col">
                            <h2 class="card-title mb-2 uni-card-header">Специалности</h2>
                            <ul>
                                <?php while ($major = $resultMajors->fetch_assoc()){ ?>
                                    <li><?php echo $major['major'] ?></li>
                                <?php } ?>
                            </ul>
                            <a href="<?php echo $row['Plans']?>" class="btn btn-primary ml-5" target="_blank">Учебни планове</a>
                            </div>
                        </div>                 
                    </div>
                </div>
                <div class="col mb-1 mb-md-0">
                    <div class="card border-primary uni-card-height">
                        <div class="row card-body">
                            <div class="col">
                                <h2 class="card-title mb-2 uni-card-header">Контакти</h2>
                                <p class="card-text uni-contacts-text"><i class='fas'>&#xf3c5;</i> <?php echo $row['Address'] ?></p>
                                <p class="card-text uni-contacts-text"><i class="fa-solid fa-envelope"></i> <?php echo $row['Email'] ?></p>
                                <p class="card-text uni-contacts-text"><i class="fa-solid fa-phone"></i> <?php echo $row['Phone'] ?></p>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>
        <?php
    }
    ?>
            
    </main>
    
</body>
</html>