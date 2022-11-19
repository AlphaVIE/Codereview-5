<?php
session_start();
require_once '../../components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}
if (isset($_SESSION['user'])) {
    header("Location: ../../home.php");
    exit;
}

if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $photo = $_POST['photo'];
    $location = $_POST['location'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];
    if ($photo === 0) {
        $sql = "UPDATE animals SET name = '$name', photo = '$photo', location = '$location', size = '$size', age = '$age', vaccinated = '$vaccinated', breed = '$breed' WHERE animal_id = {$id}";
    } else {
        $sql = "UPDATE animals SET name = '$name', photo = '$photo', location = '$location', size = '$size', age = '$age', vaccinated = '$vaccinated', breed = '$breed' WHERE animal_id = {$id}";
    }
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../../components/bootstrap.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>