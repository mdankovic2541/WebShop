<?php

include_once 'C:\xampp\htdocs\WebZavrsni\konekcija.php';
session_start();
    if ($_SESSION['role'] != "admin"){
        header('Location: ./site.php'); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDShop</title>
    <link rel="stylesheet" href="./site.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="./include.js"></script>
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
                <div class="mx-auto p-5 my-5"style="background-color:darkgrey;">
                
                <div class="table-responsive">
                <table class="table table-striped" id="tablica" style="max-height: 100px; height:100%;">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Email</th>
                            <th scope="col">Uloga</th>
                            <th schpe="col">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $sql = "SELECT * FROM korisnik";
                        $q = mysqli_query($conn, $sql);

                        while($line = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
                            echo '
                                    <tr>
                                        <td >' . $line['id'] .'</td>
                                            <td>'. $line['ime'] . '</td>
                                            <td>'. $line['prezime'] .'</td>
                                            <td>'. $line['email'] .'</td>
                                            <td>'. $line['uloga'] .'</td>
                                                                                        
                                            <td>
                                                <a class="btn btn-warning btn-sm" href="urediKorisnika.php?id=' . $line['id'] .'">Uredi</a>
                                                <a class="btn btn-danger btn-sm" href="deleteKorisnika.php?id=' . $line['id'] . '">Obriši</a>
                                            </td>
                                    </tr>';
                        }

                    echo' </tbody> </table></div>';
                            $conn->close();
                            ?>

                        
                </div>
          </div>
      </div>
</main> 
<script>
$(document).ready(function() {
    $('#tablica').DataTable();
} );
</script>
<footer id="includeFooter" class="bg-dim text-center text-lg-start
text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
</body>
</html>