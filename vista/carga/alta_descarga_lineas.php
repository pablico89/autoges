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
			<h4 class="modal-title" id="myModalLabel">Finaliza Carga</h4>
		  </div>
		  <form class="form-horizontal" action="autoventa.php" method="POST" role="form">
		  <input type="hidden" name="accion" value="guarda_descarga">

		  <div class="modal-body">		
						<p>¿Desea finalizar la carga?</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success">Finalizar Carga</button>
		  </div>
		  </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <body>
    <div class="container">
	<a href="autoventa.php?accion=alta_carga" class="btn btn-block btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Volver a cabecera</a>
	<hr>
	<div class="page-header">
	  <h1><small>Artículos en el almacen</small></h1>
	<form class="form-horizontal" action="autoventa.php" method="POST" role="form">
	  <input type="hidden" name="accion" value="guarda_descarga">
	  <input type="hidden" name="almacen_origen" id="almacen_origen" value="<?php echo $_SESSION['datos_carga']['almacen_origen'] ?>">
	  <input type="hidden" name="tipo" id="tipo" value="<?php echo $_SESSION['datos_carga']['tipo'] ?>">
	  
	</div>
	  <table class="table table-striped">
						<thead>
							<tr>
							<th>#</th>
							<th>Artículo</th>						
							<th>Cajas</th>
							<th>Unidades</th>
							</tr>
						</thead>
	  <?php
	  $contador = 0;
	  foreach($linea_almacen as $k => $v){
		  $contador +=1;
		  $unidades_totales = 0;
		  $cajas_totales = 0;
		  foreach($linea_lote[$v['id_articulo']] as $dato_lote):
			$unidades_totales += $dato_lote['unidades'];
			$cajas_totales += $dato_lote['cajas'];
			?>
				<tr>
					<td><?php echo "..".substr($dato_lote['id_articulo'], -4)."->".$dato_lote['lote'];?></td>
					<td><?php echo trim($v['nombre']) ?></td>
					<td><input name="<?php echo $dato_lote['id_articulo']."~".$dato_lote['lote']."~"."unidades" ?>" class="form-control" type="number" min=0 max=<?php echo $dato_lote['unidades']?> value="<?php echo ($dato_lote['unidades']-0)?>"></td>  
					<td><input name="<?php echo $dato_lote['id_articulo']."~".$dato_lote['lote']."~"."cajas" ?>" class="form-control" type="number" min=0 max=<?php echo $dato_lote['cajas']?> value="<?php echo ($dato_lote['cajas']-0)?>"></td>  
				</tr>	
			<?php
		  endforeach;
		  if($unidades_totales<$v['unidades'] || $cajas_totales<$v['cajas']){
			  ?>
			  <tr>
			  <td><?php echo "..".substr($v['id_articulo'], -4)?></td>
			  <td><?php echo trim($v['nombre']) ?></td>
			  <td><input name="<?php echo $v['id_articulo']."~"."unidades" ?>" class="form-control" type="number" min=0 max=<?php echo ($v['unidades']-$unidades_totales)?> value="<?php echo ($v['unidades']-$unidades_totales)?>"></td>  
			  <td><input name="<?php echo $v['id_articulo']."~"."cajas" ?>" class="form-control" type="number" min=0 max=<?php echo $v['cajas']-$cajas_totales?> value="<?php echo ($v['cajas']-$cajas_totales)?>"></td>  
			  </tr>
			  <?php
			  }
			}
		  ?>
	  </table>
		  <div class="row">
		  <div class="col-md-6"></div>

		  <hr>
		  <div align="center">
		  <button type="submit"  class="btn btn-block btn-lg btn-success"><strong>Finalizar descarga</strong></button>
		  </div>
		  <hr>
		  <div align="center">
		  <a href="autoventa.php?accion=cancelar_carga" class="btn btn-block btn-xs btn-danger"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar descarga</a>
		  </div>
		  <hr>
		  </div>
	</form>
    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
	<script src="../src/js/formulario.js"></script>
		<script>              //usado para mostrar distintos pop ups
		$(document).ready(function(){
			almacen = $("#almacen_origen").val();
			$("#boton_alta_linea").focus();
			$("#busqueda_nombre").keyup(function(e){
				consulta = $("#busqueda_nombre").val();

				caracteres = $("#busqueda_nombre").val().length;
				if(caracteres >= 3 ){                 
				  //obtenemos el texto introducido en el campo de búsqueda
				  consulta = $("#busqueda_nombre").val();                                     
				  $.ajax({
						type: "GET",
						url: "autoventa.php?accion=busca_listado_almacen&almacen="+almacen,
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
			$( "#seleccion_articulo" ).click(function() {
					var id_almacen = "";
					var id_articulo = $("#seleccion_id").val();
					var tipo = $("#tipo").val();
					var direccion = "autoventa.php?accion=check_id_articulo";
					if(tipo=="descarga"){
						id_almacen = $("#almacen_origen").val();
						direccion = "autoventa.php?accion=check_id_articulo&id_almacen="+id_almacen;
						}
						$.ajax({
							type: "GET",
							url: direccion,
							data: "valor="+id_articulo,
							dataType: "html",
							beforeSend: function(){
							},
							error: function(){
								  alert("No existe artículo con ese Identificador");
							},
							success: function(data){
									if(data==1){
										$(location).attr('href','autoventa.php?accion=inserta_linea_carga&id_articulo='+$("#seleccion_id").val());                                    
										
									}else
										alert("El artículo no existe o no se encuentra en el almacen");
							}
						});
			});                                                                                                                       
});
		</script>  
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
      <?php
	require ('../vista/footer.php');
	?>
</html>