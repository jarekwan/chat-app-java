<?php



define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'LOG');
 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($link === false){
    die("ERROR: Nie można się połączyć... " . mysqli_connect_error());
}

?>