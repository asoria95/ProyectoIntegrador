<?php

    
$metodo = $_GET['metodo'];

    
    
        
        switch($metodo){
            case 1:$mensaje = $_GET['mensaje']; 
                ingreso($mensaje);     
                break;
            case 2: 
                $mensaje = $_GET['mensaje'];
                busqueda($mensaje);
                break;
            case 3: 
                break;
            case 4:
                break;    
        }


    function ingreso($mensaje){
        switch($mensaje){
             case 1: echo "Error en el número de cédula ingresado";
                break;
            case 2: echo "Error en la fecha ingresada, por favor ingrese nuevamente la fecha";
                break;
            case 3: echo "CONSULTA REGISTRADA SATISFACTORIAMENTE"; 
                break;
            case 4: echo "Error en el ingreso de datos";
                break;      
        }
    }

    function busqueda($mensaje){
        switch($mensaje){
             case 1: echo "Error en la fecha ingresada, por favor ingrese nuevamente la fecha";
                break;
            case 2:  echo "Error en el ingreso de datos, por favor ingrese el nombre y apellido del paciente";
                break;
            case 3:  datos();
                echo "CONSULTA REGISTRADA SATISFACTORIAMENTE"; 
                break;
            case 4: echo "No se encuentra la consulta ";
                break;      
        }
    }
    
     function datos(){
        echo "Cedula " . $_GET['cedula'] ."<br>";
        echo "Nombres " .$_GET['nombres'] ."<br>"; 
        echo "Apellidos " .$_GET['apellidos'] ."<br>";
        echo "Número de consulta " .$_GET['numero'] ."<br>"; 
        echo "Fecha " .$_GET['fecha'] ."<br>"; 
        echo "Hora " .$_GET['hora']."<br>"; 
        echo "Diagnóstico " .$_GET['diagnostico']."<br>"; 
        echo "Diagnóstico " .$_GET['precio']."<br>"; 
    }
    



?>