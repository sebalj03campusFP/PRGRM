<?php
require_once __DIR__ . '/../models/RepositorioAlumnos.php';
class ControladorAlumnos {

    private $repositorio;

    function __construct()
    {
        $this->repositorio = new RepositorioAlumnos();
    }

    function render($views,$data = []){
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $views . '.php';
        if (!file_exists($viewFile)){
            echo "Vista no encontrada: " . $views;
            return;
        }
        $viewContent = $viewFile;
        require __DIR__ . '/../views/layout.php';
    }

    function regError($contexto, $e){
        $rutaLog = __DIR__ . '/../../storage/errores.log';
        $fecha = date("Y-m-d H:i:s");

        $linea = $fecha . " | " . $contexto . " | " . $e->getMessage() . " | " . $e->getFile() . " | " . "\n";
        file_put_contents($rutaLog, $linea, FILE_APPEND);
    }

    function listar(){
        try{
            $alumnos = $this->repositorio->getAlumno();
            $this->render('alumnos/listar', ['alumnos' => $alumnos]);

        } catch (Exception $e) {
            $this->registrarError("ERROR LISTAR: ",$e);
            $this->render('alumnos/listar', [
                'alumnos' => [],
                'errores' => "No se pudieron cargar los alumnos, revisa errores.log"
            ]);
        }
    }// fin funcion listar

    function borrar()
    {
        $id = $_GET['id'] ?? '';
        try {
            if ($id === '' || !ctype_digit($id)) {
                throw new Exception("ID inválido o no encontrado, no es posible borrar");
            }
            $this->repositorio->deleteID($id);
        } catch (Exception $e) {
            $this->registrarError("BORRAR", $e);
        }
        header("Location: index.php?accion=listar");
        exit;
    } //fin funcion borrar
}// fin clase Controlador