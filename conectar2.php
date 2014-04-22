<?php

   $host = "localhost";   //o base de datos de 1&1
   $usuario = "root"; // Cambiar por su nombre de usuario.
   $password = ""; // Cambiar por su password.
   $bd = "autoventa";
  $conexion=mysql_connect($servidor,$usuario,$password) or die("Error: El servidor no puede conectar con la base de datos");
  $descriptor=mysql_select_db($bd,$conexion);

?>
