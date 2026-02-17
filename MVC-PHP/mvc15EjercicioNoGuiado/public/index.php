<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/../apps/controllers/ControladorAlumnos.php';

$controlador = new ControladorAlumnos();

$accion = $_GET['accion'] ?? 'listar';


switch ($accion) {
    case 'listar':
        $controlador->listar();
        break;
    case 'borrar':
        $controlador->borrar();
        break;
}