<?php
class Validar{
    
    //Atributos
    private $cedula;
    private $fecha;
    private $email;
    private $telefono;
    
    //Metodos
    
    public function __construct($cedula, $fecha, $email, $telefono){
        $this->cedula = $cedula;
        $this->fecha = $fecha;
        $this->email = $email;
        $this->teleno = $telefono;
    }
    
        public function validacion_provincia($cedula){
    
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
    echo "cedula incorrecta <";
    
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

public function validacion_cedula(){

$cedula1 = str_split($this->cedula);
print_r($cedula1);
    
    
if( self::validacion_provincia($cedula1) && self::validacion_digito_cedula($cedula1) && self::validacion_tamaño_y_guion($cedula1)){
 echo "<br> Número de cédula correcto";   
}
    
    
}
    
    
}

$validar = new Validar("172179606-6",'17/10/1995','alex4jme@hotmail.com','0996674478');
$validar->validacion_cedula();

?>