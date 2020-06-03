<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Il primo sito che mette in diretto contatto artisti emergenti e locali">
    <meta name="keywords" content="bandadvisor band emergenti locali">
    <meta name="author" content="Ghenadie Artic,Marco Calamo">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/profilo/profiles.css">
    <link rel="stylesheet" href="/style/form.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                document.getElementById('leftLabel').style.height = "1rem";
                //document.getElementById('rightLabel').style.height = "3vh";
                document.getElementById('leftLabel').style.fontSize = "2rem";
                document.getElementById('leftLabel').style.paddingBottom = "7rem";
                document.getElementById('leftLabel').style.paddingTop = "3rem";
                document.getElementById('leftLabel').style.paddingLeft = "2rem";
                document.getElementById('leftLabel').style.paddingRight = "2rem";
                //document.getElementById('rightLabel').style.fontSize = "2vh";
                //document.getElementById('rightLabel').style.paddingLeft = "5%";
                document.getElementById('cntcts').style.fontSize = "1rem";
                document.getElementById('rvws').style.fontSize = "1rem";
            }
        }
    </script>
</head>
<body  onload="load()">
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
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <?php
                        if(!isset($_COOKIE["type"])){
                            header("Location: ../index.php");
                        }
                        $type=$_COOKIE["type"];
                        $gen=explode(",",$_COOKIE["genre"]);
                        echo "<div class='row justify-content-center'>";
                        
                        if($type=="band"){
                            echo  "<div class='contattato' style='height: 12.5vh;' id='leftLabel' style='font-family:Gilroy Bold'>";
                            echo      "Top 10 Locali con genere preferito {$gen[0]}";
                            if (isset($gen[1])){
                                echo $gen[1];
                            }
                            echo  "</div>";
                        }
                        else{
                            echo  "<div class='contattato' style='height: 12.5vh;' id='leftLabel' style='font-family:Gilroy Bold'>";
                            echo      "Top 10 Band con genere preferito {$gen[0]}";
                            if (isset($gen[1])){
                                echo $gen[1];
                            }
                            echo  "</div>";
                        }
                        echo "</div>";
                        echo "<div class='row justify-content-center' style='padding-bottom:20%;'>";
                        echo "<div class='col-lg-12 col-md-12'>";
                        echo "<div class='contatti' id='cntcts'>";

                        
                        include  '../config/utils.php';
                        $host = constant("DB_HOST");
                        $user = constant("DB_USER");
                        $pass = constant("DB_PASSWORD");
                        $db =   constant("DB_NAME");

                        //apro la connessione con il db postgress
                        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
                        or die ("Could not connect to server\n");
                        if (!$con){
                            echo "<h1> Impossibile connettersi</h1>";
                        }
                        
                        //Lenzerini sii fiero di me
                        $q1="select band.nome,band.mail,band.genre1,band.genre2,trunc(avg(rating),1) as media from band,recensione 
                        where recensione._to=band.nome and (band.genre1 in ($1,$2) or (band.genre2!='' and band.genre2 in ($1,$2)))
                        group by mail,nome order by media desc limit 10";
                        $q2="select locale.nome,locale.mail,locale.fav_music1,locale.fav_music2,trunc(avg(rating),1) as media from locale,recensione 
                        where recensione._to=locale.nome and (locale.fav_music1 in ($1,$2)  or (locale.fav_music2!='' and locale.fav_music2 in ($1,$2)))  
                        group by mail,nome order by media desc limit 10";

                        if($gen[1]!=null){
                            $result1=pg_query_params($con,$q1,array($gen[0],$gen[1]));
                            $result2=pg_query_params($con,$q2,array($gen[0],$gen[1]));
                        }else{
                            $result1=pg_query_params($con,$q1,array($gen[0],$gen[0]));
                            $result2=pg_query_params($con,$q2,array($gen[0],$gen[0]));
                        }
                        

                        if($type=="band"){
                            if(pg_num_rows($result2)==0){
                                echo "Nessun Risultato</br>";
                            }

                            $x=1;
                            while( $line = pg_fetch_array( $result2 ,null ,PGSQL_ASSOC) ) {
                                echo "<h2>".$x.". ";
                                $nome=getName($line["mail"]);
                                $id=getId($line["mail"]);
                                echo "<a href='/profilo/profiloEx_locale.php?id={$id}' style='font-family:Gilroy Medium'>";
                                echo $line["nome"]."</h2>"; 
                                echo '</a>';
                                echo "{$line['media']} "."<span class='fa fa-star checked'></span>";
                                echo "</br>";
                                echo "</br>";
                                $x++;
                            }
                        }
                        else{
                            if(pg_num_rows($result1)==0){
                                echo "Nessun Risultato</br>";
                            }

                            $x=1;
                            while( $line = pg_fetch_array( $result1 ,null ,PGSQL_ASSOC) ) {
                                echo "<h2>".$x.". ";
                                $nome=getName($line["mail"]);
                                $id=getId($line["mail"]);
                                echo "<a href='/profilo/profiloEx_band.php?id={$id}' style='font-family:Gilroy Medium'>";
                                echo $line["nome"]."</h2>"; 
                                echo '</a>';
                                echo "{$line['media']}"."<span class='fa fa-star checked'></span>";
                                echo "</br>";
                                echo "</br>";
                                $x++;
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    ?>   
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
