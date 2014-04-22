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
	  <h1>Alta de cliente</h1>
	</div>
		<form class="form-horizontal" role="form" action="autoventa.php" method="POST">
		<input type="hidden" name="accion" value="guarda_cliente">

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-6">
				<input class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nombre comercial</label>
			<div class="col-sm-6">
				<input class="form-control" id="nombre" name="nombre_comercial"  placeholder="Introduzca nombre comercial">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Cif</label>
			<div class="col-sm-3">
				<input class="form-control" id="cif" name="cif"  placeholder="Introduzca número de cif">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Dirección</label>
			<div class="col-sm-6">
				<input class="form-control" id="direccion" name="direccion" placeholder="Introduzca dirección">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Población</label>
			<div class="col-sm-6">
				<input class="form-control" id="poblacion" name="poblacion" placeholder="Introduzca población">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Código postal</label>
			<div class="col-sm-3">
				<input class="form-control" id="codpostal" name="codpostal" placeholder="Introduzca código postal">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-3">
				<input class="form-control" id="telefono" name="telefono" placeholder="Introduzca el teléfono">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tipo de recargo</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  ">
					<input type="radio"  name="recargo" value="S" id="option1" > Si
				  </label>
				  <label class="btn btn-primary  ">
					<input type="radio" name="recargo" value="N" id="option2" > No
				  </label>
				  <label class="btn btn-primary  ">
					<input type="radio" name="recargo" value="E" id="option2" > Exento
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tarifa de venta</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary">
					<input type="radio"  name="tarifa" value="1" id="option1"> 1
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="tarifa" value="2" id="option2"> 2
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="tarifa" value="3" id="option2"> 3
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="tarifa" value="4" id="option2"> 4
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="tarifa" value="I" id="option2"> I
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Venta por defecto</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary">
					<input type="radio"  name="venta" value="F" id="option1"> Factura
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="venta" value="A" id="option2"> Albaran
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="venta" value="N" id="option2"> Nota de entrega
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Modelo</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary">
					<input type="radio"  name="modelo" value="A" id="option1"> Oficial
				  </label>
				  <label class="btn btn-primary">
					<input type="radio" name="modelo" value="B" id="option2"> Seriada
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Forma de pago</label>
			<div class="col-sm-10">
				<select id="id_fpago" name="id_fpago" class="form-control">
					<?php foreach ($lista_fpago as $dato): ?>
					<option value="<?php echo $dato['id_fpago'];?>" ><?php echo $dato['nombre']?></option>
					<?php endforeach; ?> 
				</select>
			</div>
		  </div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tipo de cliente</label>
			<div class="col-sm-10">
				<select id="id_tipo" name="id_tipo" class="form-control">
					<?php foreach ($lista_tipo as $dato): ?>
					<option value="<?php echo $dato['id_tipo'];?>" ><?php echo $dato['nombre']?></option>
					<?php endforeach; ?> 
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descuento general</label>
			<div class="col-sm-3">
				<input class="form-control" id="descuento" name="descuento"  placeholder="%">
			</div>
		  </div>
		  <div align="center">
		  	<button type="submit" class="btn btn-block btn-success"><span class="glyphicon glyphicon-arrow-tick"></span> Guardar cliente</button>
		  </div>
		</form>
		<br>
		<a href="autoventa.php?accion=lista_cliente" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a>

    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
	<script>              //usado para mostrar distintos pop ups
		$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

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
