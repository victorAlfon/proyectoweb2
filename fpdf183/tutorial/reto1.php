<?php
require('../fpdf.php');

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	
	$this->Image('mapa.png',5,60,200);
	
}

}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();

$pdf->Output();
?>
