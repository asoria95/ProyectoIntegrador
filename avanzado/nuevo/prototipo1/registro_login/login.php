<!DOCTYPE html>
<html lang="es">
<head>
    <title> Formulario de Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="estilos.css">
    
</head>
<body>
    <form action="">
    <h2>Formulario de Login</h2>
    <input type="text" placeholder="&#128272; Email" name="txtemail">
    <input type="password" placeholder=" &#128272; Contraseña" name="txtclave">
    <input type="submit" value="Ingresar" name="enviar">
    
    </form>
    
<?php
    
    if(isset($_REQUEST['enviar'])){
        
        include 'sesion_paciente.php';
        $sesion= new sesion_paciente($_REQUEST['txtemail'], $_REQUEST['txtclave']);
        $sesion->inicio_sesion();
       
    }
   
?> 
    
</body>
</html>