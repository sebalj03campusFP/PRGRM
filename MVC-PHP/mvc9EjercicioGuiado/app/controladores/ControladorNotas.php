<?php
require_once __DIR__ . '/../modelos/RepositorioNotas.php';
class ControladorNotas
{
    public $repositorio;

    public function __construct()
    {
        $this->repositorio = new RepositorioNotas();
    }

    public function listar()
    {
        try {
            $notas = $this->repositorio->obtenerTodas();
            $this->renderizar("notas/listar", ["notas" => $notas]);
        } catch (Exception $e) {
            $this->registrarError("LISTAR", $e);
            $this->renderizar('notas/listar', ["notas" => [], 'error' => 'No se pudo cargar el archivo de notas']);
        }
    }

    public function crear()
    {
        $this->renderizar('notas/crear', ['antiguos' => ['texto' => '']]);
    }

    public function guardar()
    {
        $texto = trim($_POST['texto'] ?? '');

        if (strlen($texto) < 3) {
            throw new Exception("La nota debe tener al menos 3 caracteres");
        }
        if (strlen($texto) > 80) {
            throw new Exception("La nota no puede superar 80 caracteres");
        }
        header("Location: index.php?accion=listar");
        exit;
    }

    // Funcion Renderizar
    public function renderizar($vista, $datos = [])
    {
        extract($datos);
        $archivoVista = __DIR__ . '/../vistas/' . $vista . '.php';
        $vistaContenido = $archivoVista;
        require __DIR__ . '/../vistas/layout.php';
    } //fin funcion renderizar

    //Funcion de registrar error
    public function registrarError($contexto, $e)
    {
        $archivoLog = __DIR__ . '/../../storage/errores.log';
        $fecha = date('Y-m-d H:i:s');

        $linea = $fecha . " | " . $contexto . " | " . $e->getMessage() . "\n";
        file_put_contents($archivoLog, $linea, FILE_APPEND);
    } //fin registrar

}
