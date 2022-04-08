<?php 
$hostname = "localhost";
$dbname = "parkingdb";
$user = "root";
$pass = "";

$conn = mysqli_connect($hostname,$user,$pass,$dbname);

if ($conn->connect_errno) {
    die ("Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error);
}

?>