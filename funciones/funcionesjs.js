function nuevoAjax() {
	var xmlhttp=false;
		try {
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e) {
			try {
				// Creacion del objet AJAX para IE
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(E) {
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				xmlhttp=new XMLHttpRequest();
			}
		}
	return xmlhttp;
}

function check_id_cliente(id_cliente) {
	var existe= "";
	var ajax=nuevoAjax();
	ajax.open("GET", "autoventa.php?accion=check_id_cliente&id_cliente="+id_cliente, false);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4)
			existe=ajax.responseText;
		}
	ajax.send(null);
	return existe;
}

function check_id_articulo(id_articulo) {
	var existe= "";
	var ajax=nuevoAjax();
	ajax.open("GET", "autoventa.php?accion=check_id_articulo&id_articulo="+id_articulo, false);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4)
			existe=ajax.responseText;
		}
	ajax.send(null);
	return existe;
}
 
function valida_id_cliente() {
	var id_cliente = document.getElementById('id_cliente').value;
	var id_cliente_antiguo = document.getElementById('id_cliente_antiguo').value;
	if (id_cliente.length==0){
		alert("Introduce un identificador para el cliente ");
		document.getElementById('id_cliente').focus;
		return false;
	}else {
		var existe = check_id_cliente(id_cliente);
		if ((existe  == 0) || (id_cliente==id_cliente_antiguo)){
			 document.getElementById('valido').style.display= "block";
			 document.getElementById('no_valido').style.display= "none";
		}else{
			 document.getElementById('no_valido').style.display= "block";
			 document.getElementById('valido').style.display= "none";
			 }
	}
	return false;

}

function valida_id_articulo() {
	var id_articulo = document.getElementById('id_articulo').value;
	var id_articulo_antiguo = document.getElementById('id_articulo_antiguo').value;
	if (id_articulo.length==0){
		alert("Introduce un identificador para el articulo ");
		document.getElementById('id_articulo').focus;
		return false;
	}else {
		var existe = check_id_articulo(id_articulo);
		if ((existe  == 0) || (id_articulo==id_articulo_antiguo)){
			 document.getElementById('valido').style.display= "block";
			 document.getElementById('no_valido').style.display= "none";
		}else{
			 document.getElementById('no_valido').style.display= "block";
			 document.getElementById('valido').style.display= "none";
			 }
	}
	return false;

}