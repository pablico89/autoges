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
	<div class="page-header">
	  <h1>Alta de artículo<small></h1>
	</div>
		<form class="form-horizontal" role="form" action="autoventa.php" method="POST">
		<input type="hidden" name="accion" value="guarda_articulo">
		<input type="hidden" name="id_articulo_antiguo" id="id_articulo_antiguo" value="0">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Identificador</label>
			<div class="col-sm-3">
				<input class="form-control" id="id_articulo" name="id_articulo" value="<?php echo $datos_articulo['id_articulo']?>" placeholder="Introduzca el identificador">
			</div>
			<div class="col-sm-2">
				<a onclick="valida_id_articulo()" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> comprobar</a>
			</div>
			<div id="valido">
				<a class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok"></span> Valido</a>
			</div>
			<div id="no_valido">
				<a class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-ban-circle"></span> No valido</a>
			</div>
		</div>	
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-6">
				<input class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Familia</label>
			<div class="col-sm-6">
				<select id="id_familia" name="id_familia" class="form-control">
					<?php foreach ($lista_familia as $dato): ?>
					<option value="<?php echo $dato['id_familia'];?>" ><?php echo $dato['nombre']?></option>
					<?php endforeach; ?> 
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Referencia</label>
			<div class="col-sm-3">
				<input class="form-control" id="referencia" name="referencia" placeholder="Referencia">
			</div>
		</div>
		<hr>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Precio 1</label>
			<div class="col-sm-2 input-group">
				<input class="form-control" id="pvp1" name="pvp1"  placeholder="€">
				<span class="input-group-addon">€</span>
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">Precio 2</label>
			<div class="col-sm-2 input-group">
				<input class="form-control" id="pvp2" name="pvp2"  placeholder="€">
				<span class="input-group-addon">€</span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Precio 3</label>
			<div class="col-sm-2 input-group">
				<input class="form-control" id="pvp3" name="pvp3" placeholder="€">
				<span class="input-group-addon">€</span>
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">Precio 4</label>
			<div class="col-sm-2 input-group">
				<input class="form-control" id="pvp4" name="pvp4" placeholder="€">
				<span class="input-group-addon">€</span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Precio Iva incl.</label>
			<div class="col-sm-2 input-group">
				<input class="form-control" id="pvpi" name="pvpi"  placeholder="€">
				<span class="input-group-addon">€</span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Lote</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary">
					<input type="radio"  name="lote_sn" value="S" id="option1"> Si
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="lote_sn" value="N" id="option2"> No
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Cajas</label>
			<div class="col-sm-2">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary">
					<input type="radio"  name="cajas_sn" value="S" id="option1"> Si
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="cajas_sn" value="N" id="option2"> No
				  </label>
				</div>	
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">Unidades por caja</label>
			<div class="col-sm-2">
				<input class="form-control" id="uni_caja" name="uni_caja"  placeholder="Unidades por caja">
			</div>
		</div>
		<hr>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Impuesto</label>
			<div class="col-sm-2">
								<select id="id_impuesto" name="id_impuesto" class="form-control">
					<?php foreach ($lista_impuesto as $dato): ?>
					<option value="<?php echo $dato['id_impuesto'];?>" ><?php echo $dato['nombre']?></option>
					<?php endforeach; ?> 
				</select>
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">Descuento</label>
			<div class="col-sm-2 input-group">
				<input class="form-control" id="descuento" name="descuento" placeholder="Descuento asociado">
				<span class="input-group-addon">%</span>
			</div>
		</div>

		<hr>
		<div align="center">
		  	<button type="submit" class="btn btn-block btn-success"><span class="glyphicon glyphicon-arrow-tick"></span> Guardar artículo</button>
		  </div>
		</form>
		<br>
		<a href="autoventa.php?accion=lista_articulo" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>

    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="../funciones/funcionesjs.js"></script>
    <script src="../src/assets/js/jquery.js"></script>
	<script>              //usado para mostrar distintos pop ups
		$(document).ready(function() {
		document.getElementById("valido").style.display= "none";
		document.getElementById("no_valido").style.display= "none";
});
		</script>  
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
      <?php
	require ('../vista/footer.php');
	?>
</html>
