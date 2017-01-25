<?php

    
    
    



























function validacion_provincia($cedula){
    
    echo $cedula[0];
    echo $cedula[1];
    
    if( ($cedula[0]<= 2))
       {
           if($cedula[0]== 2 && ($cedula[1] > 4) ){
            echo "Codigo de provincia de la cedula incorrecto, Por favor, ingrese una cédula correcta";
           }
           else{
            return true;   
           }
    }
    else{
        echo "Codigo de provincia de la cedula incorrecto, Por favor, ingrese una cédula correcta";
    }
       
}


function validacion_tamaño_y_guion($cedula){
    
    
    if(count($cedula) == 11){
    
        if($cedula[9] == '-'){
            return true;
        }
        else{
            echo "<br><br>Cédula incorrecta, Por favor, Ingrese un número de cédula con guión";
        }
        
    }
    else{
        echo "<br><br>Cédula incorrecta, Por favor, ingrese un número de cédula valido";
    }
    
    
    
}



function validacion_digito_cedula($cedula){

            
 
if( $cedula[10] == extraer_digito($cedula))
{
    return true;
}    
else{
    echo "<br><br>";
    echo "cedula incorrecta <";
    
}        
}

function extraer_digito($cedula){

        $decena= ceil(suma($cedula)/10);
        $decena *= 10;
        $digito = $decena - suma($cedula);

    
    return $digito;
    }

function suma($cedula){
    
    $verificador = 0;
    $sumaPar = 0;
    $sumaImpar = 0;
    for($i=8; $i>=0;$i--)
        {
            $mult=0;
            if(($i+1) % 2 != 0){
                
                $mult = $cedula[$i]*2;
                if($mult > 9){
                    $sumaImpar += ($mult-9);        
                }
                else{
                    $sumaImpar += $mult;
                }
            }
            else{
              $sumaPar += $cedula[$i];  
            }
        }
    
        $verificador = $sumaPar+$sumaImpar;    
    return $verificador;
}

function validacion_cedula(){

$num_cedula = $_POST['txtcedula'];    
$cedula = str_split($num_cedula);
print_r($cedula);
    
    
if( validacion_provincia($cedula) && validacion_digito_cedula($cedula) && validacion_tamaño_y_guion($cedula)){
 echo "<br> Número de cédula correcto";   
}
    
}
validacion_cedula();

?>