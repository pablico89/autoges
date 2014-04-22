<?php
function fillPost($keys,$exclude = null){  //funcion que recoge un conjunto de POST, para hacer mas cómoda la recogida de datos
	$array = array();
	foreach ($_POST as $key=>$val){
		if (is_array($keys)){
			if (in_array($key, $keys)) $array[$key] = $val;
		}else
			if($keys==="ALL"){
				if (isset($exclude)){
					if(is_array($exclude)){
						if (!in_array($key,$exclude)) $array[$key] = $val;
				}else{
					if ($key!=$exclude) $array[$key] = $val;
				}
			}else{
				$array[$key] = $val;
			}
		}else return $_POST[$keys];
	}
	return $array;
}

$CONF['csrf_secret'] = 'dfa%d_FA{]2Ñf523scvDAgffff';  //clave secreta para el generado de tokens

function generateFormToken($form) {
   $secret = $GLOBALS['CONF']['csrf_secret'];
   $sid = session_id();
   $token = md5($secret.$sid.$form);
   return $token;
}
 
function verifyFormToken($form, $token) {
   $secret = $GLOBALS['CONF']['csrf_secret'];
   $sid = session_id();
   $correct = md5($secret.$sid.$form);
   return ($token == $correct);
}

function redirige($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

function calcula_pie_venta122($datos_cabecera, $lineas_venta, $totales){

	$total_base = 0;
	$total_liquido = 0;
	$total_recargo = 0;
	global $totales;

	foreach($lineas_venta as $linea):
		$pvp = $linea['pvp'];
		$unidades = $linea['unidades'];
		$cajas = $linea["cajas"];
		$uni_caja = $linea["uni_caja"];
		$descuento = $linea['descuento'];
		$descuento_familia = $linea['descuento_familia'];
		$descuento_general = $datos_cabecera['descuento_general'];
		//calculamos base 1
		$cantidad = $unidades + $cajas*$uni_caja;
		$total = $cantidad*$pvp;
		if($linea['tarifa'] == "I")
			$total = $total - ($total*$linea['iva_aplicado'])/100;
		//calculamos base 1 con descuentos
		$base = $total - (($total * ($descuento_familia + $descuento + $descuento_general))/100);
		//calculamos iva y recargo si procede
		switch($datos_cabecera['modelo']){
			case "A":
				switch($datos_cabecera['recargo']){
					case "S": //con_recargo;
						$iva = ($linea['iva_aplicado']*$base)/100;
						$recargo = ($linea['recargo_aplicado']*$base)/100;
					break;
					case "N": //sin_recargo
						$iva = ($linea['iva_aplicado']*$base)/100;
						$recargo = 0;
					break;
					case "E": //exento
						$iva = 0;
						$recargo = 0;
					break;
				}
			break;
			case "B":
				$iva = 0;
				$recargo = 0;
			break;
		
		}
		//sumamos los globales para el cálculo del líquido
		
		$total_recargo += $recargo;
		$total_iva += $iva;
		$total_base += $base;
		$total_liquido += $base + $iva + $recargo;
	endforeach;
	
	$totales['total_base'] = $total_base;
	$totales['total_liquido'] = $total_liquido;
	$totales['total_iva'] = $total_iva;
	$totales['total_recargo'] = $total_recargo;

	
	
}


function calcula_pie_venta($datos_cabecera, $lineas_venta, $totales){

	$total_base = 0;
	$total_liquido = 0;
	$total_recargo = 0;
	global $totales;

	foreach($lineas_venta as $linea):
		$base_linea = $linea['base_linea'];
		$liquido_linea = $linea['liquido_linea'];
		
		//sumamos los globales para el cálculo del líquido
		
		$total_recargo += $base_linea * $linea['recargo_aplicado']/100;
		$total_iva += $base_linea * $linea['iva_aplicado']/100;
		$total_base += $base_linea;
		$total_liquido += $liquido_linea;
	endforeach;
	
	$totales['total_base'] = $total_base;
	$totales['total_liquido'] = $total_liquido;
	$totales['total_iva'] = $total_iva;
	$totales['total_recargo'] = $total_recargo;

	
	
}
?>