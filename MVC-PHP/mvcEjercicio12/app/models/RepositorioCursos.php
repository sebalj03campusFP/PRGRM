<?php

require_once __DIR__ . '/ConexionDB.php';
require_once __DIR__ . '/Curso.php';

class RepositorioCursos
{
    private $conexion;
    function __construct()
    {
        $this->conexion = ConexionDB::obtenerConexion();
    }
    
    function insertar($curso)
    {
        $sql = "INSERT INTO cursos (nombre, horas, fecha_creacion)
        VALUES (:nombre, :horas, :fecha)";
        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':nombre' => $curso->nombre,
            ':horas' => $curso->horas,
            ':fecha' => $curso->dateTime
        ]);
    } // fin insertar

    function obtenerTodos()
    {
        $sql = "SELECT * FROM cursos ORDER BY fecha_creacion DESC";
        $stmt = $this->conexion->query($sql);
        $cursos=[];

        //fetch(PDO:FETCH_ASSOC) esto devuelve un array asociativo con la fila

        while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $cursos[] = new Curso(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['horas'],
                    $fila['fecha_creacion']
                    );
            }
            return $cursos;
    }// fin obtener todos
    
} //Fin clase