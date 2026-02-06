<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
    <style>
        body {
            background-color: #131314;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        * { color: aliceblue; }
        
        input {
            background-color: #313133;
            border: 1px solid #555;
        }
        /* reutilizo el mismo boton */
        .enviar {
            background-color: #313133;
            color: #2aa36b;
            font-size: medium;
            padding: 15px 30px;
            margin-top: 15px;
            cursor: pointer;
            border: none;
        }

        /* Colores para la logica */
        .low-weight, .low-weight * { color: #f1c40f; 
        }  
        .normal *{ color: #2aa36b; 
        }      
        .overweight *{color: #e74c3c;
         }  
        h3 { font-weight: bold;
        }
    </style>
</head>

<?php
// Variables 
$formOk = false;
$imc = 0;
$resultText = "";
$cssClass = ""; // string para la class

if (!empty($_POST)) {
    $formOk = true;
    
    // Obtener datos (weight en kg, height en cm)
    // floatval asegura que sea un numero decimal
    $peso = floatval($_POST['peso'] ?? 0);
    $altura = floatval($_POST['altura'] ?? 0);

    // Evitar division por cero
    if ($altura> 0) {
        
        // conversion de cm a metros
        $metro = $altura / 100;

        // peso / altura al cuadrado
        $imc = $peso / ($metro * $metro);
        
        // formato para que el decimal se redondee
        $imc = number_format($imc, 1);

        // condicional
        if ($imc < 18.5) {
            $resultText = "Bajo Peso";
            $cssClass = "low-weight"; // css amarillo
            
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            $resultText = "Peso Normal";
            $cssClass = "normal";     // css verde
            
        } else {
            // Mayor de 25
            $resultText = "Sobrepeso";
            $cssClass = "overweight"; //css rojo
        }
    } else {
        // Si pone 0 o negativo
        $resultText = "Altura no válida";
        $cssClass = "overweight";
    }
}
?>

<body>
    <h2>Calculadora IMC</h2>
    <form action="" method="post">

        <div class="input-area">
            <h3>Introduce tus datos:</h3>
            
            <label>Peso (kg):</label><br>
            <input type="number" name="peso" step="0.1" placeholder="Ej: 70" required 
                   value="<?php echo $_POST['peso'] ?? ''; ?>">
            <br><br>
            
            <label>Altura (cm):</label><br>
            <input type="number" name="altura" placeholder="Ej: 175" required
                   value="<?php echo $_POST['altura'] ?? ''; ?>">
        </div>

        <button type="submit" class="enviar">Calcular IMC</button>

        <?php if ($formOk): ?>
            
            <div class="<?php echo $cssClass; ?>">
                <h3>Tu IMC es: <?php echo $imc; ?></h3>
                <p><strong>Diagnóstico:</strong> <?php echo $resultText; ?></p>
            </div>

        <?php endif; ?>
    </form>

</body>
</html>