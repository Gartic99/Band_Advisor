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
           

            $email=$_POST[""];
            $name=$_POST[""];
            $password=$_POST[""];
            $genre=$_POST[""];
            $query = 'INSERT INTO band VALUES($email,$name,$password,$genre)';
            $results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());
           
            
            
            pg_free_result($results);
            pg_close($con);
        ?>
    </body>
</html>

