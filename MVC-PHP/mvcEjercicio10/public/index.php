<?php
// Muestra errores para que podamos ver qué falla mientras aprendemos
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Importa el controlador
require_once __DIR__ . "/../app/controllers/ControladorTareas.php";

$controlador = new ControladorTareas();
$accion = $_GET["accion"] ?? "listar";

switch ($accion) {
    case 'listar':
        $controlador->listar();
        break;
    case 'crear':
        $controlador->crear();
        break;
    case 'guardar':
        $controlador->guardar();
        break;
    case 'borrar':
        $controlador->borrar();
        break;
    default:
        echo "Acción no válida";
}