<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura segura y log de errores</title>
</head>

<body>

    <?php
    ini_set('display_errors', 0); //Quitamos los errores visibles para el usuario
    ini_set('log_errors', 1); // le decimos a php que active los logs
    ini_set('error_log', 'errores.log'); //donde se guardara los errores en un .log

    $archivo = "ejercicio6_1.txt";

    // Funcion para validar el archivo
    function archivoValido($archivo)
    {
        // si no existe mostramos un error personalizado al usuario
        if (!file_exists($archivo)) {
            throw new Exception("El archivo no existe o el nombre no es correcto.");
        }
        return file_get_contents($archivo); // sino que continue
    }

    try {
        echo nl2br(archivoValido($Null)); //lectura con nl2br para que muestre de forma bonita el archivo
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage(); // si falla mostramos el error personalizado que escribimos antes.
    }
    ?>


</body>

</html>