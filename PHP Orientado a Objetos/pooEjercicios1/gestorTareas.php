<?php

class Tarea {
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    public function marcarCompletada(){
        if ($this->estado == true) {
            echo "Completada :)";
        } else {
            echo "No completada >:( ";
        }
    }

    public function editarDescripcion($nuevaDescripcion){
        if (!empty($nuevaDescripcion)){
            $this->descripcion = $nuevaDescripcion;

        } else {
            echo "No puedes dejar la descripción vacía";
        }
    }

    public function mostrarTarea() {
        echo $this->nombre;
        echo $this->descripcion;
        echo $this->fechaLimite;
        echo $this->estado;
    }


    }

?>

<div>

<?php 
// Las variables a modificar
$nombre = "Sebastian";
$nuevaDescripcion = " Hoja Ejercicios 8 POO";
$fechaLimite = "Este Viernes!";
$estado = false;
// Creacion de variable con su class
$tarea1 = new Tarea();
$tarea1->nombre = $nombre;
$tarea1->editarDescripcion($nuevaDescripcion);
$tarea1->fechaLimite = $fechaLimite;

//estado
$tarea1->estado = $estado;
$tarea->marcarCompletada();

//mostrar info

$tarea1->mostrarTarea();

?>


</div>