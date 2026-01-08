<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test evaluado</title>
    <style>s
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
        }
        .pregunta {
            background-color: white;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }
        .correcto { color: green; font-weight: bold; }
        .incorrecto { color: red; font-weight: bold; }
        h3 { color: #333; }
    </style>
</head>

<?php
//Array de respuestas
$respuestasCorrectas = [
    "p1" => "b",
    "p2" => "a",
    "p3" => "c"
];

$nota = 0;
$total_preguntas = count($respuestasCorrectas);
$formulario_enviado = false; // Bool para saber si el formulario fue enviado

// Comprobamos si se ha enviado el formulario
if (!empty($_POST)) {
    $formulario_enviado = true;
    
    // Lectura del array
    foreach ($respuestasCorrectas as $clave_pregunta => $solucion_correcta) {
        
        //  ?? por si el usuario no marco nada
        $respuesta_usuario = $_POST[$clave_pregunta] ?? null;

        // Comparacion logica
        if ($respuesta_usuario == $solucion_correcta) {
            $nota = $nota + 1; // Sumamos punto
        }
    }
}
?>

<body>

    <h1>Evaluación</h1>

    <form action="" method="POST">
        
        <div class="pregunta">
            <p>1. ¿Cuánto es 2 + 2?</p>
            <label><input type="radio" name="p1" value="a"> a) 3</label><br>
            <label><input type="radio" name="p1" value="b"> b) 4</label><br>
            <label><input type="radio" name="p1" value="c"> c) 5</label>
            
            <?php 
            if ($formulario_enviado) {
                // Recuperamos lo que marco el usuario para comparacion
                $user_p1 = $_POST['p1'] ?? "";
                if ($user_p1 == "b") {
                    echo "<p class='correcto'> - fCorrecto!</p>";
                } elseif ($user_p1 != "") {
                    echo "<p class='incorrecto'> - Fallaste (Era la B)</p>";
                }
            }
            ?>
        </div>

        <div class="pregunta">
            <p>2. ¿Cuál es la capital de España?</p>
            <label><input type="radio" name="p2" value="a"> a) Madrid</label><br>
            <label><input type="radio" name="p2" value="b"> b) Barcelona</label><br>
            <label><input type="radio" name="p2" value="c"> c) Sevilla</label>

            <?php 
            if ($formulario_enviado) {
                $user_p2 = $_POST['p2'] ?? "";
                if ($user_p2 == "a") {
                    echo "<p class='correcto'> - ¡Correcto!</p>";
                } elseif ($user_p2 != "") {
                    echo "<p class='incorrecto'> - Fallaste (Era la A)</p>";
                }
            }
            ?>
        </div>

        <div class="pregunta">
            <p>3. ¿De qué color es el caballo blanco de Santiago?</p>
            <label><input type="radio" name="p3" value="a"> a) Negro</label><br>
            <label><input type="radio" name="p3" value="b"> b) Arcoiris</label><br>
            <label><input type="radio" name="p3" value="c"> c) Blanco</label>

            <?php 
            if ($formulario_enviado) {
                $user_p3 = $_POST['p3'] ?? "";
                if ($user_p3 == "c") {
                    echo "<p class='correcto'> - ¡Correcto!</p>";
                } elseif ($user_p3 != "") {
                    echo "<p class='incorrecto'> - Fallaste (Era la C)</p>";
                }
            }
            ?>
        </div>

        <br>
        <input type="submit" value="Evaluar Examen">
    </form>

    <hr>
    <?php
    if ($formulario_enviado) {
        echo "<h2>Resultados:</h2>";
        // Pequeño condicional para un mensaje personalizado por si se falla o aprueba la evaluacion
        if ($nota >= 2) {
            echo "<h3 style='color:green'>Felicidades! Has sacado un $nota de $total_preguntas</h3>";
        } else {
            echo "<h3 style='color:red'>Te has marcado un Jesús. Has sacado un $nota de $total_preguntas</h3>";
        }
    }
    ?>

</body>
</html>