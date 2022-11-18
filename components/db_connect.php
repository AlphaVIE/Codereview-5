<?php

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "BE17_CR5_animal_adoption_Arman";

// create connection
$connect = new  mysqli($localhost, $username, $password, $dbname);

// check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
//  else {
//     echo "Successfully Connected";
// }
