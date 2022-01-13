<?php
include_once 'C:\xampp\htdocs\WebZavrsni\konekcija.php';
$msg = 'Unesite vaše podatke.';

session_start();
$_SESSION['email'] = "";
$_SESSION['id'] = null;

if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['lozinka'])) {
    $sql = "SELECT * FROM korisnik";
    $q = mysqli_query($conn, $sql);

    while ($line = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
        if ($_POST['email'] == $line['email'] && $_POST['lozinka'] == $line['lozinka']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['role'] = $line['uloga'];
            $_SESSION['ime'] = $line['ime'];
            $_SESSION['id'] = $line['id'];
               
            header('Location: ./site.php');    
        }
        else {
            $msg = 'Uneseni podaci su krivi.';
        }
    }
}
if(!empty($_POST["remember"])) {
	setcookie ("email",$_POST["email"],time()+ 3600);
	setcookie ("lozinka",$_POST["lozinka"],time()+ 3600);
	echo "Cookies Set Successfuly";
} else {
	setcookie("email","");
	setcookie("lozinka","");
	echo "Cookies Not Set";
}

 
  
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
      data-auto-a11y="true"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="./site.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./include.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://kit.fontawesome.com/ac547be68c.js" crossorigin="anonymous"></script>
        
</head>
<body>
    <header id="includeHeader"></header>
    <main>
        <form action="" method="post">
        <div class="container-fluid mx-auto my-5" >
    
            
              <div class="container-fluid py-5 h-100">
              <div
                class="row d-flex justify-content-center align-items-center h-100"
              >
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem">
                    <div class="card-body p-5 text-center">
                      <div class="mb-md-5 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Prijava</h2><br>
    
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typeEmailX"><b>Email</b></label>
                            <input
                            type="email"
                            id="typeEmailX"
                            class="form-control form-control-lg"
                            placeholder="Ovdje unesite vaš email!"
                            name="email" />
                          
                        </div>
    
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typePasswordX"
                            ><b>Lozinka</b></label>
                            <input
                            type="password"
                            id="typePasswordX"
                            class="form-control form-control-lg"
                          placeholder="Ovdje unesite vašu lozinku!"  
                          name="lozinka"/>
                          
                          
                        </div> 
                        <div class="form-check d-flex justify-content-center mb-5">
                      <input
                        class="form-check-input me-2"
                        type="checkbox"
                        value=""
                        id="form2Example3c"
                        name="remember"
                      />
                      <label class="form-check-label" for="form2Example3">
                        Zapamti me.
                      </label>
                    </div>   
                        <button
                          class="btn btn-outline-light btn-lg px-5"
                          type="submit"
                          name="login"
                        >
                          Prijavi se
                        </button>
                        <br>
                        <p>
                          <?php
                          echo $msg;
                          ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </form>
    </main>


    <footer id="includeFooter" class="bg-dim text-center text-lg-start
    text-white fixed"style="background-color: rgba(0, 0, 0, 0.2)">
    </footer>
</body>
</html>