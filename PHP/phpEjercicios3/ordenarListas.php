<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 13 Ordenar Listas</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>ordenador de numeros</legend>
            <label>introduce numeros separados por comas:</label><br>
            <input type="text" name="lista" placeholder="ej: 5,1,10,2" required>
            <input type="submit" value="ordenar">
        </fieldset>
    </form>

    <?php
    if (!empty($_POST)) {
        $textoUsuario = $_POST['lista'];

        //  convertir el string en array usando la coma como separador
        $arrayNumeros = explode(",", $textoUsuario);

        //  ordenar de menor a mayor
        // sort modifica el array original directamente
        sort($arrayNumeros);

        echo "<h3>lista ordenada:</h3>";
        
        // imprimir la lista ordenada
        echo "<ol>";
        foreach ($arrayNumeros as $numero) {
            // usamos trim por si el usuario puso espacios despues de la coma
            $numeroLimpio = trim($numero);
            
            // solo mostramos si no esta vacio
            if ($numeroLimpio !== "") {
                echo "<li>$numeroLimpio</li>";
            }
        }
        echo "</ol>";
    }
    ?>
</body>
</html>