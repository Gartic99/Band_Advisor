<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="profiles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="cookie.js"></script>
    <title>Band Advisor</title>
    <link rel="icon" href="assets/B.png">
    <script>
        function load(){
            //true if we are on mobile
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if(isMobile){
                document.getElementById("leftLabel").style.height = "3vh";
                document.getElementById("rightLabel").style.height = "3vh";
                document.getElementById("leftLabel").style.fontSize = "2vh";
                document.getElementById("leftLabel").style.padding = "5%";
                document.getElementById("rightLabel").style.fontSize = "2vh";
                document.getElementById("rightLabel").style.paddingLeft = "5%";
                document.getElementById("cntcts").style.fontSize = "2vh";
                document.getElementById("rvws").style.fontSize = "2vh";
            }
        }
    </script>
</head>
<body onload="load()">
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="index.php">
            <img class="img-responsive" src="assets/BandLogo.png" style="max-width:17vw;height:auto;display:block;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
                <a class="nav-link" href="#">Scrivi una Recensione<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <?php  
            if (isset($_COOKIE["username"])) {

                //Disabilitato finché non facciamo logout
                echo "<a class='nav-link' href='#' id ='nav_nome'>";
                echo htmlspecialchars($_COOKIE["username"]);
                echo "<span class='sr-only'>(current)</span></a>";
                echo "<button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='logout()'>Logout</button>";
            }
            else{
               echo ("<button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = login.php'>Entra</button>");
               echo ("<button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = signup.php'>Registrati</button>");
            }
            ?> 
        </div>
    </nav>
    <section class="main">
        <div class="container">
            <div class="row">
            <div class="col-lg-5 col-md-11">
                <div class="row">
                    <div class="contattato" style="height: 12.5vh;" id="leftLabel">
                        Band
                    </div>
                </div>
                <div class="row" style="padding-bottom:20%;">
                    <div class="col-lg-12 col-md-12">
                        <div class="contatti" id="cntcts">
                        <?php
                                $host = "database-1.csh3ixzgt0vm.eu-west-3.rds.amazonaws.com";
                                $user = "postgres";
                                $pass = "Quindicimaggio_20";
                                $db = "postgres";

                                //apro la connessione con il db postgress
                                $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
                                or die ("Could not connect to server\n");
                                if (!$con){
                                    echo "<h1> Impossibile connettersi</h1>";
                                }
                                
                                $name=strtolower($_POST["search"]);
                                $q1="SELECT band.nome,band.mail FROM band WHERE band.nome LIKE '%".$name."%'";
                                $result=pg_query($con,$q1);
                                
                                if(pg_num_rows($result)==0){
                                    echo "Nessun Risultato</br>";
                                }

                                while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                                    echo "<a href='profiloEx_band.php?mail={$line["mail"]}'>";
                                    echo $line["nome"];
                                    echo '</br>';
                                    echo '</a>';
                                    echo "</br>";
                                }
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3"></div>
            <div class="col-lg-4 col-md-12">
                    <div class="row">
                        <div class="recensioni" id="rightLabel" style="height: 12.5vh;">
                            Locali
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="testi" id="rvws">
                                <?php
                                    $host = "database-1.csh3ixzgt0vm.eu-west-3.rds.amazonaws.com";
                                    $user = "postgres";
                                    $pass = "Quindicimaggio_20";
                                    $db = "postgres";

                                    //apro la connessione con il db postgress
                                    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
                                    or die ("Could not connect to server\n");
                                    if (!$con){
                                        echo "<h1> Impossibile connettersi</h1>";
                                    }
                                    
                                    $name=strtolower($_POST["search"]);
                                    $q1="SELECT locale.nome,locale.mail FROM locale WHERE locale.nome LIKE '%".$name."%'";
                                    $result=pg_query($con,$q1);

                                    if(pg_num_rows($result)==0){
                                        echo "Nessun Risultato</br>";
                                    }
                                    
                                    while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                                        echo "<a href='profiloEx_locale.php?mail={$line["mail"]}'>";
                                        echo $line["nome"];
                                        echo '</br>';
                                        echo '</a>';
                                        echo "</br>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
