<?php

include 'C:\xampp\htdocs\WebZavrsni\konekcija.php';
session_start();

$errorMsg = "";

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from artikl where id='$id'");

$data = mysqli_fetch_array($qry);

$kolicina = $cijena = null;
$naziv = $kolekcija = $marka = $spol =$vrsta =$velicina =$tip= "";
$isFilled = true;

if(isset($_POST['uredi'])) {

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
        $sql = "update artikl set naziv='$naziv', kolicina='$kolicina', kolekcija='$kolekcija', marka='$marka',spol='$spol',vrsta='$vrsta',velicina='$velicina' ,cijena='$cijena',tip='$tip' where id='$data[id]'";
        if (mysqli_query($conn, $sql)) {
            header('Location: ./upravljanjeArtiklima.php');
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
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
    <title>Uredi Artikl</title>
</head>
<body class="mx-auto">
<header class="mb-5"><h1 class="text-center">Uređivanje artikala</h1></header>
 
<main>
    <div class="container-fluid text-center ">
        <div class="row">
             <div class="col-md-9 mx-auto ">
             <form method="post" action="" class="row">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="naziv" class="form-label">Naziv</label>
                                <input type="text" name="naziv" class="form-control" value="<?php echo $data['naziv'] ?>"autofocus>
                            </div>
                            <div class="col-md-3">
                                <label for="cijena" class="form-label">Cijena</label>
                                <input type="number" name="cijena" step="any" value="<?php echo $data['cijena'] ?>" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="kolicina" class="form-label">Količina</label>
                                <input type="number"  value="<?php echo $data['kolicina'] ?>" class="form-control" name="kolicina" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="marka" class="form-label">Marka</label>
                                <select class="form-select" name="marka">
                                    <option value="Nike" <?php if($data['marka']=="Nike") echo 'selected="selected"'; ?>>Nike</option>
                                    <option value="Addidas" <?php if($data['marka']=="Addidas") echo 'selected="selected"'; ?>>Addidas</option>
                                    <option value="Armani" <?php if($data['marka']=="Armani") echo 'selected="selected"'; ?>>Armani</option>
                                    <option value="Balenciaga" <?php if($data['marka']=="Balenciaga") echo 'selected="selected"'; ?>>Balenciaga</option>
                                    <option value="Calvin Klein" <?php if($data['marka']=="Calvin Klein") echo 'selected="selected"'; ?>>Calvin Klein</option>
                                    <option value="Gucci" <?php if($data['marka']=="Gucci") echo 'selected="selected"'; ?>>Gucci</option>
                                    <option value="Puma" <?php if($data['marka']=="Puma") echo 'selected="selected"'; ?>>Puma</option>
                                    <option value="Prada" <?php if($data['marka']=="Prada") echo 'selected="selected"'; ?>>Prada</option>
                                    <option value="Levis" <?php if($data['marka']=="Levis") echo 'selected="selected"'; ?>>Levis</option>
                                    <option value="Karl Lagerfeld" <?php if($data['marka']=="Karl Lagerfeld") echo 'selected="selected"'; ?>>Karl Lagerfeld</option>
                                    <option value="Ralph Lauren" <?php if($data['marka']=="Ralph Lauren") echo 'selected="selected"'; ?>>Ralph Lauren</option>
                                    <option value="Tommy Hilfiger" <?php if($data['marka']=="Tommy Hilfiger") echo 'selected="selected"'; ?>>Tommy Hilfiger</option>
                                    <option value="Levis" <?php if($data['marka']=="Levis") echo 'selected="selected"'; ?>>Underarmour</option>
                                    <option value="Versace" <?php if($data['marka']=="Versace") echo 'selected="selected"'; ?>>Versace</option>                                    
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="kolekcija" class="form-label">Kolekcija</label>
                                <select class="form-select" name="kolekcija">
                                    <option value="proljeće" <?php if($data['kolekcija']=="proljeće") echo 'selected="selected"'; ?>>proljeće</option>
                                    <option value="ljeto" <?php if($data['kolekcija']=="ljeto") echo 'selected="selected"'; ?>>ljeto</option>
                                    <option value="jesen" <?php if($data['kolekcija']=="jesen") echo 'selected="selected"'; ?> >jesen</option>
                                    <option value="zima" <?php if($data['kolekcija']=="zima") echo 'selected="selected"'; ?>>zima</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="tip" class="form-label">Tip</label>
                                <select class="form-select" name="tip">
                                    <option value="NOVO" <?php if($data['tip']=="NOVO") echo 'selected="selected"'; ?>>NOVO</option>
                                    <option value="POPULARNO"<?php if($data['tip']=="POPULARNO") echo 'selected="selected"'; ?>>POPULARNO</option>
                                    <option value="" <?php if($data['tip']=="") echo 'selected="selected"'; ?>>NIŠTA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label for="vrsta" class="form-label">Vrsta</label>
                                <select class="form-select" name="vrsta">
                                    <option value="muška" <?php if($data['vrsta']=="muška") echo 'selected="selected"'; ?> >Muška roba</option>
                                    <option value="ženska" <?php if($data['vrsta']=="ženksa") echo 'selected="selected"'; ?>>Ženska roba</option>
                                    <option value="dječja" <?php if($data['vrsta']=="dječja") echo 'selected="selected"'; ?>>Dječja roba</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="velicina" class="form-label">Veličina</label>
                                <select class="form-select" name="velicina">
                                    <option value="XS" <?php if($data['velicina']=="XS") echo 'selected="selected"'; ?>>XS</option>
                                    <option value="S" <?php if($data['velicina']=="S") echo 'selected="selected"'; ?>>S</option>
                                    <option value="M" <?php if($data['velicina']=="M") echo 'selected="selected"'; ?>>M</option>
                                    <option value="L" <?php if($data['velicina']=="L") echo 'selected="selected"'; ?>>L</option>
                                    <option value="XL"<?php if($data['velicina']=="XL") echo 'selected="selected"'; ?>>XL</option>
                                    <option value="XXL" <?php if($data['velicina']=="XXL") echo 'selected="selected"'; ?>>XXL</option>
                                    <option value="XXXL" <?php if($data['velicina']=="XXXL") echo 'selected="selected"'; ?>>XXXL</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="spol" class="form-label">Spol</label>
                                <select class="form-select" name="spol">
                                    <option value="M" <?php if($data['spol']=="M") echo 'selected="selected"'; ?>>M</option>
                                    <option value="Ž"<?php if($data['spol']=="Ž") echo 'selected="selected"'; ?>>Ž</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <button type="submit" name="uredi" class="btn btn-success mx-1">Uredi</button>
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
<footer id="includeFooter" class="bg-dim text-center text-lg-start
text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
</body>
</html>