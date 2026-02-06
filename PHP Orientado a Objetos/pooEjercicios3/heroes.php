<?php

class Personaje
{
    public $nombre;
    public $vida;

    public function __construct($nombre, $vida)
    {
        $this->nombre = $nombre;
        $this->vida = $vida;
    }
}

class Guerrero extends Personaje
{
    public $arma = "Espada";
    public function __construct($nombre, $vida)
    {
        parent::__construct($nombre, $vida);
        
    }
    public function info()
    {
        echo "Nombre: " . $this->nombre;
        echo "<br>Vida: " . $this->vida;
        echo "<br>Arma: " . $this->arma;
    }
}

//creacion objeto
$personaje = new Guerrero("Thor", 100);
//Logica final
$personaje->info();