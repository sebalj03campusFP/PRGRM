<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizador de Texto</title>
    <style>
        body {
            background-color: #131314;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        * {
            color: aliceblue;
        }
        textarea {
            background-color: #313133;
            width: 100%; 
            height: 100px;
        }
        .enviar {
            background-color: #313133;
            color: #2aa36b;
            font-size: medium;
            padding: 15px 15px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
        }
        h3 { font-weight: bold; }
        ul { list-style-type: none; padding: 0; }
    </style>
</head>

<?php
// variables
$formOk = false;
$charCount = 0;
$wordCount = 0;
$reversa = "";
$hasPHP = false;

if (!empty($_POST)) {
    $formOk = true;
    
    // Obtencion de texto
    $userInput = $_POST['userText'] ?? "";

    // analisis (conteo)
    $charCount = strlen($userInput);      // caracteres
    $wordCount = str_word_count($userInput); // palabras
    
    // texto al reves
    $reversa = strrev($userInput);  

   // extra, stripos para que sea case sensitive
    if (stripos($userInput, "php") !== false) {
        $hasPHP = true;
    }
}
?>

<body>
    <h2>Analizador de Texto</h2>
    <form action="" method="post">

        <div class="input-area">
            <h3>Introduce tu texto:</h3>
            <textarea name="userText"><?php echo $_POST['userText'] ?? ''; ?></textarea>
        </div>

        <input type="submit" class="enviar" value="Analizar">

        <div class="resultado">
            <?php
            // logica
            if ($formOk == true) {
                echo "<hr>";
                echo "<h3>Ficha Estadística:</h3>";
                
                // analisis
                echo "<p><strong>Total Caracteres:</strong> $charCount</p>";
                echo "<p><strong>Total Palabras:</strong> $wordCount</p>";
                
                // A la reversa
                echo "<p><strong>Texto al revés:</strong> <br> $reversa</p>";

                // echo de mencion de php
                if ($hasPHP) {
                    echo "<p><strong>Has mencionado PHP</strong></p>";
                } else {
                    echo "<p>No has mencionado PHP.</p>";
                }
            }
            ?>
        </div>
    </form>

</body>
</html>