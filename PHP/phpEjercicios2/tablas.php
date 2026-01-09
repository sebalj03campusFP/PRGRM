<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6: Tablas Dinámicas</title>
    <style>
        body {padding: 20px; }
        table { border-collapse: collapse; margin-top: 20px; }
        td { padding: 10px; text-align: center; }
    </style>
</head>

<?php
// Variables
$filas = 0;
$columnas = 0;
$generar = false;

if (isset($_POST['filas']) && isset($_POST['columnas'])) {
    $filas = $_POST['filas'];
    $columnas = $_POST['columnas'];
    $generar = true;
}
?>

<body>
    <h1>Generador de tabla</h1>
    
    <form action="" method="POST">
        <label>Filas:</label>
        <input type="number" name="filas" min="1" max="20" required value="<?php echo $filas; ?>">
        
        <label>Columnas:</label>
        <input type="number" name="columnas" min="1" max="20" required value="<?php echo $columnas; ?>">
        
        <input type="submit" value="Crear Tabla">
    </form>

    <hr>

    <?php
    if ($generar) {
        echo "<h3>Tabla de $filas x $columnas</h3>";
        
        // Creacion de tabla
        echo "<table border='1'>";
        
        // Bucle for 1 (para las filas)
        for ($i = 1; $i <= $filas; $i++) {
            echo "<tr>";
            
            // Bucle for 2 (para columnas y celdas)
            for ($j = 1; $j <= $columnas; $j++) {
                // Imprimimos la celda con sus coordenadas
                echo "<td> Fila $i - Col $j </td>";
            }
            
            echo "</tr>"; // Cerramos la fila
        }
        
        echo "</table>"; // Cerramos la tabla
    }
    ?>

</body>
</html>