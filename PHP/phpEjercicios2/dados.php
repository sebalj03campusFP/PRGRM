<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dados</title>
    <style>
        body {padding: 20px; }
        .dado {
            width: 50px;
            height: 50px;
            border: 2px solid black;
            background-color: white;
            display: inline-flex; 
            align-items: center;   
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }
        .resultado { margin-top: 20px; font-size: 1.2rem; }
    </style>
</head>

<?php
$suma_total = 0;
$mostrar = false;

if (isset($_POST['num_dados'])) {
    $cantidad = $_POST['num_dados'];
    $mostrar = true;
} else {
    $cantidad = 1; // Valor por defecto para el input
}
?>

<body>
    <h1>Dados</h1>
    
    <form action="" method="POST">
        <label>¿Cuántos dados quieres lanzar?</label>
        <input type="number" name="num_dados" min="1" max="10" value="<?php echo $cantidad; ?>">
        <input type="submit" value="¡Lanzar!">
    </form>

    <br>

    <?php
    if ($mostrar) {
        echo "<div>"; // Contenedor para los dados
        
        // Bucle 
        for ($i = 0; $i < $cantidad; $i++) {
            
            // randomizer 
            $numero = rand(1, 6);
            
            // Suma final
            $suma_total = $suma_total + $numero;
            
            // Echo del dado
            echo "<div class='dado'> $numero </div>";
        }
        
        echo "</div>";
        
        // Salida
        echo "<div class='resultado'>";
        echo "<strong>Suma Total: </strong> $suma_total puntos";
        echo "</div>";
    }
    ?>
</body>
</html>