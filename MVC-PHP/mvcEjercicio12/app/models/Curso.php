<?php

class Curso{
    public $id;
    public $nombre;
    public $horas;
    public $dateTime;
    
    function __construct($id, $nombre,$horas,$dateTime)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->horas = $horas;
        $this->dateTime = $dateTime;
    }
    
}