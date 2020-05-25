<?php
    //include "/config/config.php";
    if (!isset($_POST["profile_img"])) {
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
            //controllo se email nel db
            $q="select img,_desc from img_profili where mail = $1";
            $result = pg_query_params($con,$q,array($_COOKIE["mail"]));
            if ((pg_fetch_array($result,null,PGSQL_ASSOC))){
                $data = pg_unescape_bytea(pg_fetch_array($result,null,PGSQL_ASSOC)[0]); 
                $desc = pg_fetch_array($result,null,PGSQL_ASSOC)[1];
            }

            if (!(empty($_FILES['profile_img']['name']))){
                $fileName = $_FILES["profile_img"]['tmp_name'];
                $data = file_get_contents($fileName);
                // encoded binary data
            }
            if (isset($_POST["edit_desc"])){
                $desc = pg_fetch_array($result,null,PGSQL_ASSOC)[1];    
            }
            
            $encode=base64_encode($data);
            // rimozione della riga
            $q1 = "delete from img_profili where mail = $1";
            pg_query_params($con, $q1,array($_COOKIE["mail"]));
            
            // Insert it into the database
            $q1 = 'INSERT INTO img_profili VALUES($1,$2,$3)';
            $results = pg_query_params($con, $q1,array($_COOKIE["mail"],$encode,$desc));


            //TEST//
            // Get the bytea data
            $res = pg_query("SELECT img FROM img_profili WHERE  mail='ac_dc@gmail.com'");  
            $raw = pg_fetch_result($res, 'img');

            // Convert to binary and send to the browser
            header('Content-type: image/jpeg');
            $img64 = pg_unescape_bytea($raw);
            echo "<img src='data:image/jpeg;base64, $img64' width=300>";
        }
    }
/*$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}*/
?>