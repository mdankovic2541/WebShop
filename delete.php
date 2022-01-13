<?php

include 'C:\xampp\htdocs\WebZavrsni\konekcija.php';

$id = $_GET['id'];

$del = mysqli_query($conn,"delete from artikl where id = '$id'");

if($del) {
    mysqli_close($conn);
    header("Location: upravljanjeArtiklima.php");
    exit;
}
else {
    echo "Error deleting record";
}
?>