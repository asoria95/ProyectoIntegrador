<?php

class Consulta{
    
     
    //ATRIBUTOS
    private $fecha; 
    private $aux_hora; // convierte el valor del value de la hora
    private $hora;
    private $horafin;
    private $diagnostico;
    private $precio;
    private $conducta_seguir;
    private $cedula;
    
//    include 'mensajes.php';
     //$mensaje = new Mensajes(); // mensajes de 
    //METODOS
    public function __construct(){

    }
    
    
    
     public function asignacion($fecha, $aux_hora, $diagnostico, $precio, $conducta_seguir, $cedula){
        
        self::set_fecha($fecha);
        self::set_aux_hora($aux_hora);
        //self::set_hora($hora);
        self::set_diagnostico($diagnostico);
        self::set_precio($precio);
        self::set_conducta_seguir($conducta_seguir);
        self::set_cedula($cedula);
        
    }
    //METODOS SET
    public function set_fecha($fecha){
        $this->fecha = $fecha;
    }
    public function set_aux_hora($aux_hora){
        $this->aux_hora = $aux_hora;
    }
    public function set_hora($hora){
        $this->hora = $hora;
    }
    public function set_hora_fin($horafin){
        $this->horafin = $horafin;
    }
    public function set_diagnostico($diagnostico){
        $this->diagnostico = $diagnostico;
    }
    public function set_precio($precio){
        $this->precio = $precio;
    }
    public function set_conducta_seguir($conducta_seguir){
        $this->conducta_seguir = $conducta_seguir;
    }
    public function set_cedula($cedula){
        $this->cedula = $cedula;
    }
    //METODOS GET
    public function get_fecha(){
        return($this->fecha);
    }
    public function get_aux_hora(){
        return($this->aux_hora);
    }
    public function get_hora(){
        return($this->hora);
    }
    public function get_hora_fin(){
        return($this->horafin);
    }
    public function get_diagnostico(){
        return($this->diagnostico);
    }
    public function get_precio(){
        return($this->precio);
    }
    public function get_conducta_seguir(){
        return($this->conducta_seguir);
    }
    public function get_cedula(){
        return($this->cedula);
    }
    
    
    //ingreso de datos
     public function transformacion_hora(){
        
        switch (self::get_aux_hora()){
                
            case 1: self::set_hora("08:00:00");
                    self::set_hora_fin("08:30:00");
                    break;
            case 2: self::set_hora("08:30:00");
                    self::set_hora_fin("09:00:00");
                    break;
            case 3: self::set_hora("09:00:00");
                    self::set_hora_fin("09:30:00");
                    break;
            case 4: self::set_hora("09:30:00");
                    self::set_hora_fin("10:00:00");
                    break;    
            case 5: self::set_hora("10:00:00");
                    self::set_hora_fin("10:30:00");
                    break;
            case 6: self::set_hora("10:30:00");
                    self::set_hora_fin("11:00:00");
                    break;
            case 7: self::set_hora("11:00:00");
                    self::set_hora_fin("11:30:00");
                    break;    
            case 8: self::set_hora("11:30:00");
                    self::set_hora_fin("12:00:00");
                    break;
            case 9: self::set_hora("14:00:00");
                    self::set_hora_fin("14:30:00");
                    break;
            case 10: self::set_hora("14:30:00");
                    self::set_hora_fin("15:00:00");
                    break;
            case 11: self::set_hora("15:00:00");
                    self::set_hora_fin("15:30:00");
                    break;
            case 12: self::set_hora("15:30:00");
                    self::set_hora_fin("16:00:00");
                    break;   
        }
    }
    
    public function mostrar(){
        echo self::get_fecha() . "<br><br>";
        echo self::get_hora() . "<br><br>";
        echo self::get_hora_fin() . "<br><br>";
        echo self::get_diagnostico() . "<br><br>";
        echo self::get_precio() . "<br><br>";
        echo self::get_cedula() . "<br><br>";
        echo $this->get_fecha();
        echo "<br><br>";
        //echo $validar->validacion_fecha();
    }
    
    
    public function validar_campos(){
        include 'validar_consultas.php';
       
        $val = new Validar();
        if($val->validacion_fecha(self::get_fecha())){
            if($val->validacion_cedula(self::get_cedula())){
                return true;
            }
            else{
                 header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=1&mensaje=1)");   
                //echo "Error en el número de cédula ingresado";
            }
        }
        else{
            header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=1&mensaje=2)");
            // echo "Error en la fecha ingresada, por favor ingrese nuevamente la fecha";
        }
        

    }
    
    
    public function registro_consulta($fecha, $aux_hora, $diagnostico, $precio, $conducta_seguir, $cedula){
        
       
        self::asignacion($fecha, $aux_hora, $diagnostico, $precio, $conducta_seguir, $cedula);
        self::transformacion_hora();
        include 'conectar.php';
        
        
        if(self::validar_campos()){
            
            mysql_query("INSERT INTO consultas(FECHACONSULTA, HORACONSULTA, HORATERMINO, DIAGNOSTICO, PRECIO, CONDUCTA_SEGUIR, CEDULA) VALUES ('$this->fecha', '$this->hora', '$this->horafin', '$this->diagnostico',$this->precio,'$this->conducta_seguir','$this->cedula')", $conexion ) or die ("Problemas en el select".mysql_error());
	   
        mysql_close($conexion);	
        header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=1&mensaje=3)");  
        //echo "CONSULTA REGISTRADA SATISFACTORIAMENTE";    
            
        }
        else{
            header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=1&mensaje=4)");
            //echo "Error en el ingreso de datos";
        }	
    }
    
    
    //buscar datos
    
    public function validar_campos_consulta(){
        include 'validar_consultas.php';
        $val = new Validar();
        if($val->validacion_fecha(self::get_fecha())){
                return true;
            }
        else{
            //echo "Error en la fecha ingresada, por favor ingrese nuevamente la fecha";
            return false;
        }
    }
    
    public function busqueda($fecha, $nombre, $apellido){
        
        self::set_fecha($fecha);
        include 'conectar.php';
        
        if(self::validar_campos_consulta()){
        
          if(self::validar_bd($nombre, $apellido)){
             $registros = mysql_query("SELECT PERSONAS.CEDULA, PERSONAS.NOMBRES, PERSONAS.APELLIDOS, CONSULTAS.NUMERO_CONSULTA,CONSULTAS.FECHACONSULTA,CONSULTAS.HORACONSULTA, CONSULTAS.DIAGNOSTICO, CONSULTAS.PRECIO, CONSULTAS.CONDUCTA_SEGUIR FROM PERSONAS INNER JOIN PACIENTES ON PERSONAS.CEDULA=PACIENTES.CEDULA INNER JOIN CONSULTAS ON PACIENTES.CEDULA = CONSULTAS.CEDULA WHERE CONSULTAS.FECHACONSULTA='$this->fecha' AND CONSULTAS.CEDULA=(SELECT PERSONAS.CEDULA FROM PERSONAS WHERE PERSONAS.NOMBRES='$nombre'AND PERSONAS.APELLIDOS='$apellido')", $conexion)or die ("Problemas en el select:" .mysql_error());
    
                if($reg=mysql_fetch_array($registros)){
                    self::datos($reg); // si existe datos de la consulta se         presenta
                    mysql_close($conexion);	

                    //echo "CONSULTA REGISTRADA SATISFACTORIAMENTE";        
                }   
        
                else{
                     header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=2&mensaje=4)");
                   // echo "No se encuentra la consulta ";
                } 
               
            }
            else{
                header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=2&mensaje=2)"); 
            }
    }
    else{
        header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=2&mensaje=1)"); 
    }
 	
}
    public function datos($reg){
    
        $ced = $reg['CEDULA'];
         $nombre = $reg['NOMBRES'];
         $apellido = $reg['APELLIDOS'];
         $numero=$reg['NUMERO_CONSULTA'];
         $fecha = $reg['FECHACONSULTA'];
         $hora = $reg['HORACONSULTA'];
         $diagnostico = $reg['DIAGNOSTICO'];
         $precio = $reg['PRECIO'];
    
    header("location: /avanzado/nuevo/prototipo1/administrador/mensajes.php?metodo=2&mensaje=3&cedula=$ced&nombres=$nombre&apellidos=$apellido&numero=$numero&fecha=$fecha&hora=$hora&diagnostico=$diagnostico&precio=$precio");      
         
    }
    public function validar_bd($nombre, $apellido){
        include 'conectar.php';
        
     //   echo $this->Apellido . "Variable <br><br>";
        $registro = mysql_query( "SELECT PERSONAS.NOMBRES, PERSONAS.APELLIDOS FROM PERSONAS WHERE PERSONAS.NOMBRES='$nombre'AND PERSONAS.APELLIDOS='$apellido'" ,$conexion) or die("Problemas en el select" . mysql_error());
       // echo "<br><br>";
        
        
         if(mysql_fetch_array($registro)){
            return true;
         }   
        
        else{
            //echo "Error en el ingreso de datos, por favor ingrese el nombre y apellido del paciente";
            return false;
        }    
    }  
    
    
    
    //eliminar datos
    public function eliminar_consulta($fecha, $nombre, $apellido){
        
        self::set_fecha($fecha);

        
            if(self::consulta_eliminacion($nombre, $apellido)){
                echo "ELIMINADO CORRECTAMENTE";    
            }
            else{
                echo "<br> No se encuentra la consulta a eliminar";
            }
        
       // mysql_close($conexion);
    }
    
    
        public function consulta_eliminacion($nombre, $apellido){
            
        include 'conectar.php';
        
        if(self::validar_campos_consulta()){
        
          if(self::validar_bd($nombre, $apellido)){
             $registros = mysql_query("SELECT PERSONAS.CEDULA, PERSONAS.NOMBRES, PERSONAS.APELLIDOS, CONSULTAS.NUMERO_CONSULTA,CONSULTAS.FECHACONSULTA,CONSULTAS.HORACONSULTA, CONSULTAS.DIAGNOSTICO, CONSULTAS.PRECIO, CONSULTAS.CONDUCTA_SEGUIR FROM PERSONAS INNER JOIN PACIENTES ON PERSONAS.CEDULA=PACIENTES.CEDULA INNER JOIN CONSULTAS ON PACIENTES.CEDULA = CONSULTAS.CEDULA WHERE CONSULTAS.FECHACONSULTA='$this->fecha' AND CONSULTAS.CEDULA=(SELECT PERSONAS.CEDULA FROM PERSONAS WHERE PERSONAS.NOMBRES='$nombre'AND PERSONAS.APELLIDOS='$apellido')", $conexion)or die ("Problemas en el select:" .mysql_error());
    
                if($reg=mysql_fetch_array($registros)){
                    echo "<br><br> 1";
                    self::datos($reg); // si existe datos de la consulta se         presenta
                    self::eliminacion($reg['NUMERO_CONSULTA']);
                    mysql_close($conexion);	
                    return true;
                    
                }   
        
                else{
                    return false;
                } 
               
            }
    }
 	
}
    
    /*
    public function verificar_datos($registro){
        include 'conectar.php'; 
        //$registro != ""
        if(){
            return true;
        }
        else{
            return false;
        }
    }
    */
    public function eliminacion($numero_consulta){
        
        include 'conectar.php';
        mysql_query("DELETE FROM CONSULTAS WHERE NUMERO_CONSULTA = $numero_consulta", $conexion)or die
            ("Problemas en el DELETE:" .mysql_error());
        
    }
   
    
//listar datos    
    
 public function listar_consultas(){
        include 'conectar.php';
        
        $registro = mysql_query("SELECT NUMERO_CONSULTA, FECHACONSULTA,HORACONSULTA, DIAGNOSTICO,PRECIO,CONDUCTA_SEGUIR, CEDULA FROM consultas",$conexion) or die("Problemas en el select" . mysql_error());
          
            while($reg=mysql_fetch_array($registro)){
                self::datos_listar($reg);	
                
                
            }
       //  mysql_close($conexion);   
        
    }
    
    public function datos_listar($reg){
        echo "<br><br>";

         echo "Numero de Consulta:" .$reg['NUMERO_CONSULTA'] . "<br>";
         echo "Fecha de Consulta:" .$reg['FECHACONSULTA'] . "<br>";
         echo "Hora de Consulta:" .$reg['HORACONSULTA'] . "<br>";
         echo "Diagnóstico:" .$reg['DIAGNOSTICO'] . "<br>";
         echo "Precio:" .$reg['PRECIO'] . "<br>";
        echo "Conducta a Seguir:" .$reg['CONDUCTA_SEGUIR'] . "<br>";
        
        self::consulta_nombres($reg['FECHACONSULTA'], $reg['CEDULA']);
    }
    
       
    public function consulta_nombres($fecha, $cedula){
           
        include 'conectar.php';
    
             $registros = mysql_query("SELECT  PER.NOMBRES,PER.APELLIDOS FROM PERSONAS PER, CONSULTAS CON WHERE CON.FECHACONSULTA = '$fecha' AND PER.CEDULA= '$cedula'", $conexion)or die ("Problemas en el select2  :" .mysql_error());
    
                if($reg=mysql_fetch_array($registros)){
                    self::datos_personas($reg); // si existe datos de la consulta se         presenta
                    mysql_close($conexion);	
                    //echo "CONSULTA REGISTRADA SATISFACTORIAMENTE";        
                }   
                else{
                    echo "No se encuentra la consulta ";
                }         
    }

 	
    public function datos_personas($reg){
         echo "Nombres del Paciente:" .$reg['NOMBRES'] . "<br>";
         echo "Apellidos del Paciente:" .$reg['APELLIDOS'] . "<br>";
    }    
        
    
    
    
}





?>