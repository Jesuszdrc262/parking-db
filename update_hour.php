<?php
include('conexion.php');

$placa = $_POST['placa'];
$time = $_POST['date'];
$year = date("Y");
$month = date("m");
$day = date("d");
$hora = ($year.'-'.$month.'-'.$day.' '.$time.':00');


$sql = "UPDATE registros SET fin = '".$hora."' where placa = '".$placa."'";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Hora agregada correctamente')</script>";
  echo "<script>location.href='index.php'</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



?>