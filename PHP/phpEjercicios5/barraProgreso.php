<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 22 Progreso</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>progreso de ventas</legend>
            <input type="number" name="objetivo" placeholder="objetivo €" required><br><br>
            <input type="number" name="actual" placeholder="ventas actuales €" required><br><br>
            <input type="submit" value="calcular">
        </fieldset>
    </form>

    <?php
    if (!empty($_POST)) {
        $objetivo = $_POST['objetivo'];
        $actual = $_POST['actual'];

        if ($objetivo > 0) {
            // calculo de porcentaje y redondeo
            $porcentaje = round(($actual * 100) / $objetivo);
            
            // limitamos al 100% para que no se salga de la barra visualmente
            $anchoBarra = ($porcentaje > 100) ? 100 : $porcentaje;

            // barra de progreso dinamica con css 
            echo "<h3>progreso:</h3>";
            echo "<div style='background-color: grey; width: 100%; height: 30px;'>";
            echo "<div style='background-color: green; color: white; height: 100%; text-align: center; width: $anchoBarra%;'>";
            echo "$porcentaje%";
            echo "</div>";
            echo "</div>";
        } else {
            echo "el objetivo debe ser mayor a cero";
        }
    }
    ?>
</body>
</html>