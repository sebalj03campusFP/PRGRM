<?php

class Reloj {
    public $marca;

    public function __construct($marca)
    {
        $this->marca = $marca;
    }
}

class SmartWatch extends Reloj{
    public $sistemaOperativo;

    public function __construct($marca, $sistemaOperativo)
    {
        parent::__construct($marca);
        $this->sistemaOperativo = $sistemaOperativo;
    }

    public function mostrarInfo(){
        echo "<br> Marca: " . $this->marca;
        echo "<br> OS: " . $this->sistemaOperativo;
    }   
}


$reloj = new SmartWatch("Samsung", "Android");

$reloj2 = new SmartWatch("Apple", "WatchOS");

//Metodos

$reloj->mostrarInfo();
$reloj2->mostrarInfo();