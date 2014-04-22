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
	  <h1>Ajustes de sesión<small></small></h1>
	</div>
		<?php 
	switch($_REQUEST['estado']){
	
		case ("success"):
				echo '<div class="alert alert-success"><strong>Modificación realizada</strong> Los cambios efectuados se han realizado correctamente</div>';
		break;
		case ("error"):
				echo '<div class="alert alert-danger"><strong>Error en la modificación</strong> Los cambios efectuados no se han realizado correctamente</div>';
		break;
	}
	?>
	<form class="form-horizontal" id="1" action="autoventa.php" method="POST" role="form">
	<input type="hidden" name="accion" value="modifica_sesion">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Agente</label>
			<div class="col-sm-10">
				<select id="id_agente" name="id_agente" class="form-control">
					<?php foreach ($lista_agente as $dato): ?>
					<option value="<?php echo $dato['id_agente'];?>" <?php if($_SESSION['sesion']['id_agente']== $dato['id_agente']) echo "selected" ?> ><?php echo $dato['nombre'] ?></option>
					<?php endforeach; ?> 
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Almacen</label>
			<div class="col-sm-10">
				<input id="id_almacen" type="number" min=0 max=99 required autocomplete="off" value="<?php echo $_SESSION['sesion']['id_almacen']?>" name="id_almacen" class="form-control">
			</div>
		</div>
	  <div class="form-group">
		  <button type="submit" value="finalizar"  class="btn btn-block btn-success">Guardar</button>
	  </div>
	</form>
	<hr>
	<a href="autoventa.php" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar</a>


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
