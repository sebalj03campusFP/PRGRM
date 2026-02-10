<?php
// Muestra errores para que podamos ver qué falla mientras aprendemos
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Importa el controlador
require_once __DIR__ . '/../app/Controladores/ControladorContactos.php';

// Crea la instancia del controlador
$controlador = new ControladorContactos();

// Si no hay acción en la URL (?accion=...), por defecto es 'listar'
$accion = $_GET['accion'] ?? 'listar';

// El switch decide qué método del controlador ejecutar
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