<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir contacto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<button class="volver" onclick="location.href='index.html'">Volver</button>
    <form action="add_contact.php" method="post">
        <div class="cuadro"> 
        <h2>Datos del Usuario</h2>
        <label>Nombre:</label><br>
        <input type="text" name="nombre" placeholder="Nombre" required><br>

        <label>Numero:</label><br>
        <input type="number" name="movil" placeholder="000000000" required><br>

        <input class="guardar" type="submit" value="Guardar">
        </div>
    </form>

    <?php
    ini_set('display_errors', 0); //Quitamos los errores visibles para el usuario
    ini_set('log_errors', 1); // le decimos a php que active los logs
    ini_set('error_log', 'errores.log'); //donde se guardara los errores en un .log
   
    function error($guardado) {
       if (($guardado == false)) {
        throw new Exception("El nombre o movil no son validos");
       }
    }
    if (!empty($_POST)) {
        $agenda = "agenda.txt";
        $nombre = $_POST["nombre"];
        $movil = $_POST["movil"];
        $movilFiltrado = filter_var($movil, FILTER_SANITIZE_NUMBER_INT);
        $guardado = null;
        if ((isset($_POST["nombre"])) && isset($movilFiltrado)) {
            $datosGuardar = " $nombre | $movilFiltrado\n";
            file_put_contents($agenda, $datosGuardar, FILE_APPEND);
            $guardado = true;
            echo "$nombre se ha añadido a la lista";
        } else {
            $guardado = false;
        }
        try {
                error($guardado);
            } catch (Exception $e) {
                echo "Error:" . $e->getMessage();
            }
    }


    ?>

</body>

</html>