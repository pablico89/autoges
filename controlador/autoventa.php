<?php

session_start();
ob_start();
require ('../modelo/modelo_autoventa.php');
require ('../modelo/impresion/impresion.php');
require ('../funciones/funciones.php');
$accion = $_REQUEST['accion'];
$_SESSION['sesion']=consulta_sesion();
	
switch($accion){
	case 'lista_carga':
		$_SESSION['menu'] = "historial"	;
		$lista_carga = lista_carga();
		require ('../vista/carga/lista_carga.php');
		break;
	case 'alta_carga':
		$_SESSION['menu'] = "carga";
		$_SESSION['datos_carga']['tipo'] = $_REQUEST['tipo'];
		$lista_agente = lista_agente();
		require('../vista/carga/alta_carga.php');
		break;
	case 'alta_carga2':
		$_SESSION['datos_carga']['almacen_origen'] = $_REQUEST['almacen_origen'];
		$_SESSION['datos_carga']['almacen_destino'] = $_REQUEST['almacen_destino'];
		$_SESSION['datos_carga']['id_agente'] = $_REQUEST['id_agente'];
		if($_REQUEST['tipo'] == "descarga")
			header('Location: autoventa.php?accion=alta_descarga_lineas');
		else
			header('Location: autoventa.php?accion=alta_carga_lineas');
		break;
	case 'descarga_completa':
		descarga_completa($almacen_origen, $almacen_destino, $id_agente);
		break;
	case 'alta_carga_lineas':
		require('../vista/carga/alta_carga_lineas.php');
		break;
	case 'alta_descarga_lineas':
		$linea_almacen = lista_almacen($_SESSION['datos_carga']['almacen_origen']);
		$linea_lote = lista_lote_almacen($_SESSION['datos_carga']['almacen_origen']);
		require('../vista/carga/alta_descarga_lineas.php');
		break;

	case 'consulta_linea_carga':
		$id_linea_carga = $_REQUEST['id_linea_carga'];
		$datos_linea = $_SESSION['lineas_carga'][$id_linea_carga];
		require ('../vista/carga/consulta_linea_carga.php');
		break;
	case 'modifica_linea_carga':

		$POST = array('id_linea_carga', 'unidades', 'cajas', 'lote');
		$datos_linea = fillPost($POST);
		
		$_SESSION['lineas_carga'][$datos_linea['id_linea_carga']]['unidades'] = $datos_linea['unidades'];
		$_SESSION['lineas_carga'][$datos_linea['id_linea_carga']]['cajas'] = $datos_linea['cajas'];
		$_SESSION['lineas_carga'][$datos_linea['id_linea_carga']]['lote'] = $datos_linea['lote'];
		header ("Location: autoventa.php?accion=alta_carga_lineas");
		break;
	case 'elimina_linea_carga':
		$id_linea_carga = $_REQUEST['id_linea_carga'];
		unset($_SESSION['lineas_carga'][$id_linea_carga]);
		header ("Location: autoventa.php?accion=alta_carga_lineas");
		break;
	case 'cancelar_carga':
		unset($_SESSION['lineas_carga']);
		unset($_SESSION['datos_carga']);
		header ("Location: autoventa.php");
		break;
		
	case 'guarda_descarga':
		$numero = count($_POST);
		$tags = array_keys($_POST); // obtiene los nombres de las varibles
		$valores = array_values($_POST);// obtiene los valores de las varibles
		$lista_articulos_lote;
		$lista_articulos;
		$mi_array;
		$contador=0;
		
		for($i=0;$i<$numero;$i++){ 
			$mi_array[$i][$tags[$i]] = $valores[$i];
			list($valor1,$valor2,$valor3)= split('~', $tags[$i]);
			if($valor3 == "cajas" || $valor3 == "unidades"){
				$lista_articulos_lote[$valor1][$valor2][$valor3] = $valores[$i];
				$lista_articulos_lote[$valor1][$valor2]['id_articulo'] = $valor1;
				$lista_articulos_lote[$valor1][$valor2]['lote'] = $valor2;
			}
			else{
				if($contador>2){
					$lista_articulos[$valor1][$valor2] = $valores[$i];
					$lista_articulos[$valor1]['id_articulo'] = $valor1;
				}
				$contador++;
			}
		}
		
		$id_carga = guarda_descarga($_SESSION['datos_carga'], $lista_articulos, $lista_articulos_lote);
		unset($_SESSION['datos_carga']);
		header ("Location: autoventa.php?accion=finaliza_carga&id_carga=".$id_carga);
		break;
		
	case 'guarda_carga':
		$id_carga = guarda_carga($_SESSION['datos_carga'], $_SESSION['lineas_carga']);
		echo $id_carga;
		unset($_SESSION['datos_carga']);
		unset($_SESSION['lineas_carga']);
		header ("Location: autoventa.php?accion=finaliza_carga&id_carga=".$id_carga);
		break;
	case 'finaliza_carga':
		$id_carga = $_REQUEST['id_carga'];
		require ('../vista/carga/finaliza_carga.php');
		break;
	case 'consulta_sesion':
		$lista_agente = lista_agente();
		require('../vista/ajustes/sesion/consulta_sesion.php');
		break;
	case 'modifica_sesion':
		$id_agente = $_REQUEST['id_agente'];
		$id_almacen = $_REQUEST['id_almacen'];
		modifica_sesion($id_agente,$id_almacen);
		header('Location: autoventa.php?estado=success');
		break;
	case 'busca_listado':
		$tabla = $_REQUEST['tabla'];
		$columna  = $_REQUEST['columna'];
		$valor = $_REQUEST['valor'];
		$redireccion = $_REQUEST['redireccion'];
		$numero = $_REQUEST['numero'];
		switch($numero){
			case 1:
					busca_listado_1($tabla, $columna, $valor, $redireccion);
				break;
			case 2:
					busca_listado_2($tabla, $columna, $valor, $redireccion);
				break;
			case 3:
					busca_listado_3($tabla, $columna, $valor, $redireccion);
				break;
		}
		break;
	case 'busca_listado_almacen':
		$valor = $_REQUEST['valor'];
		busca_listado_almacen($valor);
		break;
	case 'busca_listado_articulo':
		$tarifa = $_REQUEST['tarifa'];
		$valor = $_REQUEST['valor'];
		$miga = $_REQUEST['miga'];
		busca_listado_articulo($_SESSION['datos_cabecera']['tarifa'], $valor, $miga);
		break;
	case 'check_id_cliente':
		$id_cliente = $_GET['id_cliente'];
		$valor = check_id_cliente($id_cliente);
		echo $valor;
		break;
	case 'check_id_articulo':
		$id_articulo = $_GET['id_articulo'];
		$valor = check_id_articulo($id_articulo);
		echo $valor;
		break;
	case 'cancelar_venta':
		unset($_SESSION['lineas_venta']);
		unset($_SESSION['datos_cabecera']);
		header ("Location: autoventa.php");
		break;
	case 'alta_venta': //selección de cliente
		$_SESSION['menu'] = "venta";
		require ('../vista/venta/alta_venta1.php');
		break;
	case 'alta_venta2': //selección de cabecera
		
		$id_cliente = $_REQUEST['id_cliente'];
		if($id_cliente != null)
			$dato_cliente = consulta_cliente($id_cliente);
		else
			$dato_cliente = $_SESSION['datos_cabecera'];
		$lista_saldo = lista_saldo($id_cliente);
		require ('../vista/venta/alta_venta2.php');
		break;
		
	case 'guarda_cabecera': //almacenamos la cabecera
		$POST = array('modelo', 'venta','cif', 'tipo', 'recargo', 'tarifa', 'descuento_general', 'id_cliente', 'nombre', 'modelo', 'serie');
		$datos_cabecera = fillPost($POST);
		
		if($datos_cabecera['venta'] == "N")
			$datos_cabecera['tarifa'] = "I";
		$_SESSION['datos_cabecera'] = $datos_cabecera;
		$_SESSION['datos_cabecera']['descuento'] = $datos_cabecera['descuento_general'];
		$_SESSION['datos_cabecera']['id_almacen'] = $_SESSION['sesion']['id_almacen'];
		$_SESSION['datos_cabecera']['id_agente'] = $_SESSION['sesion']['id_agente'];
		
		header ("Location: autoventa.php?accion=alta_venta_lineas");
		break;
	case 'guarda_venta':
		$_SESSION['datos_cabecera']['cobrado'] = $_REQUEST['cobrado'];
		$_SESSION['datos_cabecera']['cuota_iva'] = "10";
		$_SESSION['datos_cabecera']['cuota_recargo'] = "1.4";
		$_SESSION['datos_cabecera']['id_fpago'] = $_REQUEST['id_fpago'];
		$id_venta = guarda_venta($_SESSION['datos_cabecera'], $_SESSION['lineas_venta']);
		if($_REQUEST['cobrado']!=""){
			$datos_cobro['id_venta'] = $id_venta;
			$datos_cobro['id_fpago'] = $_REQUEST['id_fpago'];
			$datos_cobro['totales'] = $_REQUEST['cobrado'];
			$datos_cobro['id_cliente'] = $_SESSION['datos_cabecera']['id_cliente'];
			alta_cobro($datos_cobro);
		}
		unset($_SESSION['datos_cabecera']);
		unset($_SESSION['lineas_venta']);

		header ("Location: autoventa.php?accion=finaliza_venta&id_venta=".$id_venta);
		break;
	case 'modifica_venta_historial':
		$_SESSION['datos_cabecera']['cobrado'] = $_REQUEST['cobrado'];
		$id_venta = modifica_venta($_SESSION['datos_cabecera']['id_venta'], $_SESSION['datos_cabecera'], $_SESSION['lineas_venta']);
		
		unset($_SESSION['datos_cabecera']);
		unset($_SESSION['lineas_venta']);
		header ("Location: autoventa.php?accion=finaliza_venta&id_venta=".$id_venta);
		break;
	case 'finaliza_venta':
		$id_venta = $_REQUEST['id_venta'];
		require ('../vista/venta/finaliza_venta.php');
		break;
	case 'finaliza_cobro':
		$id_venta = $_REQUEST['id_venta'];
		$linea = $_REQUEST['linea'];
		require ('../vista/cobro/finaliza_cobro.php');
		break;
	case 'importa':
		$_SESSION['menu'] = 'importa';
		require ('../vista/importa/index.php');
		break;
	case 'guarda_importa':
		header ('Location: ../modelo/importa/importa.php');
		break;
	case 'exporta':
		$_SESSION['menu'] = 'exporta';
		require ('../vista/exporta/index.php');
		break;
	case 'guarda_exporta':
		$vaciar = $_REQUEST['vaciar'];
		$hasta_fecha = $_REQUEST['hasta_fecha'];
		header ('Location: ../modelo/exporta/genera.php?vaciar='.$vaciar.'&hasta_fecha='.$hasta_fecha);
		break;
	case 'alta_venta_lineas': //selección de artículos
		$lista_fpago = lista_fpago();
		$totales;
		calcula_pie_venta($_SESSION['datos_cabecera'], $_SESSION['lineas_venta'], $totales);
		
		$_SESSION['datos_cabecera']['total_base'] = $totales['total_base'];
		$_SESSION['datos_cabecera']['total_liquido'] = $totales['total_liquido'];
		$_SESSION['datos_cabecera']['total_iva'] = $totales['total_iva'];
		$_SESSION['datos_cabecera']['total_recargo'] = $totales['total_recargo'];
		require ('../vista/venta/alta_venta_lineas.php');
		break;
	case 'inserta_linea':
		$id_articulo = $_REQUEST['id_articulo'];
		$miga = $_REQUEST['miga'];
		$datos_articulo = consulta_articulo($id_articulo, $_SESSION['datos_cabecera']['id_cliente'], $_SESSION['datos_cabecera']['tarifa']);
		$_SESSION['lineas_venta'][] = $datos_articulo;
		end($_SESSION['lineas_venta']);
		$id_linea=key($_SESSION['lineas_venta']);
		$_SESSION['lineas_venta'][$id_linea]['id_linea'] = $id_linea;
		$_SESSION['lineas_venta'][$id_linea]['unidades'] = 0;
		$_SESSION['lineas_venta'][$id_linea]['cajas'] = 0;
		$_SESSION['lineas_venta'][$id_linea]['cantidad'] = 0;
		header ("Location: autoventa.php?miga=".$miga."&accion=consulta_linea&id_linea=".$id_linea);
		break;
	case 'inserta_linea_carga':
		$articulo['id_articulo'] = $_REQUEST['id_articulo'];
		$datos_articulo = consulta_articulo_general($_REQUEST['id_articulo']);	
		$articulo['nombre'] = $datos_articulo['nombre'];
		$articulo['lotesn'] = $datos_articulo['lotesn'];
		$_SESSION['lineas_carga'][] = $articulo;
		end($_SESSION['lineas_carga']);
		$id_linea_carga=key($_SESSION['lineas_carga']);
		$_SESSION['lineas_carga'][$id_linea_carga]['id_linea_carga'] = $id_linea_carga;
		if($_SESSION['tipo'] == "descarga"){
			$stock = consulta_stock($id_articulo, $id_almacen);
		}
		header ("Location: autoventa.php?accion=consulta_linea_carga&id_linea_carga=".$id_linea_carga);
		break;
	case 'consulta_linea':
		$id_linea = $_REQUEST['id_linea'];
		$miga = $_REQUEST['miga'];
		$datos_linea = $_SESSION['lineas_venta'][$id_linea];
		$datos_lote = lista_lote($datos_linea['id_articulo'], $_SESSION['sesion']['id_almacen']);
		require ('../vista/venta/consulta_linea.php');
		break;
	case 'elimina_linea':
		$id_linea = $_REQUEST['id_linea'];
		$miga = $_REQUEST['miga'];
		unset($_SESSION['lineas_venta'][$id_linea]);
		if($miga=="modifica")
			header ("Location: autoventa.php?accion=modifica_venta_lineas");
		else
			header ("Location: autoventa.php?accion=alta_venta_lineas");
		break;
	case 'modifica_linea':

		$POST = array('id_linea', 'cantidad', 'descuento_linea', 'recargo_aplicado', 'iva_aplicado', 'precio', 'lote2_select', 'id_articulo', 'recargo', 'iva', 'precio', 'unidades', 'cajas', 'lote', 'lote2', 'liquido_linea', 'base_linea', 'descuento_linea', 'descuento_articulo', 'descuento_familia');
		$datos_linea = fillPost($POST);
		$miga = $_REQUEST['miga'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['unidades'] = $datos_linea['unidades'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['cantidad'] = $datos_linea['cantidad'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['pvp'] = $datos_linea['precio'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['cajas'] = $datos_linea['cajas'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['lote'] = $datos_linea['lote'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['lote2'] = $datos_linea['lote2'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['lote2_select'] = $datos_linea['lote2_select'];		
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['liquido_linea'] = $datos_linea['liquido_linea'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['base_linea'] = $datos_linea['base_linea'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['iva'] = $datos_linea['iva'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['recargo'] = $datos_linea['recargo'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['descuento_articulo'] = $datos_linea['descuento_articulo'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['descuento_familia'] = $datos_linea['descuento_familia'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['recargo_aplicado'] = $datos_linea['recargo_aplicado'];
		$_SESSION['lineas_venta'][$datos_linea['id_linea']]['iva_aplicado'] = $datos_linea['iva_aplicado'];
		

		if($miga=="modifica")
			header ("Location: autoventa.php?accion=modifica_venta_lineas");
		else
			header ("Location: autoventa.php?accion=alta_venta_lineas");

		break;
	case 'modifica_articulo':
		
		$POST = array('id_articulo', 'id_articulo_antiguo', 'nombre', 'pvp1', 'pvp2', 'pvp3', 'pvp4', 'pvpi', 'uni_caja', 'id_impuesto', 'id_familia', 'lotesn','cajasn', 'referencia', 'descuento');
		$datos_articulo = fillPost($POST);
		modifica_articulo($datos_articulo);
		header ("Location: autoventa.php?accion=consulta_articulo&id_articulo=".$datos_articulo['id_articulo']."&estado=success");
		break;
		
	case 'modifica_impuesto':
		
		$POST = array('id_impuesto', 'nombre', 'iva', 'recargo');
		$datos_impuesto = fillPost($POST);
		modifica_impuesto($datos_impuesto);
		header ("Location: autoventa.php?accion=consulta_impuesto&id_impuesto=".$datos_impuesto['id_impuesto']."&estado=success");
		break;
	case 'modifica_fpago':
		
		$POST = array('id_fpago', 'nombre');
		$datos_fpago = fillPost($POST);
		modifica_fpago($datos_fpago);
		header ("Location: autoventa.php?accion=consulta_fpago&id_fpago=".$datos_fpago['id_fpago']."&estado=success");
		break;
	case 'modifica_tipo':
		
		$POST = array('id_tipo', 'nombre');
		$datos_tipo = fillPost($POST);
		modifica_tipo($datos_tipo);
		header ("Location: autoventa.php?accion=consulta_tipo&id_tipo=".$datos_tipo['id_tipo']."&estado=success");
		break;
	case 'modifica_familia':
		$POST = array('id_familia', 'nombre');
		$datos_familia = fillPost($POST);
		modifica_familia($datos_familia);
		header ("Location: autoventa.php?accion=consulta_familia&id_familia=".$datos_familia['id_familia']."&estado=success");
		break;
	case 'modifica_agente':
		
		$POST = array('id_agente', 'nombre', 'apellidos');
		$datos_agente = fillPost($POST);
		modifica_agente($datos_agente);
		header ("Location: autoventa.php?accion=consulta_agente&id_agente=".$datos_agente['id_agente']."&estado=success");
		break;
		
	case 'modifica_cliente':
		
		$POST = array('id_cliente', 'id_cliente_antiguo', 'nombre', 'nombre_comercial', 'direccion', 'poblacion', 'codpostal', 'cif', 'tipo', 'recargo', 'descuento', 'tarifa','venta', 'modelo', 'telefono', 'id_fpago', 'id_tipo');
		$datos_cliente = fillPost($POST);
		$datos_cliente['id_agente'] = $_SESSION['sesion']['id_agente'];
		modifica_cliente($datos_cliente);
		header ("Location: autoventa.php?accion=consulta_cliente&id_cliente=".$datos_cliente['id_cliente']."&estado=success");
		break;
	case 'alta_venta4': //confirma
		require ('../vista/venta/alta_venta4.php');
		break;
	case 'alta_venta5': //resumen
		require ('../vista/venta/alta_venta5.php');
		break;
	case 'lista_ruta': //resumen
		$_SESSION['menu'] = "ruta";
		$lista_ruta = lista_ruta();
		require ('../vista/ruta/lista_ruta.php');
		break;
	case 'lista_almacen': //resumen
		$_SESSION['menu'] = "almacen";
		$lista_almacen = lista_almacen($_SESSION['sesion']['id_almacen']);
		require ('../vista/almacen/lista_almacen.php');
		break;
	case 'lista_agente': //resumen
		$_SESSION['menu'] = "agente";
		$lista_agente = lista_agente();  //funcion de modelo
		require ('../vista/agente/lista_agente.php');
		break;
	case 'lista_impuesto': //resumen
		$_SESSION['menu'] = "impuesto";
		$lista_impuesto = lista_impuesto();  //funcion de modelo
		require ('../vista/impuesto/lista_impuesto.php'); //mostramos la vista
		break;
	case 'lista_fpago': //resumen
		$_SESSION['menu'] = "fpago";
		$lista_fpago = lista_fpago();  //funcion de modelo
		require ('../vista/fpago/lista_fpago.php'); //mostramos la vista
		break;
	case 'lista_tipo': //resumen
		$_SESSION['menu'] = "tipo";
		$lista_tipo = lista_tipo();  //funcion de modelo
		require ('../vista/tipo/lista_tipo.php'); //mostramos la vista
		break;	
	case 'lista_familia': //resumen
		$_SESSION['menu'] = "familia";
		$lista_familia = lista_familia();  //funcion de modelo
		require ('../vista/familia/lista_familia.php'); //mostramos la vista
		break;
		
	case 'baja_tabla':
		$id = $_REQUEST['id'];
		$tabla = $_REQUEST['tabla'];
		baja_tabla($tabla, $id);
		header ("Location: autoventa.php?accion=lista_".$tabla);
		break;
	case 'lista_venta':
		$_SESSION['menu'] = "historial";
		$lista_venta = lista_venta();
		$filtro = "";
		$lista_saldo = lista_saldo($filtro);
		require ('../vista/venta/lista_venta.php');
		break;
	case 'lista_saldo':
		$_SESSION['menu'] = "historial"	;
		if($_REQUEST['filtro'] != ""){
			$filtro = $_REQUEST['filtro'];
		}else{
			$filtro = "";
			}
		$lista_saldo = lista_saldo($filtro);
		require ('../vista/saldo/lista_saldo.php');
		break;
	case 'lista_cobro':
		$_SESSION['menu'] = "historial"	;
		if($_REQUEST['filtro'] != ""){
			$filtro = $_REQUEST['filtro'];
		}else{
			$filtro = "";
			}
		$lista_cobro = lista_cobro($filtro);
		require ('../vista/cobro/lista_cobro.php');
		break;
	case 'lista_cliente':
		$_SESSION['menu'] = "cliente";
		require ('../vista/cliente/lista_cliente.php');
		break;
	case 'lista_articulo':
		$_SESSION['menu'] = "articulo";
		require ('../vista/articulo/lista_articulo.php');
		break;
	case 'imprime_venta':
		$id_venta = $_REQUEST['id_venta'];
		$datos_empresa = consulta_empresa();
		$datos_cabecera = consulta_venta($id_venta);
		$datos_lineas = consulta_lineas($id_venta);
		imprime_venta($datos_empresa, $datos_cabecera, $datos_lineas);
		$archivo = $id_venta.'.pdf';
		require ('../vista/venta/imprime_venta.php');
		break;
	case 'imprime_cobro':
		$id_venta = $_REQUEST['id_venta'];
		$linea = $_REQUEST['linea'];
		$datos_cobro = consulta_cobro($id_venta, $linea);
		imprime_cobro($datos_cobro);
		$archivo = $id_venta.'-'.$linea.'.pdf';
		require ('../vista/venta/imprime_venta.php');
		break;
	case 'imprime_carga':
		$id_carga = $_REQUEST['id_carga'];
		$datos_carga = consulta_carga($id_carga);
		$datos_lineas = consulta_lineas_carga($id_carga);
		
		print_r($datos_carga);
		print_r($datos_lineas);

		imprime_carga($datos_carga, $datos_lineas);
		$archivo = $id_carga.'.pdf';
		require ('../vista/carga/imprime_carga.php');
		break;
	case 'alta_ruta': //resumen
		$_SESSION['seleccionados']= $_REQUEST['clientes'];
		$seleccionados =  $_SESSION['seleccionados'];
		$lista_cliente = lista_cliente();
		require ('../vista/ruta/alta_ruta.php');
		break;
	case 'alta_cobro': //resumen
		$id_venta= $_REQUEST['id_venta'];
		$miga = $_REQUEST['miga'];
		$lista_fpago = lista_fpago();
		$datos_saldo = consulta_saldo($id_venta);
		$id_venta = $datos_saldo['id_venta'];
		require ('../vista/cobro/alta_cobro.php');
		break;
	case 'guarda_cobro':
		$POST = array('id_venta','id_cliente', 'id_fpago', 'totales');
		$miga = $_REQUEST['miga'];
		$datos_cobro = fillPost($POST);
		$datos_cobro['id_agente'] = $_SESSION['sesion']['id_agente'];
		$datos_cobro['id_almacen'] = $_SESSION['sesion']['id_almacen'];
		$linea = alta_cobro($datos_cobro);
		header ("Location: autoventa.php?accion=finaliza_cobro&id_venta=".$datos_cobro['id_venta']."&linea=".$linea);
	/*	if($miga == "saldo")
			header ("Location: autoventa.php?accion=lista_saldo&estado=success");
		else
			header ("Location: autoventa.php?accion=lista_venta&estado=success");
		*/	
		break;
	case 'guarda_ruta':
		$nombre_ruta = $_REQUEST['nombre_ruta'];
		alta_ruta($_SESSION['seleccionados'], $nombre_ruta);
		session_unset($_SESSIOM['seleccionados']);
		header ("Location: autoventa.php?accion=lista_ruta&estado=success");
		break;
	case 'consulta_cliente':
		$id_cliente = $_REQUEST['id_cliente'];
		$datos_cliente = consulta_cliente($id_cliente);
		$lista_fpago = lista_fpago();
		$lista_tipo = lista_tipo();
		$lista_saldo = lista_saldo($id_cliente);
		require ('../vista/cliente/consulta_cliente.php');
		break;
	case 'consulta_fpago':
		$id_fpago = $_REQUEST['id_fpago'];
		$datos_fpago = consulta_fpago($id_fpago);   //consulta al modelo 
		require ('../vista/fpago/consulta_fpago.php');
		break;
	case 'consulta_tipo':
		$id_tipo = $_REQUEST['id_tipo'];
		$datos_tipo = consulta_tipo($id_tipo);   //consulta al modelo 
		require ('../vista/tipo/consulta_tipo.php');
		break;
	case 'consulta_impuesto':
		$id_impuesto = $_REQUEST['id_impuesto'];
		$datos_impuesto = consulta_impuesto($id_impuesto);   //consulta al modelo 
		require ('../vista/impuesto/consulta_impuesto.php');
		break;
	case 'consulta_familia':
		$id_familia = $_REQUEST['id_familia'];
		$datos_familia = consulta_familia($id_familia);   //consulta al modelo 
		require ('../vista/familia/consulta_familia.php');
		break;
	case 'consulta_agente':
		$id_agente = $_REQUEST['id_agente'];
		$datos_agente = consulta_agente($id_agente);
		require ('../vista/agente/consulta_agente.php');
		break;
	case 'consulta_articulo':
		$id_articulo = $_REQUEST['id_articulo'];
		$datos_articulo = consulta_articulo_general($id_articulo);
		$lista_familia = lista_familia();
		$lista_impuesto = lista_impuesto();
		$lista_lote = lista_lote($id_articulo);
		require ('../vista/articulo/consulta_articulo.php');
		break;
	case 'modifica_venta':
		$id_venta = $_REQUEST['id_venta'];
		$_SESSION['datos_cabecera'] = consulta_venta($id_venta);
		$_SESSION['datos_cabecera']['descuento_general'] = $_SESSION['datos_cabecera']['dcto'];
		$_SESSION['datos_cabecera']['descuento'] = $_SESSION['datos_cabecera']['dcto'];
		$_SESSION['datos_cabecera']['venta'] = $_SESSION['datos_cabecera']['serie'];
		$_SESSION['datos_cabecera']['recargoSN'] = $_SESSION['datos_cabecera']['recargo'];
		if($_SESSION['datos_cabecera']['serie'] == 'N'){
			$_SESSION['datos_cabecera']['tarifa'] = "I";
		}
		$_SESSION['lineas_venta'] = consulta_lineas_historial($id_venta);
		foreach($_SESSION['lineas_venta'] as $linea):
		
			$_SESSION['lineas_venta'][$linea['id_linea']]['pvp'] = $linea['precio'];
			$_SESSION['lineas_venta'][$linea['id_linea']]['descuento_familia'] = $linea['dcto2'];
			$_SESSION['lineas_venta'][$linea['id_linea']]['liquido_linea'] = $linea['liquido'];
			$_SESSION['lineas_venta'][$linea['id_linea']]['base_linea'] = $linea['base'];
			$_SESSION['lineas_venta'][$linea['id_linea']]['descuento_familia'] = $linea['dcto2'];
			$_SESSION['lineas_venta'][$linea['id_linea']]['descuento_articulo'] = $linea['dcto1'];
		endforeach;
		header ("Location: autoventa.php?accion=modifica_venta_lineas");
		break;
	case 'modifica_venta_lineas':
		$lista_fpago = lista_fpago();
		$totales;
		calcula_pie_venta($_SESSION['datos_cabecera'], $_SESSION['lineas_venta'], $totales);
		
		$_SESSION['datos_cabecera']['total_base'] = $totales['total_base'];
		$_SESSION['datos_cabecera']['total_liquido'] = $totales['total_liquido'];
		$_SESSION['datos_cabecera']['total_iva'] = $totales['total_iva'];
		$_SESSION['datos_cabecera']['total_recargo'] = $totales['total_recargo'];
		require ('../vista/venta/consulta_venta_historial.php');
		break;

	case 'consulta_ruta':
		$id_ruta = $_REQUEST['id_ruta'];
		$nombre_ruta= $_REQUEST['nombre_ruta'];
		$lista_cliente = lista_cliente();
		$_SESSION['seleccionados'] = $lista_cliente;
		$datos_ruta= consulta_ruta($id_ruta);
		require ('../vista/ruta/consulta_ruta.php');
		break;
	case 'modifica_contador':
		$POST = array('C', 'A', 'F', 'D', 'B', 'N');
		$datos_contador = fillPost($POST);
		print_r($datos_contador);
		modifica_contador($datos_contador);
		header ("Location: autoventa.php?accion=lista_contador&estado=success");
		break;
	case 'modifica_ruta':
		$id_ruta = $_REQUEST['id_ruta'];
		$nombre_ruta = $_REQUEST['nombre_ruta'];
		if($_REQUEST['clientes']!='')
			$_SESSION['seleccionados']= $_REQUEST['clientes'];
		modifica_ruta($id_ruta, $_SESSION['seleccionados'], $nombre_ruta);
		header ("Location: autoventa.php?accion=consulta_ruta&nombre_ruta=".$nombre_ruta."&id_ruta=".$id_ruta."");
		break;
	case 'alta_articulo':
		$lista_familia = lista_familia();
		$lista_impuesto = lista_impuesto();
		require( '../vista/articulo/alta_articulo.php');
		break;
	case 'guarda_articulo':

		$POST = array('id_articulo', 'nombre', 'id_familia', 'referencia', 'pvp1', 'pvp2', 'pvp3', 'pvp4', 'pvpi', 'lote_sn','cajas_sn', 'uni_caja', 'id_impuesto', 'descuento');
		$datos_articulo = fillPost($POST);
		$id_articulo = guarda_articulo($datos_articulo);
		header ("Location: autoventa.php?accion=consulta_articulo&id_articulo=".$id_articulo."&estado=success");
		break;

	
	case 'alta_impuesto':
		require( '../vista/impuesto/alta_impuesto.php');
		break;
	case 'guarda_impuesto':
		$POST = array('nombre', 'iva', 'recargo');
		$datos_impuesto = fillPost($POST);
		$id_impuesto = guarda_impuesto($datos_impuesto);  //funcion modelo
		header ("Location: autoventa.php?accion=consulta_impuesto&id_impuesto=".$id_impuesto."&estado=success");
		break;
	case 'alta_fpago':
		require( '../vista/fpago/alta_fpago.php');
		break;
	case 'guarda_fpago':
		$POST = array('nombre');
		$datos_fpago = fillPost($POST);
		$id_fpago = guarda_fpago($datos_fpago);  //funcion modelo
		header ("Location: autoventa.php?accion=consulta_fpago&id_fpago=".$id_fpago."&estado=success");
		break;
	case 'alta_tipo':
		require( '../vista/tipo/alta_tipo.php');
		break;
	case 'guarda_tipo':
		$POST = array('nombre');
		$datos_tipo = fillPost($POST);
		$id_tipo = guarda_tipo($datos_tipo);  //funcion modelo
		header ("Location: autoventa.php?accion=consulta_tipo&id_tipo=".$id_tipo."&estado=success");
		break;	
	case 'alta_familia':
		require( '../vista/familia/alta_familia.php');
		break;
	case 'guarda_familia':
		$POST = array('nombre');
		$datos_familia = fillPost($POST);
		$id_familia = guarda_familia($datos_familia);  //funcion modelo
		header ("Location: autoventa.php?accion=consulta_familia&id_familia=".$id_familia."&estado=success");
		break;
		
	case 'alta_agente':
		require( '../vista/agente/alta_agente.php');
		break;
	case 'guarda_agente':
		$POST = array('nombre', 'apellidos');
		$datos_agente = fillPost($POST);
		$id_agente = guarda_agente($datos_agente);  //funcion modelo
		header ("Location: autoventa.php?accion=consulta_agente&id_agente=".$id_agente."&estado=success");
		break;
		
	case 'alta_cliente':
		$lista_fpago = lista_fpago();
		$lista_tipo  = lista_tipo();
		require( '../vista/cliente/alta_cliente.php');
		break;
	case 'guarda_cliente':

		$POST = array('nombre', 'nombre_comercial', 'direccion', 'poblacion', 'codpostal', 'cif', 'id_tipo', 'recargo', 'descuento', 'tarifa','venta', 'modelo', 'id_fpago', 'telefono');
		$datos_cliente = fillPost($POST);
		$datos_cliente['id_agente'] = $_SESSION['sesion']['id_agente'];
		$id_cliente = guarda_cliente($datos_cliente);
		header ("Location: autoventa.php?accion=consulta_cliente&id_cliente=".$id_cliente."&estado=success");
		break;
	case 'lista_contador':
		$lista_contador = lista_contador();
		require( '../vista/ajustes/lista_contador.php');
		break;
		
	default:
		$sincronizacion = consulta_sincronizacion();
		require ('../vista/index.php');
		break;
}


?>