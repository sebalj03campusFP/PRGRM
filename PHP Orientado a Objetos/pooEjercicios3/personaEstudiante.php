<?php
// Classes
class Persona {
    public $nombre;
    public $edad;


    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}

class Estudiante extends Persona {
    public $curso;
    public function __construct($nombre, $edad, $curso)
    {
        parent::__construct($nombre, $edad);
        $this->curso = $curso;
    }

    public function mostrarInfo(){
        echo "<br>Nombre: ". $this->nombre;
        echo "<br>Edad: " . $this->edad;
        echo "<br>Curso: ". $this->curso;
    }
}
//Logica
$estudiante = new Estudiante("Juan Luis", "20", "Informática");
$estudiante->mostrarInfo();