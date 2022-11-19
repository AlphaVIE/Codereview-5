<?php
require_once '../components/db_connect.php';
session_start();
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
if (isset($_SESSION['user'])) {
    header("Location: ../home.php");
    exit;
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE animal_id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $id = $data['animal_id'];
        $name = $data['name'];
        $photo = $data['photo'];
        $location = $data['location'];
        $size = $data['size'];
        $age = $data['age'];
        $vaccinated = $data['vaccinated'];
        $breed = $data['breed'];

        $sql = "SELECT * FROM animals";
        $result = mysqli_query($connect, $sql);
        $animalList = "";
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['animal_id'] == $id) {
                $animalList .= "<option selected value='{$row['animal_id']}'>{$row['name']}</option>";
            } else {
                $animalList .= "<option value='{$row['animal_id']}'>{$row['name']}</option>";
            }
        }
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Animal</title>
    <?php require_once '../components/bootstrap.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='<?php echo $photo ?>' alt="<?php echo $name ?>"></legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input class="form-control" type="text" name="name" placeholder="Product Name" value="<?php echo $name ?>" /></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><input class="form-control" type="text" name="photo" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class="form-control" type="text" name="location" step="any" placeholder="Location" value="<?php echo $location ?>" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class="form-control" type="text" name="size" step="any" placeholder="Size" value="<?php echo $size ?>" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class="form-control" type="text" name="age" step="any" placeholder="Age" value="<?php echo $age ?>" /></td>
                </tr>
                <tr>
                    <th>Vaccinated</th>
                    <td><input class="form-control" type="text" name="vaccinated" step="any" placeholder="Vaccinated" value="<?php echo $vaccinated ?>" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class="form-control" type="text" name="breed" step="any" placeholder="Breed" value="<?php echo $breed ?>" /></td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['animal_id'] ?>" />
                    <input type="hidden" name="photo" value="<?php echo $data['photo'] ?>" />
                    <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>