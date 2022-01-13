<?php
include_once './konekcija.php';
session_start();

if(!empty($_SESSION['cart'])){
$whereIn = implode(',',$_SESSION['cart']);

$sqlId = "SELECT * FROM artikl WHERE id IN ($whereIn)";
}else header("Location: site.php");

$cartCijena = 0.0;
$cartKolicina= 0;
foreach($_SESSION['cart'] as &$val) {
    $sql = "SELECT * FROM artikl WHERE id='$val'";
    $q = mysqli_query($conn, $sql);

    while($line = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
        $cartCijena += $line['cijena'];
        $cartKolicina++;
    }
}

$sesijaId = session_id();

$errorMsg = "";

$kolicina =  $cijena = "";
/*
$artikl_id = "";
$korisnik_id = $_SESSION['id'];
$isFilled = true;*/

if (isset($_POST['kupi'])) { 
$query = "INSERT INTO kupovina (sesija_id, kolicina,cijena) VALUES ('$sesijaId','$cartKolicina','$cartCijena')";

        if (mysqli_query($conn, $query)) {
            unset($_SESSION['cart']);
            header("Location: nakonKupnje.php");
        } else {
            echo "Error: " . $query . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);

        
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Košarica</title>
    <link rel="stylesheet" href="./site.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="./include.js"></script>
    <script src="./slider.js"></script>
    <script src="./dodajUKosaricu.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://kit.fontawesome.com/ac547be68c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
   <header id="includeHeader"></header> 
        <main>  
            <p id="dohvatiId"></p>
            <div class="container-fluid">
                <div class="row">
                    <div class="mx-auto p-5 my-5"style="background-color:darkgrey;">
                        <form action="" method="post">
                            <table class="table table-striped" id="tablica" style="max-height: 100px; height:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Naziv</th>
                                        <th scope="col">Količina</th>
                                        <th scope="col">Veličina</th>
                                        <th scope="col">Cijena [kn]</th>
                                        <th scope="col">Ukloni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($_SESSION['cart'])){
                                    $sql =$sqlId;
                                    $q = mysqli_query($conn, $sql);
                                    $freqs = array_count_values($_SESSION['cart']);
                                    $koliko = "";
                                    $ukupno = 0;
                                    if($q){
                                    while($line = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
                                        if(isset($freqs[$line['id']])) $koliko = $freqs[$line['id']];
                                        echo '
                                            <tr>
                                                <td>' . $line['id'] .'</td>
                                                <td>' . $line['naziv'] .'</td>
                                                <td>' . $koliko . '</td>
                                                <td>' . $line['velicina'] .'</td>
                                                <td>' . $line['cijena']*$koliko .'</td>
                                                <td><a class="btn btn-danger btn-sm" href="deleteArtiklFromCart.php?id=' . $line['id'] . '">Ukloni</a>
                                                
                                                </td>
                                            </tr>';
                                      
                                            $ukupno += $line['cijena']*$koliko;
                                     }}
                                    
                                     echo '<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Ukupno: '. $ukupno.' kn</td>
                                            <td></td>
                                        </tr>' ;}?>
                                </tbody>
                            </table> 
                           
                                
                        <button type="submit" name="kupi"class="btn btn-success btn-sm">Kupi</button>
                          
                                    </form>
                    </div>
                </div>
            </div>
        </main>
<footer id="includeFooter" class="bg-dim text-center text-lg-start
        text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
</body>
</html>