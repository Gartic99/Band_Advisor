<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <?php
        function logout(){
            $_SESSION = array();
            session_destroy();
        }
    ?>
</body>
</html>