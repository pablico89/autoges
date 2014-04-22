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
	  <h1>Lista de almacen <small>Almacen <?php echo $_SESSION['sesion']['id_almacen']?></small></h1>
	</div>
				<hr>
				 <table class="table table-list-search table-striped table-bordered">
							<thead>
								<tr class="alert alert-success">
									<th>ID</th>
									<th>Nombre</th>
									<th>Cajas</th>
									<th>Unidades</th>
								</tr>
							</thead>
							<tbody>
								<?php $contador = 0; foreach ($lista_almacen as $dato): $contador++;?>
										<tr>

										<td><?php echo "..".substr($dato['id_articulo'], -5)?></td>
										<td><?php echo $dato['nombre']; ?></td>
										<td><?php echo $dato['cajas']; ?></td>
										<td><?php echo $dato['unidades']; ?></td>
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
		$(document).ready(function(){
			
                                                                   
});
		</script>  
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
      <?php
	require ('../vista/footer.php');
	?>
</html>
