<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "webshop";

$conn = mysqli_connect($hostname, $username, $password, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  } 

?>
