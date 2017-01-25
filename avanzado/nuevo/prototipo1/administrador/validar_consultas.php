<?php

class Validar{  //clase validar del modulo de consultas
    
    private $fecha; // atributos
    private $cedula;
    //private $hora;
    
    public function __construct(){

    }
    //METODOS SET
    public function set_fecha($fe){
        $this->fecha = $fe; 
    }
    public function set_cedula($ced){
        $this->cedula = $ced;
    }
    //METODOS GET    
    public function get_fecha(){
        return($this->fecha);
    }
    public function get_cedula(){
        return($this->cedula);
    }
    
    // VALIDACION DE LA FECHA
    public function validacion_fecha($fec){
        
        self::set_fecha($fec); // asignar la fecha
        $partes= explode("-", self::get_fecha()); 
        echo "<br><br>";
        echo "Fecha Ingresada <br><br>";
        print_r($partes);
        $actual = array(date("Y"),date("m"),date("d"));
        echo "<br><br>";
        echo "Fecha actual <br><br>";
        print_r($actual);
        
        if(self::escritura_valida($partes) && self::fecha_mayor_actual($actual, $partes)) // si es valida la escritura y la fecha es mayor a la actual es correcta la fecha
        {
            return true;
        }
        else{
           return false;
        }
    }
    
        
    
    public function fecha_mayor_actual($actual, $partes){
    
        
        if( ($actual[0] == $partes[0]) && ( ($partes[1] <= $actual[1]) && ($partes[2] <= $actual[2]) ) ){ // si el año es igual
            //que no sea menor el dia y el mes ingresado a la fecha actual
               return true;    
            }
            else{
                
                if(($actual[0]-1 == $partes[0])){
                    return true;
                }
                else{
                    return false;
                }
            }
            
        return false;
              
            
        }

    public function escritura_valida($partes){
        if (checkdate ($partes[1],$partes[2],$partes[0]))  // verificar validez de la cedula
        { 
            return true;
        } 
        else 
        { 
            echo "La fecha no es correcta"; 
            return false;
        }
    }
    
    
    //VALIDACION DE LA CEDULA
    
          public function validacion_provincia($cedula){
    
 
    
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


public function validacion_tamaño_y_guion($cedula){
    
    
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



public function validacion_digito_cedula($cedula){

            
 
if( $cedula[10] == self::extraer_digito($cedula))
{
    return true;
}    
else{
    echo "<br><br>";
    echo "cedula incorrecta ";
    
}        
}

public function extraer_digito($cedula){

        $decena= ceil(self::suma($cedula)/10);
        $decena *= 10;
        $digito = $decena - self::suma($cedula);
    return $digito;
    }

public function suma($cedula){
    
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

public function validacion_cedula($ced){
    
        self::set_cedula($ced);

    $cedula1 = str_split(self::get_cedula());
    print_r($cedula1);
    
    
    if( self::validacion_provincia($cedula1) && self::validacion_digito_cedula($cedula1) && self::validacion_tamaño_y_guion($cedula1)){
        echo "<br> Número de cédula correcto";
        return true;
    }
}
    
    
    
    
    
    
    public function mostrar(){
        echo $this->fecha;
        echo "Hola";
    }
    
    
}


?>