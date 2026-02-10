<?php

class ConexionDB{
    private static $conexion = null;
    public static function obtenerConexion()
    {
        if (self::$conexion === null){
            $host = "localhost";
            $baseDatos = "formacion";
            $usuario = "root";
            $password = "root123";

        try {
            $dsn = "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4";
            self::$conexion = new PDO($dsn, $usuario, $password);
            //Control excepciones SQL
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión con la base de datos.");
        }
        }
        return self::$conexion;
    } // Fin conexionDB
}
