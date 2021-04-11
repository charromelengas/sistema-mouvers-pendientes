<?php
require('../efectivo/fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../efectivo/images/mouverslogo.png',20,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(83);
    // Título
    $this->Cell(30,10,'Reporte de pedidos en efectivo pendientes',0,0,'C');
    // Salto de línea
    $this->Ln(36);
    //Nombre del campo
    $this->Cell(40,10,'Fecha',1,0,'C',0);
	$this->Cell(40,10,utf8_decode('N° de pedido'),1,0,'C',0);
	$this->Cell(90,10,'Repartidor',1,0,'C',0);
	$this->Cell(22,10,'Adeudo',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require '../efectivo/database/conn.php';
$query_pendientes = "SELECT fecha, num_ped, nombre_rep, cantidad_pen FROM pedido WHERE id_status = 2";
$resultado_pendientes = $conn->prepare($query_pendientes);
$resultado_pendientes->execute();

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($row = $resultado_pendientes->fetch(PDO::FETCH_ASSOC))
{
	$pdf->Cell(40,10,$row['fecha'],1,0,'C',0);
	$pdf->Cell(40,10,$row['num_ped'],1,0,'C',0);
	$pdf->Cell(90,10,utf8_decode($row['nombre_rep']),1,0,'C',0);
	$pdf->Cell(22,10,$row['cantidad_pen'],1,1,'C',0);
}

$pdf->Output();
?>