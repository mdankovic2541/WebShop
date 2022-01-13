<?php

session_start();


?>

<head>
    <script>

         $(document).ready(function(){
             if(!localStorage.getItem('artikli')) $('.kosarica span').text(0);
             else $('.kosarica span').text(parseInt(localStorage.getItem('artikli')));            
            })
    </script>
</head>
<nav class="navbar navbar fixed-top navbar-expand-sm navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="./site.php">MDShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./site.php">Početna</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Ženska odjeća
                        </a>

                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item text-white" href="./zenskarobaproljece.php">Proljetna</a></li>
                            <li><a class="dropdown-item text-white" href="./zenskarobaljeto.php">Ljetna</a></li>
                            <li><a class="dropdown-item text-white" href="./zenskarobajesen.php">Jesenska</a></li>
                            <li><a class="dropdown-item text-white" href="./zenskarobazima.php">Zimska</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Muška odjeća
                        </a>

                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">                            
                        <li><a class="dropdown-item text-white" href="./muskarobaproljece.php">Proljetna</a></li>
                            <li><a class="dropdown-item text-white" href="./muskarobaljeto.php">Ljetna</a></li>
                            <li><a class="dropdown-item text-white" href="./muskarobajesen.php">Jesenska</a></li>
                            <li><a class="dropdown-item text-white" href="./muskarobazima.php">Zimska</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Dječja odjeća
                        </a>

                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item text-white" href="./djecjarobaproljece.php">Proljetna</a></li>
                            <li><a class="dropdown-item text-white" href="./djecjarobaljeto.php">Ljetna</a></li>
                            <li><a class="dropdown-item text-white" href="./djecjarobajesen.php">Jesenska</a></li>
                            <li><a class="dropdown-item text-white" href="./djecjarobazima.php">Zimska</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                  <?php
                    if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])  == true) {
                        echo '
                        <div class="navbar-nav ms-auto">
                  <div class="nav-item dropdown dropstart">
                    <a
                      class="nav-link dropdown-toggle py-1"
                      href="#"
                      id="login_dropdown"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      >';
                      if(($_SESSION['role']) == 'admin') echo'
                      <i class="fas fa-user-circle" style="color:#ff3333;">'.' '.$_SESSION['ime'].'</i></a>';
                      else{
                        echo'
                        <i class="fas fa-user-circle">'.' '.$_SESSION['ime'].'</i></a>';
                      }
                      echo '
                    <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <a class="dropdown-item kosarica" href="./kosarica.php"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Košarica&nbsp;&nbsp;<span id="kosaricaBroj" hidden>0</span></a>';
                   if(($_SESSION['role']) == 'admin'){echo '
                   <a class="dropdown-item" href="./upravljanjeArtiklima.php"><i class="fas fa-warehouse"></i>&nbsp;&nbsp;Upravljanje artiklima</a>';
                   echo '
                   <a class="dropdown-item" href="./upravljanjeKorisnicima.php"><i class="fas fa-users-cog"></i>&nbsp;&nbsp;Upravljanje korisnicima</a>';
                    
                   }        
                  echo'
                  <a class="dropdown-item" href="./odjava.php"><i class="fas fa-sign-out-alt">&nbsp;&nbsp;Odjava</i></a>
                  </div>

                            '; 
                        }
                            
                        else {
                                                echo '
                        <li class="nav-item">
                        ';if(empty($_SESSION['cart'])){
                         echo '<a class="nav-link kosarica" href="./kosarica.php"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Košarica&nbsp;&nbsp;</a>
                         ';}
                         else {echo '<a class="nav-link kosarica" href="./kosarica.php"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Košarica&nbsp;&nbsp;</a>';}
                         echo'
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./prijava.php" target="blank"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Prijava</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./registracija.php" target="blank"><i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Registracija</a>
                        </li>';  
                        }?>
            </div>
        </div>
    </div>
</nav>

                    <!--    <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#"  target="blank">
                            <i class="fa fa-user"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./odjava.php" target="blank">Odjava</a>
                        </li> 
                    -->
                       