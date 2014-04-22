<?php

require ('../../conectar.php');
$cn = conectar();
$fechahoy=date("d-m-Y");


$almacen = 1;
$familia = 1;
$fpago = 1;
$articulos = 1;
$lotes = 1;
$descuentos = 1;
$clientes = 1;
$tipo = 1;
$pendientes = 1;
$contadores = 0;
ini_set('auto_detect_line_endings',TRUE);

if($pendientes==1){

$row = 1;
$handle = fopen("../carga/SALDOS.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "REPLACE INTO contador(id_contador, valor) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada
    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}


if($pendientes==1){

$row = 1;
$handle = fopen("../carga/SALDOS.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "REPLACE INTO saldo(id_cliente, id_venta, importe) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada
    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}

if($fpago==1){

$row = 1;
$handle = fopen("../carga/FPAGO.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "REPLACE INTO fpago( id_fpago, nombre) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada

    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}

if($familia==1){

$row = 1;
$handle = fopen("../carga/FAMILIA.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "REPLACE INTO familia( id_familia, nombre) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada


    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}

if($almacen==1){

$row = 1;
$handle = fopen("../carga/ALMACEN.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "INSERT INTO almacen(id_almacen,id_articulo,unidades,cajas) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada
    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);
}

if($descuentos==1){

$row = 1;
$handle = fopen("../carga/DCTOARTI.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "INSERT INTO dctoart(id_cliente,id_articulo,precio,dcto) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada

    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);

$row = 1;
$handle = fopen("../carga/DCTOFAM.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "INSERT INTO dctofam(id_cliente,id_familia,dcto) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada



    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}

if($articulos==1){

$row = 1;
$handle = fopen("../carga/ARTICULO.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "REPLACE INTO articulo(id_articulo,nombre,pvp1,pvp2,pvp3,pvp4,pvpi,uni_caja,id_impuesto,id_familia,lotesn,cajasn,referencia,descuento) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada

    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}

if($lotes==1){

$row = 1;
$handle = fopen("../carga/LOTES.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "INSERT INTO lote(id_almacen,id_articulo,lote,cajas,unidades) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada

    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}

if($tipo == 1){

$row = 1;
$handle = fopen("../carga/TIPO.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "INSERT INTO tipo(id_tipo, nombre) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada
    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);


}

if($clientes==1){

$row = 1;
$handle = fopen("../carga/CLIENTES.CSV", "r"); //Coloca el nombre de tu archivo .csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //Lee toda una linea completa, e ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "REPLACE INTO cliente(id_cliente,nombre,direccion,poblacion,codpostal,cif,tipo,recargo,descuento,tarifa,venta,modelo,nombre_comercial, nuevo_cliente,id_fpago, telefono) VALUES("; //Cambia los valores 'CampoX' por el nombre de tus campos de tu tabla y colócales los necesarios
    for ($c=0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c==($num-1))
              $cadena = $cadena."'".$data[$c] . "'";
        else
              $cadena = $cadena."'".$data[$c] . "',";
    }

    $cadena = $cadena.");"; //Termina de armar la cadena para poder ser ejecutada


    $result=$cn->query($cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
}

fclose($handle);



}
ini_set('auto_detect_line_endings',FALSE);
 $fecha = date("Y-m-d");
 $query = "UPDATE sincronizacion SET ultima_importacion = '".$fecha."' WHERE id_sincronizacion = 1";
 $result=$cn->query($query);
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
		<h1>Sincronizado realizado satisfactoriamente </h1>
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

