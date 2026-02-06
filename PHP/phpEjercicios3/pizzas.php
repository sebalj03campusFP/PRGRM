<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzas</title>
    <style>
        body {
            background-color: #131314;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        * {
            color:aliceblue
        }
        .enviar {
            background-color: #313133ff;
            color: #2aa36bff;
            font-size:medium;
            padding: 15px 30px;
        }
        h3 {
            font: bold
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<?php
//variables
$formularioOK = false;
$total_pagar = 0;
if (!empty($_POST)) {
    $formularioOK = true;
    //si el usuario no escoge nada se pondra la pizza pequeña como default
    $opcion = $_POST['size'] ?? "1";
    $precio_base = 0;

    if ($opcion == "1") {
        $precio_base = 5;   //pizza peque
        $tamano = "Pequeña";
    } elseif ($opcion == "2") {
        $precio_base = 10;  //med
        $tamano = "Mediana";
    } elseif ($opcion == "3") {
        $precio_base = 15; //grande
        $tamano = "Grande";
    }
    // si el usuario deja vacio esto el array tambien
    $lista_ingredientes = $_POST['ingredientes'] ?? [];
    //despues de probar, al colocar * 1 mantiene todo el tiempo +1 euro a la cuenta
    $precio_extras = count($lista_ingredientes) * 1;
    //formula para el total
    $total_pagar = $precio_base + $precio_extras;
}
?>

<body>
    <h2>Constructor de pizzas</h2>
    <form action="" method="post">

        <div class="tamano">
            <h3>Escoge el tamaño de la pizza</h3>
            <label><input type="radio" name="size" value="1"></label> Pequeño<br>
            <label><input type="radio" name="size" value="2"></label> Mediano<br>
            <label><input type="radio" name="size" value="3"></label> Grande<br>
        </div>
        <hr>
        <div class="ingre">
            <h3>Agrega ingredientes extras</h3>
            <label><input type="checkbox" name="ingredientes[]" value="Jamon"> Jamon</label> <br>
            <label><input type="checkbox" name="ingredientes[]" value="Queso"> Queso</label> <br>
            <label><input type="checkbox" name="ingredientes[]" value="Champiñon"> Champiñon </label> <br>
            <label><input type="checkbox" name="ingredientes[]" value="Pollo"> Pollo</label> <br>
        </div>
        <button type="submit" class="enviar"> Siguiente</button>
        <div class="total">
            <?php
            //salida
            if ($formularioOK == true) {
                echo "<hr>";
                echo "<h3>Ticket de compra:</h3>";
                //muestra el tamaño de la pizza y su precio en el ticket
                echo "<p><strong>Tamaño de la pizza: $tamano:</strong> $precio_base €</p>";
                // bucle para listar lo que pidio el cliente (ingredientes)
                echo "<ul>";
                foreach ($lista_ingredientes as $ingrediente) {
                    echo "<li> + $ingrediente (1€)</li>";
                }
                echo "</ul>";
                //total
                echo "<p><strong>TOTAL A PAGAR: $total_pagar €</strong></p>";
            }
            ?>

        </div>
    </form>

</body>


</html>