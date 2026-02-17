<?php
require_once __DIR__ . '/Alumnos.php';
require_once __DIR__ . '/ConexionDB.php';

class RepositorioAlumnos {
    private $conexion;

    function __construct()
    {
        $this->conexion = ConexionDB::getConexion();
    }

    function getAlumno(){
        $sql = "SELECT * FROM alumnos ORDER BY fecha_creacion";
        $stmt = $this->conexion->query($sql);
        $alumnos = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $alumnos[] = new Alumnos(
                $fila["id"],
                $fila["nombre"],
                $fila["email"],
                $fila["edad"],
                $fila["fecha_creacion"],
            );
        }
        return $alumnos;
    }// fin get alumno

    function deleteID($id){
        $sql = "DELETE FROM alumnos WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([":id"=> $id]);
    }// fin delete id
}// fin clase