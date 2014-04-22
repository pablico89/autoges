<?php

class PDF extends FPDF
{
//Cabecera de pgina
function Header()
{

    //Logo

}

//Pie de pgina
function Footer()
{

    $this->SetFont('Arial','',8);
	$this->SetY(-21);
	$this->Cell(0,10,'LOGISTICA NEVADUL - TLF: 670-76-04-16',0,0,'C');
	$this->SetY(-18);
	$this->Cell(0,10,html_entity_decode(''),0,0,'C');
	$this->SetY(-15);
	$this->Cell(0,10,html_entity_decode(''),0,0,'C');
	$this->SetY(-12);
    $this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');	
	
}

}
?>