<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);
    if (!(isset($_POST['from_rec']))){
        header("Location: ../index.html");
    }
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
            $from=strtolower($_POST["from_rec"]);
            $q1="select * from locale where mail= $1";
            $q2="select * from band where mail = $1";
            $result1 = pg_query_params($con,$q1,array($from));
            $result2 = pg_query_params($con,$q2,array($from));
            if(!(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)))){
                $response =  "<h1> Non sei registrato</h1>
                <a href=../signup.html>clicca qui per registrarti</a>";
            }
            else{
                $to=strtolower($_POST["to_rec"]);
                $recensione=$_POST["recensione_i"];
                $score=$_POST["score"];

                $q1="select * from locale where nome= $1";
                $q2="select * from band where nome = $1";
                $result1 = pg_query_params($con,$q1,array($to));
                $result2 = pg_query_params($con,$q2,array($to));
                if(!(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)))){
                    $response =  "<h1>Locale o Band non esistente</h1>";
                }
                else{
                    $q2 = 'INSERT INTO recensione VALUES($1,$2,$3,$4)';
                    $results = pg_query_params($con, $q2,array($from,$to,$score,$recensione));
                    if ($results){
                        $response = "<h1> Recensione inviata</h1>
                        <a href=../index.html>Torna alla Home</a>";
                    }
                pg_free_result($results);
                }
            }
        }
        echo $response;
        pg_free_result($result1);
        pg_free_result($result2);
        pg_close($con);
    }
?>