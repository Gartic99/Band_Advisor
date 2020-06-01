<?php
    include  '../config/config.php';
    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'isBand' : isBand($_POST['arguments']);break;
            case 'isLocale' : isLocale($_POST['arguments']);break;
            case 'getMail' : getMail($_POST['arguments']);break;
            case 'getName' : getName($_POST['arguments']);break;
            case 'getNameString' : getNameString($_POST['arguments']);break;
        }
    }
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
    function isLocale($locale){
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
        
        $q1="SELECT locale.nome,locale.mail FROM locale WHERE locale.mail=$1";
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
    function getName($band){
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

        $q1="SELECT band.nome FROM band WHERE band.mail=$1";
        $result=pg_query_params($con,$q1,array($band));
        
        if(pg_num_rows($result)>0){
            return pg_fetch_array( $result ,null ,PGSQL_ASSOC)["nome"];
        }

        $q2="SELECT locale.nome FROM locale WHERE locale.mail=$1";
        $result2=pg_query_params($con,$q2,array($band));
        
        if(pg_num_rows($result2)>0){
            return pg_fetch_array( $result2 ,null ,PGSQL_ASSOC)["nome"];
        }
    }


    function getNameString($band){
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
        
        $arg=$_POST["arguments"];
        if(empty($arg)){
            echo "Caio";
        }
        $q1="SELECT band.nome FROM band WHERE band.mail=$1";
        $result=pg_query_params($con,$q1,array($_POST["arguments"]));
        
        if(pg_num_rows($result)>0){
            $nome = pg_fetch_array( $result ,null ,PGSQL_ASSOC)["nome"];
            echo "".$nome;
        }

        $q2="SELECT locale.nome FROM locale WHERE locale.mail=$1";
        $result2=pg_query_params($con,$q2,array($_POST["arguments"]));
        
        if(pg_num_rows($result2)>0){
            $nome = pg_fetch_array( $result2 ,null ,PGSQL_ASSOC)["nome"];
            echo "".$nome;
        }
    }
    function getId($band){
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

        $q1="SELECT band.id FROM band WHERE band.mail=$1";
        $result=pg_query_params($con,$q1,array($band));
        
        if(pg_num_rows($result)>0){
            return pg_fetch_array( $result ,null ,PGSQL_ASSOC)["id"];
        }

        $q2="SELECT locale.id FROM locale WHERE locale.mail=$1";
        $result2=pg_query_params($con,$q2,array($band));
        
        if(pg_num_rows($result2)>0){
            return pg_fetch_array( $result2 ,null ,PGSQL_ASSOC)["id"];
        }
    }
    function getMailFromId($band){
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

        $q1="SELECT band.mail FROM band WHERE band.id=$1";
        $result=pg_query_params($con,$q1,array($band));
        
        if(pg_num_rows($result)>0){
            return pg_fetch_array( $result ,null ,PGSQL_ASSOC)["mail"];
        }

        $q2="SELECT locale.mail FROM locale WHERE locale.id=$1";
        $result2=pg_query_params($con,$q2,array($band));
        
        if(pg_num_rows($result2)>0){
            return pg_fetch_array( $result2 ,null ,PGSQL_ASSOC)["mail"];
        }
    }
?>