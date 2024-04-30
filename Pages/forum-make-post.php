<?php
session_start();

try {
	$connection = new PDO("mysql:host=localhost;dbname=diplomnarabota", "root");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

if ( isset( $_POST['submit'] ) ) {

$title = $_POST['title'];
$body = $_POST['bodyText'];

$error = false;
if ( !$title ) {
		echo "<center style='color:red;'>No title</center>";
		$error = true;
	}

	if ( !$body ) {
		echo "<center style='color:red;'>Empty body</center>";
		$error = true;
	}
  if ( !$error ) {
		$sql = "INSERT INTO forum (post, user_id, title) VALUES (?,?,?)";
		$result = $connection->prepare($sql)->execute([$body, $_SESSION['user_id'], $title]);
		
		
		if ( $result ) {
            header("Location: forum.php");
		}
	}
	
	
	$title = htmlspecialchars( $fName, ENT_QUOTES );
	$body = htmlspecialchars( $lName, ENT_QUOTES );

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>Добавяне на публикация</title>
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
      <div class="container mt-3">
        <div class="row align-center">
          <div class="col">
            <h1>Добавяне на публикация</h1>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <form method="post" enctype="multipart/form-data">
						  <div class="row mt-4">
                <div class="col align-center">
                  <div class="form">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Тема на публикацията">
                  </div>
                </div>
              </div>
						  <div class="row mt-2 align-center">
                <div class="col">
                  <div class="form">
                    <textarea class="form-control" id="bodyText" name="bodyText" placeholder="Тяло"
                    style="resize: none; height: 15rem;"></textarea>                  
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