<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../app/controller/ControladorAlumnos.php';

$controlador = new ControladorAlumnos();

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {
  case 'listar':
    $controlador->listar();
    break;
  default:
    echo "Acción no válida";
}
