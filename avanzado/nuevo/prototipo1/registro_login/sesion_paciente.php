<?php

class sesion_paciente{
    
    private $email;
    private $password;
        
    public function __construct($email, $password){
        self::set_email($email);
        self::set_password($password);
    }    
        
    public function set_email($email){
        $this->email = $email;
    }    
    public function set_password($password){
        $this->password = $password;
    }
    public function get_email(){
        return($this->email);
    }
    public function get_password(){
        return($this->password);
    }
    
    public function inicio_sesion(){
         $consulta_paciente = "SELECT PER.CEDULA, PER.NOMBRES, PER.APELLIDOS, PER.FECHA_NACIMIENTO, PER.TELEFONO,PER.SEXO, PER.GENERO,PER.DIRECCION,PER.CORREO,PER.EDAD, PAC.GRUPO_PRIORITARIO FROM pacientes PAC, personas PER WHERE PER.CEDULA=PAC.CEDULA AND PER.CORREO= '$this->email' AND PAC.CONTRASENIA='$this->password'";
         $consulta_administrador="SELECT * FROM personas PER, administrador AD WHERE PER.CEDULA=AD.CEDULA AND PER.CORREO='$this->email' AND AD.CONTRASENIA='$this->password'";
        
        if (self::get_email() != ""){
            session_start(); // inicio de variable de sesion    
            if(self::consulta($consulta_paciente)){
               header("location: /avanzado/nuevo/prototipo1/cliente/index.php");     
            }
            else{
                if(self::consulta($consulta_administrador)){
                    header("location: /avanzado/nuevo/prototipo1/administrador/index.php");     
                }
                else{
                    header("location:login.php");    
                }
            }
        }
    }
    
    
    
    
    
    
    public function consulta($consulta){
        
        
        include '/../conectar.php';
        $resultado = mysql_query($consulta, $conexion) or die ("Problemas en el select" . mysql_error());
        $fila=mysql_fetch_array($resultado);
        if(!$fila['CEDULA']){
            echo "1....<br><br>";
            return false;
            //header("location:login.php");
        }
        else{
            self::asignacion_variables_sesion($fila);
            return(true);
        }
    }
    
    public function asignacion_variables_sesion($fila){
        $_SESSION['CEDULA'] = $fila['CEDULA'];
      
        $_SESSION['NOMBRES'] = $fila['NOMBRES'];
        $_SESSION['APELLIDOS'] = $fila['APELLIDOS'];   
    /* 
        $_SESSION['FECHA_NACIMIENTO'] = $fila['FECHA_NACIMIENTO'];
        $_SESSION['TELEFONO'] = $fila['TELEFONO'];
        $_SESSION['SEXO'] = $fila['SEXO'];
        $_SESSION['GENERO'] = $fila['GENERO'];
        $_SESSION['DIRECCION'] = $fila['DIRECCION'];
    */  
      $_SESSION['CORREO'] = $fila['CORREO'];
    //    $_SESSION['EDAD'] = $fila['EDAD'];
      //  $_SESSION['GRUPO_PRIORITARIO'] = $fila['GRUPO_PRIORITARIO'];
    }    
}

?>