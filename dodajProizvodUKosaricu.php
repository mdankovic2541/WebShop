<?php 


session_start();

$id =$_GET['id'];



if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}


array_push($_SESSION['cart'],$id);

header("Location: site.php")
?>
</p>
<a href="kosarica.php">Go to cart</a>
