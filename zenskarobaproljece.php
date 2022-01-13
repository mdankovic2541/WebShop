<?php
include_once './konekcija.php';

session_start();

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
          <div class="col-md-3 text-white">
              <div id="filter" class="p-2 bg-dark ms-md-4 ms-sm-2 " style="border: 1px solid black;">
                  <div class="border-bottom h5 text-uppercase text-white">Filter</div>
                  <div class="box border-bottom">
                    <form action=""><div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Pretraži" aria-label="pretrazi" aria-describedby="button-addon2" name="pretrazi">
                                <button class="btn btn-outline-secondary" type="submit " id="button-addon2"><i class="fas fa-search"></i></button>
                                  </div>
                    </form>
                    <div class="box-label text-uppercase d-flex align-items-center">Cijena u kn <button class="btn ms-auto btn-outline-light" id="sdb1" type="button" data-bs-toggle="collapse" data-bs-target="#inner-box" aria-expanded="false" aria-controls="inner-box"> <i class="" id="ic1"></i> </button> </div>
                        <div id="inner-box" class="collapse show">
                        <p>
                            <label for="cijena">Odabrana cijena (kn):</label>
                            <input type="text" id="cijena" readonly style="border:0; color:black; font-weight:bold;">
                        </p>
 
                            <div id="slider-range"></div>  
                        </div>
                    </div>
                  
                  <div class="box border-bottom">
                      <div class="box-label text-uppercase d-flex align-items-center">Veličine<button class="btn ms-auto btn-outline-light" id="sdb2" type="button" data-bs-toggle="collapse" data-bs-target="#property" aria-expanded="false" aria-controls="property"> <span class="" id="ic2"></span> </button> </div>
                      <div id="property" class="collapse show">
                          <div class="my-1"> <label class="tick">XS <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">S <input type="checkbox"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">M <input type="checkbox"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">L <input type="checkbox"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">XL <input type="checkbox"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">XXL <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">XXXL <input type="checkbox"> <span class="check"></span> </label> </div>
                      </div>
                  </div>
                  <div class="box">
                      <div class="box-label text-uppercase d-flex align-items-center">Marke <button class="btn ms-auto btn-outline-light" id="sdb3" type="button" data-bs-toggle="collapse" data-bs-target="#amenities" aria-expanded="false" aria-controls="amenities"> <span class="" id="ic3"></span> </button> </div>
                      <div id="amenities" class="collapse show">
                          <div class="my-1"> <label class="tick">Nike <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Addidas <input type="checkbox"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Levis <input type="checkbox"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Gucci <input type="checkbox"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Under Armour <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Emporio Armani <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Balenciaga <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Calvin Klein <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Karl Lagerfield <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Puma <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Louis Vuitton <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Ralph Lauren <input type="checkbox" > <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">Tommy Hilfiger <input type="checkbox" > <span class="check"></span> </label> </div>
                      </div>
                  </div>
              </div>
          </div>
        
            <div class="col-md-9 pt-3">
                <div class= "row">
                <?php
                $sql = "SELECT naziv, velicina, cijena, marka, tip FROM artikl WHERE spol='Ž' AND vrsta ='ženska'  AND kolekcija ='proljeće'";
                $result = mysqli_query($conn, $sql);
                
                
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="col-md-4 mt-3">
                        <div class="container-fluid">
                        <div class="p-2 " style="background:gray;opacity: 1 ;">
                        <img src="Slike/'.$row['naziv'].'.jpg" class="img-fluid img-thumbnail" alt="image">
                        <div class="top-left">'.$row['tip'].'</div>
                        <p class="text-center text-white">Cijena: ' . $row['cijena']. 'kn</p>
                        <p class="text-center text-white">Veličina: ' .$row['velicina']. '</p>
                        <p class="text-center text-white">Marka: '.$row['marka']. '</p>
                        <a class="btn btn-sm btn-warning mb-2" hr><i class="fas fa-cart-plus">&nbsp;Dodaj u košaricu</i></a>
                        </div>
                        </div></div>';

                        
                    }
                } else {
                    echo "0 results";
                }
                mysqli_close($conn); ?>
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