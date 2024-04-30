<?php
try {
	$connection = new PDO("mysql:host=localhost;dbname=diplomnarabota", "root");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

if ( isset( $_POST['submit'] ) ) {


	$fName = $_POST['firstName']; 
	$lName = $_POST['lastName'];
    $uName = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordC = $_POST['passwordC'];

	

	$error = false;
    if ( !$fName ) {
		echo "<center style='color:red;'>Please enter your first name</center>";
		$error = true;
	}

	if ( !$lName ) {
		echo "<center style='color:red;'>Please enter your last name</center>";
		$error = true;
	}

    if ( !$uName ) {
		echo "<center style='color:red;'>Please enter your username</center>";
		$error = true;
	}
	
	
	if ( !$email ) {
		echo "<center style='color:red;'>Please enter your email</center>";
		$error = true;
	}

	if ( !$password ) {
		echo "<center style='color:red;'>Please enter a password</center>";
		$error = true;
	}

	if($passwordC!=$password){
		echo "<center style='color:red;'>The passwords do not match</center>";
		$error=true;
	}
	$stmt = $connection->prepare("SELECT * FROM user WHERE email = ?"); 
        $stmt->execute([ $email]); 
	    $dup = $stmt->fetch();
	if ($dup) {
		echo "Error";
		$error=true;
	}

	if ( !$error ) {
		$sql = "INSERT INTO user (firstName, lastName, email, password, username) VALUES (?,?,?,?,?)";
		$result = $connection->prepare($sql)->execute([$fName, $lName, $email, password_hash($password, PASSWORD_DEFAULT), $uName]);
		
		
		if ( $result ) {
            header("Location: login.php");
		}
	}
	
	
	$fName = htmlspecialchars( $fName, ENT_QUOTES );
	$lName = htmlspecialchars( $lName, ENT_QUOTES );
	$email = htmlspecialchars( $email, ENT_QUOTES );
	$password=htmlspecialchars($password, ENT_QUOTES);
    $passwordC=htmlspecialchars($passwordC, ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>Регистрация</title>
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
        <div class="container-fluid mt-5">
			<div class="row">
				<div class="col-6">
                    <div class="container" >
                        <div class="row align-center">
                            <div class="col">
                                <img class="register-image" src="../../diplomna/Images/uni-bg-logo.png" alt="uni.bg logo">
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-6">
                    <div class="container">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <h2 style="text-align:center; padding-top:5%;">РЕГИСТРАЦИЯ</h2>
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="fName" name="firstName" placeholder="Име">
                                    <label for="fName">Име</label>
                                </div>
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="lName" name="lastName" placeholder="Фамилия">
                                    <label for="fName">Фамилия</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="UName" name="username" placeholder="Потребителско Име">
                                    <label for="fName">Потребителско Име</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email адрес">
                                    <label for="email">Email адрес</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Парола">
                                    <label for="password">Парола</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="passwordC" name="passwordC" placeholder="Потвърдете парола">
                                    <label for="passwordC">Потвърдете парола</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 align-center">
                            <div class="col">
                                <input class="btn btn-primary" type="submit" name="submit" value="Регистрация">  
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
	    </div>
    </main>
    <footer style="postition: static bottom-0 start-0 end-0">
        <?php include "../Components/footer.html" ?>
    </footer>
</body>
</html>