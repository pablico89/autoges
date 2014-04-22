<?php
  $id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente']:"";
  mysql_connect("localhost", "root", "5urt1d0r");
  mysql_select_db("pruebas");
  $consulta=mysql_query("SELECT id, Pais FROM Paises WHERE Pais ='".$Pais."'");
  mysql_close();
  if ( mysql_num_rows($consulta) )
   echo "Encontrado"; 
?>