<?php
    function isBand($band){
        $host = constant("DB_HOST");
        $user = constant("DB_USER");
        $pass = constant("DB_PASSWORD");
        $db =   constant("DB_NAME");

        //apro la connessione con il db postgress
        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n");
        if (!$con){
            echo "<h1> Impossibile connettersi</h1>";
        }
        
        $q1="SELECT band.nome,band.mail FROM band WHERE band.mail=$1";
        $result=pg_query_params($con,$q1,array($band));
        
        if(pg_num_rows($result)==0){
        return true;
        }
        return false;
    }
?>