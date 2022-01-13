<?php

include 'C:\xampp\htdocs\WebZavrsni\konekcija.php';
session_start();

$errorMsg = "";

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from korisnik where id='$id'");

$data = mysqli_fetch_array($qry);

$ime = $prezime = $email =$uloga= "";
$isFilled = true;

if(isset($_POST['uredi'])) {

    if (empty($_POST['ime'])) {
        $errorMsg .= "Ime obavezno. ";
        $isFilled = false;
    }
    else $ime = $_POST['ime'];

    if (empty($_POST['prezime'])) {
        $errorMsg .= "Prezime obavezno. ";
        $isFilled = false;
    }
    else $prezime = $_POST['prezime'];

    if (empty($_POST['email'])) {
        $errorMsg .= "Email obavezan. ";
        $isFilled = false;
    }
    else $email = $_POST['email'];

    if (empty($_POST['uloga'])) {
        $errorMsg .= "Uloga obavezna. ";
        $isFilled = false;
    }
    else $uloga = $_POST['uloga'];


    if($isFilled) {
        $sql = "update korisnik set ime='$ime', prezime='$prezime', email='$email', uloga='$uloga' where id='$data[id]'";
        if (mysqli_query($conn, $sql)) {
            header('Location: ./upravljanjeKorisnicima.php');
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
    <title>Uredi Korisnika</title>
</head>
<body class="mx-auto">
<header class="mb-5"><h1 class="text-center">Uređivanje korisnika</h1></header>
 
<main>
    <div class="container-fluid text-center ">
        <div class="row">
             <div class="col-md-9 mx-auto ">
             <form method="post" action="" class="row">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="naziv" class="form-label">Ime</label>
                                <input type="text" name="ime" class="form-control" value="<?php echo $data['ime'] ?>"autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="naziv" class="form-label">Prezime</label>
                                <input type="text" name="prezime" class="form-control" value="<?php echo $data['prezime'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="naziv" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $data['email'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="uloga" class="form-label">Uloga</label>
                                <select class="form-select" name="uloga">
                                    <option value="admin" <?php if($data['uloga']=="admin") echo 'selected="selected"'; ?>>Admin</option>
                                    <option value="korisnik" <?php if($data['uloga']=="korisnik") echo 'selected="selected"'; ?>>Korisnik</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <button type="submit" name="uredi" class="btn btn-success mx-1">Uredi</button>
                            <button type="reset" class="btn btn-warning mx-1">Očisti</button>
                            <a href="upravljanjeKorisnicima.php" class="btn btn-info mx-1">Povratak</a>
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