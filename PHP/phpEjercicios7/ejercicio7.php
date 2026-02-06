<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 29 Formulario con Logs</title>
</head>


<?php
// nombres de archivos a usar
$archivoRegistros = "registros.txt";
$archivoErrores = "errores.log";


// config
ini_set('display_errors', 0); // ocultar errores visibles al usuario
ini_set('log_errors', 1);
ini_set('error_log', $archivoErrores);


// funcion para validar el formulario
function validarDatos($nombre, $email, $edad, $comentario) {
    // Nombre: obligatorio y min 3 letras
    if (empty($nombre) || strlen(trim($nombre)) < 3) {
        throw new Exception("El nombre es obligatorio y debe tener al menos 3 letras.");
    }
    // email con formato
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("El email no es válido.");
    }
    // edad
    if (!is_numeric($edad) || $edad < 0 || $edad > 120) {
        throw new Exception("La edad debe ser un número entre 0 y 120.");
    }
    // comentario opcional con un limite
    if (strlen($comentario) > 200) {
        throw new Exception("El comentario es demasiado largo (máx 200).");
    }
    return true; // se devuelve true si sale bien
}
?>
<body>
    <h3>Registro de usuarios</h3>
   
    <form action="" method="post">
        <fieldset>
            <legend>Datos del Usuario</legend>
            <label>Nombre:</label><br>
            <input type="text" name="nombre" placeholder="Mínimo 3 letras"><br><br>

            <label>Email:</label><br>
            <input type="text" name="email" placeholder="ejemplo@email.com"><br><br>

            <label>Edad:</label><br>
            <input type="number" name="edad" placeholder="0-120"><br><br>

            <label>Comentario:</label><br>
            <textarea name="comentario" rows="3" placeholder="Opcional"></textarea><br><br>

            <input type="submit" value="Guardar Registro">
        </fieldset>


        <?php
        // empty para evitar errores nada mas abrir la pagina web
        if (!empty($_POST)) {
           
            // variables
            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
            $email  = isset($_POST['email']) ? trim($_POST['email']) : '';
            $edad   = $_POST['edad'] ?? '';
            $comentario = $_POST['comentario'] ?? '';


            $guardarOK = false; // Bandera para controlar el guardado final


            try {
                // uso de funcion para validar
                validarDatos($nombre, $email, $edad, $comentario);
               
                // si la funcion no ejecuta pasa a true
                $guardarOK = true;


            } catch (Exception $e) {


               
                // mensaje para el usuario
                echo "<p>Error: " . $e->getMessage() . "</p>";


                // guardado de logs
                date("d-m-Y H:i:s");
                $msgError = $e->getMessage();
                $archivoPHP = $e->getFile();
                $lineaPHP = $e->getLine();


                $logData = "$fecha | EJ29 | $msgError | $archivoPHP | $lineaPHP\n";
                file_put_contents($archivoErrores, $logData, FILE_APPEND);


                $guardarOK = false;
            }


            // guardadar si todo sale bien
            if ($guardarOK == true) {
                // usamos str replace para escribir y con el respectivo salto de linea
                $comentarioLimpio = str_replace(array("\r", "\n"), " ", $comentario);
               
                $fechaActual = date("d-m-Y H:i:s");
                $datosGuardar = "$fechaActual | $nombre | $email | $edad | $comentarioLimpio\n";


                // guardamos usando tu metodo preferido
                file_put_contents($archivoRegistros, $datosGuardar, FILE_APPEND);


                echo "<p>Registro guardado correctamente.</p>";
            }
        }
        ?>
    </form>
</body>
</html>
