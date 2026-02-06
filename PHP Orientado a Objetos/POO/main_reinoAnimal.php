<?php
//imports
require_once("class_animal.php");
require_once("class_perro.php");
require_once("class_pez.php");
require_once("class_lobo.php");


$laica = new Perro();

$nemo = new Pez();

$lobo = new Lobo();

$laica->emitir_sonido();

$nemo->emitir_sonido();

$lobo->emitir_sonido();

