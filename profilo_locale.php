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
                <a class="nav-link" href="#">Contatta una Band<span class="sr-only">(current)</span></a>
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
                                Band che ti hanno contattato
                            </div>
                        </div>
                        <div class="row" style="height: 10vh;"></div>
                        <div class="row" style="padding-bottom: 20%;">
                            <div class="col">
                                <img src="assets/Rectangle 11.png" style="width: 80%;height: auto;">
                                <div class="contatti">
                                    <a href="#">
                                        Band di Esempio</br>
                                    </a>
                                    <a href="#">
                                        Band di Esempio 2</br>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="row">
                            <a class="contatta" href="#">
                                Contatta una Band
                            </a>
                        </div>
                        <div class="row" style="height: 30vh;"></div>
                        <div class="row">
                            <div class="col">
                                <div class="recensioni">Le tue recensioni</div>
                                <img src="assets/Rectangle 14.png" style="width: 140%;height: auto;">
                                <div class="testi">
                                    <a href="#">
                                    Da Peppino:
                                    Fate schifo, chiudete presto!
                                    </br>
                                    </a>
                                    <a href="#">
                                        Da Peppino1:
                                        Fate schifo, vi auguro il fallimento domani1!1!
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
