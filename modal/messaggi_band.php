<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>   
<div class="modal-header">
    <h4 class="modal-title">Messaggi</h4>
    <button type="button" class="close" data-dismiss="modal" onclick="close_modal()">&times;</button>
</div>
<div class="modal-body">
    <div>
        <?php
         include  '../config/config.php';
                                     
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

         $q1="select locale.nome as nome,contatta.cont as cont,contatta.data as data,locale.mail as mail from contatta,locale where contatta._to=$1 and locale.mail=contatta._from";
         $result=pg_query_params($con,$q1,array($_COOKIE["username"]));

         if(pg_num_rows($result)==0){
             echo "Ancora nessun locale ti ha contattato</br>";
         }
         
         while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
            echo  '<h6>'.$line["data "].'</h6>';
             echo  '<h6>'.$line["cont"].'</h6>';
             echo "</br>";
         }
         
        ?>  
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<script>
    function close_modal(){
        $('.modal-body').empty();
    }
</script>