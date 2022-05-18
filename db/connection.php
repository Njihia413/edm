<?php



$user       = "root";
$host       = "localhost";
$password   = "";
$database   = "maureen_project";


$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
