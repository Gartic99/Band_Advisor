<?php
    
    $host = "database-1.csh3ixzgt0vm.eu-west-3.rds.amazonaws.com";
    $user = "postgres";
    $pass = "Quindicimaggio_20";
    $db = "postgres";

    //apro la connessione con il db postgress
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n");
    if (!$con){
        echo "<h1> Impossibile connettersi</h1>";
    }

    
    
    if(isset($_REQUEST["term"])){
        // Prepare a select statement
        /*$q = "SELECT distinct band.nome as nomeb,locale.nome as nomel FROM band,locale WHERE band.nome LIKE $1 or locale.nome LIKE $1";*/
        $q = "SELECT distinct band.nome as nomeb from band where band.nome like $1";
        $q1 = "SELECT distinct locale.nome as nomel from locale where locale.nome like $1";
        $term='%'.$_REQUEST["term"].'%';
        $result=pg_query_params($con,$q,array($term));
        $result1=pg_query_params($con,$q1,array($term));


        
        // Check number of rows in the result set
        if(pg_num_rows($result) > 0 || pg_num_rows($result1)>0){
            // Fetch result rows as an associative array
            while($row = pg_fetch_array($result,null ,PGSQL_ASSOC)){
                echo "<p>" . $row["nomeb"] . "</p>";
            }
            while($row = pg_fetch_array($result1,null ,PGSQL_ASSOC)){
                echo "<p>" . $row["nomel"] . "</p>";
            }
        } 
        else{
            echo "<p>No matches found</p>";
        }
    }
    
    // close connection
    pg_close($con);
?>