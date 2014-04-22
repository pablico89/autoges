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

  <body onload="recalcula()">
<?php
?>
    <div class="container">


		<form class="form-horizontal" role="form" action="autoventa.php" method="POST">
				  <div align="center">
		  	<button type="submit" class="btn btn-block btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Volver a líneas</button>
		  </div>
		  	<div class="page-header">
	  <h1>Datos de linea <small><?php echo $datos_linea['nombre']?></small></h1>
	</div>
		<input type="hidden" name="accion" value="modifica_linea">
		<input type="hidden" name="id_articulo" id="id_articulo" value="<?php echo $id_articulo?>">
		<input type="hidden" name="cantidad" id="cantidad" value="<?php echo $datos_linea['cantidad']?>">
		<input type="hidden" name="recargo_aplicado" id="recargo_aplicado" value="<?php echo $datos_linea['recargo_aplicado']?>">
		<input type="hidden" name="iva_aplicado" id="iva_aplicado" value="<?php echo $datos_linea['iva_aplicado']?>">
		<input type="hidden" name="modeloAB" id="modeloAB" value="<?php echo $_SESSION['datos_cabecera']['modelo']?>">
		<input type="hidden" name="venta" id="venta" value="<?php echo $_SESSION['datos_cabecera']['venta']?>">
		<input type="hidden" name="recargoSN" id="recargoSN" value="<?php echo $_SESSION['datos_cabecera']['recargo']?>">
		<input type="hidden" name="tarifa" id="tarifa" value="<?php echo $_SESSION['datos_cabecera']['tarifa']?>">
		<input type="hidden" name="recargo" id="recargo" value="<?php echo $datos_linea['recargo']?>">
		<input type="hidden" name="id_linea" id="id_linea" value="<?php echo $datos_linea['id_linea']?>">
		<input type="hidden" name="iva" id="iva" value="<?php echo $datos_linea['iva']?>">
		<input type="hidden" name="miga" id="miga" value="<?php echo $miga?>">
		<input type="hidden" id="descuento_familia" name="descuento_familia" value="<?php echo $datos_linea['descuento_familia']?>">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Cajas</label>
			<div class="col-sm-4 input-group">
				<input class="form-control" type="number" autocomplete="off" step="any"  id="cajas" onchange="recalcula()" name="cajas" value="<?php echo $datos_linea['cajas']?>" <?php if(($datos_linea['cajasn'])=="N") echo 'disabled'?> autofocus>

				<input type="hidden" class="form-control" id="uni_caja" name="uni_caja" value="<?php echo $datos_linea['uni_caja']?>">
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">Unidades</label>
			<div class="col-sm-4 input-group">
				<input type="number" step="any" autocomplete="off" class="form-control" id="unidades" onchange="recalcula()" name="unidades" value="<?php echo $datos_linea['unidades']?>">

			</div>

		</div>	
			
		<?php 
		if($datos_linea['lotesn'] == "S")	
		if(!empty($datos_lote)){?>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Lotes sugeridos</label>
			<div class="col-sm-10">
				<select id="lote" name="lote" class="form-control">
					<?php foreach ($datos_lote as $dato): ?>
					<option value="<?php echo $dato['lote'];?>" <?php if($datos_linea['lote']== $dato['lote']) echo "selected" ?> ><?php echo $dato['lote']." | ".$dato['unidades']." u.| ".$dato['cajas']." c." ?></option>
					<?php endforeach; ?> 
				</select>
			</div>
		  </div>
		  <?php }
		  
		  
		if($datos_linea['lotesn'] == "S"){?>
		   <div class="form-group">
		   
			<label for="inputEmail3" class="col-sm-2 control-label">Lote manual </label>
			<div class="col-sm-3 input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="lote2_select" value="si" <?php if($datos_linea['lote2_select'] == "si") echo "checked"?>>
			</span>
				<input class="form-control" autocomplete="off" id="lote2" onchange="recalcula()" name="lote2" value="<?php if($datos_linea['lote2']!="") echo $datos_linea['lote2']; else echo date("dmy"); ?>" placeholder="introduzca manualmente un lote">
				
			</div>
		  </div>
			<?php
			}
			?>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Precio (€)</label>
			<div class="col-sm-4 input-group">
				<input class="form-control" type="number" step="any"  id="precio" onchange="recalcula()" name="precio" value="<?php echo $datos_linea['pvp']?>" placeholder="€">
				<span class="input-group-addon">€</span>
			</div>
		  </div>		
		  <hr>
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
							 
							  <input class="form-control" id="liquido_linea" onchange="recalcula()" name="liquido_linea" value="<?php echo $datos_linea['liquido_linea']?>">
								<span class="input-group-addon glyphicon glyphicon-plus-sign">Desplegar</span>
							</div>
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
					  <div class="panel-body">
						<div class="form-group">
							<div class="input-group input-group-sm">
							 <span class="input-group-addon">Base linea</span>
							  <input class="form-control" id="base_linea" onchange="recalcula()" name="base_linea" value="<?php echo $datos_linea['base_linea']?>">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group input-group-sm">
							 <span class="input-group-addon">Descuentos %</span>
							  <input class="form-control" id="descuento_linea" onchange="recalcula()" name="descuento_linea" value="<?php echo $datos_linea['descuento_linea']?>">
							</div>
						</div>
						<div class="form-group ">
								<div class="col-sm-9">
									<div class="input-group input-group-sm">
									<span class="input-group-addon">De cabecera</span>
									<input class="form-control" id="descuento_general" name="descuento_general" value="<?php echo $_SESSION['datos_cabecera']['descuento_general']?>" disabled>									</div>
								</div>
						</div>
						<div class="form-group ">
								<div class="col-sm-9">
									<div class="input-group input-group-sm">
									<span class="input-group-addon">De familia</span>
									<input class="form-control" id="descuento_familia" onchange="recalcula()" name="descuento_familia" value="<?php echo $datos_linea['descuento_familia']?>" disabled>
									</div>
								</div>
						</div>
					  <div class="form-group ">
								<div class="col-sm-9">
									<div class="input-group input-group-sm">
									<span class="input-group-addon">De artículo</span>
									<input class="form-control" autocomplete="off" id="descuento_articulo" onchange="recalcula()" name="descuento_articulo" value="<?php echo $datos_linea['descuento_articulo']?>">									</div>
								</div>
					  </div>
					
					  </div>
					</div>
				  </div>
				  </div>
				</div>
			</div>
		  </div>
		  </div>

		  <div align="center">
		  	<button type="submit" class="btn btn-block btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Volver a líneas</button>
		  </div>
		</form>

    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
	<script>   
			function recalcula(){
					if($( "#unidades" ).val() == ''){
						$( "#unidades" ).val('0');
					}
					if($( "#cajas" ).val() == ''){
						$( "#cajas" ).val('0');
					}
					if($( "#descuento_general" ).val()== ''){
						$( "#descuento_general" ).val('0');
					}
					if($( "#descuento_familia" ).val()== ''){
						$( "#descuento_general" ).val('0');
					}
					if($( "#descuento_articulo" ).val()== ''){
						$( "#descuento_articulo" ).val('0');
					}
				var descuento_linea = 0;
				var precio_total = 0;
				var modeloAB = document.getElementById('modeloAB').value;
				var venta = document.getElementById('venta').value;
				var recargoSN = document.getElementById('recargoSN').value;
				var precio_bruto = parseFloat(document.getElementById('precio').value);
				
			/******************DATOS COMUNES *******************************/
				//obtenemos unidades y cajas y cuantía general GENERAL                      FUNCIONA
				var unidades = document.getElementById('unidades');
				var cajas = document.getElementById('cajas');
				if(document.getElementById('cajas').value == "")
					document.getElementById('cajas').value = 0;
				var uni_caja = document.getElementById('uni_caja');
				var cantidad = parseFloat(unidades.value) + parseFloat(cajas.value) * parseFloat(uni_caja.value);
				
				//obtenemos todos los descuentos											FUNCIONA
				if(document.getElementById('descuento_familia').value == "") //DE FAMILIA
					document.getElementById('descuento_familia').value = 0;
				var descuento_familia = document.getElementById('descuento_familia').value;
				if(document.getElementById('descuento_general').value == "") //EL GENERAL
					document.getElementById('descuento_general').value = 0;
				var descuento_general = document.getElementById('descuento_general').value;
				var descuento_articulo = document.getElementById('descuento_articulo').value; //EL PROPIO DEL ARTICULO
				descuento_total = parseFloat(descuento_familia) + parseFloat(descuento_articulo); //TODO EL DESCUENTO
				
				//calculamos el importe de linea y la base ( cantidad*precio - descuentos  )
				
				var importe_linea = ((cantidad * precio_bruto)-((cantidad*precio_bruto)*(descuento_total)/100)).toFixed(2);
				var base_linea = (importe_linea - (importe_linea*descuento_general)/100).toFixed(2);
				var descuento_linea = descuento_total +  parseFloat(descuento_general);

				if(document.getElementById('tarifa').value == 'I'){
					base_linea = (base_linea/(1 + document.getElementById('iva_aplicado').value/100)).toFixed(2);
				}
				
				var liquido_linea = 0;
				var iva_aplicado = 0;
				var recargo_aplicado = 0;
				
				if(modeloAB == 'A'){
					iva_aplicado = document.getElementById('iva_aplicado').value;
					recargo_aplicado = document.getElementById('recargo_aplicado').value;
				
				}
				if(recargoSN == 'S'){
					iva_aplicado = document.getElementById('iva_aplicado').value;
					recargo_aplicado = document.getElementById('recargo_aplicado').value;				
				}
				if(recargoSN == 'N'){
					iva_aplicado = document.getElementById('iva_aplicado').value;
					recargo_aplicado = 0;			
				}
				if(recargoSN == 'E'){
					iva_aplicado = 0;
					recargo_aplicado = 0;					
				}				
				if(modeloAB == 'B'){
					iva_aplicado = 0;
					recargo_aplicado = 0;				
				}

				liquido_linea = (parseFloat(base_linea) + parseFloat(base_linea)*(parseFloat(iva_aplicado) + parseFloat(recargo_aplicado))/100).toFixed(2);

				$( "#liquido_linea" ).val(liquido_linea);
				$( "#base_linea" ).val(base_linea);
				$( "#descuento_linea" ).val(descuento_linea);
				$( "#iva_aplicado" ).val(iva_aplicado);
				$( "#recargo_aplicado" ).val(recargo_aplicado);
				$( "#cantidad" ).val(cantidad);
		}

	
	
	//usado para mostrar distintos pop ups
		$(document).ready(function() {
		$('.collapse').collapse();
		$( "#cajas" ).click(function() {
			$( "#cajas" ).val('');
		});
		$("#cajas").keyup(function(e){
			recalcula();		
		});
		$( "#unidades" ).click(function() {
			$( "#unidades" ).val('');
		});
		$("#unidades").keyup(function(e){
			recalcula();		
		});
});
		</script>  
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
      <?php
	require ('../vista/footer.php');
	?>
</html>
