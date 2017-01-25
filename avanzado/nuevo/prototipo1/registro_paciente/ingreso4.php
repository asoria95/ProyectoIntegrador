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
        $this->telefono = $telefono;
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

public function validacion_cedula(){

    $cedula1 = str_split($this->cedula);
    print_r($cedula1);
    
    
    if( self::validacion_provincia($cedula1) && self::validacion_digito_cedula($cedula1) && self::validacion_tamaño_y_guion($cedula1)){
        echo "<br> Número de cédula correcto";   
    }
}
    
    public function validacion_telefono(){
        $tel = str_split($this->telefono);
        print_r($tel);
        if(self::tamanio_codigo($tel)){
            echo "Número de teléfono correcto";
        }
        else{
            echo "<br>Número de teléfono incorrecto";
        }
    }
    
    public function tamanio_codigo($telefono){
        
        if(count($telefono) == 10 ){
            if($telefono[0]==0 && $telefono[1]== 9){
                return true;
            }
        }
        else{
            
            if(count($telefono) == 9 || count($telefono) == 7){
                if($telefono[0] == 0 && ($telefono[1]>=2 && $telefono[1]<=7 )){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
    }
    
    public function validacion_fecha(){
        $partes= explode("/", $this->fecha); 
        echo "<br><br>";
        print_r($partes);
        $actual = array(date("d"),date("m"),date("Y"));
        echo "<br><br>";
        print_r($actual);
        
        if(self::escritura_valida($partes) && self::fecha_menor_actual($actual, $partes))
        {
            echo "Fecha correcta";
        }
        else{
           // echo "Fecha incorrecta";
        }
    }
    
    public function fecha_menor_actual($actual, $partes){
        
        if($actual[2] >= $partes[2] && ($partes[2] <= ($actual[2]-12))  ){
            if( ($actual[2] == $partes[2]) && ( ($partes[1] <= $actual[1]) && ($partes[0] <= $actual[0]) ) ){
                return true;    
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
        
        
    }
    
    public function escritura_valida($partes){
                if (checkdate ($partes[1],$partes[0],$partes[2])) 
        { 
            return true;
        } 
        else 
        { 
            echo "La fecha no es correcta"; 
        }
    }
    
    
    public function mostrar(){
        echo $this->cedula . "<br>";
        echo $this->fecha. "<br>";
        echo $this->email. "<br>";
        echo $this->telefono. "<br>";
    }
    
    
    public function __destruct(){
    
    }
    
    
}

$validar = new Validar("172179606-5",'17/10/1995','alex4jme@hotmail.com','0996674478');
$validar->validacion_cedula();
$validar->validacion_telefono();
$validar-> validacion_fecha();
$validar->mostrar();

?>