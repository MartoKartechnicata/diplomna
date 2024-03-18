<?php
$servername= "localhost";
$username= "root";
$db_name = "diplomnarabota";

$connection = new PDO("mysql:host=$servername;dbname=$db_name", $username);

if (!$connection) {

    echo "Connection failed!";

}

session_start(); 
$error = false;

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);
       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if ( empty( $email ) ) {

        $error = true;
        echo "Please, type email<br>";
    }

    if ( empty( $pass ) ) {

        $error = true;
        echo "Please, type pass<br>";
    }
    if ( !$error ) {
        $stmt = $connection->prepare("SELECT * FROM user WHERE email = ?"); 
        $stmt->execute([$email]);
	    $result = $stmt->fetch();

        $boolcheck = password_verify($pass, $result['password']);
        echo $boolcheck;
        if (password_verify($pass, $result['password'])) {
            $row = ($result);

                echo "Logged in!";
                $_SESSION['user_id'] = $row['id'];

                $_SESSION['email'] = $row['email'];

                $_SESSION['firstName'] = $row['firstName'];

                $_SESSION['lastName'] = $row['lastName'];

                $_SESSION['admin'] = $row['admin'];

                header("Location: universities.php");

                exit();

        }
        else{
            echo "ludnica";
            $error=true;
        }

    }
	$email = htmlspecialchars( $email, ENT_QUOTES );
	$pass=htmlspecialchars($pass, ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>Влизане</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <header>
      <?php 
      include "../components/header.html" 
      ?>
    </header>
    <main>
        <?//php if($error){
        //echo "Wrong email or password";
        //}?>
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
                                <h2 style="text-align:center; padding-top:5%;">ВЛИЗАНЕ</h2>
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
                        <div class="row mt-3 align-center">
                            <div class="col">
                                <input class="btn btn-primary" type="submit" name="submit" value="Log in">  
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