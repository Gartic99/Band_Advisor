<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="/profilo/profiles.css">
    <!--<link rel="stylesheet" href="/style/common.css">-->
    <link rel="stylesheet" href="/style/form.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="/js/cookie.js"></script>
    <title>Band Advisor</title>
    <link rel="icon" href="/assets/B.png">
    <script>
        function load(){
            //true if we are on mobile
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if(isMobile){
                /*document.getElementById("leftLabel").style.height = "3vh";
                document.getElementById("leftLabel").style.fontSize = "2vh";
                document.getElementById("leftLabel").style.padding = "5%";*/

                document.getElementById("rightLabel").style.height = "3vh";
                document.getElementById("rightLabel").style.fontSize = "2vh";
                document.getElementById("rightLabel").style.paddingLeft = "5%";

                //Controlliamo se è stata inserita una recensione
                if(document.getElementById("centralLabel")){
                    document.getElementById("centralLabel").style.height = "3vh";
                    document.getElementById("centralLabel").style.fontSize = "2vh";
                    document.getElementById("centralLabel").style.paddingLeft = "5%";
                    document.getElementById("desc").style.fontSize = "2vh"
                }

                /*document.getElementById("cntcts").style.fontSize = "2vh";*/
                document.getElementById("rvws").style.fontSize = "2vh";
            

                document.getElementById("pro_pic").style.width="15vh";
                document.getElementById("pro_pic").style.height="15vh";
            }
        }
    </script>
</head>
<body onload="load()">
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="/index.php">
            <img class="img-responsive" src="/assets/BandLogo.png" style="max-width:17vw;height:auto;display:block;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/modal/recensione.html" id="modal_open">Scrivi una Recensione<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="/modal/contatta.html" id="modal_open1">Contatta il Locale<span class="sr-only">(current)</span></a>
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
            ?>
                <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick="window.location.href ='/login/login.html'">Entra</button>
                <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = "/signup/signup.html"'>Registrati</button><?php
            }
            ?> 
        </div>
    </nav>
    <section class="main">
        <div class="container">
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

                $q1="select locale.nome from locale where locale.mail=$1";
                $result=pg_query_params($con,$q1,array($_GET["mail"]));
                $nome=pg_fetch_array($result)["nome"];

                $q="SELECT img,_desc FROM img_profili WHERE mail=$1";
                $result = pg_query_params($con,$q,array($_GET["mail"])); 

                if(pg_num_rows($result)==0){
                    echo "<div class='row justify-content-center'>";
                    echo "<img src='../assets/social-media.png' width=300  id='pro_pic'>";
                    echo "</div>";
                }
                else{
                    $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC);
                    $raw = $line["img"];
                    if($raw==null){
                        echo "<div class='row justify-content-center'>";
                        echo "<img src='../assets/social-media.png' width=300px height=300px id='pro_pic'>";
                        echo "<div class='contattato' style='height: 12.5vh;' id='centralLabel'>";
                        echo "{$nome}</br>";
                        echo "</div>";
                        echo "</div>";
                    }
                    else{
                        // Convert to binary and send to the browser
                        //header('Content-type: image/jpeg');
                        $img64 = pg_unescape_bytea($raw);
                        echo "<div class='row justify-content-center'>";
                        echo "<img src='data:image/jpeg;base64, $img64' width=300px height=300px  id='pro_pic'>";
                        echo "</div>";
                        echo "<div class='contattato' style='height: 12.5vh;' id='centralLabel'>";
                        echo "{$nome}</br>";
                        echo "</div>";
                    }
                    if($line["_desc"]!=null){
                        echo "<div class='row'>";
                        echo "<div class='contattato' style='height: 12.5vh;' id='centralLabel'>";
                        echo "Descrizione di {$nome}</br>";
                        echo "</div>";
                        //echo ""
                        echo "<div class='col-lg-12 col-md-12'>";
                        
                        echo "<div id='desc'>";
                        echo $line["_desc"];
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        
                    }
                }
            ?>
            <div class="row">
            <!--<div class="col-lg-12 col-md-12"  style="padding-bottom:15%;">
                    <div class="row">
                        <div class="nome" style="height: 12.5vh;" id="leftLabel">
                            <?php
                                $mail=$_GET["mail"];
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
                                $q1="select locale.nome from locale where locale.mail=$1";
                                $result=pg_query_params($con,$q1,array($mail));
                                $ln=pg_fetch_array($result);
                                echo "Nome Locale: <br>";
                                echo $ln["nome"];
                            ?>
                        </div>
                    </div>
                </div>-->
                <!--<div class="col-lg-2 col-md-3 "></div>-->
                <div class="col-lg-12 col-md-12 ">
                <div class="row" >
                        <div class="recensioni" style="height: 12.5vh;" id="rightLabel">
                            Le recensioni
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12 col-md-12">
                            <div class="testi" id="rvws">
                                <?php
                                    $mail=$_GET["mail"];
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
                                    
                                    //TODO: leva il nome come id della rece fra
                                    //Mi prendo il nome (Di nuovo)
                                    $q2="select locale.nome from locale where locale.mail=$1";
                                    $result2=pg_query_params($con,$q2,array($mail));
                                    $ln=pg_fetch_array($result2);


                                    $q1="select recensione._from as nome,recensione.cont as cont,recensione.rating as stelle from recensione where recensione._to=$1";
                                    $result=pg_query_params($con,$q1,array($_SESSION["username"]));

                                    if(pg_num_rows($result)==0){
                                        echo "Ancora nessuna recensione per te ;(</br>";
                                    }
                                    
                                    while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                                        echo '<a href="#">';
                                        echo "<h4>{$line["nome"]}</h4> valuta:</br> {$line["stelle"]}/5 stelle </br>";
                                        echo "{$line["cont"]}";
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
    <section>
        <div id="theModal" class="modal fade text-center">
            <div class="modal-dialog">
              <div class="modal-content">
              </div>
            </div>
          </div>
    </section>
    <script>
        $('#modal_open').on('click', function(e){
            e.preventDefault();
            $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
        });
        $('#modal_open1').on('click', function(e){
            e.preventDefault();
            $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
        });
        $(document).ready(function(){
            if (getCookie("type")=="band" && document.getElementById("nav_nome")!=null){
                document.getElementById("nav_nome").setAttribute("href", "/profilo/profilo_band.php");
            }
            else if (getCookie("type")=="locale" && document.getElementById("nav_nome")!=null){
                document.getElementById("nav_nome").setAttribute("href", "/profilo/profilo_locale.php");
            }
        });
    </script>
</body>
</html>