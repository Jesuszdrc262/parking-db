<?php
	include 'plantilla.php';
	require 'conexion.php';
	$query = "SELECT placa,tiempo, tipo, cantidad, inicio, fin from registros";
	$resultado = $conn->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(98, 179, 251);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'PLACA',1,0,'C',1);
	$pdf->Cell(30,6,'TIEMPO',1,0,'C',1);
	$pdf->Cell(25,6,'TIPO',1,0,'C',1);
	$pdf->Cell(25,6,'CANTIDAD',1,0,'C',1);
	$pdf->Cell(40,6,'INICIO',1,0,'C',1);
	$pdf->Cell(40,6,'FIN',1,1,'C',1);
	
	
	

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['placa']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['tiempo']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['tipo']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['cantidad']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['inicio']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['fin']),1,1,'C');
		


	}
	$pdf->Output();
?>
