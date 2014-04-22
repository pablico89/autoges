<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
      <script src="src/assets/js/html5shiv.js"></script>
      <script src="src/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
    <?php
	$_SESSION['menu'] = "index";
	require ('../vista/menu_2.php');
	?>
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
  <body>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-md-3">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Gestion comercial</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in">
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=alta_venta">Nueva venta</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_saldo">Nuevo cobro</a>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								Mantenimiento</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_almacen">Almacen</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_cliente">Clientes</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_articulo">Articulos</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_agente">Agentes</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_impuesto">Impuestos</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_familia">Familias</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_tipo">Tipos de Clientes</a>
										</td>
									</tr>
									
								
									
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_contador">Contadores</a>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
								Listados</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse">
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_venta">Lista de ventas</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_cobro">Lista de cobros</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=lista_carga">Lista de cargas</a>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
								Ajustes</a>
							</h4>
						</div>
						<div id="collapseFour" class="panel-collapse collapse">
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=consulta_sesion">Sesión</a>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
								Movimientos</a>
							</h4>
						</div>
						<div id="collapseFive" class="panel-collapse collapse">
							<div class="panel-body">
								<table class="table">
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=importa">Importar</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=exporta">Exportar</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=alta_carga&tipo=carga">Carga</a>
										</td>
									</tr>
									<tr>
										<td>
											<a href="../controlador/autoventa.php?accion=alta_carga&tipo=descarga">Descarga</a>
										</td>
									</tr>									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-md-9">
			<div class="row">
				<div class="col-md-6">
					<div class="well">
						<img src="../src/img/logo/logo.png" class="img-responsive" alt="Responsive image">
					</div>
				</div>
			  <div class="col-md-6">
			  <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title"><strong>Datos de sesión</strong><br></h3>
				  </div>
				  <div class="panel-body">
					<address>

					  Agente: <?php echo $_SESSION['sesion']['nombre_agente']?><br>
					  Almacen: <?php echo $_SESSION['sesion']['id_almacen']?><br>
					  <div align="center">
					  <a href="autoventa.php?accion=consulta_sesion" class="btn btn-sm btn-primary">Cambiar</a>
					  </div>
					</address>
				  </div>
				</div>
					<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Ultima actualizacion</strong><br></h3>
					</div>
						<div class="panel-body">
							<address>
								Última importacióna <?php echo date("d-m-Y",strtotime($sincronizacion['ultima_importacion']))?><br>
								Última exportación <?php echo date("d-m-Y",strtotime($sincronizacion['ultima_exportacion']))?><br>
							</address>
						</div>
					</div>
				</div>
			</div>


			</div>
		</div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
	<script>   

	//usado para mostrar distintos pop ups
		$(document).ready(function() {

    
});
	</script>  
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
  <?php
  
  require('../vista/footer.php')
  ?>
</html>
