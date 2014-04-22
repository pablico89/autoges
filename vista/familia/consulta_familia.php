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
			<input type="hidden" name="accion" value="modifica_familia">
			<input type="hidden" name="id_familia" value="<?php echo $datos_familia['id_familia']?>">
			<div class="page-header">
			  <h1>Consulta de familia <small>Id: <?php echo $datos_familia['id_familia']?></small></h1>
			</div>
					
			<hr>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Identificador</label>
				<div class="col-sm-3">
					<input class="form-control" value="<?php echo $datos_familia['id_familia']?>" placeholder="Introduzca ID" disabled>
				</div>
			</div>		
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-6">
					<input class="form-control" id="nombre" name="nombre" value="<?php echo $datos_familia['nombre']?>" placeholder="Introduzca nombre">
				</div>
			</div>
			  <div align="center">
				<button type="submit" class="btn btn-block btn-success"><span class="glyphicon glyphicon-arrow-tick"></span> Guardar modificación</button>
			  </div>
		</form>
		<br>
				<div align="right"><a href="autoventa.php?accion=baja_tabla&id=<?php echo $datos_familia['id_familia']?>&tabla=familia" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Eliminar</a></div>
		<br>
		<a href="autoventa.php?accion=lista_familia" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a>

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
