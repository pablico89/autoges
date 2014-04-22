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
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Selección de clientes</h4>
		  </div>
		  <form role="form" id="2" action="autoventa.php" method="POST">
		  <input type="hidden" name="accion" value="modifica_ruta">
		  <input type="hidden" name="id_ruta" value="<?php echo $id_ruta?>">
		  <div class="modal-body">
		  
						<table class="table table-list-search">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Nombre comercial</th>
									<th>Seleccionar</th>

								</tr>
							</thead>
							<tbody>
							 <?php $contador = 0; foreach ($lista_cliente as $dato): $contador++;?>
										<tr>
										<td><?php echo $dato['codcliente']; ?></td>
										<td><?php echo $dato['nombre']; ?></td>
										<td><?php echo $dato['nombre_comercial']; ?></td>
										<td><input type="checkbox" name="clientes[]" value="<?php echo $dato['codcliente']?>" <?php if($datos_ruta[$dato['codcliente']]!=""){echo "checked";}?>></td>
										</tr>
										<?php endforeach; ?> 
		 
							</tbody>
						</table>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" value="seleccionar" class="btn btn-primary">Añadir seleccionados</button>
		  </div>
		  </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    <div class="container">
	<div class="page-header">
	  <h1>Consulta ruta<small></small></h1>
	</div>
	<form class="form-horizontal" id="1" action="autoventa.php" method="POST" role="form">
	<input type="hidden" name="accion" value="modifica_ruta">
	<input type="hidden" name="id_ruta" value="<?php echo $id_ruta?>">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Nombre de la ruta</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="nombre_ruta" name="nombre_ruta" value="<?php echo $nombre_ruta?>">
		</div>
	  </div>
	<hr>
	<hr>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Seleccionados</label>
		<div class="col-sm-10">
			<ul class="list-group">
				<?php foreach($datos_ruta as $dato):?>
			  <li class="list-group-item"><?php echo $lista_cliente[$dato['codcliente']]['nombre']?></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	<div align="center">
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		Añadir clientes
	</button>
	</div>
	<hr>
	  <div class="form-group">
		  <button type="submit" value="finalizar"  class="btn btn-block btn-success">Finalizar</button>
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
</html>
