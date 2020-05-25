<?php
    if (!isset($_GET["getfile"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);

            $bin_string = file_get_contents($_FILES["file"]["name"]);
            $hex_string = base64_encode($bin_string);
            $mysqli = mysqli_init();

            if (!$mysqli->real_connect('localhost', 'root', '', 'arihant')) {
                die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
            }

            $mysqli->query("INSERT INTO upload(image) VALUES ('" . $hex_string . "')");
        }
    }
?>