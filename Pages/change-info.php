<?php
try {
    $connection = new PDO("mysql:host=localhost;dbname=diplomnarabota", "root");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

session_start();

if (isset($_POST['submit'])) {

    $fName = $_POST['firstName']; 
    $lName = $_POST['lastName'];
    $uName = $_POST['username'];
    $email = $_POST['email'];
    $passwordNew = $_POST['passwordNew'];
    $passwordC = $_POST['passwordC'];
    $password = $_POST['password'];

    $error = false;

    if (!$fName) {
        echo "<center style='color:red;'>Please enter your first name</center>";
        $error = true;
    }

    if (!$lName) {
        echo "<center style='color:red;'>Please enter your last name</center>";
        $error = true;
    }

    if (!$uName) {
        echo "<center style='color:red;'>Please enter your username</center>";
        $error = true;
    }
    
    if (!$email) {
        echo "<center style='color:red;'>Please enter your email</center>";
        $error = true;
    }

    if (!$password) {
        echo "<center style='color:red;'>Please enter your old password</center>";
        $error = true;
    }

    if ($passwordC != $passwordNew) {
        echo "<center style='color:red;'>The passwords do not match</center>";
        $error = true;
    }
    
    $stmt = $connection->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$error) {
        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($passwordNew !== '') {
                    $sql = "UPDATE user SET firstName=?, lastName=?, username=?, password=?, email=? WHERE id=?";
                    $result = $connection->prepare($sql)->execute([$fName, $lName, $uName, password_hash($passwordNew, PASSWORD_DEFAULT), $email, $_SESSION['user_id']]);
                } else {
                    $sql = "UPDATE user SET firstName=?, lastName=?, username=?, email=? WHERE id=?";
                    $result = $connection->prepare($sql)->execute([$fName, $lName, $uName, $email, $_SESSION['user_id']]);
                }

                if ($result) {
                    header("Location: ../Components/logout.php");
                } else {
                    echo "<center style='color:red;'>Error updating user</center>";
                }
            } else {
                echo "<center style='color:red;'>Your password is incorrect</center>";
            }
        } else {
            echo "<center style='color:red;'>User does not exist</center>";
        }
    }

    $fName = htmlspecialchars($fName, ENT_QUOTES);
    $lName = htmlspecialchars($lName, ENT_QUOTES);
    $email = htmlspecialchars($email, ENT_QUOTES);
    $password = htmlspecialchars($password, ENT_QUOTES);
    $passwordNew = htmlspecialchars($passwordNew, ENT_QUOTES);
    $passwordC = htmlspecialchars($passwordC, ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="uni, университети, българия, образование, uni bg">
    <meta name="author" content="Martin Yordanov 19315">
    <title>Редактиране на профил</title>
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
        <div class="container-fluid mt">
			<div class="row">
				<div class="col">
                    <div class="container">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <h2 style="text-align:center; padding-top:5%;">Редактиране на профил</h2>
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="fName" name="firstName" placeholder="Име" value="<?php echo $_SESSION['firstName'] ?>">
                                    <label for="fName">Име</label>
                                </div>
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="lName" name="lastName" placeholder="Фамилия" value="<?php echo $_SESSION['lastName'] ?>">
                                    <label for="fName">Фамилия</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="UName" name="username" placeholder="Потребителско Име" value="<?php echo $_SESSION['username'] ?>">
                                    <label for="fName">Потребителско Име</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email адрес" value="<?php echo $_SESSION['email'] ?>">
                                    <label for="email">Email адрес</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="passwordNew" name="passwordNew" placeholder="Парола">
                                    <label for="passwordNew">Смяна на Парола</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="passwordC" name="passwordC" placeholder="Потвърдете парола">
                                    <label for="passwordC">Потвърдете нова парола</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 align-center">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Парола">
                                    <label for="password">Въведете паролата си за да продължите</label>
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