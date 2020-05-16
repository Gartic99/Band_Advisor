<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);

    //reindirizzo alla main page nel caso in cui il php non venga chiamato dal form
    if (!(isset($_POST['b_email'])||isset($_POST['l_email']))){
        header("Location: ../index.html");
    }
    // inizio invio i dati del form nel db
    else{
        /*$host = "rogue.db.elephantsql.com";
        $user = "mffqfyag";
        $pass = "sCmWtk6dBysXWEn3IqvDDZtgvjcARlhs";
        $db = "mffqfyag"; old db*/


        $host = "database-1.csh3ixzgt0vm.eu-west-3.rds.amazonaws.com";
        $user = "postgres";
        $pass = "Quindicimaggio_20";
        $db = "postgres";

        //apro la connessione con il db postgress
        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n");
        if (!$con){
            echo "<h1> Impossibile connettersi<7h1>";
        }
        else{
            //verifico se i dati arrivano dal form delle band
            if (isset($_POST['b_email'])){
                // verifico che l'email non sia già presente nel db
                $email=$_POST["b_email"];
                $q1="select * from locale where mail= $1";
                $q2="select * from band where mail = $1";
                $result1 = pg_query_params($con,$q1,array($email));
                $result2 = pg_query_params($con,$q2,array($email));
                if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                    $response =  "<h1> Già registrato</h1>
                    <a href=../login.html>clicca qui per login</a>";
                }
                // invio i dati al db
                else{
                    $name=$_POST["nome"];
                    $password=md5($_POST["password"]);

                    $genre=implode(";",$_POST['genere']);

                    $q2 = 'INSERT INTO band VALUES($1,$2,$3,$4)';
                    $results = pg_query_params($con, $q2,array($email,$name,$password,$genre));
                    if ($results){
                        $response = "<h1> Registrazione completata</h1>
                        <a href=../profilo_band.php>inizia a navigare</a>";
                    }
                    pg_free_result($results);
                } 
            }
            else{
                // verifico che l'email non sia già presente nel db
                $email=$_POST["l_email"];
                $q1="select * from locale where mail= $1";
                $q2="select * from band where mail = $1";
                $result1 = pg_query_params($con,$q1,array($email));
                $result2 = pg_query_params($con,$q2,array($email));

                if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                    $response = "<h1> Già registrato</h1>
                    <a href=../login.html>clicca qui per login</a>";
                }
                // invio i dati al db
                else{
                    $name=$_POST["nome"];
                    $password=md5($_POST["password"]);
                    $genre=implode(";",$_POST['tipo_l']);
                    $fav_music = implode(";",$_POST['mus_pref']);
                    $q3 = 'INSERT INTO locale VALUES($1,$2,$3,$4,$5)';
                    $results = pg_query_params($con, $q3,array($email,$name,$password,$genre,$fav_music));
                    if ($results){
                        $response =  "<h1> Registrazione completata</h1>
                        <a href=../profilo_locale.php>inizia a navigare</a>";
                    }
                    pg_free_result($results);
                } 
            }
        }
        // chiudo la connesione con il server
        pg_free_result($result1);
        pg_free_result($result2);
        pg_close($con);
    
    }
?>