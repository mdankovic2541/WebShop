<?php

include 'C:\xampp\htdocs\WebZavrsni\konekcija.php';


$id = $_GET['id'];

session_start();

if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $select => $val) {
        if($val["id"] == $id)
        {
            unset($_SESSION["cart"][$select]);
        }
    }
    

}

  
header("Location: kosarica.php");

 
?>