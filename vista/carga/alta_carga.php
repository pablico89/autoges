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

    <?php
	require ('../vista/menu_2.php');
	?>

    <div class="container">
	<div class="page-header">
	  <h1><?php echo $_SESSION['datos_carga']['tipo']?> de vehículo</h1>
	</div>
		<form role="form" action="autoventa.php" method="POST">
			<input type="hidden" name="accion" value="alta_carga2">
			<input type="hidden" name="tipo" value="<?php echo $_SESSION['datos_carga']['tipo']?>">
		  <div class="form-group">
			<label for="alma_origen">Almacen de origen</label>
				<input type="number" min=0 max=99 required autocomplete="off" class="form-control" value="<?php if($_SESSION['datos_carga']['tipo'] =="descarga") echo $_SESSION['sesion']['id_almacen']?>" name="almacen_origen" autofocus>
		  </div>
		  <div class="form-group">
			<label for="alma_destino">Almacen de destino</label>
				<input type="number" min=0 max=99  required autocomplete="off" class="form-control" value="<?php if($_SESSION['datos_carga']['tipo'] !="descarga") echo $_SESSION['sesion']['id_almacen']?>" name="almacen_destino">
		  </div>
		  <div class="form-group">
			<label for="exampleInputFile">Agente</label>
				<select id="id_agente" name="id_agente" class="form-control">
					<?php foreach ($lista_agente as $dato): ?>
					<option value="<?php echo $dato['id_agente'];?>" <?php if($_SESSION['sesion']['id_agente']== $dato['id_agente']) echo "selected" ?> ><?php echo $dato['nombre'] ?></option>
					<?php endforeach; ?> 
				</select>
		  </div>
		  <hr>
		  <button type="submit" class="btn btn-primary btn-block">Continuar</button>
		</form>
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