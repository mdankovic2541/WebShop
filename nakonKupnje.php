<?php
include_once './konekcija.php';

session_start();
$idSesije = session_id();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDShop</title>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5 p-4 bg-dark text-muted rounded-pill">
                <?php 
                    $sql = "SELECT * FROM kupovina WHERE sesija_id = '$idSesije'";
                    $result = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_array($result)) {
                        echo
                        '<h1 class="text-white">Hvala na kupnji!</h1>
                        <p>Vaša sesija:  <span class="text-white">'.$data['sesija_id'].'</span></p>
                        <p>Količina:  <span class="text-white">'.$data['kolicina'].'</span></p>
                        <p>Cijena:  <span class="text-white">'.$data['cijena'].' kn</span></p>';
                    }
                ?>
            </div>
        </div>
    </div>
</main>

<footer id="includeFooter" class="bg-dim text-center text-lg-start
text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
</body>
</html>