<?php 

// Creacion de classes
class CocheF1{
    public $piloto;
    public $velocidad = 0;

    public function __construct($piloto, $velocidad)
    {
        $this->piloto = $piloto;
        $this->velocidad = $velocidad;
    }

    public function acelerar(){
        $acelerar = 20;
        $this->velocidad += $acelerar;
        echo "<br> ". $this->piloto;
        echo "<br> Velocidad:". $this->velocidad;
    }
}

//Logica
$piloto1 = new CocheF1("Lope",null);
$piloto1->acelerar();
$piloto1->acelerar();