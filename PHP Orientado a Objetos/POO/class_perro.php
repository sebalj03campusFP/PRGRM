<?php

require_once("class_animal.php");

Class Perro extends Animal {

    public function emitir_sonido(){
        echo "guau guau\n";
    }
}

?>