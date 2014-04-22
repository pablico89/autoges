<?php
require ('../../conectar.php'); // cargo clase para la conexión a la BD
$fechahoy=date("d-m-Y");

/*
$consulta= "SELECT agente, almacen FROM inicio_sesion";
$codigo=mysql_query($consulta);
$resultado= mysql_fetch_array($codigo);
$agente= $resultado["agente"];
$almacen=$resultado["almacen"];
*/

/*
$consulta= "SELECT nombre FROM agentes WHERE codagente='$agente'";
$codigo=mysql_query($consulta);
$resultado= mysql_fetch_array($codigo);
$nombre_agente= $resultado["nombre"];
*/
function query_to_csv($query, $filename, $attachment = false, $headers = true, $indicador) {

        if($attachment) {
			
            header( 'Content-Type: text/csv' );
            header( 'Content-Disposition: attachment;filename='.$filename);
            $fp = fopen('php://output', 'w');
        } else {
            $fp = fopen($filename, 'a');
        }
        
        if($headers) {

            $row = $query->fetch_assoc();
            if($row) {
                fputcsv($fp, array_keys($row));

                $query->data_seek(0);
            }
        }
        fwrite($fp, $indicador);
        while($row = $query->fetch_assoc()) {
            fputcsv($fp, $row);
        }
        
        fclose($fp);
    }


$ventas = 1;
$cobros = 1;
$pendientes = 1;
$clientes = 1;
$carga = 1;
$articulos = 1;
$vaciar = $_GET['vaciar'];
$hasta_fecha = $_GET['hasta_fecha'];

$archivo="../carga/MOVIMIENTO".".csv";
unlink($archivo);
$cn = conectar();

if($ventas==1){

$cabecera="VCC\n";
$linea="VLL\n";

$venta = "SELECT * FROM venta";
$venta_res = $cn->query($venta);
query_to_csv($venta_res, $archivo, false, false,$cabecera);


$lventa = "SELECT * FROM linea_venta";
$lventa_res = $cn->query($lventa);
query_to_csv($lventa_res, $archivo,false, false,$linea);

}



if($cobros==1){
$indicador="COB\n";

$cobro = "SELECT cobro.fecha, cobro.hora, cobro.id_venta, cobro.linea, cobro.id_cliente, cobro.id_agente, cobro.id_fpago, cobro.totales, cobro.id_almacen FROM cobro ";
$cobro_res = $cn->query($cobro);
query_to_csv($cobro_res, $archivo, false, false,$indicador);
}

if($pendientes==1){

$indicador="PEN\n";
$pendiente = "SELECT * FROM saldo ";
$pendiente_res = $cn->query($pendiente);
query_to_csv($pendiente_res, $archivo, false, false, $indicador);

}

if($clientes==1){
$indicador="CLI\n";
$cliente = "SELECT * FROM cliente WHERE nuevo_cliente='1'";
$cliente_res = $cn->query($cliente);
query_to_csv($cliente_res, $archivo, false, false, $indicador);
$cliente = "UPDATE cliente SET nuevo_cliente = '0'";
$cliente_res = $cn->query($cliente);
}

if($carga == 1){

$cabecera="CCC\n";
$linea="CLL\n";

$carga = "SELECT * FROM carga";
$carga_res = $cn->query($carga);
query_to_csv($carga_res, $archivo, false, false,$cabecera);


$lcarga = "SELECT * FROM linea_carga";
$lcarga_res = $cn->query($lcarga);
query_to_csv($lcarga_res, $archivo,false, false,$linea);

}

if($articulos==1){
$indicador="ART\n";
$cliente = "SELECT * FROM articulo WHERE nuevo_articulo='1'";
$cliente_res = $cn->query($cliente);
query_to_csv($cliente_res, $archivo, false, false, $indicador);
$cliente = "UPDATE articulo SET nuevo_articulo = '0'";
$cliente_res = $cn->query($cliente);
}

	$fecha = date("Y-m-d");
	$query = "UPDATE sincronizacion SET ultima_exportacion = '".$fecha."' WHERE id_sincronizacion = 1";
	$result=$cn->query($query);
//PROCEDEMOS AL VACIADO SI PROCEDE

if($vaciar == "si"){
	if($hasta_fecha == "" && $hasta_fecha > date('Y-m-d')){
		$hasta_fecha == date('Y-m-d');
	}
	$query = "DELETE FROM venta WHERE fecha < '".$hasta_fecha."'";
	$query_res = $cn->query($query);
    $query = "DELETE FROM linea_venta WHERE id_venta IN ( SELECT id_venta
    FROM venta WHERE fecha < '".$hasta_fecha."') ";
	$query_res = $cn->query($query);
    $query = "DELETE FROM carga WHERE fecha < '".$hasta_fecha."'";
	$query_res = $cn->query($query);
    $query = "DELETE FROM linea_carga WHERE id_venta IN ( SELECT carga.id_carga
    FROM carga WHERE carga.fecha < '".$hasta_fecha."') ";
	$query = "DELETE FROM cobro WHERE fecha < '".$hasta_fecha."'";
	$query_res = $cn->query($query);
	$query = "TRUNCATE TABLE lote";
	$query_res = $cn->query($query);
	$query = "TRUNCATE TABLE articulo";
	$query_res = $cn->query($query);
	$query = "TRUNCATE TABLE cliente";
	$query_res = $cn->query($query);
	$query = "TRUNCATE TABLE saldo";
	$query_res = $cn->query($query);
	$query = "TRUNCATE TABLE dctoart";
	$query_res = $cn->query($query);
	$query = "TRUNCATE TABLE dctofam";
	$query_res = $cn->query($query);

}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../src/assets/ico/favicon.png">

    <title>AUTOVENTA</title>

    <!-- Bootstrap core CSS -->
    <link href="../../src/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../src/assets/js/html5shiv.js"></script>
      <script src="../src/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container" align="center">


	<div class="page-header alert alert-success">
		<h1>Operación realizada </h1>
	</div>
	
	
	<a href="../../controlador/autoventa.php" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Salir</a>	

    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../src/assets/js/jquery.js"></script>
    <script src="../../src/dist/js/bootstrap.min.js"></script>
  </body>
</html>
