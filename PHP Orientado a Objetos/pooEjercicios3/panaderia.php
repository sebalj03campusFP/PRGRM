<?php

class Producto {
    public $nombre;
    public $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;

    }

    
}

class Pastel extends Producto {
    public $sabor;
    public function __construct($nombre, $precio, $sabor)
    {
        parent::__construct($nombre, $precio);
        $this->sabor = $sabor;
    }

    public function etiqueta(){
        echo "<br> Producto: " . $this->nombre;
        echo "<br> Precio: " . $this->precio;
        echo "<br> Sabor: " . $this->sabor;
    }

}

//creacion del objeto
$producto= new Pastel("Donut", 1.5, "Chocolate");
// Metodo etiqueta
$producto->etiqueta();

