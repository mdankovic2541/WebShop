<?php
include_once 'C:\xampp\htdocs\WebZavrsni\konekcija.php';

if(isset($_POST['action'])){
    $query = "SELECT * FROM artikl WHERE status = '1'";


    if(isset($_POST['minimum_price'],$_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])){
        $query .= "AND cijena BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST['maximum_price']."'";
    }
    if(isset($_POST['marka'])){
        $brand_filter = implode("','",$_POST['marka']);
        $query .= "AND marka IN('".$brand_filter."')";
    }
    if(isset($_POST['velicina'])){
        $size_filter = implode("','",$_POST['velicina']);
        $query .= "AND velicina IN('".$size_filter."')";
    }

    $result = $conn->query($query);
    $result->fetch_all(MYSQLI_ASSOC);;
    $total_row=$result->rowCount();
    if($total_row > 0){
        foreach($result as $row){
            $output .= 
            '<div class="col-md-4 mt-3">
                <div class="container-fluid">
                    <div class="p-2 " style="background:gray;opacity: 1 ;">
                        <img src="Slike/'.$row['naziv'].'.jpg" class="img-responsive img-thumbnail" alt="image" id="pslika">
                            <div class="top-left">'.$row['tip'].'</div>
            
                         <p class="text-center text-white"> ' . $row['naziv']. '</p>
                        <p class="text-center text-white">Veličina: ' .$row['velicina']. '</p>
                        <p class="text-center text-white">Marka: '.$row['marka']. '</p>
                        <p class="text-center text-white">Cijena: ' . $row['cijena']. 'kn</p>
                        <a class="btn btn-sm btn-warning mb-2 dodajUKosaricu" href="dodajProizvodUKosaricu.php?id='. $row['id'].'" onclick="appendId('. $row['id'] .')" ><i class="fas fa-cart-plus">&nbsp;Dodaj u košaricu</i></a>
                            
                        <a class="btn btn-info btn-sm mb-2" href="proizvod.php?id='. $row['id'] .'"><i class="fas fa-images"></i></a>
                    </div>
                </div>
            </div>';
        }
    }
    else{
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;

}

?>