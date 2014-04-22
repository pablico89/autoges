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
	<div class="modal fade" id="lista_articulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title">Selecciona el artículo</h4>
				</div>
				<div class="modal-body">
							<form action="#" method="get">
								<div class="input-group">
									<!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
									<input class="form-control" id="system-search" name="q" placeholder="Buscar..." required>
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
									</span>
								</div>
							</form>
						 <table class="table table-list-search">
									<thead>
										<tr>
										<th>#</th>
										<th>Nombre del artículo</th>
										<th>Precio de venta</th>
										</tr>
									</thead>
									<tbody>
										<?php $contador = 0; foreach ($lista_articulo as $dato): $contador++;?>
											   <form role="form" action="autoventa.php" method="POST">
											   <input type="hidden" name="accion" value="inserta_linea">
												<tr>
												<td><?php echo $dato['nombre']; ?></td>
												<td><?php echo $dato['pvp']; ?></td>
												<input type="hidden"  id="id_articulo" name="id_articulo" value="<?php echo $dato['id_articulo']?>">
												<input type="hidden"  id="pvp" name="pvp" value="<?php echo $dato['pvp']?>">
												<input type="hidden"  id="nombre" name="nombre" value="<?php echo $dato['nombre']?>">
												<td><button type="submit" class="btn btn-success">Seleccionar</button></td>
												</tr>
												</form>
											<?php endforeach; ?> 
				 
									</tbody>
								</table>
									<?php if(empty($datos)){?>
				   <div class="alert alert-warning">No hay registros de artículos</div>
				<?php } ?>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    <?php
	require ('../vista/menu_2.php');
	?>

    <div class="container">
		<ol class="breadcrumb">
			<li><a href="autoventa.php">Principal</a></li>
			  <li><a href="autoventa.php?accion=alta_venta">Nueva venta</a></li>
			  <li class="active">Lineas de venta</li>
		</ol>
	<div class="page-header">
	  <h1>Nueva venta <small>Lineas de artículo</small></h1>
	</div>
	<div  align="right">
	<a data-toggle="modal" href="#lista_articulo" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Añadir</a>
	</div>
	 <table class="table table-striped">
						<thead>
							<tr>
							<th>#</th>
							<th>Artículo</th>
							<th>Unidades</th>
							<th>Total</th>
							</tr>
						</thead>
	  <?php
	  $contador = 0;
	  foreach($_SESSION['lineas_venta'] as $k => $v){
		$contador +=1;
	  ?>
	  <tr>
	  <td><?php echo $contador ?></td>
	  <td><?php echo $v['nombre'] ?></td>
	  <td><?php echo $v['unidades']." unidades";
			if($v['cajas']!="")
				echo " - ".$v['cajas']." cajas";
			?>
			
			</td>
	  <td><?php echo $v['total_liquido']." €"; ?></td>
	  <td><a href="autoventa.php?accion=consulta_linea&id_articulo=<?php echo $v['id_articulo']?>" class="btn btn-xs "><span class="glyphicon glyphicon-search"></span> </a></td>
	  <td><a href="autoventa.php?accion=elimina_linea&id_articulo=<?php echo $v['id_articulo']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> </a></td>
	  </tr>
	  
	  <?php
			}
	  ?>
	  </table>	
		  <div class="row">
		  <div class="col-md-6"></div>
		  <div align="right" class="col-md-6 alert alert-warning">
			<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Total</label>
			<div class="col-sm-9">	
			  <div class="panel-group" id="accordion">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						 <div class="input-group">
							 
							  <input class="form-control" id="total_liquido" onchange="recalcula()" name="total_liquido" value="<?php echo number_format($_SESSION['datos_cabecera']['total_liquido'],2);?>">
								<span class="input-group-addon glyphicon glyphicon-plus-sign">Desplegar</span>
							</div>
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
					  <div class="panel-body">
						<div class="form-group">
							<div class="input-group input-group-sm">
							 <span class="input-group-addon">Base</span>
							  <input class="form-control" id="total_base"name="total_base" value="<?php echo number_format($_SESSION['datos_cabecera']['total_base'],2);?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group input-group-sm">
							 <span class="input-group-addon">Iva</span>
							  <input class="form-control" id="total_iva" name="total_iva" value="<?php echo number_format($_SESSION['datos_cabecera']['total_iva'],2);?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group input-group-sm">
							 <span class="input-group-addon">Recargo</span>
							  <input class="form-control" id="total_recargo"  name="total_recargo" value="<?php echo number_format($_SESSION['datos_cabecera']['total_recargo'] ,2);?>" disabled>
							</div>
						</div>
						<hr>
					  </div>
					</div>
				  </div>
				  </div>
				</div>
			</div>
		  </div>
		  </div>
    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
		<script>              //usado para mostrar distintos pop ups
		$(document).ready(function() {
		$('.collapse').collapse()
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
