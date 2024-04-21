<?php 
try {
    $connection = new PDO("mysql:host=localhost;dbname=diplomnarabota", "root");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

session_start();

$query = "SELECT * FROM university";
$universities = $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['university_id'])) {
    $university_id = $_GET['university_id'];

    $query = "SELECT * FROM university WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $university_id);
    $stmt->execute();
    $selected_university = $stmt->fetch(PDO::FETCH_ASSOC);

    $query = "SELECT major.id FROM major 
              INNER JOIN university_majors ON major.id = university_majors.major_id 
              WHERE university_majors.university_id = :university_id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':university_id', $university_id);
    $stmt->execute();
    $connected_majors = $stmt->fetchAll(PDO::FETCH_COLUMN);
}

$query = "SELECT * FROM major";
$all_majors = $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['majors'])) {
    $selected_majors = $_POST['majors'];
    $university_id = $_POST['university_id'];

    foreach ($selected_majors as $major_id) {
        if (!in_array($major_id, $connected_majors)) {
            $query = "INSERT INTO university_majors (university_id, major_id) VALUES (:university_id, :major_id)";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':university_id', $university_id);
            $stmt->bindParam(':major_id', $major_id);
            $stmt->execute();
        }
    }

    header("Location: ".$_SERVER['PHP_SELF']."?university_id=$university_id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление на Специалности</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <header>
        <?php include "../Components/header.html" ?>
    </header>
    <main>
    <div class="container-fluid" style="width: 99%; margin-left: 2vh;">
        <h1 class="text-center">Управление на специалности</h1>

        <div class="row">
            <div class="col">
                <h3>Иберете университет: </h3>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col">
                <form action="" method="GET">
                <select name="university_id" onchange="this.form.submit()" class="form-select">
                    <option value="">Select University</option>
                    <?php foreach ($universities as $university): ?>
                <option value="<?php echo $university['id']; ?>"
                    <?php echo isset($selected_university) && $selected_university['id'] == $university['id'] ? 'selected' : ''; ?>>
                    <?php echo $university['Name']; ?>
                </option>
                <?php endforeach; ?>
                </select>
                </form>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <?php if (isset($selected_university)): ?>
                <form action="" method="POST" class="align-left mt-3">
                    <input type="hidden" name="university_id" value="<?php echo $selected_university['id']; ?>">
                    <?php foreach ($all_majors as $major): ?>
                    <div>
                        <input type="checkbox" name="majors[]" value="<?php echo $major['id']; ?>"
                            <?php echo in_array($major['id'], $connected_majors) ? 'checked' : ''; ?>>
                        <label><?php echo $major['major']; ?></label>
                    </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary mt-3">Connect Selected Majors</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </main>
</body>
</html>
