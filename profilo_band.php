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
    <title>Band Advisor</title>
    <link rel="icon" href="assets/B.png">
    <script>
        function load(){
            //true if we are on mobile
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if(isMobile){
                document.getElementById("RowR").style.height = "3vh";
                document.getElementById("RowP").style.height = "3vh";
                document.getElementById("RowR").style.fontSize = "2vh";
                document.getElementById("rece").style.fontSize = "2vh";
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
            <li>
                <a class="nav-link" href="#">Contatta un Locale<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <a class="nav-link" href="#"> <?php  if (isset($_SESSION[ "username"])) {echo htmlspecialchars($_SESSION["username"]);}?> <span class="sr-only">(current)</span></a>
          <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = signup.html'>Logout</button>
        </div>
    </nav>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-11 ">
                    <div class="row">
                        <div class="contattato" style="height: 12.5vh;" id="RowR">
                            Locali che ti hanno contattato
                        </div>
                    </div>
                    <div class="row " style="padding-bottom:25%;">
                        <div class="col-lg-12 col-md-12">
                            <div class="contatti" id="cntcts">
                                <a href="#">
                                    Locali di Esempio</br>
                                </a>
                                <a href="#">
                                    Locali di Esempio 2</br>
                                </a>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-2 col-md-3 "></div>
                <div class="col-lg-4 col-md-11">
                    <div class="row" style="height: 12.5vh;" id="RowP">
                        <div class="recensioni" id="rece">Le tue recensioni</div>
                    </div>
                    <div class="row ">
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

                                    $q1="select cont from recensione";
                                    $result=pg_query($con,$q1);
                                    
                                    while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                                        echo '<a href="#">';
                                        foreach( $line as $colvalue) {
                                            echo $colvalue ;
                                        }
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
