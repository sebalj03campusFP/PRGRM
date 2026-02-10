<?php
// app/Controladores/ControladorAlumnos.php

require_once __DIR__ . "/../Modelos/RepositorioAlumnos.php";

class ControladorAlumnos
{
    private $repositorio;

    function __construct()
    {
        $this->repositorio = new RepositorioAlumnos();
    }

    // Renderizar (layout + vista)
    function renderizar($vista, $datos = [])
    {
        extract($datos);
        $archivoVista = __DIR__ . "/../Vistas/" . $vista . ".php";
        if (!file_exists($archivoVista)) {
            echo "Vista no encontrada: " . $vista;
            return;
        }

        $vistaContenido = $archivoVista;
        require __DIR__ . "/../Vistas/layout.php";
    } // Fin renderizar

    function registrarError($contexto, $e)
    {
        $rutaLog = __DIR__ . "/../../storage/errores.log";
        $fecha = date("Y-m-d H:i:s");

        $linea = $fecha . " | " . $contexto . " | " . $e->getMessage() . " | " . $e->getFile() . " | " .  $e->getLine() . "\n";

        file_put_contents($rutaLog, $linea, FILE_APPEND);
    } // fin de registrar error

    // Listar
    function listar()
    {
        try {
            $alumnos = $this->repositorio->obtenerTodos();
            $this->renderizar('alumnos/listar', ['alumnos' => $alumnos]);
        } catch (Exception $e) {
            $this->registrarError("LISTAR", $e);
            $this->renderizar('alumnos/listar', [
                'alumnos' => [],
                'error' => 'No se pudieron cargar los alumnos, revisa errores.log'
            ]);
        }
    } // Fin de funcion listar

    //Mostrar formulario
    function crear()
    {
        $this->renderizar('alumnos/crear', [
            'antiguos' => ['nombre' => '', 'email' => '', 'edad' => '']
        ]);
    } //Fin de crear


    //Validar 
    function validar($nombre, $email, $edad)
    {
        if (strlen($nombre) < 3) {
            throw new Exception("El nombre debe tener al menos 3 caracteres");
        }
        //email opcional, pero si existe debe ser valido
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
    } //Fin validar

    // Guardar
    function guardar()
    {
        
        if ($_SERVER['REQUEST_METHOD']  !== 'POST') {
            header("Location: index.php?accion=listar");
            exit;
        }
        $nombre = trim($_POST['nombre'] ?? '');
        $email = ($_POST["email"] ?? '');
        $edad = trim($_POST["edad"] ?? '');

        try {
            $this->validar($nombre, $email, $edad);
            $alumno = new Alumno(
                null,
                $nombre,
                $email,
                (int)$edad,
                date('Y-m-d H:i:s')
            );
            $this->repositorio->insertar($alumno);
            header("Location: index.php?accion=listar");
            exit;
        } catch (Exception $e) {
            $this->registrarError("GUARDAR", $e);
            $this->renderizar('alumnos/crear', [
                'error' => $e->getMessage(),
                'antiguos' => ['nombre' => $nombre]
            ]);
        }
    } //fin guardar

    function borrar()
    {
        $id = $_GET['id'] ?? '';
        try {
            if ($id === '' || !ctype_digit($id)) {
                throw new Exception("ID inválido o no encontrado, no es posible borrar");
            }
            $this->repositorio->borrarPorId($id);
        } catch (Exception $e) {
            $this->registrarError("BORRAR", $e);
        }
        header("Location: index.php?accion=listar");
        exit;
    } //fin funcion borrar

}// Fin de Class Controlador Alumnos
