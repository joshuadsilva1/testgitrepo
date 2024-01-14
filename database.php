<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    echo "something went wrong";
    die("Something went wrong");
}

?>