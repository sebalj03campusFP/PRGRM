<?php
require_once __DIR__ . '/../models/RepositorioAlumnos.php';
$dirLog = __DIR__ . '/../../storage';
ini_set('error_log', $dirLog);
class ControladorAlumnos {
    private $repositorio;

    public function __construct()
    {
        try {
            $this->repositorio = new RepositorioAlumnos();
        } catch (Exception $e) {
            throw new Exception("Error entre el controlador y repositorio". $e->getMessage());
        }
    }// fin constructor
    
    public function render($view, $data=[]){
        //extraccion de datos de un array dentro de una variable
        extract($data);
        $viewDir = __DIR__ .'/../views/'. $view .'.php';
        if (!file_exists($viewDir)){
            throw new Exception("Vista no encontrada en Controlador Alumnos");
            echo "Vista no encontrada" . $view;
            return;
        }
        $viewContent = $viewDir;
        require_once __DIR__ . '/../views/layout.php';

    }

    public static function setError($message, $e){
        $dirLog= __DIR__ . '/../../storage';
        $fecha = date("Y-m-d H:i:s");

        $linea = $fecha . " | " . $message . " | " . $e->getMessage() . " | " . $e->getFile() . " | " .  $e->getLine() . "\n";

        file_put_contents($dirLog, $linea, FILE_APPEND);
    }// fin getError

    public function listar(){
        try {
            $alumnos= $this->repositorio->getTodos();
            $this->render('alumnos/listar', ['alumnos' =>$alumnos]);

        } catch (Exception $e) {
            $this->setError("LISTAR",$e);
            $this->render('alumnos/listar', ['alumnos'=>[],
            'error' => 'No se pudieron cargar los alumnos, revisa error.log']);
        }
    } // Fin funcion listar

    function validate($nombre, $email, $edad){
        if (strlen($nombre) < 3) {
            throw new Exception("El nombre debe tener al menos 3 caracteres");
        }
        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El email no es válido");
        }
        if ($edad === '' || !ctype_digit($edad)) {
            throw new Exception("La edad debe ser un número");
        }
        $edadNum = (int)$edad;
        if ($edadNum < 1 || $edadNum > 120) {
            throw new Exception("La edad debe estar entre 1 y 120 años");
        }
    } // fin validate

    
}//fin clase