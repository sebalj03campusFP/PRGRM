<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 23 Loteria</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>generador de numeros</legend>
            <label>¿cuantos numeros?</label>
            <input type="number" name="cantidad" required><br><br>
            <label>¿rango maximo?</label>
            <input type="number" name="rango" required><br><br>
            <input type="submit" value="sacar bolas">
        </fieldset>
    </form>

    <?php
    if (!empty($_POST)) {
        $cantidad = $_POST['cantidad'];
        $rango = $_POST['rango'];
        $numeros = [];

        // validacion simple para no entrar en bucle infinito
        if ($cantidad > $rango) {
            echo "no se pueden sacar mas bolas que numeros disponibles";
        } else {
            // bucle mientras no tengamos la cantidad pedida
            while (count($numeros) < $cantidad) {
                $bola = rand(1, $rango);
                // solo añadimos si no esta repetido
                if (!in_array($bola, $numeros)) {
                    $numeros[] = $bola;
                }
            }

            // ordenar de menor a mayor
            sort($numeros);

            echo "<h3>bolas premiadas:</h3>";
            foreach ($numeros as $n) {
                echo "[$n] ";
            }
        }
    }
    ?>
</body>
</html>