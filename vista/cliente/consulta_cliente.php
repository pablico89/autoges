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

		<form class="form-horizontal" role="form" action="autoventa.php" method="POST">
		<input type="hidden" name="accion" value="modifica_cliente">
		<input type="hidden" id="id_cliente_antiguo" name="id_cliente_antiguo" value="<?php echo $datos_cliente['id_cliente']?>">
		<div class="page-header">
		  <h1>Consulta de cliente <small>Id: <?php echo $datos_cliente['id_cliente']?></small></h1>
		</div>

		<div class="row">
		  <div class="col-md-2"><img class="profile-img" src="../src/img/user.png"
                    alt=""></div>
		  <div class="col-md-10"><h3><?php echo ucwords(strtolower($datos_cliente['nombre']))?></h3>
		  <?php echo "<strong>Cif: </strong>".$datos_cliente['cif']?>
		  <?php echo "<br><strong>Cobros pendientes: </strong> ".count($lista_saldo)." <a href='autoventa.php?accion=lista_saldo&filtro=".$datos_cliente['id_cliente']."'>Ver</a>"; ?>
		  </div>
		</div>
		                
		<hr>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Identificador</label>
			<div class="col-sm-3">
				<input class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $datos_cliente['id_cliente']?>" placeholder="Introduzca nombre">
			</div>
			<div class="col-sm-2">
				<a onclick="valida_id_cliente()" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> comprobar</a>
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
				<input class="form-control" id="nombre" name="nombre" value="<?php echo $datos_cliente['nombre']?>" placeholder="Introduzca nombre">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nombre comercial</label>
			<div class="col-sm-6">
				<input class="form-control" id="nombre" name="nombre_comercial" value="<?php echo $datos_cliente['nombre_comercial']?>" placeholder="Introduzca nombre comercial">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Cif</label>
			<div class="col-sm-3">
				<input class="form-control" id="cif" name="cif" value="<?php echo $datos_cliente['cif']?>" placeholder="Introduzca número de cif">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Dirección</label>
			<div class="col-sm-6">
				<input class="form-control" id="direccion" name="direccion" value="<?php echo $datos_cliente['direccion']?>" placeholder="Introduzca dirección">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Código postal</label>
			<div class="col-sm-3">
				<input class="form-control" id="codpostal" name="codpostal" value="<?php echo $datos_cliente['codpostal']?>" placeholder="Introduzca código postal">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-3">
				<input class="form-control" id="telefono" name="telefono" value="<?php echo $datos_cliente['telefono']?>" placeholder="Introduzca el teléfono">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tipo de recargo</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  <?php if($datos_cliente['recargo'] == "S") echo "active"?>">
					<input type="radio"  name="recargo" value="S" id="option1" <?php if($datos_cliente['recargo'] == "S") echo "checked='checked'"?>> Si
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['recargo'] == "N") echo "active"?>">
					<input type="radio" name="recargo" value="N" id="option2" <?php if($datos_cliente['recargo'] == "N") echo "checked='checked'"?>> No
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['recargo'] == "E") echo "active"?>">
					<input type="radio" name="recargo" value="E" id="option2" <?php if($datos_cliente['recargo'] == "E") echo "checked='checked'"?>> Exento
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tarifa de venta</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  <?php if($datos_cliente['tarifa'] == "1") echo "active"?>">
					<input type="radio"  name="tarifa" value="1" id="option1" <?php if($datos_cliente['tarifa'] == "1") echo "checked='checked'"?>> 1
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['tarifa'] == "2") echo "active"?>">
					<input type="radio" name="tarifa" value="2" id="option2" <?php if($datos_cliente['tarifa'] == "2") echo "checked='checked'"?>> 2
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['tarifa'] == "3") echo "active"?>">
					<input type="radio" name="tarifa" value="3" id="option2" <?php if($datos_cliente['tarifa'] == "3") echo "checked='checked'"?>> 3
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['tarifa'] == "4") echo "active"?>">
					<input type="radio" name="tarifa" value="4" id="option2" <?php if($datos_cliente['tarifa'] == "4") echo "checked='checked'"?>> 4
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['tarifa'] == "I") echo "active"?>">
					<input type="radio" name="tarifa" value="I" id="option2" <?php if($datos_cliente['tarifa'] == "I") echo "checked='checked'"?>> I
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Venta por defecto</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  <?php if($datos_cliente['venta'] == "F") echo "active"?>">
					<input type="radio"  name="venta" value="F" id="option1" <?php if($datos_cliente['venta'] == "F") echo "checked='checked'"?>> Factura
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['venta'] == "A") echo "active"?>">
					<input type="radio" name="venta" value="A" id="option2" <?php if($datos_cliente['venta'] == "A") echo "checked='checked'"?>> Albaran
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['venta'] == "N") echo "active"?>">
					<input type="radio" name="venta" value="N" id="option2" <?php if($datos_cliente['venta'] == "N") echo "checked='checked'"?>> Nota de entrega
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Serie</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  <?php if($datos_cliente['modelo'] == "A") echo "active"?>">
					<input type="radio"  name="modelo" value="A" id="option1" <?php if($datos_cliente['modelo'] == "A") echo "checked='checked'"?>> Seriada
				  </label>
				  <label class="btn btn-primary  <?php if($datos_cliente['modelo'] == "B") echo "active"?>">
					<input type="radio" name="modelo" value="B" id="option2" <?php if($datos_cliente['modelo'] == "B") echo "checked='checked'"?>> No seriada
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Forma de pago</label>
			<div class="col-sm-10">
				<select id="id_fpago" name="id_fpago" class="form-control">
					<?php foreach ($lista_fpago as $dato): ?>
					<option value="<?php echo $dato['id_fpago'];?>" <?php if($datos_cliente['id_fpago']== $dato['id_fpago']) echo "selected" ?> ><?php echo $dato['nombre'] ?></option>
					<?php endforeach; ?> 
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tipo de cliente</label>
			<div class="col-sm-10">
				<select id="id_tipo" name="id_tipo" class="form-control">
					<?php foreach ($lista_tipo as $dato): ?>
					<option value="<?php echo $dato['id_tipo'];?>" <?php if($datos_cliente['id_tipo']== $dato['id_tipo']) echo "selected" ?> ><?php echo $dato['nombre'] ?></option>
					<?php endforeach; ?> 
				</select>
			</div>
		</div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descuento general</label>
			<div class="col-sm-3">
				<input class="form-control" id="descuento" name="descuento" value="<?php echo $datos_cliente['descuento']?>" placeholder="%">
			</div>
		  </div>
		  <div align="center">
		  	<button type="submit" class="btn btn-block btn-success"><span class="glyphicon glyphicon-arrow-tick"></span> Guardar modificación</button>
		  </div>
		</form>
		<br>
		<a href="autoventa.php?accion=lista_cliente" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a>

    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
	<script src="../funciones/funcionesjs.js"></script>
	<script>              //usado para mostrar distintos pop ups
		$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');
	document.getElementById("valido").style.display= "none";
	document.getElementById("no_valido").style.display= "none";
    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Busqueda para: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No hay registros con el filtro de búsqueda introducido</td></tr>');
        }
    });
});
		</script>  
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
      <?php
	require ('../vista/footer.php');
	?>
</html>
