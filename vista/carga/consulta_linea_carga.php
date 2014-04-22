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
		<input type="hidden" name="accion" value="modifica_linea_carga">
		<input type="hidden" name="id_linea_carga" id="id_linea_carga" value="<?php echo $id_linea_carga?>">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Cajas</label>
			<div class="col-sm-4 input-group">
				<input class="form-control" autocomplete="off" autofocus="autofocus" type="number" step="any"  id="cajas" onchange="recalcula()" name="cajas" value="<?php echo $datos_linea['cajas']?>" <?php if(($datos_linea['cajasn'])=="N") echo 'disabled'?>>
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">Unidades</label>
			<div class="col-sm-4 input-group">
				<input type="number" step="any" autocomplete="off" class="form-control" id="unidades" onchange="recalcula()" name="unidades" value="<?php echo $datos_linea['unidades']?>">

			</div>

		</div>	
			
		<?php 
		if($_SESSION['lineas_carga'][$id_linea_carga]['lotesn'] == "S"){?>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Lote: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" autocomplete="off" name="lote" id="lote" value="<?php echo $datos_linea['lote']?>">
			</div>
		  </div>
		  <?php }  ?>
		  
		
		
		  <hr>

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
