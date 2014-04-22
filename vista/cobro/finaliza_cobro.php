<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../src/assets/ico/favicon.png">

    <title>AUTOVENTA</title>

    <!-- Bootstrap core CSS -->
    <link href="../src/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../src/assets/js/html5shiv.js"></script>
      <script src="../src/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container" align="center">


	<div class="page-header">
		<h1>¿Desea imprimir el cobro? <small><?php echo $id_venta." - ".$linea?></small></h1>
	</div>
	
	<a href="autoventa.php?accion=imprime_cobro&id_venta=<?php echo $id_venta?>&linea=<?php echo $linea?>" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Imprimir</a>	
	<hr>
	<a href="autoventa.php?accion=lista_saldo" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Salir</a>	

    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
      <?php
	require ('../vista/footer.php');
	?>
</html>
