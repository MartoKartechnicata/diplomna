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
	$city = $_POST['City'];
    $address = $_POST['Address'];
	$phone = $_POST['Phone'];
	$email = $_POST['email'];
	$site = $_POST['Site'];
    $plans = $_POST['Plans'];
	$desc = $_POST['Description'];

    if (isset($_FILES['Picture']) && $_FILES['Picture']['error'] === UPLOAD_ERR_OK) {
        $picture_name = $_FILES['Picture']['name'];
        $picture_tmp = $_FILES['Picture']['tmp_name'];
        $picture_path = '../Images/' . $picture_name;
    
        move_uploaded_file($picture_tmp, $picture_path);
    } else {
        $picture_name = null;
    }


	$error = false;
    if ( !$name || !$city || !$address || !$phone || !$email || !$site || !$plans || !$desc || !$picture_name) {
		$error = true;
	}

	$stmt = $connection->prepare("SELECT * FROM university WHERE Name = ?"); 
        $stmt->execute([ $name]); 
	    $dup = $stmt->fetch();
	if ($dup) {
		echo "Error";
		$error=true;
	}

	if (!$error) {
        $sql = "INSERT INTO university (Name, City, Phone, Email, Address, Description, site, Plans, Picture) VALUES (?,?,?,?,?,?,?,?,?)";
        $result = $connection->prepare($sql)->execute([$name, $city, $phone, $email, $address, $desc, $site, $plans, $picture_name]);
        
        if ($result) {
            header("Location: admin-add-uni.php");
            echo "evala";
        }
    }
	
	
	$name = htmlspecialchars( $name, ENT_QUOTES );
    $city = htmlspecialchars( $city, ENT_QUOTES );
	$phone = htmlspecialchars( $phone, ENT_QUOTES );
	$email = htmlspecialchars( $email, ENT_QUOTES );
    $address = htmlspecialchars( $address, ENT_QUOTES );
	$desc = htmlspecialchars( $desc, ENT_QUOTES );
	$site = htmlspecialchars( $site, ENT_QUOTES );
	$plans = htmlspecialchars( $plans, ENT_QUOTES );
    $picture_name = htmlspecialchars( $picture_name, ENT_QUOTES );
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
                                <h2 style="text-align:center; padding-top:5%;">Добавяне на университет</h2>
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Име">
                                    <label for="Name">Име</label>
                                </div>
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="City" name="City" placeholder="Град">
                                    <label for="fName">Град</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="Address" name="Address" placeholder="Адрес">
                                    <label for="Address">Адрес</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="phone" class="form-control" id="Phone" name="Phone" placeholder="Телефон">
                                    <label for="Phone">Телефон</label>
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
                                    <input type="text" class="form-control" id="site" name="Site" placeholder="Сайт">
                                    <label for="site">Сайт</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="plans" name="Plans" placeholder="Линк за учебни планове">
                                    <label for="plans">Линк за учебни планове</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating">
                                <textarea class="form-control" id="description" name="Description" placeholder="Описание" style="resize: none; height: 15rem;"></textarea>                  
                                    <label for="descrpiption">Описание</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                    <label for="picture">Снимка: </label>
                                    <input type="file" class="form-control" id="picture" name="Picture">
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