<!-- Fixed navbar -->
    <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Autoventa</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<li  class="dropdown <?php if($_SESSION['menu'] == "venta") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestión de comercial <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../controlador/autoventa.php?accion=alta_venta">Venta</a></li>
                <li><a href="../controlador/autoventa.php?accion=lista_saldo">Cobro</a></li>
              </ul>
            </li>
			<li  class="dropdown <?php if($_SESSION['menu'] == "venta") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimiento <b class="caret"></b></a>
              <ul class="dropdown-menu">
					<li <?php if($_SESSION['menu'] == "almacen") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_almacen">Almacen</a></li>
					<li <?php if($_SESSION['menu'] == "articulo") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_articulo">Articulos</a></li>
					<li <?php if($_SESSION['menu'] == "cliente") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_cliente">Clientes</a></li>
					<li <?php if($_SESSION['menu'] == "agente") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_agente">Agentes</a></li>
					<li <?php if($_SESSION['menu'] == "impuesto") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_impuesto">Impuestos</a></li>
					<li <?php if($_SESSION['menu'] == "familia") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_familia">Familias</a></li>
					<li <?php if($_SESSION['menu'] == "tipo") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_tipo">Tipos de Cliente</a></li>
					
				<li><a href="../controlador/autoventa.php?accion=lista_contador">Contadores</a></li>
			</ul>
            </li>
		<!--	<li <?php if($_SESSION['menu'] == "ruta") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=lista_ruta">Rutas</a></li> -->
			<li  class="dropdown <?php if($_SESSION['menu'] == "historial") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listados <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../controlador/autoventa.php?accion=lista_venta">Listado de ventas</a></li>
				<li><a href="../controlador/autoventa.php?accion=lista_cobro">Listado de cobros</a></li>
				<li><a href="../controlador/autoventa.php?accion=lista_carga">Listado de cargas</a></li>
              </ul>
            </li>
			</ul>
			
          <ul class="nav navbar-nav navbar-right">
		    <li  class="dropdown <?php if($_SESSION['menu'] == "ajustes") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ajustes <b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li><a href="../controlador/autoventa.php?accion=consulta_sesion">Sesión</a></li>
              </ul>
            </li>
			<li  class="dropdown <?php if($_SESSION['menu'] == "imporexpor") echo '"active"'?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movimientos <b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li  <?php if($_SESSION['menu'] == "exporta") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=exporta">Exportar</a></li>
				<li  <?php if($_SESSION['menu'] == "importa") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=importa">Importar</a></li>
				<li  <?php if($_SESSION['menu'] == "carga") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=alta_carga&tipo=carga">Carga</a></li>
				<li  <?php if($_SESSION['menu'] == "descarga") echo 'class="active"'?>><a href="../controlador/autoventa.php?accion=alta_carga&tipo=descarga">Descarga</a></li>
			  </ul>
            </li>
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>