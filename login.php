<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);


    $host = "rogue.db.elephantsql.com";
    $user = "mffqfyag";
    $pass = "sCmWtk6dBysXWEn3IqvDDZtgvjcARlhs";
    $db = "mffqfyag";
    
    // Open a PostgreSQL connection
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to server\n");
    

    $email=$_POST["email"];
    $password=$_POST["password"];

    $q1="select band.password from band where band.mail=$1";
    $q2="select locale.password from locale where locale.mail = $1";
    $resultBand = pg_query_params($con,$q1,array($email));
    $resultLocale = pg_query_params($con,$q2,array($email));

    $lineLocale=pg_fetch_array($resultLocale,null,PGSQL_ASSOC);
    $lineBand=pg_fetch_array($resultBand,null,PGSQL_ASSOC);

    if(!pg_num_rows($resultLocale)==0){
        if(strcmp($lineLocale["password"],md5($password))){
            $qn="select locale.nome from locale where locale.mail=$1";
            $resultName = pg_query_params($con,$qn,array($email));
            $ln=pg_fetch_array($resultName,null,PGSQL_ASSOC);
            $_SESSION["username"] = $ln["nome"];
            header("location: profilo_locale.php");
        } 
        else{
            echo "<h1>Errore Password</h1>
            <a href=../login.html>clicca qui per login
            </a>";
        }
    }
    else if(!pg_num_rows($resultBand)==0){
        if(strcmp($lineBand["password"],md5($password))){
            $qn="select band.nome from band where band.mail=$1";
            $resultName = pg_query_params($con,$qn,array($email));
            $ln=pg_fetch_array($resultName,null,PGSQL_ASSOC);
            $_SESSION["username"] = $ln["nome"];
            header("location: profilo_band.php");
        }
        else{
            echo "<h1>Errore Password</h1>
            <a href=../login.html>clicca qui per login</a>";
        }
    }
    else{
        echo "<h1>Errore Username, Sicuro di essere registrato?</h1>
        <a href=../login.html>clicca qui per login</a>";
    }
    
    
    
    pg_free_result($resultBand);
    pg_free_result($resultLocale);
    pg_close($con);
?>
