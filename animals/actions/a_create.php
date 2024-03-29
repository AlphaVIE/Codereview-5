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
    $name = $_POST['name'];
    $photo = $_POST['photo'];
    $location = $_POST['location'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];

    if ($photo === 0) {
        $sql = "INSERT INTO animals (name, photo, location, size, age, vaccinated, breed) VALUES ('$name', '$photo', '$location', '$size', '$age', '$vaccinated', '$breed')";
    } else {
        $sql = "INSERT INTO animals (name, photo, location, size, age, vaccinated, breed) VALUES ('$name', '$photo', '$location', '$size', '$age', '$vaccinated', '$breed')";
    }


    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $breed </td>
            </tr></table><hr>";
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
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
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>