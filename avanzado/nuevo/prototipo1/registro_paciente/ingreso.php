<?php

class Validar{
    
    //Atributos
    public $cedula;
    public $fecha;
    public $email;
    public $telefono;
    //private $password;
    
    //Métodos
    
    public function __construct($){
        
        $this->$cedula = $_POST['txtcedula'];
        $this->$fecha = $_POST['datfecha'];
        $this->$email = $_POST['txtcorreo'];
        $this->$telefono = $_POST['txttelefono'];  
    //    $this->$direccion = $_POST['txtdireccion'];
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

            
 
if( $cedula[10] == extraer_digito($cedula))
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

$num_cedula = self::get_cedula();
$cedula1 = str_split($num_cedula);
print_r($cedula1);
    
    
if( self::validacion_provincia($cedula1) && self::validacion_digito_cedula($cedula1) && self::validacion_tamaño_y_guion($cedula1)){
 echo "<br> Número de cédula correcto";   
}
    
    
}
    
public function validacion_telefono(){

$tel =  str_split(self::get_telefono());
    
    if( self::tamanio_tel($tel))
    {
        echo "<br><br>Número de teléfono correcto";
    }
    else{
        echo "<br><br>Número de teléfono no válido, por favor, ingrese un número de teléfono válido";
    }

    
}
    
public function tamanio_tel($tel){
    if(count($tel)==10 || count($tel)==9 || count($tel)==7){
        if(($tel[0]=0 || $tel[0]=2)){
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






//class persona{
    
    //Atributos
    /*
    private $cedula;
    private $nombres;
    private $apellidos;
    private $fecha;
    private $email;
    private $sexo;
    private $genero;
    private $grupo_prioritario;
    private $direccion;
    private $telefono;
    private $antecedentes;
    private $password
    */
    //Métodos
    /*
    public function __construct(){
        $this->$cedula = $_POST['txtcedula'];
        $this->$nombres = $_POST['txtnombre'];
        $this->$apellidos = $_POST['txtapellidos'];
        $this->$fecha = $_POST['datfecha'];
        $this->$email = $_POST['txtcedula'];
        $this->$sexo = $_POST['lissexo'];
        $this->$genero = $_POST['lisgenero'];
        $this->$grupo_prioritario = $_POST['lisprioritario'];
        $this->$direccion = $_POST['txtdireccion'];
        $this->$telefono = $_POST['txttelefono'];
        $this->$antecedentes = $_POST['txareapatologicos'];  
        $this->$telefono = $_POST['txttelefono'];
        
    }
    */
    
    
    
//}

$validacion = new Validar;
$validacion->validacion_cedula();
$validacion->validacion_telefono();
echo "Archivo";

?>
