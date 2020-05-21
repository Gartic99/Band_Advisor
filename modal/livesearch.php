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
        $q = "SELECT nome FROM band WHERE band.nome LIKE $1";
        $term=$_REQUEST["term"].'%';
        $result=pg_query_params($con,$q,array($term));


        
        // Check number of rows in the result set
        if(pg_num_rows($result) > 0){
            // Fetch result rows as an associative array
            while($row = pg_fetch_array($result, PG_ASSOC)){
                echo "<p>" . $row["nome"] . "</p>";
            }
        } else{
            echo "<p>No matches found</p>";
        }
    }
    
    // close connection
    pg_close($con);
?>