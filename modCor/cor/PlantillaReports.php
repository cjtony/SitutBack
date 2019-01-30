<?php
	include '../../modelos/rutasAmig.php';
	require_once '../../vistas/pdf/fpdf.php';
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../vistas/img/SITUT (1).jpg', 5, 5, 50 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(160,30, 'Reporte Escolar, Alumnos',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>