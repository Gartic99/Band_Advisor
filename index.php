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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="form.css">
    <link rel="icon" href="assets/B.png">
    <title>Band Advisor</title>
    <script>
        function load(){
            //true if we are on mobile
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if(isMobile){
                document.getElementById("searchRow").style.height = "5vh";
            }
        }
    </script>
</head>
<body onload="return load();">
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
                <a class="nav-link" href="recensione.html" id="modal_open">Scrivi una Recensione<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <?php  
            if (isset($_SESSION[ "username"])) {
                /*
                //Disabilitato finché non facciamo logout
                echo "<a class='nav-link' href='#'>";
                echo  $_SESSION['username'];
                echo "<span class='sr-only'>(current)</span></a>";*/
            }
            else{
               /*echo ("<button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = login.html'>Entra</button>");
               echo ("<button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = signup.html'>Registrati</button>");*/
            }
            ?> 
            <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick="window.location.href ='login.html'">Entra</button>
            <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = "signup.html"'>Registrati</button>
        </div>
    </nav>


    <section class="main" >
        <div class="container">
            <div class="row" style="height: 25vh;">
            </div>
            <div class="row justify-content-center">   
                <form class="search-form col-7" action="search.php" id="search1" method="POST">
                    <div class="row" style="height:8vh;" id="searchRow">
                        <input type="image" src="assets/tools-and-utensils.svg" class="search-button" onclick="validateSearch() ">
                        <input type="text" value="" placeholder="Cosa stai cercando?" class="search-input" name="search"><br>
                    </div>
                </form>
            </div>
            <!--<div class="row justify-content-center border">
                <form action="">
                    <div class="form-row border">
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                        <div class="col-10">
                            <input type="text"value="" placeholder="Cosa stai cercando?" class="search2">
                        </div>
                    </div>
                </form>
            </div>-->
            <div class="row" style="height: 6vh;"></div>
            <div class="row justify-content-center">
                <div class="Option_bar">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-5 col-sm-5" id="rec">
                                
                                    <button class="btn btn-sq-lg" id="band_button" onclick="window.location.href ='button.php?type=band'">
                                        <img src="assets/Icons/electric-guitar.png" style="height: auto; width: 100%; padding:1%;"><br/>
                                        Band </br>
                                    </button>
                                    <!--<a href="#" class="btn btn-sq-lg">
                                        <img src="assets/Icons/microphone.png" style="height: auto; width: 100%; padding:1%;"><br/>
                                        Cantanti </br>
                                    </a>-->
                                    <button  class="btn btn-sq-lg" id="locale button" onclick="window.location.href ='button.php?type=locale'">
                                        <img src="assets/Icons/speaker.png" style="height: auto; width: 100%; padding:1%;"><br/>
                                            Locali  </br> 
                                    </button>
                                
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
    </script>
    <script>
        function validateSearch(){
        $(document).ready(function(){
            $('#search1').submit();
            }); 
        }
    </script>
</body>

