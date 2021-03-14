
<?php
	require '../fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{

			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,40, 'Reporte De Servicio Tecnico',0,0,'C');
			$this->Ln(50);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Plop-Nice '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}
?>
