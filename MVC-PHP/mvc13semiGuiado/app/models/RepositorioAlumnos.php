<?php
require_once __DIR__ . '/Alumno.php'; // Para usar la class alumno
require_once __DIR__ . '/ConexionDB.php'; //conexion a db

class RepositorioAlumnos{
    private $conexion;
    
    public function __construct()
    {
    try {
        $this->conexion = ConexionDB::obtenerConexion();
    } catch (Exception $e) {
        throw new Exception("No se pudo conectar a la Base de datos (Error Repositorio)");
        return $e;
    }

    } // Fin constructor

    public function getTodos(){
        $sql = "SELECT * FROM alumnos ORDER BY fecha_creacion DESC";
        // Se hace el envio de esta consulta a la base de datos
        $stmt = $this->conexion->query($sql);

        //Array vacio donde se colocará los datos
        $alumnosArray = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $alumnosArray[]= new Alumno(
            $fila["id"],      /* <---Sintaxis para agregar cada dato recibido*/
            $fila["nombre"],
            $fila["email"],
            $fila["edad"],
            $fila["fecha_creacion"]
            );
        }
        return $alumnosArray;
    }
    
}// fin clase