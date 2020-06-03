<?php
    if (!empty($_POST)) {
      include  '../config/config.php';
      $host = constant("DB_HOST");
      $user = constant("DB_USER");
      $pass = constant("DB_PASSWORD");
      $db =   constant("DB_NAME");

      //apro la connessione con il db postgress
      $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
      or die ("Could not connect to server\n");
      if (!$con){
          echo "<h1> Impossibile connettersi<7h1>";
      }
      else{
        $data = null;
        $desc = null;
        //controllo se email nel db
        $q="select img,_desc from img_profili where mail = $1";
        $result = pg_query_params($con,$q,array($_COOKIE["mail"]));
        if (pg_num_rows($result)>0){
            $line=pg_fetch_array($result,null,PGSQL_ASSOC);
            $data = pg_unescape_bytea($line['img']); 
            $desc = $line['_desc'];
        }
        if (isset($_POST["profile_img"])){
            $data = $_POST["profile_img"];
            
        }
        if ($_POST["edit_desc"]!=""){
            $desc = strip_tags(trim($_POST["edit_desc"]));
        }
            
        // rimozione della riga
        $q1 = "delete from img_profili where mail = $1";
        pg_query_params($con, $q1,array($_COOKIE["mail"]));
        
        // Inserisco nel database
        $q1 = 'INSERT INTO img_profili VALUES($1,$2,$3)';
        $results = pg_query_params($con, $q1,array($_COOKIE["mail"],$data,$desc));

        echo "<h2>Profilo aggiornato</h2>";
      }
    }
?>