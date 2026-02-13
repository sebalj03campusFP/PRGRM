<?php


class ConexionDB{
    private static $conexion;

    public static function obtenerConexion()
    {
        if (self::$conexion === null){
            $host = "localhost";
            $baseDatos = "centro";
            $user = "root";
            $password = "root123";

            try {
                $dsn = "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4";
                self::$conexion = new PDO($dsn,$user,$password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                die("Error de conexion con la base de datos");
            }
        }
        return self::$conexion;
    } 
    
}