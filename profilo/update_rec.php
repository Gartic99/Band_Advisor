<?php
    
    include  '../config/utils.php';
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

    //$q1="select cont from recensione where _to=$1";
    $q1="select recensione._from as nome,recensione.cont as cont,recensione.rating as stelle from recensione where recensione._to=$1";
    $result=pg_query_params($con,$q1,array($_COOKIE["username"]));

    if(pg_num_rows($result)==0){
        echo "Ancora nessuna recensione per te ;(</br>";
    }
    
    $iter=0; //Teniamo il conto per una vista migliore
    while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
        $id=trim((string)getId($line["nome"]));
        $nome=getName($line["nome"]);
        if($iter>0){
            echo "</br>";
        }
        if(isBand($line["nome"])){
            echo "<a href='/profilo/profiloEx_band.php?id={$id}&name=$nome'>";
        }else{
            echo "<a href='/profilo/profiloEx_locale.php?id={$id}&name=$nome'>";
        }
        
        $stars= "<h4>{$nome}</h4>";
        
        for($i=0;$i<intval($line["stelle"]);$i++){
            $stars.="<span class='fa fa-star checked'></span>";
        }
        
        echo $stars."</br>";
        echo '</a>';
        echo "{$line["cont"]}";
        echo '</br>';
        $iter++;
    }
?>