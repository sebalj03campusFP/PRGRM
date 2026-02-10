<?php
// app/Modelos/RepositorioAlumno.php

require_once __DIR__ . "/ConexionDB.php";
require_once __DIR__ . "/Alumno.php";

class RepositorioAlumnos
{
    private $conexion;

    function __construct()
    {
        $this->conexion = ConexionBD::obtenerConexion();
    }
    //Create inestar alumno
    function insertar($alumno)
    {
        // Aqui va dentro la consulta/script de SQL que queramos ejecutar.
        $sql = "INSERT INTO alumnos (nombre, email, edad, fecha_creacion)
        VALUES (:nombre, :email, :edad, :fecha)";
        $stmt = $this->conexion->prepare($sql);
        //consulta preparada (evita la inyeccion SLQ (Seguridad en el codigo))
        $stmt->execute([
            ":nombre" => $alumno->nombre,
            ":email" => $alumno->email,
            ":edad" => $alumno->edad,
            ":fecha" => $alumno->fechaCreacion
        ]);
    } //Fin de insertar
    function obtenerTodos()
    {
        $sql = "SELECT * FROM alumnos ORDER BY fecha_creacion";
        $stmt = $this->conexion->query($sql);
        // Array vacio donde estaran los objetos (Lista de objetos)
        $alumnos = [];
        //Leemos fila por fila como un array asociativo
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $alumnos[] = new Alumno(
                $fila["id"],
                $fila["nombre"],
                $fila["email"],
                $fila["edad"],
                $fila["fecha_creacion"]
            );
        }
        return $alumnos; 
    } // Fin obtenertodos
    function borrarPorId($id) 
    {
        $sql = "DELETE FROM alumnos WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([":id"=> $id]);
    } //fin borrarporID
}// Fin clase