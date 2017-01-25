<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Formulario de Registro</title>
    <link rel="stylesheet" href="estilo_registro.css" >
</head>
<body>
 <br><h1> Formulario de Registro </h1> <br>
<form  method="post" class="form-register">
    <h2 class="form__titulo"> Ingrese sus datos</h2>
    <div class="contenedor-inputs">
    <!--<h3 class="input-30">Usuario</h3>
    <input type="text" placeholder="Nombre de Usuario" name="txtusuario" class="input-70" required>
    -->
    
    <h3 class="input-30">Número de Cédula</h3>
    <input type="text" placeholder="Número de Cédula" name="txtcedula" class="input-70" required>
        
        
    <h3 class="input-30">Email</h3>       
    <input type="tex" placeholder="E-mail" name="txtcorreo" class="input-70">
    
    <h3 class="input-30">Contraseña</h3>
    <input type="password" placeholder="Contraseña" name="txtclave" class="input-70" required>
    
    <h3 class="input-30">Nombres</h3>    
    <input type="text" placeholder="Nombres" name="txtnombre" class="input-70" required>
    <h3 class="input-30">Apellidos</h3>
    <input type="text" placeholder="Apellidos" name="txtapellidos" class="input-70" required>
    <h3 class="input-30">Fecha de Nacimiento</h3>    
    <input type="date" placeholder="Fecha de Nacimiento" name="datfecha" class="especiales-70" required>
    <br>
        <h3 class="input-30">Sexo</h3>    
    <select  name="lissexo" aria-disabled="true" class="especiales-70" required>
        <option>Masculino</option>
        <option>Femenino</option>
   </select>      
        
        
    <h3 class="input-30">Género</h3>    
    <select  name="lisgenero" aria-disabled="true" class="especiales-70" required>
        <option>Heterosexual</option>
        <option>Transexual</option>
        <option>Bisexual</option>
        <option>Homosexual</option>
   </select>  
     <h3 class="input-30">Grupo Prioritario</h3>    
    <select  name="lisprioritario" aria-disabled="true" class="especiales-70" >
        <option></option>
        <option>Embarazadas</option>
        <option>Discapacitados</option>

   </select>  
    
    <h3 class="input-30">Dirección</h3>
    <input type="text" placeholder="Dirección Domiciliaria" name="txtdireccion" class="input-70" required>
        
    <h3 class="input-30">Teléfono</h3>
    <input type="text" maxlength="10" placeholder="Número de Teléfono" name="txttelefono" class="input-70">
    
    <h3 class="input-30">Antecedentes Patológicos</h3>
    <textarea name="txareapatologicos" rows="10" cols="40" class="input-100" placeholder="Antecedentes Patológicos"> </textarea> 
    <input type="submit" value="Registrar" class="btn-enviar" name="submit">
    <p class="form__link"> ¿Ya tienes una cuenta? <a href="login.html">Ingresa Aquí</a> </p>
    </div>
</form>    

<?php
  if(isset($_POST['submit']))
  {
	  require("ingreso.php");
	  }
?>    
    
</body>


</html>