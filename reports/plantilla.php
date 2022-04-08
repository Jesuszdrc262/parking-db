<?php
	require '../fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/gugar1.png', 15, 5, 20 );
			$this->SetFont('Times','B',25);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte Parking',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Times','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>