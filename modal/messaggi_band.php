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
            if ($_GET["letti"]){
                $from=getMailfromID($_GET["from"]);
                $from_nome=getName($from);
                $q1="select mess._fro,mess.co,mess.da
                from(
                    select c._from as _fro,c.cont as co ,c.data as da 
                    from contatta as c join band as b on c._from = b.mail 
                    where c._from=$1 and c._to=$2 and read = 1
                    union all
                    select c1._from as _fro,c1.cont as co ,c1.data as da
                    from contatta as c1 join locale as l on c1._from = l.mail
                    where c1._from=$3 and c1._to=$4
                ) as mess
                order by mess.da desc";
                $result=pg_query_params($con,$q1,array($_COOKIE["mail"],$from_nome,$from,$_COOKIE["username"]));
                if(pg_num_rows($result)==0){
                    echo "Ancora nessun locale ti ha contattato</br>";
                }
                else{
                    while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                        $date = new DateTime($line["da"]);
                        echo '<h5>'.getName($line["_fro"]).'</h5>'.'<h10 style="font-size:0.7rem; padding-top:-0.5rem">'.$date->format('d-m-Y H:i').'</h10>';
                        echo '<h6>'.$line["co"].'</h6>';
                        echo "</br>";
                    }
                }
            }
            else{
                $from=getMailfromID($_GET["from"]);
                $q1="select cont,data
                from contatta as c join locale as b on c._from = b.mail
                where b.mail=$1 and c._to =$2 and read=0
                ORDER BY data DESC";
                $result=pg_query_params($con,$q1,array($from,$_COOKIE["username"]));

                if(pg_num_rows($result)==0){
                    echo "Ancora nessun locale ti ha contattato</br>";
                }
                else{
                    while( $line = pg_fetch_array( $result ,null ,PGSQL_ASSOC) ) {
                        echo  '<h6>'.$line["data"].'</h6>';
                        echo  '<h6>'.$line["cont"].'</h6>';
                        echo "</br>";
                    }
                }
                $q1="UPDATE contatta SET read = 1 WHERE _from = $1 ";
                $result=pg_query_params($con,$q1,array(getMailfromID($_GET["from"])));
            }
            
        ?>  
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_modal()">Close</button>
</div>
<script>
    function close_modal(){
        $('.modal-body').empty();
    }
</script>