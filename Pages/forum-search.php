<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "diplomnarabota";

try {
	$connection = mysqli_connect($servername, $username, $password, $database);
	// echo "Connected successfully";
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$error=false;
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>Форум - търсене</title>
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
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search=$_POST['word-search'];
            if(!$search){
                header("Location: forum.php");
            }
            $search2="SELECT * FROM forum where post like '%$search%' or title like '%$search%' ORDER BY idforum DESC;";
            $result = mysqli_query($connection, $search2);
        ?>

        <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <form action="forum-search.php?searching=true" method="POST" class="form-inline input-group uni-search">
                        <input class="form-control"  name="word-search" type="search" placeholder="Търси публикации" value="">
                        <input type="submit" value="Търсене" class="btn btn-outline-primary input-group-addon">
                    </form>
                    <a href="forum-make-post.php" class="btn btn-primary" style="margin-left: 1vh !important;">Добави Публикация</a>
                </div>
        </div>
            <div class="row mt-5 align-center">
                <div class="col">
                    <h2>Публикации</h2>
                </div>
            </div>
            <?php
            if(mysqli_num_rows($result) == 0) { ?>
                <h4 class="align-center">Няма намерени резултати</h4>
                <?php } else {
                    while ($row = $result->fetch_assoc()){
                        $main=mysqli_query($connection, "Select * from forum where idforum='{$row["idforum"]}'");
                        $post=$main->fetch_assoc();
                        $main2=mysqli_query($connection, "Select * from user where user.id='{$row["user_id"]}'");
                        $user=$main2->fetch_assoc();
            ?>
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 150vh;">
                        <div class="card-header"><?php echo $user['username'] ?></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['title'] ?></h5>
                            <p class="card-text"><?php echo $post['post'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            }
            ?>
            </div>
    </main>
</body>
</html>