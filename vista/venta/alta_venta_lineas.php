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
<!-- Modal -->
	<div class="modal fade" id="finaliza_venta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Finaliza venta</h4>
		  </div>
		  <form class="form-horizontal" action="autoventa.php" method="POST" role="form">
		  <input type="hidden" name="accion" value="guarda_venta">

		  <div class="modal-body">
			
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Cantidad a cobrar</label>
				<div class="col-sm-10">
				  <input type="number" step=0.01 class="form-control" name="cobrado" id="cobrado" placeholder="€" value="<?php echo number_format($_SESSION['datos_cabecera']['total_liquido'],2);?>">
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
			
			<p></p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary">Finalizar venta</button>
		  </div>
		  </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <body>
	<div class="modal fade" id="lista_articulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title">Selecciona el artículo</h4>
				</div>
				<div class="modal-body">
					<div class="row">
					  <div class="col-md-6">    
						<div class="input-group">
							<input type="number" id="seleccion_id" class="form-control" autofocus>
							<span class="input-group-btn">
								<button id="seleccion_articulo" class="btn btn-default" type="button">Seleccionar</button>
							</span>
						</div><!-- /input-group --></div>
					  <div class="col-md-6"><input type="text" class="form-control" id="busqueda_nombre" placeholder="Buscar..." /></div>
					</div>
						 <table class="table table-list-search">
									<thead>
										<tr>
										<th>Nombre del artículo</th>
										<th>Precio de venta</th>
										</tr>
									</thead>
									<tbody id="resultado">


									</tbody>
								</table>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


    <div class="container">
	<a href="autoventa.php?accion=alta_venta2" class="btn btn-block btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Volver a cabecera</a>
	<hr>
	<div class="page-header">
	  <h1><small>Lineas de artículo</small></h1>
	</div>
	<div align="right">
	<a data-toggle="modal" id="boton_alta_linea" href="#lista_articulo" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Añadir artículo</a>
	  </div>
	  <table class="table table-striped">
						<thead>
							<tr>
							<th>#</th>
							<th>Artículo</th>
							<th>Unidades</th>
							<th>Precio</th>
							<th class="alert">Total</th>
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
	  <td><?php 
	  
	  if( ($v['descuento_articulo']+$v['descuento_familia'] +$v['descuento']) != 0)
		echo $v['pvp']." <i>".($v['descuento_articulo']+$v['descuento_familia'] +$v['descuento'])."</i>";
	  else
		echo $v['pvp'];
		?></td>
	  <?php
		if($_SESSION['datos_cabecera']['tarifa'] != "I")
			echo '<td class="alert" ><strong>'.$v['base_linea'].' €</strong></td>';
		else
			echo '<td class="alert" ><strong>'.$v['liquido_linea'].' €</strong></td>';
	  ?>
	  <td>
	  <a href="autoventa.php?accion=consulta_linea&id_linea=<?php echo $v['id_linea']?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-search"></span> Ver</a></td>
	  <td><a href="autoventa.php?accion=elimina_linea&id_linea=<?php echo $v['id_linea']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> </a></td>
	  </tr>
	  
	  <?php
			}
	  ?>
	  </table>
	  <div align="right">
	    <?php 
			if($contador >=3 )
				echo '<a data-toggle="modal" href="#lista_articulo" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Añadir artículo</a>
';
		?>
		</div>
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
							  <input type="hidden" class="form-control" id="tarifa" name="tarifa" value="<?php echo $_SESSION['datos_cabecera']['tarifa'];?>">
							  <input class="form-control" id="total_base" name="total_base" value="<?php echo number_format($_SESSION['datos_cabecera']['total_base'],2);?>" disabled>
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
		  <hr>
		  <div align="center">
		  <button type="submit" data-toggle="modal" data-target="#finaliza_venta"  class="btn btn-block btn-success"><strong>Finalizar venta</strong></button>
		  </div>
		  <hr>
		  <div align="center">
		  <a href="autoventa.php?accion=cancelar_venta" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar Venta</a>
		  </div>
		  <hr>
    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
		<script>              //usado para mostrar distintos pop ups
		$(document).ready(function(){

		$('#lista_articulo').on('shown', function() {
			$(this).find("[autofocus]:first").focus();
		});
		$("#boton_alta_linea").focus();		
        $('.collapse').collapse();
		$( "#seleccion_articulo" ).click(function() {
			var id_articulo = $("#seleccion_id").val();
				$.ajax({
                    type: "GET",
                    url: "autoventa.php?accion=check_id_articulo&id_articulo="+id_articulo,
					data: "valor="+id_articulo,
                    dataType: "html",
                    beforeSend: function(){
                    },
                    error: function(){
                          alert("No existe artículo con ese Identificador");
                    },
                    success: function(data){
							if(data==1)
								$(location).attr('href','autoventa.php?accion=inserta_linea&id_articulo='+$("#seleccion_id").val());                                    
							else
								alert("articulo no encontrado");
					}
				});
		});
		
        $("#busqueda_nombre").keyup(function(e){
            consulta = $("#busqueda_nombre").val();
			caracteres = $("#busqueda_nombre").val().length;
			if(caracteres >= 3 ){                 
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda_nombre").val();                                     
			  $.ajax({
                    type: "GET",
                    url: "autoventa.php?accion=busca_listado_articulo&tarifa="+tarifa,
                    data: "valor="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    },
                    error: function(){
                          alert("No se ha podido procesar la búsqueda");
                    },
                    success: function(data){
                          $("#resultado").empty();
                          $("#resultado").append(data);
                                                             
                    }
              });
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
