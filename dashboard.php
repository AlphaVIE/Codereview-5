<?php
session_start();
require_once 'components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$status = 'adm' || 'user';
$sql = "SELECT * FROM users WHERE status != '$status'";
$result = mysqli_query($connect, $sql);
$cardbody = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $cardbody .= "
        <div class='col'>
          <div class='card'>
            <div class='card-body'>
              <h5 class='card-title'> $row[first_name] $row[last_name] </h5>
              <p>$row[email]</p>
              <p>$row[status]</p>
            </div>
          </div>
        </div>";
    }
} else {
    $cardbody = "<h1>No users registered</h1>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi, Administrator</title>
    <?php require_once 'components/bootstrap.php' ?>
    <style type="text/css">

    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 my-4">
                <div class="card-body text-center">
                    <img src="./pictures/Icons8-Windows-8-Users-Administrator-2.ico" alt="userpic" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-4">Administrator</h5>
                    <div class="d-flex justify-content-center mb-2">
                        <a class="btn btn-outline-primary ms-1" href="logout.php?logout">Log Out</a>
                        <a class="btn btn-success ms-1" href="animals/index.php">Animals</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-2">
                <p class='h2'>Users</p>
                    <div class='row row-cols-1 row-cols-md-2 g-4'>    
                    <?= $cardbody ?>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>