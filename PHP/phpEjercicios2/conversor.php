<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor</title>
    <style>
        body {padding: 20px; background-color: #f9f9f9;}
        form { background: white; padding: 20px; border: 1px solid #ddd;}
        select, input { width: 100%; margin-bottom: 10px; padding: 5px;}
        .resultado {
            background: lightyellow; 
            margin-top: 15px;
        }
    </style>
</head>

<?php
$resultado_texto = ""; // Variable 

if (isset($_POST['cantidad']) && isset($_POST['operacion'])) {
    
    $cant = $_POST['cantidad'];
    $op = $_POST['operacion'];
    $res = 0; 

    // Uso if  y else para cada caso

    if ($op == 'eur_usd') {
        $res = $cant * 1.09; 
        $resultado_texto = "$cant Euros equivalen a $res Dólares";

    } elseif ($op == 'usd_eur') {
        $res = $cant * 0.91; 
        $resultado_texto = "$cant Dólares equivalen a $res Euros";

    } elseif ($op == 'm_pies') {
        $res = $cant * 3.28; 
        $resultado_texto = "$cant Metros equivalen a $res Pies";

    } elseif ($op == 'pies_m') {
        $res = $cant / 3.28; 
        $res = number_format($res, 2); 
        $resultado_texto = "$cant Pies equivalen a $res Metros";

    } else {
        // Este seria el equivalente al "default"
        $resultado_texto = "Operación no válida";
    }
}
?>

<body>
    <h3>Conversor Universal</h3>
    
    <form action="" method="POST">
        <label>Cantidad:</label>
        <input type="number" name="cantidad" step="any" required placeholder="0.00">
        
        <label>Convertir:</label>
        <select name="operacion">
            <option value="eur_usd">Euros a Dólares</option>
            <option value="usd_eur">Dólares a Euros</option>
            <option value="m_pies">Metros a Pies</option>
            <option value="pies_m">Pies a Metros</option>
        </select>
        
        <input type="submit" value="Calcular">
    </form>

    <?php
    // Solo mostramos el div si hay texto en la variable
    if ($resultado_texto != "") {
        echo "<div class='resultado'>";
        echo "<strong>Resultado:</strong> $resultado_texto";
        echo "</div>";
    }
    ?>

</body>
</html>