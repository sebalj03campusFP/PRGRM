<?php
require_once __DIR__ . "/Tarea.php";
class RepositorioTareas{
    public $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . "/../../storage/tareas.txt";
    }
    
    function obtenerTodos()
    {
        if (!file_exists($this->rutaArchivo)) {
            return [];
        }

        $lineas = file($this->rutaArchivo, FILE_IGNORE_NEW_LINES);
        $tareas = [];

        foreach ($lineas as $linea) {
            if (trim($linea) === '') {
                continue;
                }
                // Puede lanzar excepción si la línea está mal

            $tareas[] = Tarea::desdeLinea($linea);
        }
        return $tareas;
    }
    function agregar($notas){
        $linea = $notas->aLinea() . "\n";
        $resultado = file_put_contents($this->rutaArchivo, $linea, FILE_APPEND);

        if ($resultado === false) {
            throw new Exception("No se pudo escribir en agenda.txt (revisa permisos o ruta)");
        }
    }
    function borrarPorId($id)
    {
        if (!file_exists($this->rutaArchivo)) {
            return;
        }

        $lineas = file($this->rutaArchivo, FILE_IGNORE_NEW_LINES);
        $nuevasLineas = [];

        foreach ($lineas as $linea) {
            if (trim($linea) === '') {
                continue;
            }

            $partes = explode('|', $linea);

            // Si es el id que queremos borrar, lo saltamos
            if (isset($partes[0]) && $partes[0] == $id) {
                continue;
            }

            $nuevasLineas[] = $linea;
        }

        $resultado = file_put_contents($this->rutaArchivo, implode("\n", $nuevasLineas) . "\n");

        if ($resultado === false) {
            throw new Exception("No se pudo reescribir Tareas.txt al borrar");
        }
    }
}