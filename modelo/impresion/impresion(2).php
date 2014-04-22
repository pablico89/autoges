<?php


define('FPDF_FONTPATH','font/');
//require('mysql_table.php');

require ('../src/fpdf/fpdf.php');
include("comunes.php");
//include ("../funciones/fechas.php"); 

function imprime_venta($datos_empresa, $datos_cabecera, $datos_lineas){


$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();

    $pdf->Image('../src/img/logo/logo.png',15,6,0);
    $pdf->Ln(5);	
	
$pdf->Ln(10);

	$pdf->Cell(95);
    $pdf->Cell(80,4,"",'',0,'C');
    $pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',10);	
	$pdf->SetX(10);	

    $pdf->Cell(95);
    $pdf->Cell(95,4,"",'LRT',0,'L',1);
    $pdf->Ln(4);
		$pdf->Cell(95);
		$pdf->Cell(95,4,$datos_cabecera["nombre_comercial"],'LR',0,'L',1);
		$pdf->Ln(4);
		
		$pdf->Cell(95);
		$pdf->Cell(95,4,$datos_cabecera["direccion"],'LR',0,'L',1);
		$pdf->Ln(4);
		
		$pdf->Cell(95);
		$pdf->Cell(95,4,$datos_cabecera["poblacion"],'LR',0,'L',1);
		$pdf->Ln(4);
		
		$pdf->Cell(95);
		$pdf->Cell(95,4,$datos_cabecera["codpostal"],'LR',0,'L',1);
		$pdf->Cell(0,4,"  TLF: ".$datos_cabecera["telefono"],'LR',0,'R',1);
		$pdf->Ln(4);

		
    $pdf->Cell(95);
    $pdf->Cell(95,4,"",'LRB',0,'L',1);
    $pdf->Ln(10);					


	$pdf->Ln(4);
	
	$pdf->Cell(10);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	$fecha = date('d-m-y', $datos_cabecera['fecha']);
    $pdf->Cell(30,4,"ENTREGA No ".$datos_cabecera['id_venta'],0,0,'C',0);
	$pdf->Cell(30,4,"FECHA ".date("d-m-Y",strtotime($datos_cabecera['fecha'])),0,0,'C',0);
	
	$pdf->Cell(20);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	
	//ahora mostramos las lneas de la factura
	$pdf->Ln(10);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,191,116);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(25,4,utf8_decode("CÓDIGO"),1,0,'C',1);
	$pdf->Cell(70,4,utf8_decode("ARTÍCULO"),1,0,'C',1);
	$pdf->Cell(15,4,"CAJAS",1,0,'C',1);	
	$pdf->Cell(15,4,"UNIDS.",1,0,'C',1);
	$pdf->Cell(15,4,"CANT.",1,0,'C',1);
	$pdf->Cell(15,4,"LOTE",1,0,'C',1);	
	$pdf->Cell(20,4,"PRECIO",1,0,'C',1);
	$pdf->Cell(20,4,"IMPORTE",1,0,'C',1);
	$pdf->Ln(4);
			
			
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	$importe_lineas_global = 0;
	$total_cajas = 0;
	foreach($datos_lineas as $dato_linea):  //iteramos en cada linea
	  $pdf->Cell(1);
	  $contador++;
	  $codarticulo=$dato_linea["id_articulo"];
	  $pdf->Cell(25,4,$dato_linea["id_articulo"],'LR',0,'L');
	  
	  $acotado = substr($dato_linea["nombre"], 0, 45);
	  $pdf->Cell(70,4,$acotado,'LR',0,'L');

	  $pdf->Cell(15,4,$dato_linea["cajas"],'LR',0,'C');
	  $pdf->Cell(15,4,$dato_linea["unidades"],'LR',0,'C');
	  $pdf->Cell(15,4,$dato_linea["cantidad"],'LR',0,'C');
	  if($dato_linea["lote"] != 0)
		$pdf->Cell(15,4,$dato_linea["lote"],'LR',0,'C');
	  else
		$pdf->Cell(15,4,"",'LR',0,'C');
	  if($datos_cabecera['serie']=="N")
		$precio2= number_format((($dato_linea['liquido']/$dato_linea['cantidad'])/(($dato_linea["dcto1"] + $dato_linea["dcto2"])/100)),2,",",".");
	  else
		$precio2= number_format($dato_linea["precio"],2,",",".");
	  if(($dato_linea["dcto1"] + $dato_linea["dcto2"]) > 0)
		$precio2 = $precio2." ".($dato_linea["dcto1"] + $dato_linea["dcto2"]);
	  $pdf->Cell(20,4,$precio2,'LR',0,'R');

	  
	 
	  $importe2= number_format($dato_linea['liquido'],2,",",".");	  
	  
	  $pdf->Cell(20,4,$importe2,'LR',0,'R');
	  $pdf->Ln(4);	


	  //vamos acumulando el importe
	  $importe_lineas_global += $importe_linea;
	  $contador=$contador + 1;
	  $lineas=$lineas + 1;
	  $total_cajas += $dato_linea["cajas"];
	endforeach;
	
	while ($contador<35)
	{
	  $pdf->Cell(1);
      $pdf->Cell(25,4,"",'LR',0,'C');
      $pdf->Cell(70,4,"",'LR',0,'C');
	  $pdf->Cell(15,4,"",'LR',0,'C');	
	  $pdf->Cell(15,4,"",'LR',0,'C');
	  $pdf->Cell(15,4,"",'LR',0,'C');
	  $pdf->Cell(15,4,"",'LR',0,'C');
	  $pdf->Cell(20,4,"",'LR',0,'C');
	  $pdf->Cell(20,4,"",'LR',0,'C');
	  $pdf->Ln(4);	
	  $contador=$contador +1;
	}

	  $pdf->Cell(1);
      $pdf->Cell(25,4,"",'LRB',0,'C');
      $pdf->Cell(70,4,"",'LRB',0,'C');
	  $pdf->Cell(15,4,"",'LRB',0,'C');	
	  $pdf->Cell(15,4,"",'LRB',0,'C');
	  $pdf->Cell(15,4,"",'LRB',0,'C');
	  $pdf->Cell(15,4,"",'LRB',0,'C');
	  $pdf->Cell(20,4,"",'LRB',0,'C');
	  $pdf->Cell(20,4,"",'LRB',0,'C');
	  $pdf->Ln(4);	


	//ahora mostramos el final de la factura
	$pdf->Cell(96,0,"",'LRB',0,'C');
	$pdf->Cell(17.5,4,$total_cajas,1,0,'C',1);
	$pdf->Ln(10);		
	$pdf->Cell(30);
	
	$pdf->SetFillColor(255,191,116);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	if($datos_cabecera['serie']!="N"){
		$pdf->Cell(20,4,"SUMA",1,0,'C',1);
		if($datos_cabecera['dcto'] != 0){
			$pdf->Cell(15,4,"DCTO",1,0,'C',1);
			}
		$pdf->Cell(15,4,"% IVA",1,0,'C',1);
		$pdf->Cell(20,4,"IVA",1,0,'C',1);
		$pdf->Cell(15,4,"% REC.",1,0,'C',1);
		$pdf->Cell(20,4,"RECARGO",1,0,'C',1);
	}
	$pdf->Cell(35,4,"TOTAL",1,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(30);
	if($datos_cabecera['serie']!="N"){
		$importe4=number_format($datos_cabecera['bruto'],2,",",".");
		
		$dcto_cabecera=number_format($datos_cabecera['dcto'],2,",",".");
		$pdf->Cell(20,4,$importe4,1,0,'R',1); //base imponible
		if($datos_cabecera['dcto'] != 0)
			$pdf->Cell(15,4,$dcto_cabecera." %",1,0,'C',1);
		$pdf->Cell(15,4,$datos_cabecera["cuota_iva"] . "%",1,0,'C',1);
		
		$ivai=$datos_cabecera["cuota_iva"];
		$impoi=$datos_cabecera['iva1'];
		$impoi=sprintf("%01.2f", $impoi);
		
		
		$recargoi=$datos_cabecera["cuota_recargo"];
		$impor=$datos_cabecera['recargo1'];
		$impor=sprintf("%01.2f", $impor);
		
		
		
		$total=$importe_lineas_global + $impoi +$impor; 
		$total=sprintf("%01.2f", $total);
		$impoi=number_format($impoi,2,",",".");	
		$pdf->Cell(20,4,"$impoi",1,0,'R',1);
		
		$pdf->Cell(15,4,$datos_cabecera["cuota_recargo"] . "%",1,0,'C',1);
		$impor=number_format($impor,2,",",".");	
		$pdf->Cell(20,4,"$impor",1,0,'R',1);
	}
    $total=$datos_cabecera['litotal'];
	$total2= number_format($total,2,",",".");
	$pdf->Cell(35,4,"$total2"." Euros",1,0,'R',1);
	$pdf->Ln(4);


      @mysql_free_result($resultado); 
      @mysql_free_result($query);
	  @mysql_free_result($resultado2); 
	  @mysql_free_result($query3);

$pdf->Output($datos_cabecera['id_venta'].'.pdf',F);
}

function imprime_cobro($datos_cobro){


$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();

    $pdf->Image('../src/img/logo/logo_mini.png',15,6,0);

	$pdf->Ln(35);
	
	//$pdf->Cell(10);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',12);
	
	if($datos_cobro['nombre_comercial']=="")
		$nombre = $datos_cobro['nombre'];
	else
		$nombre = $datos_cobro['nombre_comercial'];
	$texto = "He recibido de ".trim($nombre).", ".$datos_cobro['direccion'].", la cantidad de ".$datos_cobro['totales']." Euros";
    $pdf->Cell(0,4,$texto,0,0,'C',0);
	$pdf->Ln(5);	
	$texto = "correspondiente al cobro de la venta: ".$datos_cobro['id_venta'].".";
    $pdf->Cell(0,4,$texto,0,0,'C',0);
	$pdf->Ln(10);
	$pdf->Cell(140);
    $pdf->Cell(0,4,"Fecha: ".date("d-m-Y",strtotime($datos_cobro['fecha'])).".",0,0,'L',0);


	
	$pdf->Cell(20);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	

$pdf->Output($datos_cobro['id_venta'].'-'.$datos_cobro['linea'].'.pdf',F);
}
?> 
