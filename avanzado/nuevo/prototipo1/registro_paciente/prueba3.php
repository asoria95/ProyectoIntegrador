<?php

class Facebook{
    //Atributos
    public $nombre;
    public $edad;
    private $pass;
    
    public function __construct($nombre,$edad, $pass){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->pass = $pass;
    }
    
    public function verInformacion(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Pass: " . $this->pass . "<br>";
    }
    
    private function cambiarPass($pass){
        $this->pass = $pass;
    }
    
}

$facebook = new Facebook("Alex Soria","21","1234");
$facebook->verInformacion();
$facebook->cambiarPass("4321");



?>