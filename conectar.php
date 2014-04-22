<?php

function conectar() {
    $host = "localhost";   //o base de datos de 1&1
    $usuario = "root"; // Cambiar por su nombre de usuario.
    $password = ""; // Cambiar por su password.
	$bd = "autoventa";
	
	$cn = mysqli_connect($host, $usuario, $password, $bd);

	/* check connection */
	if (mysqli_connect_errno()) {
		die("No se puede conectar a la base de datos:" . mysqli_connect_error());
	}
	
    return $cn;
}

function desconectar($conexion) {
    mysqli_close($conexion); 
}

?>