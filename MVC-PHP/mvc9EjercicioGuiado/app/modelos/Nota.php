<?php


class Nota
{
    public $id;
    public $texto;
    public $fecha;

    public function aLinea()
    {
        return $this->id . "|" . $this->texto . "|" . $this->fecha;
    }

    public function desdeLinea($linea)
    {
        $partes = explode('|', trim($linea));
        if (count($partes) !== 3) {
            throw new Exception("Línea corrupta en notas.txt: " . $linea);
        }
    }
    

}
