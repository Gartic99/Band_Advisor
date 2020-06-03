    
                                    
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
            $letti = "<h4> Messaggi Letti</h4>";
            $nonletti= "<h4> Messaggi in arrivo</h4>";
            while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                if ($line["read"]==1){
                    $from=$line["id"];
                    $letti=$letti."<a href='/modal/messaggi_band.php?from=$from' class='modal_open3'>";
                    $letti=$letti."{$line["nome"]}";
                    $letti=$letti.'</a>';
                    $letti=$letti."</br>";
                }
                else{
                    $from=$line["id"];
                    $nonletti=$nonletti."<a href='/modal/messaggi_band.php?from=$from' class='modal_open3'>";
                    $nonletti=$nonletti."{$line["nome"]}";
                    $nonletti=$nonletti.'</a>';
                    $nonletti=$nonletti."</br>";
                }
            }
            echo $nonletti;
            echo $letti;
        }
    }
    else if ($type='locale'){
        $q1="select band.nome,band.id,contatta.read from contatta,band where contatta._to=$1 and band.mail=contatta._from group by nome,id,read";
        $result=pg_query_params($con,$q1,array($_COOKIE["username"]));

        if(pg_num_rows($result)==0){
            echo "Ancora nessuna band ti ha contattato</br>";
        }
        else{
            $letti = "<h4> Messaggi Letti</h4>";
            $nonletti= "<h4> Messaggi in arrivo</h4>";
            while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                if ($line["read"]==1){
                    $from=$line["id"];
                    $letti=$letti."<a href='/modal/messaggi_locale.php?from=$from' class='modal_open3'>";
                    $letti=$letti."{$line["nome"]}";
                    $letti=$letti.'</a>';
                    $letti=$letti."</br>";
                }
                else{
                    $from=$line["id"];
                    $nonletti=$nonletti."<a href='/modal/messaggi_locale.php?from=$from' class='modal_open3'>";
                    $nonletti=$nonletti."{$line["nome"]}";
                    $nonletti=$nonletti.'</a>';
                    $nonletti=$nonletti."</br>";
                }
            }
            echo $nonletti;
            echo $letti;
        }
    }    
?>  
<script>
$('.modal_open3').on('click', function(e){
            e.preventDefault();
            $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
        });
</script>