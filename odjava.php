<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["email"]);
unset($_SESSION['role']);
unset($_SESSION['ime']);
header("Location: ./site.php");
?>