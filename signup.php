<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);


    /*if (!(isset($_POST['b_registrationButton']))&&!(isset($_POST['l_registrationButton']))){
        header("Location: ../index.html");
    }*/
    //else{
        $host = "rogue.db.elephantsql.com";
        $user = "mffqfyag";
        $pass = "sCmWtk6dBysXWEn3IqvDDZtgvjcARlhs";
        $db = "mffqfyag";
        // Open a PostgreSQL connection
        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n");
        if (!$con){
            echo "<h1> Impossibile connettersi<7h1>";
        }
        else{
            if (isset($_POST['b_registrationButton'])){
                $email=$_POST["email"];
                $q1="select * from locale where mail= $1";
                $q2="select * from band where mail = $1";
                $result1 = pg_query_params($con,$q1,array($email));
                $result2 = pg_query_params($con,$q2,array($email));
                if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                    echo "<h1> Già registrato</h1>
                    <a href=../login.html>clicca qui per login</a>";
                }
                else{
                    $name=$_POST["nome"];
                    $password=md5($_POST["password"]);
                    $genre="funky";
                    $q2 = 'INSERT INTO band VALUES($1,$2,$3,$4)';
                    $results = pg_query_params($con, $q2,array($email,$name,$password,$genre));
                    if ($results){
                        echo "<h1> Registrazione completata</h1>
                        <a href=../profilo_band.html>inizia a navigare</a>";
                    }
                } 
            }
            else{
                $email=$_POST["email"];
                $q1="select * from locale where mail= $1";
                $q2="select * from band where mail = $1";
                $result1 = pg_query_params($con,$q1,array($email));
                $result2 = pg_query_params($con,$q2,array($email));

                if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                    echo "<h1> Già registrato</h1>
                    <a href=../login.html>clicca qui per login</a>";
                }
                else{
                    $name=$_POST["nome"];
                    $password=md5($_POST["password"]);
                    $genre="bar";
                    $fav_music = "funky";
                    $q3 = 'INSERT INTO locale VALUES($1,$2,$3,$4,$5)';
                    $results = pg_query_params($con, $q3,array($email,$name,$password,$genre,$fav_music));
                    if ($results){
                        echo "<h1> Registrazione completata</h1>
                        <a href=../profilo_band.html>inizia a navigare</a>";
                    }
                } 
            }
        }
        pg_close($con);
    //}
?>
