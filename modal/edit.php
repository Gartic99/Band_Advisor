<?php
    //include "/config/config.php";
    if (!empty($_POST)) {
        echo("sono io");
        /*move_uploaded_file($_FILES["profile_img"]["tmp_name"], $_FILES["file"]["name"]);

        $bin_string = file_get_contents($_FILES["profile_img"]["name"]);
        $hex_string = base64_encode($bin_string);*/

        $host = "database-1.csh3ixzgt0vm.eu-west-3.rds.amazonaws.com";
        $user = "postgres";
        $pass = "Quindicimaggio_20";
        $db = "postgres";

        //apro la connessione con il db postgress
        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n");
        if (!$con){
            echo "<h1> Impossibile connettersi<7h1>";
        }
        else{
          echo("sono io2");
          $data = null;
          $desc = null;
          //controllo se email nel db
          $q="select img,_desc from img_profili where mail = $1";
          $result = pg_query_params($con,$q,array($_COOKIE["mail"]));
          if (pg_num_rows($result)>0){
              $line=pg_fetch_array($result,null,PGSQL_ASSOC);
              $data = /*base64_decode*/pg_unescape_bytea($line['img']); 
              $desc = $line['_desc'];
          }
          if ($_POST["profile_img"]){//$_FILES['profile_img']['size']>0 ){
            echo("sono io3");
            /*$check = getimagesize($_POST["profile_img"]/*$_FILES["profile_img"]["tmp_name"]);
              if($check !== false) {
              } else {
                exit("<h2>Il file caricato non è un'immagine.</h2>");
              }
              if ($_FILES["profile_img"]["size"] > 5000000) {
                exit( "<h2>Il file è troppo grande</h2>"); 
              }
              $imageFileType=strtolower(pathinfo($_FILES["profile_img"]["name"],PATHINFO_EXTENSION));
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                exit ("<h2>Solo immagini JPG, JPEG, PNG sono permesse.</h2>");
              }*/
              //$fileName = $_FILES["profile_img"]['tmp_name'];
              //$data = file_get_contents($fileName);
              $data = $_POST["profile_img"];
              echo "<h2>Foto Aggiornata</h2>";
          }
          if ($_POST["edit_desc"]!=""){
              $desc = strip_tags(trim($_POST["edit_desc"]));
              echo "<h2>Descrizione Aggiornata</h2>" ;
          }
          //$encode=base64_encode($data);
          $encode=$data;
          // rimozione della riga
          $q1 = "delete from img_profili where mail = $1";
          pg_query_params($con, $q1,array($_COOKIE["mail"]));
          
          // Insert it into the database
          $q1 = 'INSERT INTO img_profili VALUES($1,$2,$3)';
          $results = pg_query_params($con, $q1,array($_COOKIE["mail"],$encode,$desc));
        }
    }
?>