<?php
session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['adm'])) {
    header('Location: dashboard.php');
    exit;
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$query = "SELECT * FROM animals";
$result = mysqli_query($connect, $query);
$cards="";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .=
            "<div class='col'>
        <div class='card'>
        <img src=" . $row['photo'] . ">
        <div class='card-body'>
        <h5 class='card-title'>". $row['name'] ."</h5>
        <a href='details.php?id=". $row['animal_id'] ."' class='btn fs-5'>Details</a>
    </div>
  </div>
</div>";
    }
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    <?php require_once 'components/bootstrap.php' ?>

    <style>

        .navbar {
            background-color: pink !important;
        }

        body {
            background-color: beige;
        }

        .card {
            width: 20em;
            height: 40em;
            margin: 5% auto;
        }

        img {
            width: 20em;
            height: 20em;
        }

        nav {
            height: 10vh;
        }

        .user-picture {
            width: 1em;
            height: 1em;
            border-radius: 50%;
        }
    </style>

</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
  <h4 style="margin-right: 10%;"><img class="user-picture" src="./pictures/247-2472348_admin-user-shape-hd-png-download.png"> Hi, Arman</h4>
    <a class="navbar-brand" href="./home.php">Animal Adoption</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
        <a class="nav-link" href="./seniors.php">Seniors</a>
        <a class="nav-link" href="./logout.php?logout">Logout</a>
      </div>
    </div>
  </div>
</nav>
    <div class='row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-xs-1 g-5'>
        <?= $cards ?>
    </div>
</body>

</html>