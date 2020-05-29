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
        
        if(pg_num_rows($result)>0){
            return true;
        }
        return false;
    }
    function getMail($band){
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
        
        $q1="SELECT band.mail FROM band WHERE band.nome=$1";
        $result=pg_query_params($con,$q1,array($band));
        
        if(pg_num_rows($result)>0){
           return pg_fetch_array( $result ,null ,PGSQL_ASSOC)["mail"];
        }

        $q2="SELECT locale.mail FROM locale WHERE locale.nome=$1";
        $result2=pg_query_params($con,$q2,array($band));
        
        if(pg_num_rows($result2)>0){
           return pg_fetch_array( $result2 ,null ,PGSQL_ASSOC)["mail"];
        }
    }
?>