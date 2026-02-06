<?php

//Classes
class Producto {
    public $descripcion;
    public $precioSinIva;

    public function __construct($descripcion, $precioSinIva)
    {
        $this->descripcion = $descripcion;
        $this->precioSinIva = $precioSinIva;
    }

    public function precioFinal(){
     $iva = $this->precioSinIva * 0.21;
     $precioFinal = $this->precioSinIva + $iva;
     echo "Producto: " .$this->descripcion . "\n";
     echo " Precio total: $precioFinal \n";
    }

}


//Logica
$ordenador = new Producto("Portatil Lenovo Gaming F16", 975,86);
$ordenador->precioFinal();
