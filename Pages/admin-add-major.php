<?php
try {
	$connection = new PDO("mysql:host=localhost;dbname=diplomnarabota", "root");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

session_start();

if ( isset( $_POST['submit'] ) ) {


	$name = $_POST['Name']; 
	
	$error = false;
    if ( !$name) {
		$error = true;
	}

	$stmt = $connection->prepare("SELECT * FROM major WHERE major = ?"); 
        $stmt->execute([$name]); 
	    $dup = $stmt->fetch();
	if ($dup) {
		echo "Error";
		$error=true;
	}

	if (!$error) {
        $sql = "INSERT INTO major (major) VALUES (?)";
        $result = $connection->prepare($sql)->execute([$name]);
        
        if ($result) {
            echo "<div class='alert alert-success mt-3' role='alert'>Успешно добавена специалност!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Грешка при добавянето на специалността!</div>";
        }
    }
	
	
	$name = htmlspecialchars( $name, ENT_QUOTES );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавяне на университет</title>
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
        <div class="container-fluid">
			<div class="row">
				<div class="col">
                    <div class="container">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <h2 style="text-align:center; padding-top:5%;">Добавяне на Специалност</h2>
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Специалност">
                                    <label for="Name">Специалност</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 align-center">
                            <div class="col">
                                <input class="btn btn-primary" type="submit" name="submit" value="Потвърди">  
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
	    </div>
    </main>
</body>
</html>