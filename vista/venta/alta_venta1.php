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
	  <h1>Nueva venta <small></small></h1>
	</div>
	<div class="row"> 
	  					<div class="col-md-6">
					  	<div class="input-group">
							<input type="number" id="seleccion_id" class="form-control" autofocus>
							<span class="input-group-btn">
								<button id="seleccion_articulo" class="btn btn-default" type="button">Seleccionar</button>
							</span>
						</div><!-- /input-group -->
						</div>
	  <div class="col-md-6"><input type="text" class="form-control" id="busqueda_nombre" placeholder="Busqueda..." /></div>
	</div>
		<hr>
     	<table class="table table-striped table-bordered">
							<thead>
								<tr class="alert alert-success">
									<th>#</th>
									<th>Nombre</th>
									<th>Nombre comercial</th>
									<th>Seleccionar</th>

								</tr>
							</thead>
							<tbody id="resultado">


							</tbody>
	</table>    


    </div> <!-- /container -->


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/assets/js/jquery.js"></script>
	<script>              //usado para mostrar distintos pop ups
		$(document).ready(function(){
                                
        var consulta;


						
         //hacemos focus al campo de búsqueda
       // $("#busqueda").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#busqueda_nombre").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda_nombre").val();                                     
			  $.ajax({
                    type: "GET",
                    url: "autoventa.php?accion=busca_listado&redireccion=alta_venta2&tabla=cliente&columna=nombre",
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
        });
		$( "#seleccion_articulo" ).click(function() {
							var id_cliente = $("#seleccion_id").val();
								$.ajax({
									type: "GET",
									url: "autoventa.php?accion=check_id_cliente&id_cliente="+id_cliente,
									data: "valor="+id_cliente,
									dataType: "html",
									beforeSend: function(){
									},
									error: function(){
										  alert("No existe cliente con ese Identificador");
									},
									success: function(data){
											if(data==1)
												$(location).attr('href','autoventa.php?accion=alta_venta2&id_cliente='+$("#seleccion_id").val());                                    
											else
												alert("Cliente no encontrado");
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
