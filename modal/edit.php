<?php
    include " ../config/config.php";
    if (!isset($_POST["profile_img"])) {
        if ($_FILES["profile_img"]["error"] > 0) {
            echo "Error: immagine non carrciata correttamente <br>";
        } else {
            move_uploaded_file($_FILES["profile_img"]["tmp_name"], $_FILES["file"]["name"]);

            $bin_string = file_get_contents($_FILES["profile_img"]["name"]);
            $hex_string = base64_encode($bin_string);

            $host = $DB_HOST;
            $user = $DB_USER;
            $pass = $DB_PASSWORD;
            $db =   $DB_NAME;

            //apro la connessione con il db postgress
            $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
            or die ("Could not connect to server\n");
            if (!$con){
                echo "<h1> Impossibile connettersi</h1>";
            }
           // $mysqli->query("INSERT INTO upload(image) VALUES ('" . $hex_string . "')");
            $q="insert into img_profili(mail,image,desc) values {$_COOKIE["mail"]},{$hex_string},{$_POST["desc"]}";
            $result=pg_query($con,$q);
        }
    }
?>



<?php
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