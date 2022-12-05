<?php
require('/fpdf183/fpdf.php');

class PDF extends FPDF
{
function Header(){
$this->Image('mapa.png',5,20,200);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Output();
?>

