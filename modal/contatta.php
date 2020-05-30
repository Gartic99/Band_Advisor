<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);
    if (!(isset($_POST['from_cont']))){
        header("Location: ../index.html");
    }
    else{
        /*$host = "rogue.db.elephantsql.com";
        $user = "mffqfyag";
        $pass = "sCmWtk6dBysXWEn3IqvDDZtgvjcARlhs";
        $db = "mffqfyag"; old db*/


        
        
        include  '../config/utils.php';
        $host = constant("DB_HOST");
        $user = constant("DB_USER");
        $pass = constant("DB_PASSWORD");
        $db =   constant("DB_NAME");
        //apro la connessione con il db postgress
        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n");
        $to=strip_tags(trim(strtolower($_POST["to_cont"])));
        $contatta=strip_tags(trim($_POST["contatta_i"]));

        if (!$con){
            echo "<h1> Impossibile connettersi<7h1>";
        }
        else{
            $from=strtolower($_POST["from_cont"]);
            $q1="select * from locale where mail= $1";
            $q2="select * from band where mail = $1";
            $result1 = pg_query_params($con,$q1,array($from));
            $result2 = pg_query_params($con,$q2,array($from));
            if(!(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)))){
                $response =  "<h1> Non sei registrato</h1>
                <a href=../signup/signup.html>clicca qui per registrarti</a>";
            }
            else{
               

                $q1="select * from locale where nome= $1";
                $q2="select * from band where nome = $1";
                $result1 = pg_query_params($con,$q1,array($to));
                $result2 = pg_query_params($con,$q2,array($to));
                if(!(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)))){
                    $response =  "<h1>Locale o Band non esistente</h1>";
                }
                else if( (isBand(getMail($to)) && isBand($_COOKIE["mail"])) || ( !isBand(getMail($to)) && !isBand($_COOKIE["mail"]))){
                    $response =  "<h1>Non puoi mandare contattare un membro di Bandadvisor con il tuo stesso ruolo</h1>";
                }
                else{
                    $q2 = 'INSERT INTO contatta VALUES($1,$2,$3,$4)';
                    $results = pg_query_params($con, $q2,array($from,$to,$contatta,date("Y-m-d H:i:s")));
                    if ($results){
                        $response = "<h1> Messaggio inviato </h1>";
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