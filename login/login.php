<?php

    session_start();

    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);


    /*$host = "rogue.db.elephantsql.com";
    $user = "mffqfyag";
    $pass = "sCmWtk6dBysXWEn3IqvDDZtgvjcARlhs";
    $db = "mffqfyag"; old db*/

    
    include  '../config/config.php';
    $host = constant("DB_HOST");
    $user = constant("DB_USER");
    $pass = constant("DB_PASSWORD");
    $db =   constant("DB_NAME");
    // Apro la connesione con il db Postgres
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to server\n");
    

    
    $email=trim(strtolower($_POST["email"]));
    $password=$_POST["password"];
    //ricerco la password nel db corrispondente alla email
    $q1="select band.password from band where band.mail=$1 and password=$2";
    $q2="select locale.password from locale where locale.mail = $1 and password=$2";
    $resultBand = pg_query_params($con,$q1,array($email,md5($password)));
    $resultLocale = pg_query_params($con,$q2,array($email,md5($password)));

    $lineLocale=pg_fetch_array($resultLocale,null,PGSQL_ASSOC);
    $lineBand=pg_fetch_array($resultBand,null,PGSQL_ASSOC);
    //verifico che ci siano dei risultati per il locale
    if(!pg_num_rows($resultLocale)==0){
        /*echo $lineLocale['password'];
        echo md5($password);
        if(strcmp($lineLocale["password"],md5($password))==0){ //verifico che la password corrisponda con quella inserita
            $qn="select locale.nome from locale where locale.mail=$1";
            $resultName = pg_query_params($con,$qn,array($email));
            $ln=pg_fetch_array($resultName,null,PGSQL_ASSOC);
            $_SESSION["username"] = $ln["nome"];
            header("location: /profilo/profilo_locale.php"); //carico il profilo dell'utente
        } 
        else{
            echo "<h1>Errore Password</h1>
            <a href=../login/login.html>clicca qui per login
            </a>";
        }*/
        $qn="select locale.nome,locale.mail,locale.fav_music1 as genre1,locale.fav_music2 as genre2 from locale where locale.mail=$1";
        $resultName = pg_query_params($con,$qn,array($email));
        $ln=pg_fetch_array($resultName,null,PGSQL_ASSOC);
        $_SESSION["username"] = $ln["nome"];
        setcookie("username", $ln["nome"], time() + (86400), "/");
        $_SESSION["mail"] = $ln["mail"];
        setcookie("mail", $ln["mail"], time() + (86400), "/");
        $_SESSION["type"]="locale";
        setcookie("type", "locale", time() + (86400), "/");
        $_SESSION["genre"]=$ln["genre1"].",".$ln["genre2"];
        setcookie("genre", $ln["genre1"].",".$ln["genre2"], time() + (86400), "/");
        
        echo "<script> window.location.href = '/profilo/profilo_locale.php'</script>"; //carico il profilo dell'utente
        die();

        

    }
    //verifico che ci siano dei risultati per la band
    else if(!pg_num_rows($resultBand)==0){
        /*if(strcmp($lineBand["password"],md5($password)==0)){ //verifico che la password corrisponda con quella inserita
            $qn="select band.nome from band where band.mail=$1";
            $resultName = pg_query_params($con,$qn,array($email));
            $ln=pg_fetch_array($resultName,null,PGSQL_ASSOC);
            $_SESSION["username"] = $ln["nome"];
            header("location: /profilo/profilo_band.php"); //carico il profilo dell'utente
        }
        else{
            echo "<h1>Errore Password</h1>
            <a href=../login/login.html>clicca qui per login</a>";
        }*/
        $qn="select band.nome,band.mail,band.genre1,band.genre2 from band where band.mail=$1";
        $resultName = pg_query_params($con,$qn,array($email));
        $ln=pg_fetch_array($resultName,null,PGSQL_ASSOC);
        $_SESSION["username"] = $ln["nome"];
        setcookie("username", $ln["nome"], time() + (86400), "/");
        $_SESSION["mail"] = $ln["mail"];
        setcookie("mail", $ln["mail"], time() + (86400), "/");
        $_SESSION["band"] = "band";
        setcookie("type", "band", time() + (86400), "/");
        $_SESSION["genre"]==$ln["genre1"].",".$ln["genre2"];
        setcookie("genre",$ln["genre1"], time() + (86400), "/");
        echo "<script> window.location.href = '/profilo/profilo_band.php'</script>"; //carico il profilo dell'utente

    }
    else{
        echo "<h1>Errore Username o Password</h1>
        <a href=../login/login.html>clicca qui per login</a>";
    }
    
    
    //libero la memoria e chiudo la connessione
    pg_free_result($resultBand);
    pg_free_result($resultLocale);
    pg_close($con);
?>
