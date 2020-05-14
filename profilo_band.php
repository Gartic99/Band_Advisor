<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="profili.css">
    <title>Band Advisor</title>
    <link rel="icon" href="assets/B.png">
</head>
<body>
    <section class="header fixed-top">
        <div class="container">
            <div class="row " style="height: 5vh;"></div>
            <div class="row" style="height: 10vh;">
                <div class="col-3 col-md-4 "></div>
                <div class="col-6 col-md-4">
                    <embed src="assets/BandLogo.svg" onclick="window.location.href = 'index.html' " style="width: 100%;height: auto;">
                </div>
                <div class="col-3 col-md-4">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-7 col-md-3">
                            <div id="nome"><br> <?php echo htmlspecialchars($_SESSION["username"]); ?> </br></div>
                        </div>
                        <div class="col-10 col-md-5">
                            <img id="fotoprofilo"  src="assets/social-media.svg" style="width: 50%;height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        <div class="row">
                            <a class="contatta" href="#">
                                Contatta un Locale
                            </a>
                        </div>
                        <div class="row" style="height: 30vh;"></div>
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