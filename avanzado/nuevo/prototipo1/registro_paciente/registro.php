<?php

function ingreso_datos_personas(){
    
$conexion=mysql_connect("localhost","root","")or die
	("Problema en la conexión");
	
    mysql_select_db("dbconsultorio", $conexion)or die 
	("Problema en la selección de la base de datos");
	
	
		
			mysql_query("INSERT INTO PERSONAS(CEDULA,NOMBRES,APELLIDOS, FECHA_NACIMIENTO, TELEFONO, SEXO,GENERO,DIRECCION,CORREO)
VALUES ('$_REQUEST[txtcedula]','$_REQUEST[txtnombre]', '$_REQUEST[txtapellidos]','$_REQUEST[datfecha]','$_REQUEST[txttelefono]', '$_REQUEST[lissexo]', '$_REQUEST[lisgenero]','$_REQUEST[txtdireccion]','$_REQUEST[txtcorreo]');", $conexion) or die ("Problemas en el select".mysql_error()); 
		
mysql_close($conexion);    
    
}

function ingreso_datos_pacientes(){

    $conexion1=mysql_connect("localhost","root","")or die
	("Problema en la conexión");
	
    mysql_select_db("dbconsultorio", $conexion1)or die 
	("Problema en la selección de la base de datos");
mysql_query("INSERT INTO PACIENTES
VALUES ('$_REQUEST[txtclave]','$_REQUEST[lisprioritario]', '$_REQUEST[txtcedula]');", $conexion1) or die ("Problemas en el select".mysql_error()); 
mysql_close($conexion1);    
   
    
}

function  controlar_valores_existentes(){
    
    $conexion=mysql_connect("localhost","root","")or die
	("Problema en la conexión de la comprobación");
	mysql_select_db("dbconsultorio", $conexion)or die 
	("Problema en la selección de la base de datos");
	
	
	$registros = mysql_query("SELECT * FROM PERSONAS WHERE CEDULA='$_REQUEST[txtcedula]'  ", $conexion)or die
        ("Problemas en el select de la comprobación ".mysql_error());
    
   mysql_close($conexion);
   return $registros;
       
}

if(mysql_fetch_array(controlar_valores_existentes())){
    echo "Usted ya posee una Cuenta";
}
else{
    ingreso_datos_personas();
    ingreso_datos_pacientes();
    echo "SU INFORMACIÓN  FUE REGISTRADA SATISFACTORIAMENTE ";
}

?>