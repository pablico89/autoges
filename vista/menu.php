<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Autoventa</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<li  class="dropdown <?php if($_SESSION['menu'] == "venta") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestión de venta <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="controlador/autoventa.php?accion=alta_venta">Venta</a></li>
                <li><a href="controlador/autoventa.php?accion=lista_saldo">Cobro</a></li>
              </ul>
            </li>
			<li <?php if($_SESSION['menu'] == "articulo") echo 'class="active"'?>><a href="controlador/autoventa.php?accion=lista_articulo">Articulos</a></li>
            <li <?php if($_SESSION['menu'] == "cliente") echo 'class="active"'?>><a href="controlador/autoventa.php?accion=lista_cliente">Clientes</a></li>
		<!--	<li	<li <?php if($_SESSION['menu'] == "ruta") echo 'class="active"'?>><a href="controlador/autoventa.php?accion=lista_ruta">Rutas</a></li> -->
			<li  class="dropdown <?php if($_SESSION['menu'] == "historial") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Historial <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="controlador/autoventa.php?accion=lista_venta">Lista de venta</a></li>
				<li><a href="controlador/autoventa.php?accion=lista_cobro">Lista de cobros</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
		  	<li  class="dropdown <?php if($_SESSION['menu'] == "ajustes") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ajustes <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="controlador/autoventa.php?accion=lista_venta">Contadores</a></li>
				
              </ul>
            </li>
            <li  <?php if($_SESSION['menu'] == "exporta") echo 'class="active"'?>><a href="controlador/autoventa.php?accion=exporta">Exportar</a></li>
            <li  <?php if($_SESSION['menu'] == "importa") echo 'class="active"'?>><a href="controlador/autoventa.php?accion=importa">Importar</a></li>

		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>