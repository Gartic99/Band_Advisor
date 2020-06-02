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
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>

    <!-- Google Index Verification -->
    <meta name="google-site-verification" content="aqksowhR4CMGpoNHD1zI-vqWzeK1CmZOEbbNfTgYAGc" />
      
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <script src="/js/cookie.js"></script>


    <link rel="stylesheet" href="/style/common.css">
    <link rel="stylesheet" href="/style/index.css">
    <link rel="stylesheet" href="/style/form.css">
    <link rel="icon" href="/assets/B.jpg">
    <title>Band Advisor</title>
    <script>
        //@ sourceURL = your_injected_file.js
        function load(){
            //true if we are on mobile
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if(isMobile){
               // const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
               // const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
                document.getElementById("searchRow").style.height = "2.5rem";
                document.getElementById("searchtext").style.fontSize = "3vw";
            }
        }
    </script>
</head>
<body onload="return load();">
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="/index.php">
            <img class="img-responsive" src="/assets/BandLogo.png" alt="Il nostro logo" style="max-width:17vw;height:auto;display:block;">
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
                echo "<button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='logout()' id='logout'>Logout</button>";
            }
            else{
            ?>
                <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick="window.location.href ='/login/login.html'">Entra</button>
                <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = "/signup/signup.html"'>Registrati</button><?php
            }
            ?> 
            <!--<button type='button' class='btn btn-danger mr-sm-2 entra'  onclick="window.location.href ='/login/login.html'">Entra</button>
            <button type='button' class='btn btn-danger mr-sm-2 entra'  onclick='window.location.href = "/signup/signup.html"'>Registrati</button>-->
        </div>
    </nav>


    <section class="main" >
        <div class="container">
            <div class="row" style="height: 25vh;">
            </div>
            <div class="row justify-content-center search-box">   
                <form class="search-form col-8" action="/main/search.php" id="search1" method="GEt">
                    <div class="row" style="height:8vh;" id="searchRow">
                        <input type="image" src="/assets/tools-and-utensils.svg" alt="Bottone Ricerca" class="search-button" onclick="validateSearch()" id="lens">
                        <input type="text" value="" placeholder="Cosa stai cercando?" class="search-input" name="search" id="searchtext"><br>
                    </div>
                </form>

            </div>
            <div class="row">
               
            </div>
            <div class="row" style="height: 6vh;"></div>
            <div class="row justify-content-center">
                <div class="Option_bar">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-12 col-sm-12" id="rec">
                                <button class="btn btn-sq-lg" id="band_button" onclick="window.location.href ='/main/button.php?type=band'">
                                    <img src="/assets/Icons/electric-guitar.png" alt="Bottone Band" style="height: auto; width: 100%; padding:1%;"><br/>
                                    Band </br>
                                </button>
                                <!--<a href="#" class="btn btn-sq-lg">
                                    <img src="/assets/Icons/microphone.png" style="height: auto; width: 100%; padding:1%;"><br/>
                                    Cantanti </br>
                                </a>-->
                                <button  class="btn btn-sq-lg" id="locale button" onclick="window.location.href ='/main/button.php?type=locale'">
                                    <img src="/assets/Icons/speaker.png"  alt="Bottone Locale" style="height: auto; width: 100%; padding:1%;"><br/>
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
        $(document).ready(function(){
            if (getCookie("type")=="band" && document.getElementById("nav_nome")!=null){
                document.getElementById("nav_nome").setAttribute("href", "/profilo/profilo_band.php");
            }
            else if (getCookie("type")=="locale" && document.getElementById("nav_nome")!=null){
                document.getElementById("nav_nome").setAttribute("href", "/profilo/profilo_locale.php");
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("/modal/livesearch.php", {term: inputVal}).done(function(data){
                        //alert(data);
                        $(".result").html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });
            // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
    <script>
       $(document).ready(function () {
            'use strict';

            var orientationChange = function () {
            var $element = $('#search_1');
            $element.css('height', '100vh'); // Change this to your own original vh value.
            $element.css('height', $element.height() + 'px');
            };

            var s = screen;
            var o = s.orientation || s.msOrientation || s.mozOrientation;
            o.addEventListener('change', function () {
            setTimeout(function () {
                orientationChange();
            }, 250);
            }, false);
            orientationChange();
        });
    </script>
    <!-- Necessary Files -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

