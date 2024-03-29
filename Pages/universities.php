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
    <title>Университети</title>
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
        <h1 class="align-center">Университети</h1>
        <div class="container-fluid universities-container-fluid">
            <div class="row">
                <div class="col-6 d-flex justify-content-end">
                    <form class="form-inline input-group uni-search">
                        <input class="form-control" type="search" placeholder="Търси по специалност" aria-label="Search">
                        <button class="btn btn-outline-primary input-group-addon" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-6">
                    <form class="form-inline input-group uni-search">
                        <input class="form-control" type="search" placeholder="Търси по град" aria-label="Search">
                        <button class="btn btn-outline-primary input-group-addon" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
        <?php
        $allUnis = mysqli_query($connection, "SELECT * FROM university");
        while ($row = $allUnis->fetch_assoc()){
            $main=mysqli_query($connection, "Select * from university where university.id='{$row["id"]}'");
            $university=$main->fetch_assoc();
        ?>           
                <div class="col-4 mb-4 d-flex justify-content-center">
                    <div class="card border-primary" style="width: 29rem; height: 28rem">
                        <img src="../Images/<?php echo $university['Picture'] ?>" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $university['Name']." - ".$university['City']?></h5>
                            <p class="card-text"><i style='font-size:17px' class='fas'>&#xf3c5;</i> <?php echo $university['Address'] ?></p>
                            <div class="mt-auto">
                                <a href="#" class="card-link">Виж повече</a>
                            </div>
                        </div>
                    </div> 
                </div>
                   
        <?php
        }
        ?>
        </div>    
        </div>
    </main>
</body>
</html>