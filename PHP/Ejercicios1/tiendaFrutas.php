<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Frutas</title>
</head>
<?php

$listado_frutas = [
    'Manzana' => 1.5,
    'Naranja' => 2.0,
    'Sandia'  => 5.0
];
$total_pagar = 0; 

?>

<body>
  <form action="" method="POST">
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Fruta</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                // Bucle recorremos el listado
                foreach ($listado_frutas as $nombre => $precio) {
                    // ?? 0 por si esta vacio coloque un 0
                    $cantidad = $_POST['cantidad'][$nombre] ?? 0;  
                    //Calculo de fila
                    $subtotal = $cantidad * $precio;
                    // Suma al subtotal
                    $total_pagar = $total_pagar + $subtotal;
                ?>
                <tr>
                    <td><?php echo $nombre; ?></td>
                    <td>
                        <input type="number" name="cantidad[<?php echo $nombre; ?>]" value="<?php echo $cantidad; ?>">
                    </td>
                    <td>$<?php echo $precio; ?></td>
                    <td>$<?php echo $subtotal; ?></td> </tr>

                <?php 
                } // para no olvidarme, aqui termina el bucle
                ?>

            </tbody>        
            <tfoot>
                <tr>
                    <td><strong>TOTAL A PAGAR:</strong></td>
                    <td><strong>$<?php echo $total_pagar; ?></strong></td>
                </tr>
            </tfoot>
        </table>

        <br>
        <button type="submit">Calcular Total</button>
    </form>


</body>

</html>