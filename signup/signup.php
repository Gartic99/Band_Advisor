<?php
session_start();
?>
<?php
    /*error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);*/

    //reindirizzo alla main page nel caso in cui il php non venga chiamato dal form
    if (!(isset($_POST['b_email'])||isset($_POST['l_email']))){
        header("Location: ../index.php");
    }
    // inizio invio i dati del form nel db
    else{
        include  '../config/config.php';
        $host = constant("DB_HOST");
        $user = constant("DB_USER");
        $pass = constant("DB_PASSWORD");
        $db =   constant("DB_NAME");

        //apro la connessione con il db postgress
        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n");
        //verifico se i dati arrivano dal form delle band
        if (isset($_POST['b_email'])){
            // verifico che l'email non sia già presente nel db
            $email=strip_tags(trim(strtolower($_POST["b_email"])));
            $q1="select * from locale where mail= $1";
            $q2="select * from band where mail = $1";
            $result1 = pg_query_params($con,$q1,array($email));
            $result2 = pg_query_params($con,$q2,array($email));

            if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                exit( "<h1> Mail già registrata</h1>");
            }
            
            $nome=strip_tags(trim($_POST["nome"]));
            $q1="select * from locale where nome= $1";
            $q2="select * from band where nome = $1";
            $result1 = pg_query_params($con,$q1,array($nome));
            $result2 = pg_query_params($con,$q2,array($nome));

            if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                exit("<h1> Nome già registrato</h1>");
            }

            // invio i dati al db
            else{
                
                $password=md5($_POST["password"]);

                $genre=$_POST['genere'];

                $q2 = 'INSERT INTO band VALUES($1,$2,$3,$4,$5,$6)';
                if(isset($genre[1])){
                    $results = pg_query_params($con, $q2,array($email,$nome,$password,$genre[0],$genre[1],md5($nome)));
                }else{
                    $results = pg_query_params($con, $q2,array($email,$nome,$password,$genre[0],null,md5($nome)));
                }
                if ($results){
                    $response = "<h1> Registrazione completata</h1>
                    <a href=../login/login.html>Inizia a navigare</a>";

                }
                pg_free_result($results);
            } 
        }
        else{
            // verifico che l'email non sia già presente nel db
            
            $email=strip_tags(trim(strtolower($_POST["l_email"])));
            $q1="select * from locale where mail= $1";
            $q2="select * from band where mail = $1";
            $result1 = pg_query_params($con,$q1,array($email));
            $result2 = pg_query_params($con,$q2,array($email));

            if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                exit( "<h1> Mail già registrata</h1>");
            }

            $nome=strip_tags(trim($_POST["nome"]));
            $q1="select * from locale where nome= $1";
            $q2="select * from band where nome = $1";
            $result1 = pg_query_params($con,$q1,array($nome));
            $result2 = pg_query_params($con,$q2,array($nome));

            if(($line=pg_fetch_array($result1,null,PGSQL_ASSOC)) || ($line=pg_fetch_array($result2,null,PGSQL_ASSOC)) ){
                exit( "<h1> Nome già registrato</h1>");
            }
            // invio i dati al db
            else{
                
                $password=md5($_POST["password"]);
                $genre=implode(",",$_POST['tipo_l']);
                $fav_music = $_POST['mus_pref'];
                $q3 = 'INSERT INTO locale VALUES($1,$2,$3,$4,$5,$6,$7)';
                if(isset($fav_music[1])){
                    $results = pg_query_params($con, $q3,array($email,$nome,$password,$genre,$fav_music[0],$fav_music[1],md5($nome)));
                }else{
                    $results = pg_query_params($con, $q3,array($email,$nome,$password,$genre,$fav_music[0],null,md5($nome)));  
                }
                if ($results){
                    $response =  "<h1> Registrazione completata</h1>";
                }
                pg_free_result($results);
            } 
        }
        // chiudo la connesione con il server
        echo $response;
        pg_free_result($result1);
        pg_free_result($result2);
        pg_close($con);
    }
?>
