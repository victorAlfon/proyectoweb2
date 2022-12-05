<?php
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(42,10,'Rodrigo Llanas');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Ingeniería en Tecnologías de la Información');

$pdf->Output();
?>
