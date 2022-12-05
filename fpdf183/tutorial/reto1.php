<?php
require('../fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
	$this->Image('mapa.png',5,60,200);
	
}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->Output();
?>
