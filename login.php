<html>
    <title>EsempioinPHP</title>
    <head></head>
    <body>
        <?php
            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', 1);
            $host = "rogue.db.elephantsql.com";
            $user = "mffqfyag";
            $pass = "sCmWtk6dBysXWEn3IqvDDZtgvjcARlhs";
            $db = "mffqfyag";
           
            // Open a PostgreSQL connection
            $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
              or die ("Could not connect to server\n");
           

            $email=$_POST["nome"];
            $password=$_POST["password"];
           

            $q1="select password from locale where nome= $1";
            $q2="select password from band where nome = $1";
            $resultLocale = pg_query_params($con,$q1,array($email));
            $resultBand = pg_query_params($con,$q2,array($email));

            if(($line=pg_fetch_array($resultLocale,null,PGSQL_ASSOC))){
               if(md5($line)==md5($password))
                    header("location: profilo_locale.html");
                else{
                    echo "<h1>Errore Password</h1>
                    <a href=../login.html>clicca qui per login</a>";
                }
            }
            else if($line=pg_fetch_array($resultBand,null,PGSQL_ASSOC)){
                if(md5($line)==md5($password))
                    header("location: profilo_band.html");
                else{
                    echo "<h1>Errore Password</h1>
                    <a href=../login.html>clicca qui per login</a>";
                }
            }
            else{
                echo "<h1>Errore Username, Sicuro di essere registrato?</h1>
                <a href=../login.html>clicca qui per login</a>";
            }
           
            
            
            pg_free_result($results);
            pg_close($con);
        ?>
    </body>
</html>

