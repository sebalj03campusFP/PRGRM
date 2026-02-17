<?php

class ConexionDB {
    private static $conexion = null;

    public static function getConexion(){
        if (self::$conexion === null) {

            $host = "localhost";
            $dbname = "centro";
            $user = "root";
            $psswrd = "root123";
        // Control de errores
            try {
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                self::$conexion = new PDO($dsn, $user, $psswrd);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error conexión en la base de datos");
            }
        }
        return self::$conexion;
    }
}