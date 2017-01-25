<?php


$conexion=mysql_connect("localhost","root","")or die
	("Problema en la conexión");
//echo "conectado correctamente";


	mysql_select_db("dbconsultorio", $conexion)or die 
	("Problema en la selección de la base de datos");


?>