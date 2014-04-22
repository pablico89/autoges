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
	  <h1>Lista de familias <small> <a href="autoventa.php?accion=alta_familia" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Nueva familia</a></small></h1>
	</div>
	<div class="row">
	  <div class="col-md-6">Nombre familia<input type="text" class="form-control" id="busqueda_nombre" placeholder="Nombre de la familia" /></div>
	  <div class="col-md-6">ID familia<input type="number" class="form-control" id="busqueda_id" placeholder="ID de la familia" /></div>
	</div>
				<hr>
				 <table class="table table-list-search table-striped table-bordered">
							<thead>
								<tr class="alert alert-success">
									<th>ID</th>
									<th>Nombre</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody id="resultado">
 
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
			
			$.ajax({
                    type: "GET",
                    url: "autoventa.php?accion=busca_listado&redireccion=consulta_familia&tabla=familia&columna=nombre&numero=1",
                    data: "valor= ",
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
        var consulta;			
         //hacemos focus al campo de búsqueda
       // $("#busqueda").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#busqueda_nombre").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda_nombre").val();                                     
			  $.ajax({
                    type: "GET",
                    url: "autoventa.php?accion=busca_listado&redireccion=consulta_familia&tabla=familia&columna=nombre&numero=1",
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
		$("#busqueda_id").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda_id").val();                                     
			  $.ajax({
                    type: "GET",
                    url: "autoventa.php?accion=busca_listado&redireccion=consulta_familia&tabla=familia&columna=id_familia&numero=1",
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
                                                                   
});
		</script>
    <script src="../src/dist/js/bootstrap.min.js"></script>
  </body>
      <?php
	require ('../vista/footer.php');
	?>
</html>
