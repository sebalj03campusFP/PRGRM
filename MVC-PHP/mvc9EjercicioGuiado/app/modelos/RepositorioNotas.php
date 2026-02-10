<?php

class RepositorioNotas {
    public $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../../storage/notas.txt';
    }

    public function obtenerTodas(){
        if(!file_exists($this->rutaArchivo)) {
            return [];
        }
        $lineas = file($this->rutaArchivo, FILE_IGNORE_NEW_LINES);
        $notas = [];

    }

    public function agregar($nota){
        $linea = $nota->aLinea() . "\n";
        $resultado = file_put_contents($this->rutaArchivo, $linea, FILE_APPEND);
        if ($resultado === false) {
            throw new Exception("No se pudo escribir en notas.txt");
        }

    }
}