<?php

class Alumno{
    public $id;
    public $nombre;
    public $email;
    public $edad;
    public $fechaCreacion;
// Se crea el constructor, no hace falta agregar mas
// cosas como antes ya que en repositorio trabajaremos con los datos aqui escritos
    function __construct($id,$nombre,$email,$edad,$fechaCreacion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->edad = $edad;
        $this->fechaCreacion = $fechaCreacion;
    }

}