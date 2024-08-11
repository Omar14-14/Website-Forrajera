<?php
$host = 'localhost';
$user = 'root';
$pass = 'Delori4l';
$db = 'forrajera';
$puerto =3306 ;

$mysqli = new mysqli($host, $user, $pass, $db, $puerto);

if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}
?>
