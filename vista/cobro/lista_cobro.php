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
	  <h1>Lista de cobros <small></small></h1>
	</div>
	<form action="#" method="get">
						<div class="input-group">
							<!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
							<input class="form-control" id="system-search" name="q" placeholder="Buscar..." required>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
							</span>
						</div>
					</form>
					<hr>
				 <table class="table table-list-search table-striped table-bordered">
							<thead>
								<tr class="alert alert-success">
									<th>ID de venta</th>
									<th>Nº de cobro</th>
									<th>Cliente</th>
									<th>Importe cobrado</th>
									<th>Imprimir</th>

								</tr>
							</thead>
							<tbody>
							 <?php $contador = 0; foreach ($lista_cobro as $dato): $contador++;?>
										<tr>

										<td><?php echo $dato['id_venta']; ?></td>
										<td><?php echo $dato['linea']; ?></td>
										<td><?php echo $dato['id_cliente']." ".$dato['nombre']; ?></td>
										<td><?php echo $dato['totales']." €"; ?></td>
										<td><a href="autoventa.php?accion=imprime_cobro&id_venta=<?php echo $dato['id_venta']?>&linea=<?php echo $dato['linea']?>" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Imprimir</a></td>
										</tr>
										<?php endforeach; ?>
		 
							</tbody>
						</table>
						<hr>
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
