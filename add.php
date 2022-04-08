<?php
include('conexion.php');

$placa = $_POST['placa'];
$tipo = $_POST['tipo'];
$time = $_POST['time'];
$year = date("Y");
$month = date("m");
$day = date("d");
$hora = ($year.'-'.$month.'-'.$day.' '.$time.':00');



$sql = "INSERT INTO registros (placa,tiempo, tipo, cantidad, inicio)
VALUES ('".$placa."', 0 ,'".$tipo."', 0, '".$hora."')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registrado correctamente')</script>";
    echo "<script>location.href='index.php'</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



?>
