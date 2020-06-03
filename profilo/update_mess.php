    
                                    
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
    $type = $_COOKIE["type"];
    if ($type='band'){ 
        $q1="select locale.nome,locale.id,contatta.read from contatta,locale where contatta._to=$1 and locale.mail=contatta._from group by nome,id,read";
        $result=pg_query_params($con,$q1,array($_COOKIE["username"]));
        if(pg_num_rows($result)==0){
            echo "Ancora nessuna band ti ha contattato</br>";
        }
        else{
            while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                $from=$line["id"];
                echo "<a href='/modal/messaggi_band.php?from=$from' class='modal_open3'>";
                echo "{$line["nome"]}";
                echo '</a>';
                echo "</br>";
            }
        }
    }
    else if ($type='locale'){
        $q1="select band.nome,band.id from contatta,band where contatta._to=$1 and band.mail=contatta._from group by nome,id";
        $result=pg_query_params($con,$q1,array($_COOKIE["username"]));

        if(pg_num_rows($result)==0){
            echo "Ancora nessuna band ti ha contattato</br>";
        }
        else{
            while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                $from=$line["id"];
                echo "<a href='/modal/messaggi_locale.php?from=$from' class='modal_open3'>";
                echo "{$line["nome"]}";
                echo '</a>';
                echo "</br>";
            }
        }
    }    
?>  
<script>
$('.modal_open3').on('click', function(e){
            e.preventDefault();
            $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
        });
</script>