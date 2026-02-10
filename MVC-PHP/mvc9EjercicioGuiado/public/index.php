<?php
require_once __DIR__ . '/../app/controladores/ControladorNotas.php';
$controlador = new ControladorNotas();

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {
  case 'listar':
    // llamar a listar()
    break;

  case 'crear':
    // llamar a crear()
    break;

  case 'guardar':
    // llamar a guardar()
    break;

  default:
    echo "Acción no válida";
}

