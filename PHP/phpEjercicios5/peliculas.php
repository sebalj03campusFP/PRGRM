<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 20 Peliculas</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>buscador de pelis</legend>
            <select name="genero">
                <option value="Accion">accion</option>
                <option value="Comedia">comedia</option>
            </select>
            <input type="submit" value="buscar">
        </fieldset>
    </form>

    <?php
    if (!empty($_POST)) {
        $busqueda = $_POST['genero'];
        
        // base de datos pequeña
        $peliculas = [
            ["titulo" => "mad max", "genero" => "Accion", "edad" => 16],
            ["titulo" => "die hard", "genero" => "Accion", "edad" => 18],
            ["titulo" => "superbad", "genero" => "Comedia", "edad" => 16],
            ["titulo" => "ted", "genero" => "Comedia", "edad" => 18],
            ["titulo" => "john wick", "genero" => "Accion", "edad" => 18]
        ];

        $encontrado = false;

        foreach ($peliculas as $peli) {
            if ($peli['genero'] == $busqueda) {
                $encontrado = true;

                echo "<strong>" . $peli['titulo'] . "</strong><br>";
                echo "<p>" . $peli['genero'] . "</p> - edad: " . $peli['edad'];
            }
        }
        //si no le encuentra damos un errror
        if (!$encontrado) {
            echo "<p>no hay resultados</p>";
        }
    }
    ?>
</body>
</html>