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
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="index.html">
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
        </div>
    </nav>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="container">
                        <div class="row">
                            <div class="contattato">
                                Locali che ti hanno contattato
                            </div>
                        </div>
                        <div class="row" style="height: 10vh;"></div>
                        <div class="row" style="padding-bottom: 20%;">
                            <div class="col" id="cntcts">
                                <img src="assets/Rectangle 11.png" style="width: 80%;height: auto;">
                                <div class="contatti">
                                    <a href="#">
                                        Locale di Esempio</br>
                                    </a>
                                    <a href="#">
                                        Locale di Esempio 2</br>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="row" style="height: 10vh;"></div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="recensioni">Le tue recensioni</div>
                                <img src="assets/Rectangle 14.png" style="width: 140%;height: auto;">
                                <div class="testi" id="rvws">
                                    <a href="#">
                                    Da Giuseppe69420:
                                    Fate schifo, andate a casa!
                                    </br>
                                    </a>
                                    <a href="#">
                                        Da Giuseppe69421:
                                        Fate schifo, andate a casa1!1!
                                        </br>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
