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
	  <h1>Nueva venta <small>Datos linea</small></h1>
	</div>
		<form class="form-horizontal" role="form" action="autoventa.php" method="POST">
		<input type="hidden" name="accion" value="modifica_linea">
		<input type="hidden" name="id_articulo" value="<?php echo $_SESSION['lineas_venta'][$id_articulo]?>">
		<input type="hidden" name="nombre" value="<?php echo $dato_articulo['nombre']?>">
		<div class="row">
		  <div class="col-md-2"><img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt=""></div>
		  <div class="col-md-10"><h3><?php echo ucwords(strtolower($dato_cliente['nombre']))?></h3>
		  <?php echo "<strong>Cif: </strong>".$dato_cliente['cif']?>
		  <?php echo "<br><strong>Cobros pendientes: </strong> 0"?>
		  </div>
		</div>
		                
		<hr>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Venta</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary <?php if($dato_cliente['modelo'] == "A") echo "active"?>">
					<input type="radio" name="venta" value="A" id="option1" <?php if($dato_cliente['modelo'] == "A") echo "checked='checked'"?>> En A
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['modelo'] == "B") echo "active"?>">
					<input type="radio" name="venta" value="B" id="option2" <?php if($dato_cliente['modelo'] == "B") echo "checked='checked'"?>> En B
				  </label>
				</div>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  <?php if($dato_cliente['venta'] == "F") echo "active"?>">
					<input type="radio"  name="tipo" value="F" id="option1" <?php if($dato_cliente['venta'] == "F") echo "checked='checked'"?>> Factura
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['venta'] == "A") echo "active"?>">
					<input type="radio" name="tipo" value="A" id="option2" <?php if($dato_cliente['venta'] == "A") echo "checked='checked'"?>> Albarán
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['venta'] == "T") echo "active"?>">
					<input type="radio" name="tipo" value="T" id="option3" <?php if($dato_cliente['venta'] == "T") echo "checked='checked'"?>> Ticket
				  </label>
				</div>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Recargo de equivalencia</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  <?php if($dato_cliente['recargo'] == "S") echo "active"?>">
					<input type="radio" name="recargo" value="S" id="option1" <?php if($dato_cliente['recargo'] == "S") echo "checked='checked'"?>> Con recargo
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['recargo'] == "N") echo "active"?>">
					<input type="radio" name="recargo" value="N" id="option2" <?php if($dato_cliente['recargo'] == "N") echo "checked='checked'"?>> Sin recargo
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['recargo'] == "E") echo "active"?>">
					<input type="radio" name="recargo" value="E" id="option3" <?php if($dato_cliente['recargo'] == "E") echo "checked='checked'"?>> Exento
				  </label>
				</div>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tarifa</label>
			<div class="col-sm-10">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary  <?php if($dato_cliente['tarifa'] == "1") echo "active"?>">
					<input type="radio" name="tarifa" value ="1" id="option1" <?php if($dato_cliente['tarifa'] == "1") echo "checked='checked'"?>> 1
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['tarifa'] == "2") echo "active"?>">
					<input type="radio" name="tarifa" value ="2" id="option2" <?php if($dato_cliente['tarifa'] == "2") echo "checked='checked'"?>> 2
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['tarifa'] == "3") echo "active"?>">
					<input type="radio" name="tarifa" value ="3" id="option2" <?php if($dato_cliente['tarifa'] == "3") echo "checked='checked'"?>> 3
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['tarifa'] == "4") echo "active"?>">
					<input type="radio" name="tarifa" value ="4" id="option2" <?php if($dato_cliente['tarifa'] == "4") echo "checked='checked'"?>> 4
				  </label>
				  <label class="btn btn-primary  <?php if($dato_cliente['tarifa'] == "i") echo "active"?>">
					<input type="radio" name="tarifa" value ="i" id="option2" <?php if($dato_cliente['tarifa'] == "i") echo "checked='checked'"?>> I
				  </label>
				</div>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descuento general</label>
			<div class="col-sm-10">
				<input class="form-control" id="descuento_general" name="descuento_general" value="<?php echo $dato_cliente['descuento']?>" placeholder="%">
			</div>
		  </div>
		  <div align="center">
		  <button type="submit" class="btn btn-success">Continuar</button>
		  </div>
		</form>

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
