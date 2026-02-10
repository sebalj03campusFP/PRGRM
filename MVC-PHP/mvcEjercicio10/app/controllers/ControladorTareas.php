<?php
require_once __DIR__ . "/../models/RepositorioTareas.php";

class ControladorTareas {
    public $repositorio;

    function __construct(){
        $this->repositorio = new RepositorioTareas();

    }

    function listar(){

    try{
        $tareas = $this->repositorio->obtenerTodos();
        $this->renderizar('tareas/listar',["tareas"=> $tareas]);
    } catch (Exception $e) {
        $this->registrarError("LISTAR", $e);
        $this->renderizar("tareas/listar", ["tarea"=>[], "error"=>"No se pudo cargar las tareas. Revisar: Errores.log"]);
    }
    }

    function crear(){
        $this->renderizar('tareas/crear',["antiguos"=> ["titulo"=>" ","estado"=>" ", "fechaCreacion"=>" "]]); 
    }

    function guardar(){
        if (($_SERVER['REQUEST_METHOD']?? 'GET')!== 'POST'){
            header("Location: index.php?accion=listar");
            exit;
        }
        $titulo = trim($_POST['titulo']?? '');
        $estado = trim($_POST['estado']?? '');
        $fechaCreacion = trim($_POST['fechaCreacion']?? '');
        try {
            $this->valida($titulo,$estado);
            $id = (string) time();
            $fechaCreacion = date('Y-m-d H:i:s');
            $tarea = new Tarea($id,$titulo,$estado,$fechaCreacion);
            $this->repositorio->agregar($tarea);
            header("Location: index.php?accion=listar");
            exit;
        } catch (Exception $e) {
            $this->registrarError("GUARDAR", $e);

            $this->renderizar("tareas/crear", ["error"=> $e->getMessage(), "antiguos" => ["titulo"=>$titulo, "estado"=>$estado, "fechaCreacion"=>$fechaCreacion]]);
        }
    }


    function borrar() {
        $id = $_GET['id'] ?? '';

        try {
            if ($id === '') {
                throw new Exception("Falta el id para borrar");
            }
            $this->repositorio->borrarPorId($id);
        } catch (Exception $e) {
            $this->registrarError("BORRAR", $e);
        }
        header("Location: index.php?accion=listar");
        exit;
    }

    function valida($titulo){
        if(strlen($titulo) < 3){
            throw new Exception("El titulo debe tener al menos 3 caracteres");

        }
    }

    function renderizar($vista, $datos = [])
    {
        // Convierte array en variables: ['contactos'=>$x] -> $contactos
        extract($datos);

        // Construimos ruta real de la vista
        $archivoVista = __DIR__ . '/../views/' . $vista . '.php';

        if (!file_exists($archivoVista)) {
            echo "Vista no encontrada: " . $vista;
            return;
        }

        // Variable que el layout va a requerir
        $vistaContenido = $archivoVista;

        // Cargamos el layout, que incluirá $vistaContenido
        require __DIR__ . '/../views/layout.php';
    }

    function registrarError($contexto, $e)
    {
        $archivoLog = __DIR__ . '/../../storage/errores.log';
        $fecha = date('Y-m-d H:i:s');

        $linea = $fecha . " | " . $contexto . " | " . $e->getMessage() . " | " . $e->getFile() . " | " . $e->getLine() . "\n";
        file_put_contents($archivoLog, $linea, FILE_APPEND);
    }


}