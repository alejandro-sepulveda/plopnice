<?php
include_once("../config/database.php");
require_once('../soportetecnicophp/plantilla.php');
require_once('../fpdf/fpdf.php');
header("Content-Type: text/html; charset=iso-8859-1 ");
$id= $_GET['id']; //Tomamos por GET el id del producto del que se desean extraer los datos de la BD
$sql = "SELECT marca, modelo, problema,fechadeentrada,estado FROM serviciotecnico WHERE Id='$id'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->Image("../fpdf/imagenes/lgoo.png",7,5,20);

	$pdf->SetFillColor(262);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,6,'MARCA',1,0,'C',1);
	$pdf->Cell(35,6,'MODELO',1,0,'C',1);
  $pdf->Cell(35,6,'PROBLEMA',1,0,'C',1);
	$pdf->Cell(35,6,'FECHA',1,0,'C',1);
	$pdf->Cell(35,6,'ESTADO',1,1,'C',1);




  $pdf->SetFont('Arial','',10);

  	while($row = $resultset->fetch_assoc())
  	{

  		$pdf->Cell(35,6,utf8_decode($row['marca']),1,0,'C');
  		$pdf->Cell(35,6,$row['modelo'],1,0,'C');
  		$pdf->Cell(35,6,utf8_decode($row['problema']),1,0,'C');
			$pdf->Cell(35,6,utf8_decode($row['fechadeentrada']),1,0,'C');
			$pdf->Cell(35,6,utf8_decode($row['estado']),1,1,'C');
			$pdf->Cell(66,40, 'Tecnico Encargado: Alejandro Sepulveda ',0,0,'C');
			$pdf->Cell(27,60, 'Mediante el siguiente documento se acredita la reparacion y entrega del equipo ingresado con fecha: ',0,0,'C');
			$pdf->Cell(150,60,utf8_decode($row['fechadeentrada']),0,1,'C');
			$pdf->Cell(35,-40, 'Con la siguiente falla : ',0,1,'C');
			$pdf->Cell(110,40,utf8_decode($row['problema']),0,1,'C');
			$pdf->Cell(185,-20, 'Por ende, El equipo tendra 30 dias de garantia en caso de cualquier falla relacionada a la reparacion,',0,1,'C');
			$pdf->Cell(110,30, 'En caso contrario, se realizara el cobro nuevamente. ',0,1,'C');
			$pdf->Image("../fpdf/imagenes/firma.png",70,200,55);

  	}


  	$pdf->Output();

?>
