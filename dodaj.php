<?php
if (!PHP_SESSION_ACTIVE) session_start();
include_once 'C:\xampp\htdocs\WebZavrsni\konekcija.php';

$errorMsg = "";

$kolicina = $cijena = null;
$naziv = $kolekcija = $marka = $spol =$vrsta =$velicina =$tip= "";
$isFilled = true;

if (isset($_POST['spremi'])) { 
    $naziv = $_POST['naziv'];
    $kolicina = $_POST['kolicina'];
    $kolekcija= $_POST['kolekcija'];
    $marka = $_POST['marka'];
    $spol = $_POST['spol'];
    $vrsta = $_POST['vrsta'];
    $velicina = $_POST['velicina'];
    $cijena = $_POST['cijena'];
    $tip = $_POST['tip'];
    $errorMsg = "";

    if (empty($_POST['naziv'])) {
        $errorMsg .= "Naziv obavezan. ";
        $isFilled = false;
    }
    else $naziv = $_POST['naziv'];
        
    if(empty($_POST['kolicina']) or $_POST['kolicina'] <= 0) {
        $errorMsg .= "Količina mora biti veća od 0!";
        $isFilled = false;
    }
    else $kolicina = $_POST['kolicina'];

    if (empty($_POST['kolekcija'])) {
        $errorMsg .= "Kolekcija obavezna. ";
        $isFilled = false;
    }
    else $kolekcija = $_POST['kolekcija'];

    if (empty($_POST['marka'])) {
        $errorMsg .= "Marka obavezna. ";
        $isFilled = false;
    }
    else $marka = $_POST['marka'];

    if (empty($_POST['spol'])) {
        $errorMsg .= "Spol obavezan. ";
        $isFilled = false;
    }
    else $spol = $_POST['spol'];

    if (empty($_POST['vrsta'])) {
        $errorMsg .= "Vrsta obavezna. ";
        $isFilled = false;
    }
    else $vrsta = $_POST['vrsta'];

    if (empty($_POST['velicina'])) {
        $errorMsg .= "Veličina obavezna. ";
        $isFilled = false;
    }
    else $velicina = $_POST['velicina'];

    if(empty($_POST['cijena']) or $_POST['cijena'] <= 0.00) {
        $errorMsg .= "Cijena mora biti veća od 0.";
        $isFilled = false;
    }
    else $cijena = $_POST['cijena'];

    
    $tip = $_POST['tip'];

    if($isFilled) {
        $query = "INSERT INTO artikl (kolicina, naziv,kolekcija, marka, spol,vrsta,velicina,cijena,tip) VALUES ('$kolicina', '$naziv','$kolekcija', '$marka', '$spol','$vrsta','$velicina','$cijena','$tip')";
        if (mysqli_query($conn, $query)) {
            header('Location: ./upravljanjeArtiklima.php');
        } else {
            echo "Error: " . $query . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="./include.js"></script>
    <link href="./dodajUredi.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Artikl</title>
</head>

<body>
    <header class="mb-5"><h1 class="text-center">Dodavanje artikala</h1></header>
    <main>
        <div class="container-fluid mx-auto text-center">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <form method="post" action="" class="row">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="naziv" class="form-label">Naziv</label>
                                <input type="text" name="naziv" class="form-control"  placeholder="Unesite naziv" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label for="cijena" class="form-label">Cijena</label>
                                <input type="number" name="cijena" step="any" value=0.00 class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="kolicina" class="form-label">Količina</label>
                                <input type="number"  value=1 class="form-control" name="kolicina" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="marka" class="form-label">Marka</label>
                                <select class="form-select" name="marka">
                                    <option value="Nike">Nike</option>
                                    <option value="Addidas">Addidas</option>
                                    <option value="Armani">Armani</option>
                                    <option value="Balenciaga">Balenciaga</option>
                                    <option value="Gucci">Gucci</option>
                                    <option value="Karl Lagerfield">Karl Lagerfield</option>
                                    <option value="Levis">Levis</option>
                                    <option value="Louis Vuitton">Louis Vuitton</option>
                                    <option value="Prada">Prada</option>
                                    <option value="Ralph Lauren">Ralph Lauren</option>
                                    <option value="Underarmour">Underarmour</option>
                                    <option value="Versace">Versace</option>
                                    <option value="Tommy Hilfiger">Tommy Hilfiger</option>
                                    <option value="Calvin Klein">Calvin Klein</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="kolekcija" class="form-label">Kolekcija</label>
                                <select class="form-select" name="kolekcija">
                                    <option value="proljeće" >proljeće</option>
                                    <option value="ljeto">ljeto</option>
                                    <option value="jesen" selected>jesen</option>
                                    <option value="zima">zima</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="tip" class="form-label">Tip</label>
                                <select class="form-select" name="tip">
                                    <option value="NOVO" >NOVO</option>
                                    <option value="POPULARNO">POPULARNO</option>
                                    <option value="">NIŠTA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label for="vrsta" class="form-label">Vrsta</label>
                                <select class="form-select" name="vrsta">
                                    <option value="muška" >Muška roba</option>
                                    <option value="ženska">Ženska roba</option>
                                    <option value="dječja" selected>Dječja roba</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="velicina" class="form-label">Veličina</label>
                                <select class="form-select" name="velicina">
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="spol" class="form-label">Spol</label>
                                <select class="form-select" name="spol">
                                    <option value="M" >M</option>
                                    <option value="Ž">Ž</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <button type="submit" name="spremi" class="btn btn-success mx-1">Dodaj</button>
                            <button type="reset" class="btn btn-warning mx-1">Očisti</button>
                            <a href="upravljanjeArtiklima.php" class="btn btn-info mx-1">Povratak</a>
                        </div>
                        <div class="my-2">
                            <p id="errorMsg"><?php echo $errorMsg ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<footer id="includeFooter" class="bg-dim text-center text-lg-start
text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
</html>