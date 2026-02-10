<?php

class Tarea {
    public $id;
    public $titulo;
    public $estado;
    public $fechaCreacion;

    function __construct($id, $titulo, $estado,$fechaCreacion)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->estado = $estado;
        $this->fechaCreacion = $fechaCreacion;
    }
    function aLinea(){
        return $this->id ."|" . $this->titulo . "|" . $this->estado . "|" . $this->fechaCreacion; 
    }

    static function desdeLinea($linea){

        $partes = explode('|', trim($linea));
         if (count($partes) !== 4) {
            throw new Exception("Línea corrupta en agenda.txt: " . $linea);
        }
        return new Tarea($partes[0],$partes[1],$partes[2],$partes[3]);
    }

}