<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <button class="volver" onclick="location.href='index.html'">Volver</button>

    <form action="" method="post">
        <div class="cuadro">
            <h3>Listado de contactos</h3><br>
            <input class="buscar" type="search" name="buscar" placeholder="Nombre o Movil"> <br>
            <input class="guardar" type="submit" value="Filtrar">
    </form>
    </div>



    <div class="lista">
        <fieldset>
            <?php
            ini_set('display_errors', 0); //Quitamos los errores visibles para el usuario
            ini_set('log_errors', 1); // le decimos a php que active los logs
            ini_set('error_log', 'errores.log'); //donde se guardara los errores en un .log

            $agenda = "agenda.txt";
            $busqueda = isset($_POST['buscar']) ? trim($_POST['buscar']) : ''; //condicional si busqueda esta vacio coloca un espacio en blanco. funciona como un reset mostrando todos los contactos otra vez
            try {
                // si no existe el archivo, lo creamos y avisamos
                if (!file_exists($agenda)) {
                    touch($agenda); //es como un ping para el archivo para actualizarlo sin tocar datos en el interior
                    echo "<p>No existe el archivo agenda.txt (Creando uno...)</p>";
                } else {
                    // lectura linea a linea
                    $gestor = fopen($agenda, "r"); // abrir modo lectura
                    if ($gestor) {
                        echo "<ul>";
                        while (($linea = fgets($gestor)) !== false) {
                            $linea = trim($linea);
                            // stripos para que no importe mayusculas o minusculas
                            if (empty($busqueda) || stripos($linea, $busqueda) !== false) {
                                echo "<li>" . ($linea) . "</li>";
                            }
                        }
                        echo "</ul>";
                        fclose($gestor); // cerrar siempre
                    }
                }
            } catch (Exception $e) {
                error_log("Error al leer: " . $e->getMessage());
                echo "<p>Error al intentar leer el archivo</p>";
            }
            ?>
        </fieldset>
    </div>
</body>

</html>