<?php

require ('../conectar.php'); // cargo clase para la conexión a la BD

function check_id_cliente($id_cliente) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT id_cliente FROM cliente WHERE id_cliente = '".$id_cliente."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
	desconectar($cn); // método de conectar.php desconexión a la bd
	if($datos[0]['id_cliente']!="")
		return 1;
	else
		return 0;
	}
function check_id_articulo($id_articulo) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT id_articulo FROM articulo WHERE id_articulo = '".$id_articulo."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
	desconectar($cn); // método de conectar.php desconexión a la bd
	if($datos[0]['id_articulo']!="")
		return 1;
	else
		return 0;
	}
	
function check_id_articulo_almacen($id_articulo, $id_almacen) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT articulo.id_articulo FROM articulo, almacen WHERE articulo.id_articulo = '".$id_articulo."'
			  AND almacen.id_almacen = '".$id_almacen."' AND articulo.id_articulo = almacen.id_articulo";
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
	desconectar($cn); // método de conectar.php desconexión a la bd
	if($datos[0]['id_articulo']!="")
		return 1;
	else
		return 0;
	}

function obtener_contador($id_contador) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT valor FROM contador WHERE id_contador = '".$id_contador."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
	
    $query = "UPDATE contador SET valor = valor + 1 WHERE id_contador = '".$id_contador."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql	
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]['valor']; // retorna el resultado al controlador
	}
function consulta_almacen($id_almacen){
	$cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT almacen.*, articulo.nombre FROM almacen, articulo WHERE almacen.id_almacen = '".$id_almacen."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos_almacen = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos_almacen[$fila['id_articulo']] = $fila;
	}
	
	
}
function consulta_agente($id_agente) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM agente WHERE id_agente = '".$id_agente."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd

    return $datos[0]; // retorna el resultado al controlador
	}
	
function consulta_impuesto($id_impuesto) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM impuesto WHERE id_impuesto = '".$id_impuesto."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd

    return $datos[0]; // retorna el resultado al controlador
	}
function consulta_fpago($id_fpago) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM fpago WHERE id_fpago = '".$id_fpago."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd

    return $datos[0]; // retorna el resultado al controlador
	}
function consulta_tipo($id_tipo) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM tipo WHERE id_tipo = '".$id_tipo."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd

    return $datos[0]; // retorna el resultado al controlador
	}
function consulta_familia($id_familia) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM familia WHERE id_familia = '".$id_familia."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd

    return $datos[0]; // retorna el resultado al controlador
	}	
function consulta_cliente($id_cliente) { // lista todos los citas
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM cliente WHERE id_cliente = '".$id_cliente."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd

    return $datos[0]; // retorna el resultado al controlador
	}
function guarda_carga($datos_carga, $lineas_carga){

    $cn = conectar(); // método de conectar.php para hacer conexión
	
	//primero obtenemos el número de serie de contador
	$contador = obtener_contador("Z");   //Z es para las cargas
	$id_carga = "Z".str_pad($contador, 6, '0', STR_PAD_LEFT);
    $time=time();
	$hora = date("H:i:s",$time);
	$fecha = date("Y-m-d");
	
	$contador = 1;
	$unidades = 0;
	$cajas = 0;
	foreach($lineas_carga as $linea):
			$unidades += $linea['unidades'];
			$cajas += $linea['cajas'];
		    $query = "INSERT INTO linea_carga VALUES ('".$id_carga."', '".$contador."'
			, '".$linea['id_articulo']."', '".$linea['lote']."', '".$linea['cajas']."'
			, '".$linea['unidades']."')"; // sql para ejecutar
			$resultado = $cn->query($query); // ejecución del sql
			
			
			$query = "INSERT INTO almacen VALUES ('".$datos_carga['almacen_destino']."','".$linea['id_articulo']."'
			, '".$linea['unidades']."', '".$linea['cajas']."')
			ON DUPLICATE KEY UPDATE
			unidades=unidades + '".$linea['unidades']."' , cajas=cajas + '".$linea['cajas']."'";
			$resultado = $cn->query($query); // ejecución del sql
			if($linea['lote']!=""){
				$query = "INSERT INTO lote VALUES ('".$datos_carga['almacen_destino']."','".$linea['id_articulo']."'
				,'".$linea['lote']."', '".$linea['unidades']."', '".$linea['cajas']."')
				ON DUPLICATE KEY UPDATE
				unidades=unidades + '".$linea['unidades']."' , cajas=cajas + '".$linea['cajas']."'";
				$resultado = $cn->query($query); // ejecución del sql
			}
			$contador++;
	endforeach;
	
	$query = "INSERT INTO carga VALUES ('".$id_carga."', '".$fecha."', '".$datos_carga['id_agente']."',
	'".$datos_carga['almacen_origen']."', '".$datos_carga['almacen_destino']."','".$unidades."'
	,'".$cajas."','C')"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql
	
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $id_carga; // retorna el resultado al controlador

}

function guarda_descarga($datos_carga, $lista_articulos, $lista_articulos_lote){

    $cn = conectar(); // método de conectar.php para hacer conexión
	
	//primero obtenemos el número de serie de contador
	$contador = obtener_contador("Z");   //Z es para las cargas
	$id_carga = "Z".str_pad($contador, 6, '0', STR_PAD_LEFT);
    $time=time();
	$hora = date("H:i:s",$time);
	$fecha = date("Y-m-d");
	
	$contador = 1;
	$unidades = 0;
	$cajas = 0;
	foreach($lista_articulos as $linea):
			$unidades += $linea['unidades'];
			$cajas += $linea['cajas'];
		    $query = "INSERT INTO linea_carga VALUES ('".$id_carga."', '".$contador."'
			, '".$linea['id_articulo']."', '', '".$linea['cajas']."'
			, '".$linea['unidades']."')"; // sql para ejecutar
			$resultado = $cn->query($query); // ejecución del sql
			
			
			$query = "INSERT INTO almacen VALUES ('".$datos_carga['almacen_destino']."','".$linea['id_articulo']."'
			, '".$linea['unidades']."', '".$linea['cajas']."')
			ON DUPLICATE KEY UPDATE
			unidades=unidades + '".$linea['unidades']."' , cajas=cajas + '".$linea['cajas']."'";
			$resultado = $cn->query($query); // ejecución del sql
			
			$query = "UPDATE almacen SET unidades = unidades - '".$linea['unidades']."',
			cajas = cajas - '".$linea['cajas']."' WHERE id_articulo = '".$linea['id_articulo']."' AND id_almacen= '".$datos_carga['almacen_origen']."'";
			$resultado = $cn->query($query); // ejecución del sql
			
			$contador++;
	endforeach;
	
	foreach($lista_articulos_lote as $linea_lote):
			foreach($linea_lote as $linea):
				$unidades += $linea['unidades'];
				$cajas += $linea['cajas'];
				$query = "INSERT INTO linea_carga VALUES ('".$id_carga."', '".$contador."'
				, '".$linea['id_articulo']."', '".$linea['lote']."', '".$linea['cajas']."'
				, '".$linea['unidades']."')"; // sql para ejecutar
				$resultado = $cn->query($query); // ejecución del sql

				$query = "INSERT INTO almacen VALUES ('".$datos_carga['almacen_destino']."','".$linea['id_articulo']."'
				, '".$linea['unidades']."', '".$linea['cajas']."')
				ON DUPLICATE KEY UPDATE
				unidades=unidades + '".$linea['unidades']."' , cajas=cajas + '".$linea['cajas']."'";
				$resultado = $cn->query($query); // ejecución del sql

				$query = "INSERT INTO lote VALUES ('".$datos_carga['almacen_destino']."','".$linea['id_articulo']."'
				,'".$linea['lote']."', '".$linea['unidades']."', '".$linea['cajas']."')
				ON DUPLICATE KEY UPDATE
				unidades=unidades + '".$linea['unidades']."' , cajas=cajas + '".$linea['cajas']."'";
				$resultado = $cn->query($query); // ejecución del sql

				$query = "UPDATE lote SET unidades = unidades - '".$linea['unidades']."',
				cajas = cajas - '".$linea['cajas']."' WHERE id_articulo = '".$linea['id_articulo']."' AND id_almacen= '".$datos_carga['almacen_origen']."'";
				$resultado = $cn->query($query); // ejecución del sql

				$query = "UPDATE almacen SET unidades = unidades - '".$linea['unidades']."',
				cajas = cajas - '".$linea['cajas']."' WHERE id_articulo = '".$linea['id_articulo']."' AND id_almacen= '".$datos_carga['almacen_origen']."'";
				$resultado = $cn->query($query); // ejecución del sql
				$contador++;
		endforeach;
	endforeach;
	
	
	
	$query = "INSERT INTO carga VALUES ('".$id_carga."', '".$fecha."', '".$datos_carga['id_agente']."',
	'".$datos_carga['almacen_origen']."', '".$datos_carga['almacen_destino']."','".$unidades."'
	,'".$cajas."','D')"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql
	
	$query = "DELETE FROM almacen WHERE cajas <= 0 AND unidades <= 0"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql
	
	$query = "DELETE FROM lote WHERE cajas <= 0 AND unidades <= 0"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql
	
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $id_carga; // retorna el resultado al controlador

}

function lista_familia() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM familia ORDER BY id_familia ASC"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
	
function lista_impuesto() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM impuesto"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}

	
function lista_carga() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM carga"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_cliente() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM cliente"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[$fila['id_cliente']] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_almacen($id_almacen) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT almacen.*, articulo.id_articulo, articulo.nombre 
			FROM almacen,articulo
			WHERE almacen.id_articulo = articulo.id_articulo
			AND almacen.id_almacen = '".$id_almacen."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[$fila['id_articulo']] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_agente() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM agente"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
	
function lista_contador() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM contador"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
	
function lista_articulo_general() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM articulo"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}

function lista_articulo($datos_cabecera) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT id_articulo, nombre, pvp".$datos_cabecera['tarifa']." AS pvp FROM articulo"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[$fila['id_articulo']] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_lote($id_articulo, $id_almacen) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM lote WHERE id_articulo = '".$id_articulo."' AND id_almacen = '".$id_almacen."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_lote_almacen($id_almacen) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM lote WHERE id_almacen='".$id_almacen."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[$fila['id_articulo']][] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_saldo($filtro) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT saldo.*, cliente.nombre FROM saldo, cliente WHERE saldo.id_cliente = cliente.id_cliente AND saldo.importe > 0"; // sql para ejecutar
	if($filtro != "")
		$query = $query." AND saldo.id_cliente = '".$filtro."'";
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[$fila['id_venta']] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_cobro($filtro) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT cobro.*, cliente.nombre FROM cobro, cliente WHERE cobro.id_cliente = cliente.id_cliente "; // sql para ejecutar
	if($filtro != "")
		$query = $query." AND cobro.id_cliente = '".$filtro."'";
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}

function limpia_almacen(){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM almacen"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
	foreach($datos as $dato):
		borra_almacen($cn, $dato['id_articulo']);
	endforeach;
	desconectar($cn);
}
function borra_almacen($cn, $id_articulo){

    $query = "SELECT * FROM articulo WHERE id_articulo = '".$id_articulo."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
	if($datos[0]['id_articulo'] ==""){
		$query = "DELETE FROM almacen WHERE id_articulo = '".$id_articulo."'"; // sql para ejecutar
		$resultado = $cn->query($query);// ejecución del sql
		}
}

function modifica_sesion($id_agente, $id_almacen){
	$cn = conectar();
	$query = "UPDATE SESION SET id_agente = '".$id_agente."', id_almacen='".$id_almacen."' ";
	$resultado = $cn->query($query);// ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd

}
function consulta_sesion(){
	$cn = conectar();
	$query = "SELECT * FROM sesion";
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
}

function consulta_articulo_general($id_articulo){
	$cn = conectar();
	$query = "SELECT * FROM articulo WHERE
	articulo.id_articulo = '".$id_articulo."'";
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
}

function consulta_articulo($id_articulo, $id_cliente, $tarifa){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT *,pvp".$tarifa." AS pvp, descuento AS descuento_articulo FROM articulo WHERE id_articulo = '".$id_articulo."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
	$query = "SELECT * FROM impuesto WHERE id_impuesto = '".$datos[0]['id_impuesto']."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$impuesto = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$impuesto[] = $fila;
	}
	$datos[0]['iva_aplicado'] = $impuesto[0]['iva'];
	$datos[0]['recargo_aplicado'] = $impuesto[0]['recargo'];
	$query = "SELECT * FROM dctoart WHERE id_cliente='".$id_cliente."' AND id_articulo = '".$id_articulo."'";
	$resultado = $cn->query($query);// ejecución del sql
	$descuento_articulo = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$descuento_articulo[] = $fila;
	}
	if($descuento_articulo[0]['precio'] != "")
	$datos[0]['pvp'] = $descuento_articulo[0]['precio'];
	if($descuento_articulo[0]['dcto'] != "")
	$datos[0]['descuento_articulo'] = $descuento_articulo[0]['dcto'];
	
	$query = "SELECT * FROM dctofam WHERE id_cliente='".$id_cliente."' AND id_familia = '".$datos[0]['id_familia']."' ";
	$resultado = $cn->query($query);// ejecución del sql
	$descuento_familia = array(); //inicializamos el array
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$descuento_familia[] = $fila;
	}
	$datos[0]['descuento_familia'] = $descuento_familia[0]['dcto'];
	
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador

}
function lista_descuento_familia($datos_cabecera){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM dctofam WHERE id_cliente = '".$datos_cabecera['id_cliente']."'"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $resultado; // retorna el resultado al controlador
}
function lista_descuento_articulo($datos_cabecera){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM dctoart WHERE id_cliente = '".$datos_cabecera['id_cliente']."'"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $resultado; // retorna el resultado al controlador
}

function consulta_cobro($id_venta, $linea){

    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT cobro.*, cliente.nombre, cliente.nombre_comercial, cliente.direccion,
	cliente.telefono
	FROM venta, cliente, cobro
	WHERE cobro.id_venta = '".$id_venta."'
	AND cobro.linea = '".$linea."'
	AND cobro.id_venta = venta.id_venta
	AND cobro.id_cliente = cliente.id_cliente"; // sql para ejecutar	$resultado = $cn->query($query);// ejecución del sql
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
}

function consulta_carga($id_carga){

    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT carga.*
	FROM carga 
	WHERE carga.id_carga = '".$id_carga."'"; // sql para ejecutar	$resultado = $cn->query($query);// ejecución del sql
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
}

function consulta_lineas_carga($id_carga){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM linea_carga, articulo 
	WHERE linea_carga.id_carga = '".$id_carga."'
	AND articulo.id_articulo = linea_carga.id_articulo"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
}

function consulta_venta($id_venta){

    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT venta.*, cliente.nombre, cliente.recargo, cliente.tarifa, cliente.cif, 
	cliente.id_cliente, cliente.direccion, cliente.codpostal, cliente.nombre_comercial, cliente.poblacion,
	cliente.telefono
	FROM venta, cliente 
	WHERE venta.id_venta = '".$id_venta."'
	AND venta.id_cliente = cliente.id_cliente"; // sql para ejecutar	$resultado = $cn->query($query);// ejecución del sql
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
}

function consulta_lineas($id_venta){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM linea_venta, articulo 
	WHERE linea_venta.id_venta = '".$id_venta."'
	AND articulo.id_articulo = linea_venta.id_articulo"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
}
function consulta_lineas_historial($id_venta){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT linea_venta.*, articulo.*, impuesto.iva AS iva_aplicado,
	impuesto.recargo AS recargo_aplicado FROM linea_venta, articulo, impuesto
	WHERE linea_venta.id_venta = '".$id_venta."'
	AND articulo.id_articulo = linea_venta.id_articulo
	AND impuesto.id_impuesto = articulo.id_impuesto"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	$id_linea = 0;
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$fila['id_linea'] = $id_linea;
		$datos[$id_linea] = $fila;
		$id_linea ++;
	}
	
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
}

function modifica_contador($datos_contador){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "UPDATE contador SET valor = '".$datos_contador['C']."' WHERE id_contador = 'C'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$query = "UPDATE contador SET valor = '".$datos_contador['A']."' WHERE id_contador = 'A'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$query = "UPDATE contador SET valor = '".$datos_contador['F']."' WHERE id_contador = 'F'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$query = "UPDATE contador SET valor = '".$datos_contador['D']."' WHERE id_contador = 'D'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$query = "UPDATE contador SET valor = '".$datos_contador['B']."' WHERE id_contador = 'B'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$query = "UPDATE contador SET valor = '".$datos_contador['N']."' WHERE id_contador = 'N'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}


function consulta_saldo($id_venta){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT cliente.nombre_comercial, saldo.* 
	FROM cliente, saldo 
	WHERE saldo.id_cliente = cliente.id_cliente 
	AND saldo.id_venta = '".$id_venta."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
}

function guarda_venta($datos_cabecera, $datos_linea){

    $cn = conectar(); // método de conectar.php para hacer conexión
	if($datos_cabecera['modelo'] =="B" && $datos_cabecera['venta'] == "F")
		$datos_cabecera['venta'] = "B";
	//primero obtenemos el número de serie de contador
	$contador = obtener_contador($datos_cabecera['venta']);
	$id_venta = $datos_cabecera['venta'].str_pad($contador, 6, '0', STR_PAD_LEFT);
    $time=time();
	$hora = date("H:i:s",$time);
	$fecha = date("Y-m-d");
    $query = "INSERT INTO venta VALUES ('".$datos_cabecera['venta']."','".$id_venta."','".$datos_cabecera['id_almacen']."'
	,'".$fecha."','".$datos_cabecera['id_cliente']."','".$datos_cabecera['id_agente']."', '".$datos_cabecera['descuento_general']."','".$datos_cabecera['total_base']."'
	,'".$datos_cabecera['descuento']."','".$datos_cabecera['total_base']."','".$datos_cabecera['total_iva']."','".$datos_cabecera['total_recargo']."'
	,'".$datos_cabecera['cobrado']."','".$hora."','".$datos_cabecera['observaciones']."','".$datos_cabecera['modelo']."'
	,'".$datos_cabecera['base2']."','".$datos_cabecera['base3']."','".$datos_cabecera['iva2']."',
	'".$datos_cabecera['iva3']."','".$datos_cabecera['recargo2']."','".$datos_cabecera['recargo3']."',
	'".$datos_cabecera['total_liquido']."','".$datos_cabecera['cuota_iva']."','".$datos_cabecera['cuota_recargo']."','".$datos_cabecera['id_fpago']."')"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql

	$contador = 1;
	foreach($datos_linea as $linea):
			if($linea['lote2_select']=="si")
				$linea['lote'] = $linea['lote2'];
				
		    $query = "INSERT INTO linea_venta VALUES ('".$datos_cabecera['venta']."', '".$id_venta."'
			, '".$contador."', '".$linea['id_articulo']."', '".$linea['nombre']."', '".$linea['cantidad']."'
			, '".$linea['pvp']."', '".$linea['descuento_articulo']."', '".$linea['descuento_familia']."'
			, '".$linea['unidades']."', '".$linea['cajas']."', '".$linea['lote']."', '".$linea['liquido_linea']."'
			, '".$linea['descuento']."', '".$linea['base_linea']."', '".$linea['total_iva']."', '".$linea['total_recargo']."'
			, '".$linea['id_impuesto']."')"; // sql para ejecutar
			$resultado = $cn->query($query); // ejecución del sql
			$contador++;
			
			if($linea['lote']!=""){
				$query = "UPDATE lote SET unidades = unidades - '".$linea['unidades']."', cajas = cajas - '".$linea['cajas']."'
				WHERE id_lote = '".$linea['lote']."' AND id_articulo = '".$linea['id_articulo']."'
				AND id_almacen = '".$datos_cabecera['id_almacen']."'"; // sql para ejecutar
				$resultado = $cn->query($query); // ejecución del sql
			}
	endforeach;
	

	$query = "INSERT INTO saldo VALUES ('".$datos_cabecera['id_cliente']."', '".$id_venta."', '".$datos_cabecera['total_liquido']."')";
	$resultado = $cn->query($query);
	
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $id_venta; // retorna el resultado al controlador

}

function modifica_venta($id_venta, $datos_cabecera, $datos_linea){

    $cn = conectar(); // método de conectar.php para hacer conexión
	

	$fecha_actual = date("Y-m-d");
	$time = time();
	$hora_actual=date("H:i:s",$time);
	
	$query = "DELETE FROM venta WHERE id_venta = '".$id_venta."'";
	$resultado = $cn->query($query); // ejecución del sql
	
	$query = "DELETE FROM linea_venta WHERE id_venta = '".$id_venta."'";
	$resultado = $cn->query($query); // ejecución del sql
	
	$query = "DELETE FROM saldo WHERE id_venta = '".$id_venta."'";
	$resultado = $cn->query($query); // ejecución del sql
	$query = "DELETE FROM cobro WHERE id_venta = '".$id_venta."'";
	$resultado = $cn->query($query); // ejecución del sql
	// método de conectar.php para hacer conexión
	
	//primero obtenemos el número de serie de contador

    $time=time();

    $query = "INSERT INTO venta VALUES ('".$datos_cabecera['venta']."','".$id_venta."','01'
	,'".$fecha."','".$datos_cabecera['id_cliente']."','01', '".$datos_cabecera['descuento_general']."','".$datos_cabecera['total_base']."'
	,'".$datos_cabecera['descuento']."','".$datos_cabecera['total_base']."','".$datos_cabecera['total_iva']."','".$datos_cabecera['total_recargo']."'
	,'".$datos_cabecera['cobrado']."','".$hora."','".$datos_cabecera['observaciones']."','".$datos_cabecera['modelo']."'
	,'".$datos_cabecera['base2']."','".$datos_cabecera['base3']."','".$datos_cabecera['iva2']."',
	'".$datos_cabecera['iva3']."','".$datos_cabecera['recargo2']."','".$datos_cabecera['recargo3']."',
	'".$datos_cabecera['total_liquido']."','".$datos_cabecera['cuota_iva']."','".$datos_cabecera['cuota_recargo']."','".$datos_cabecera['id_fpago']."')"; // sql para ejecutar
    $resultado = $cn->query($query); // ejecución del sql
	
	$contador = 1;
	foreach($datos_linea as $linea):
			if($linea['lote2_select']=="si")
				$linea['lote'] = $linea['lote2'];
				
		    $query = "INSERT INTO linea_venta VALUES ('".$datos_cabecera['venta']."', '".$id_venta."'
			, '".$contador."', '".$linea['id_articulo']."', '".$linea['nombre']."', '".$linea['cantidad']."'
			, '".$linea['pvp']."', '".$linea['descuento_articulo']."', '".$linea['descuento_familia']."'
			, '".$linea['unidades']."', '".$linea['cajas']."', '".$linea['lote']."', '".$linea['liquido_linea']."'
			, '".$linea['descuento']."', '".$linea['base_linea']."', '".$linea['total_iva']."', '".$linea['total_recargo']."'
			, '".$linea['id_impuesto']."')"; // sql para ejecutar
			$resultado = $cn->query($query); // ejecución del sql
			$contador++;
	endforeach;
	

	$query = "INSERT INTO saldo VALUES ('".$datos_cabecera['id_cliente']."', '".$id_venta."', '".$datos_cabecera['total_liquido']."')";
	$resultado = $cn->query($query);
	
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $id_venta; // retorna el resultado al controlador
}


function lista_fpago() {
	$cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * from fpago"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_tipo() {
	$cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * from tipo"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function lista_ruta() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * from ruta"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function consulta_sincronizacion() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM sincronizacion"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
	}
	
function consulta_ruta($id_ruta) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT cliente.nombre, cliente.id_cliente, ruta.nombre_ruta
	FROM cliente, ruta, cli_ruta
	WHERE cliente.id_cliente = cli_ruta.id_cliente
	AND ruta.id_ruta = cli_ruta.id_ruta
	AND ruta.id_ruta = '".$id_ruta."'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[$fila['id_cliente']] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
	}
function consulta_empresa() { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM empresa"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos[0]; // retorna el resultado al controlador
	}
function alta_ruta($seleccionados, $nombre_ruta) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "INSERT INTO ruta values('','".$nombre_ruta."')"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$id_ruta = $cn->insert_id;
	foreach($seleccionados as $seleccionado):
		$query = "INSERT INTO cli_ruta values('".$seleccionado."','".$id_ruta."')"; // sql para ejecutar
		$resultado = $cn->query($query);// ejecución del sql
	endforeach;
	
    desconectar($cn); // método de conectar.php desconexión a la bd
	}
function alta_cli_ruta($datos) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "INSERT INTO cli_ruta VALUES('".$datos['id_cliente']."', '".$datos['id_ruta']."')"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
	}
function alta_cobro($datos) { // lista todas sucursales de un pescadero
    $cn = conectar(); // método de conectar.php para hacer conexión
    $time=time();
	$datos['hora'] = date("H:i:s",$time);
	$datos['fecha'] = date("Y-m-d");
	
	$query = "INSERT INTO cobro VALUES('".$datos['id_venta']."','', '".$datos['id_almacen']."'
	, CURDATE(), '".$datos['id_cliente']."', '".$datos['id_agente']."', '".$datos['observaciones']."'
	, '".$datos['id_fpago']."', '".$datos['totales']."', '".$datos['hora']."')"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	
	$linea = $cn->insert_id;

	$query = "UPDATE saldo SET importe = importe - '".$datos['totales']."'
	WHERE id_venta = '".$datos['id_venta']."'";
    $resultado = $cn->query($query);// ejecución del sql

	desconectar($cn); // método de conectar.php desconexión a la bd
	return $linea;
	}
function lista_venta(){
	$cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * from venta, cliente WHERE venta.id_cliente = cliente.id_cliente ORDER BY fecha ASC"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array 
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		$datos[] = $fila;
	}			
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $datos; // retorna el resultado al controlador
}

function busca_listado_almacen($valor){
	$cn = conectar(); // método de conectar.php para hacer conexión
	$query = "SELECT id_articulo, nombre, lotesn FROM articulo WHERE id_articulo LIKE '%".$valor."%' OR nombre LIKE '%".$valor."%'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array

	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		echo '
				<tr>
				<td>'.$fila['id_articulo'].'</td>
				<td>'.$fila['nombre'].'</td>
				<td><a href="autoventa.php?accion=inserta_linea_carga&id_articulo='.$fila['id_articulo'].'&nombre='.$fila['nombre'].'&lotesn='.$fila['lotesn'].'" class="btn btn-default">Seleccionar <span class="glyphicon glyphicon-arrow-right"></span></a></td>
				</tr>
				';
				
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function busca_listado_articulo($tarifa, $valor, $miga){
	$cn = conectar(); // método de conectar.php para hacer conexión
	$query = "SELECT id_articulo, nombre, pvp".$tarifa." AS pvp FROM articulo WHERE id_articulo LIKE '%".$valor."%' OR nombre LIKE '%".$valor."%'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array

	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		echo '
				<tr>
				<td>'.$fila['id_articulo'].'</td>
				<td>'.$fila['nombre'].'</td>
				<td><a href="autoventa.php?accion=inserta_linea&id_articulo='.$fila['id_articulo'].'" class="btn btn-default">Seleccionar <span class="glyphicon glyphicon-arrow-right"></span></a></td>
				</tr>
				';
				
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function busca_listado_3($tabla, $columna, $valor,$redireccion){
	$cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM ".$tabla." WHERE ".$columna." LIKE '%".$valor."%'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array
	
	switch($tabla){
		case "impuesto":
			$variable_auxiliar1 = "iva";
			$variable_auxiliar2 = "recargo";
			break;
		default:
			$variable_auxiliar = "nombre_comercial";
			break;
	}
	
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		echo '	<tr>
				<td>'.$fila['id_'.$tabla.''].'</td>
				<td>'.$fila['nombre'].'</td>
				<td>'.$fila[$variable_auxiliar1].'</td>
				<td>'.$fila[$variable_auxiliar2].'</td>
				<td>
				<a href="autoventa.php?accion='.$redireccion.'&id_'.$tabla.'='.$fila['id_'.$tabla.''].'" class="btn btn-success">Seleccionar <span class="glyphicon glyphicon-arrow-right"></span></a>
				</td>
				</tr> 
				<hr>';
				
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function busca_listado_1($tabla, $columna, $valor,$redireccion){
	$cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM ".$tabla." WHERE ".$columna." LIKE '%".$valor."%'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array
	

	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		echo '	<tr>
				<td>'.$fila['id_'.$tabla.''].'</td>
				<td>'.$fila['nombre'].'</td>
				<td>
				<a href="autoventa.php?accion='.$redireccion.'&id_'.$tabla.'='.$fila['id_'.$tabla.''].'" class="btn btn-success">Seleccionar <span class="glyphicon glyphicon-arrow-right"></span></a>
				</td>
				</tr> 
				<hr>';
				
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
}

function busca_listado_2($tabla, $columna, $valor,$redireccion){
	$cn = conectar(); // método de conectar.php para hacer conexión
    $query = "SELECT * FROM ".$tabla." WHERE ".$columna." LIKE '%".$valor."%'"; // sql para ejecutar
	$resultado = $cn->query($query);// ejecución del sql
	$datos = array(); //inicializamos el array
	
	switch($tabla){
		case "agente":
			$variable_auxiliar = "apellidos";
			break;
		case "cliente":
			$variable_auxiliar = "nombre_comercial";
			break;
		case "proveedor":
			break;
		default:
			$variable_auxiliar = "nombre_comercial";
			break;
	}
	
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){ //fetch_array nos permite iterar por cada uno de los registros obtenidos
		echo '	<tr>
				<td>'.$fila['id_'.$tabla.''].'</td>
				<td>'.$fila['nombre'].'</td>
				<td>'.$fila[$variable_auxiliar].'</td>
				<td>
				<a href="autoventa.php?accion='.$redireccion.'&id_'.$tabla.'='.$fila['id_'.$tabla.''].'" class="btn btn-success">Seleccionar <span class="glyphicon glyphicon-arrow-right"></span></a>
				</td>
				</tr> 
				<hr>';
				
	}
    desconectar($cn); // método de conectar.php desconexión a la bd
}

function modifica_ruta($id_ruta, $seleccionados, $nombre_ruta){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$sentencia = " UPDATE ruta SET id_ruta = '".$id_ruta."' ";
	

	$sentencia = $sentencia . ", nombre_ruta = '".$nombre_ruta."'  ";
	$sentencia = $sentencia. " WHERE id_ruta = '".$id_ruta."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
	$sentencia = "DELETE FROM cli_ruta WHERE id_ruta = '".$id_ruta."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
	
	foreach($seleccionados as $seleccionado):
		$query = "INSERT INTO cli_ruta values('".$seleccionado."','".$id_ruta."')"; // sql para ejecutar
		$resultado = $cn->query($query);// ejecución del sql
	endforeach;
    desconectar($cn); // método de conectar.php desconexión a la bd
}

function guarda_agente($datos_agente){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$sentencia = "INSERT INTO agente VALUES ('NULL', '".$datos_agente['nombre']."','".$datos_agente['apellidos']."','')";
    $resultado = $cn->query($sentencia); // ejecución del sql
	$id_agente = $cn->insert_id;   //te devuelve el último identificador creado
    desconectar($cn); // método de conectar.php desconexión a la bd
	return $id_agente;
}

function guarda_impuesto($datos_impuesto){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$sentencia = "INSERT INTO impuesto VALUES ('NULL', '".$datos_impuesto['nombre']."','".$datos_impuesto['iva']."','".$datos_impuesto['recargo']."')";
    $resultado = $cn->query($sentencia); // ejecución del sql
	$id_impuesto = $cn->insert_id;   //te devuelve el último identificador creado
    desconectar($cn); // método de conectar.php desconexión a la bd
	return $id_impuesto;
}
function guarda_fpago($datos_fpago){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$sentencia = "INSERT INTO fpago VALUES ('NULL', '".$datos_fpago['nombre']."')";
    $resultado = $cn->query($sentencia); // ejecución del sql
	$id_fpago = $cn->insert_id;   //te devuelve el último identificador creado
    desconectar($cn); // método de conectar.php desconexión a la bd
	return $id_fpago;
}
function guarda_tipo($datos_tipo){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$sentencia = "INSERT INTO tipo VALUES ('NULL', '".$datos_tipo['nombre']."')";
    $resultado = $cn->query($sentencia); // ejecución del sql
	$id_tipo = $cn->insert_id;   //te devuelve el último identificador creado
    desconectar($cn); // método de conectar.php desconexión a la bd
	return $id_tipo;
}

function guarda_familia($datos_familia){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$sentencia = "INSERT INTO familia VALUES ('NULL', '".$datos_familia['nombre']."')";
    $resultado = $cn->query($sentencia); // ejecución del sql
	$id_familia = $cn->insert_id;   //te devuelve el último identificador creado
    desconectar($cn); // método de conectar.php desconexión a la bd
	return $id_familia;
}

function guarda_cliente($datos_cliente){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$id_cliente = obtener_contador('C');
	$sentencia = " INSERT INTO cliente 
	VALUES ('".$id_cliente."', '".$datos_cliente['nombre']."','".$datos_cliente['nombre_comercial']."'
	,'".$datos_cliente['direccion']."','".$datos_cliente['poblacion']."' 
	,'".$datos_cliente['codpostal']."','".$datos_cliente['cif']."'
	,'".$datos_cliente['id_tipo']."','".$datos_cliente['recargo']."' 
	,'".$datos_cliente['descuento']."','".$datos_cliente['tarifa']."'
	,'".$datos_cliente['venta']."','".$datos_cliente['modelo']."'
	, '".$datos_cliente['id_fpago']."','".$datos_cliente['telefono']."',1,'".$datos_cliente['id_agente']."')";
	$sentencia;
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
	return $id_cliente;
}

function guarda_articulo($datos_articulo){
    $cn = conectar(); // método de conectar.php para hacer conexión
	if($datos_articulo['id_articulo'] == "")
		$id_articulo = obtener_contador('C');
	else
		$id_articulo = $datos_articulo['id_articulo'];
	$sentencia = " INSERT INTO articulo 
	VALUES ('".$id_articulo."', '".$datos_articulo['nombre']."','".$datos_articulo['pvp1']."'
	,'".$datos_articulo['pvp2']."','".$datos_articulo['pvp3']."' 
	,'".$datos_articulo['pvp4']."','".$datos_articulo['pvpi']."'
	,'".$datos_articulo['uni_caja']."','".$datos_articulo['id_impuesto']."' 
	,'".$datos_articulo['id_familia']."','".$datos_articulo['lotesn']."'
	,'".$datos_articulo['cajasn']."','".$datos_articulo['referencia']."'
	, '".$datos_articulo['descuento']."',1)";
	$sentencia;
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
	return $id_articulo;
}

function modifica_articulo($datos_articulo){
    $cn = conectar(); // método de conectar.php para hacer conexión
	
	$sentencia = " UPDATE articulo
	SET id_articulo = '".$datos_articulo['id_articulo']."', nombre= '".$datos_articulo['nombre']."' , pvp1= '".$datos_articulo['pvp1']."'
	, pvp2 = '".$datos_articulo['pvp2']."', pvp3 = '".$datos_articulo['pvp3']."' 
	, pvp4 = '".$datos_articulo['pvp4']."', pvpi = '".$datos_articulo['pvpi']."'
	, uni_caja = '".$datos_articulo['uni_caja']."', id_impuesto = '".$datos_articulo['id_impuesto']."' 
	, id_familia = '".$datos_articulo['id_familia']."', lotesn = '".$datos_articulo['lotesn']."'
	, cajasn = '".$datos_articulo['cajasn']."', referencia = '".$datos_articulo['referencia']."'
	, descuento = '".$datos_articulo['descuento']."', nuevo_articulo = 1
	WHERE id_articulo = '".$datos_articulo['id_articulo_antiguo']."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}

function modifica_cliente($datos_cliente){
    $cn = conectar(); // método de conectar.php para hacer conexión
	
	$sentencia = " UPDATE cliente 
	SET id_cliente = '".$datos_cliente['id_cliente']."', nombre= '".$datos_cliente['nombre']."' , nombre_comercial= '".$datos_cliente['nombre_comercial']."'
	, direccion = '".$datos_cliente['direccion']."', poblacion = '".$datos_cliente['poblacion']."' 
	, codpostal = '".$datos_cliente['codpostal']."', cif = '".$datos_cliente['cif']."'
	, tipo = '".$datos_cliente['id_tipo']."', recargo = '".$datos_cliente['recargo']."' 
	, descuento = '".$datos_cliente['descuento']."', tarifa = '".$datos_cliente['tarifa']."'
	, venta = '".$datos_cliente['venta']."', modelo = '".$datos_cliente['modelo']."'
	, id_fpago = '".$datos_cliente['id_fpago']."', telefono = '".$datos_cliente['telefono']."', nuevo_cliente = 1,'".$datos_cliente['id_agente']."'
	WHERE id_cliente = '".$datos_cliente['id_cliente_antiguo']."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}

function modifica_impuesto($datos_impuesto){
    $cn = conectar(); // método de conectar.php para hacer conexión
	
	$sentencia = " UPDATE impuesto
	SET nombre= '".$datos_impuesto['nombre']."' ,
	iva = '".$datos_impuesto['iva']."',
	recargo = '".$datos_impuesto['recargo']."'
	WHERE id_impuesto = '".$datos_impuesto['id_impuesto']."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function modifica_fpago($datos_fpago){
    $cn = conectar(); // método de conectar.php para hacer conexión
	
	$sentencia = " UPDATE fpago
	SET nombre= '".$datos_fpago['nombre']."'	
	WHERE id_fpago = '".$datos_fpago['id_fpago']."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function modifica_tipo($datos_tipo){
    $cn = conectar(); // método de conectar.php para hacer conexión
	
	$sentencia = " UPDATE tipo
	SET nombre= '".$datos_tipo['nombre']."'	
	WHERE id_tipo = '".$datos_tipo['id_tipo']."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function modifica_familia($datos_familia){
    $cn = conectar(); // método de conectar.php para hacer conexión
	$sentencia = " UPDATE familia
	SET nombre= '".$datos_familia['nombre']."' 
	WHERE id_familia = '".$datos_familia['id_familia']."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function modifica_agente($datos_agente){
    $cn = conectar(); // método de conectar.php para hacer conexión
	
	$sentencia = " UPDATE agente
	SET nombre= '".$datos_agente['nombre']."' ,
	apellidos = '".$datos_agente['apellidos']."'
	WHERE id_agente = '".$datos_agente['id_agente']."'";
    $resultado = $cn->query($sentencia); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
}
function baja_tabla($tabla, $id){
    $cn = conectar(); // método de conectar.php para hacer conexión
    $query = "DELETE FROM ".$tabla." WHERE id_".$tabla." = '".$id."'"; // sql para ejecutar
	echo $query;
    $resultado = $cn->query($query); // ejecución del sql
    desconectar($cn); // método de conectar.php desconexión a la bd
    return $resultado; // retorna el resultado al controlador
}

?>