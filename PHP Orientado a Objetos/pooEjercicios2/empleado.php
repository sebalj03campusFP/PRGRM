<?php
//Creacion de classes
class Empleado {
    public $nombre;
    public $puesto;
    public $sueldo;

    public function __construct($nombre, $puesto, $sueldo)
    {
        $this->nombre = $nombre;
        $this->puesto = $puesto;
        $this->sueldo = $sueldo;
    }

    public function revisarSueldo(){
        if ($this->sueldo < 1000) {
            $sueldo = $this->sueldo + 200;
            echo "El Sueldo ha sido actualizado <br>";
            echo "<br>".$sueldo;
        } else {
            echo "<br>El sueldo es correcto <br>";
            echo $this->sueldo;
        }

    }
}

// Logica
$empleado = new Empleado("Juanlu", "Conserje", 800);

$empleado2 = new Empleado("Sebas", "Jefe", 2500);

// Revisar sueldo

$empleado->revisarSueldo();

$empleado2->revisarSueldo();