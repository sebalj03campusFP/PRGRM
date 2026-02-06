<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 12 Fechas</title>
</head>
<?php
// array asociativo para traducir los dias
// la clave es lo que devuelve date('l') y el valor es en español
$traduccion = [
    "Monday" => "Lunes",
    "Tuesday" => "Martes",
    "Wednesday" => "Miercoles",
    "Thursday" => "Jueves",
    "Friday" => "Viernes",
    "Saturday" => "Sabado",
    "Sunday" => "Domingo"
];
?>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>calculadora de dia de nacimiento</legend>
            <label>selecciona tu fecha de nacimiento:</label>
            <input type="date" name="fecha" required>
            <input type="submit" value="averiguar dia">
        </fieldset>
    </form>

    <?php
    if (!empty($_POST)) {
        $fecha = $_POST['fecha'];

        // convertir la fecha a tiempo  a segundos
        $timestamp = strtotime($fecha);

        // paso 2: obtener el dia en ingles con la L mayuscula
        $diaIngles = date('l', $timestamp);

        // traducir usando el array
        // si el dia existe en el array lo traducimos
        if (array_key_exists($diaIngles, $traduccion)) {
            $diaEspanol = $traduccion[$diaIngles];
            echo "<p>naciste un <strong>$diaEspanol</strong></p>";
        } else {
            echo "<p>error al calcular la fecha</p>";
        }
    }
    ?>
</body>
</html>