<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Eliminar Consultas</title>
    <link rel="stylesheet" href="estilo_busqueda_eliminar_consulta.css"  >
</head>
<body>
 <br><h1> Consultas </h1> <br>
<form action="" method="post" class="form-register">
    <h2 class="form__titulo"> Eliminar Consultas </h2>
    <div class="contenedor-inputs"> 
    
    <h3 class="input-30">Fecha de Consulta</h3>
    
    <input type="date" name="datbuscar" class="input-70" required>
        
    <h3 class="input-30"> Nombre del Paciente </h3>
    
    <input type="text" name="txtnombre" class="input-70" placeholder="Nombre del Paciente" required>    

    <h3 class="input-30"> Apellido del Paciente </h3>
    
    <input type="text" name="txtapellido" class="input-70" placeholder="Apellido del Paciente" required> 
   
    <input type="submit" value="Buscar" class="btn-enviar" name="enviar">
    <input type="submit" value="Cancelar" class="btn-cancelar">
    
    </div>
</form>    
    
<?php
    
    if(isset($_REQUEST['enviar'])){
        include '/../consultas.php';
        $consultas= new Consulta();
        $consultas->eliminar_consulta($_REQUEST['datbuscar'], $_REQUEST['txtnombre'], $_REQUEST['txtapellido']);
       
    }
    
?>      
    
    
</body>


</html>