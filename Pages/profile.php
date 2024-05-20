<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "diplomnarabota";

try {
	$connection = mysqli_connect($servername, $username, $password,$database,);
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
    <title>Профил</title>
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
    <h1 class="text-center">Профил</h1>
        <div class="container-fluid pt-2">
          <div class="row">
            <div class="col-12 col-md-3">
              <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <h2><i class="fa-regular fa-user"></i> <?php echo $_SESSION['username'] ?></h2>
                    <p>Email: <?php echo $_SESSION['email'] ?></p>
                    <p>Име: <?php echo $_SESSION['firstName']." ".$_SESSION['lastName'] ?></p>
                    <a href="change-info.php" class="btn btn-primary align-center mb-2">Редактиране</a><br>
                    <a href="../Components/logout.php" class="btn btn-danger align-center mb-2">Излизане</a><br>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-9">
              <div class="container">
                <div class="row mt-3">
                  <div class="col">
                    <h3 class="text-center">Публикации</h3>
                  </div>
                </div>

            <?php
                $posts = mysqli_query($connection, "SELECT * FROM forum WHERE user_id='{$_SESSION['user_id']}' ORDER BY idforum DESC");
                while ($row = $posts->fetch_assoc()){
                $main=mysqli_query($connection, "Select * from forum where idforum='{$row["idforum"]}'");
                $post=$main->fetch_assoc();
                $main2=mysqli_query($connection, "Select * from user where user.id='{$row["user_id"]}'");
                $user=$main2->fetch_assoc();
            ?>
            <div class="row mt-3" style="border-left: solid 1px #0d6efd">
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
            <?php } ?>
              </div>

            </div>
          </div>
        </div>
    </main>
</body>
</html>