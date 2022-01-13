<?php
include_once './konekcija.php';

session_start();


$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from artikl where id='$id'");

$row = mysqli_fetch_array($qry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDShop</title>
    <link rel="stylesheet" href="./site.css">
    <link rel="stylesheet" href="./proizvod.css">
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
                
                        <div class="col-md-7 mt-2 mx-auto">
                            <div class="container-fluid">
                                <div class="p-2 m-5  slika" style="background:gray;opacity: 1 ;">
                                    <img src="Slike/<?php echo $row['naziv'] ?>.jpg" class="img-responsive img-thumbnail" alt="image"
                                    style="max-width: 400px;
                                            width: 100%;
                                            max-height:400px;
                                            height: 100%;
                                            "
                                    >
                                    <p class="text-center text-white"><?php echo $row['naziv']; echo ($row['tip'] == 'NOVO') ? '<p class="h2 text-info ">NOVO</p>' : '<p class="h2 text-info">POPULARNO</p>';
                                    ?></p>
                                    <p class="text-center text-white">Veličina:&nbsp;<?php  echo $row['velicina'] ?></p>
                                    <p class="text-center text-white">Marka:&nbsp;<?php  echo $row['marka'] ?></p>
                                    <p class="text-center text-white">Cijena:&nbsp;<?php  echo $row['cijena'] ?>kn</p>
                                    <?php echo '<a class="btn btn-sm btn-warning mb-2 dodajUKosaricu" href="dodajProizvodUKosaricu.php?id='.$row['id'].'" onclick="appendId('. $row['id'] .')" ><i class="fas fa-cart-plus"></i>&nbsp;Dodaj u košaricu</a>';?>
                                    <a  class="btn btn-info btn-sm mb-2" href="site.php" ><i class="fas fa-hand-point-left"></i>&nbsp;Povratak</a>
                                </div>
                            </div>
                        </div>
                    
            </div>
        </div>
    </main> 


<footer id="includeFooter" class="bg-dim text-center text-lg-start
text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
</body>
</html>