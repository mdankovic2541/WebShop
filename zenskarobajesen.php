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
                <div class="col-md-3 text-white">
                    <div id="filter" class="p-2 bg-dark ms-md-4 ms-sm-2 " style="border: 1px solid black;">
                    <div class="border-bottom h5 text-uppercase text-white">Filter</div>
                        <div class="box border-bottom">
                        
                        <div class="box-label text-uppercase d-flex align-items-center">Cijena u kn <button class="btn ms-auto btn-outline-light" id="sdb1" type="button" data-bs-toggle="collapse" data-bs-target="#inner-box" aria-expanded="false" aria-controls="inner-box"> <i class="" id="ic1"></i> </button> </div>
                        <input type="hidden" id="hidden_minimum_price" value="0">
                        <input type="hidden" id="hidden_maximum_price" value="5000">
                        <p id="price_show">0 - 5000</p>
                        <div id="price_range"></div>
                    </div>
                 
                    <div class="box border-bottom ">
                      <div class="box-label text-uppercase d-flex align-items-center">Veli??ine<button class="btn ms-auto btn-outline-light" id="sdb2" type="button" data-bs-toggle="collapse" data-bs-target="#property" aria-expanded="false" aria-controls="property"> <span class="" id="ic2"></span> </button> </div>
                      <?php 
                      $query = "SELECT DISTINCT(velicina) FROM artikl";
                      $result = $conn->query($query);
                      $result->fetch_all(MYSQLI_ASSOC);

                      foreach($result as $row){
                        ?>
                        <div class="list-group-item checkbox bg-dark text-white">
                            <label><input type="checkbox" class="common_selector velicina" value="<?php echo $row['velicina'];?>"> <?php echo $row['velicina']; ?></label>
                            
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="box">
                        <div class="box-label text-uppercase d-flex align-items-center">Marke <button class="btn ms-auto btn-outline-light" id="sdb3" type="button" data-bs-toggle="collapse" data-bs-target="#amenities" aria-expanded="false" aria-controls="amenities"> <span class="" id="ic3"></span> </button> </div>
                        <?php 
                      $query = "SELECT DISTINCT(marka) FROM artikl";
                      $result = $conn->query($query);
                      $result->fetch_all(MYSQLI_ASSOC);

                      foreach($result as $row){
                        ?>
                        <div class="list-group-item checkbox bg-dark text-white">
                            <label><input type="checkbox" class="common_selector marka" value="<?php echo $row['marka'];?>"> <?php echo $row['marka']; ?></label>
                            
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-9">
                    <br>
                    <div class="row filter_data">

                    </div>
                </div>
            </div>
        
        
         
            <div class="col-md-9 pt-3">
                <div class= "row">
                <?php
                $sql = "SELECT naziv, velicina, cijena, marka, tip, id FROM artikl WHERE vrsta='??enska' AND kolekcija ='jesen'";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    $index_id = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="col-md-4 mt-3" id="artikl_'.$index_id.'">
                        <div class="container-fluid">
                        <div class="p-2 " style="background:gray;opacity: 1 ;">
                        <img src="Slike/'.$row['naziv'].'.jpg" class="img-responsive img-thumbnail" alt="image" id="pslika">
                        <div class="top-left">'.$row['tip'].'</div>
                        
                        <p class="text-center text-white"> ' . $row['naziv']. '</p>
                        <p class="text-center text-white">Veli??ina: <span id="artikl_'.$index_id.'_velicina">' .$row['velicina']. '</span></p>
                        <p class="text-center text-white">Marka: <span id="artikl_'.$index_id.'_marka">'.$row['marka'].'</span></p>
                        <p class="text-center text-white">Cijena: <span id="artikl_'.$index_id.'_cijena">' . $row['cijena']. '</span>kn</p>
                        <a class="btn btn-sm btn-warning mb-2 dodajUKosaricu" href="dodajProizvodUKosaricu.php?id='. $row['id'].'" onclick="appendId('. $row['id'] .')" ><i class="fas fa-cart-plus"></i>&nbsp;Dodaj u ko??aricu</a>
                                        
                        <a class="btn btn-info btn-sm mb-2" href="proizvod.php?id='. $row['id'] .'"><i class="fas fa-images"></i></a>
                       </div>
                        </div></div>';
                        $index_id++;
                        
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
<script src="filter.js"></script>
<footer id="includeFooter" class="bg-dim text-center text-lg-start
text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
</body>
</html>