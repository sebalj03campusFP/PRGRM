<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censor</title>
    <style>
        body {
            background-color: #f0f0f0;
            padding: 20px;
        }
        form {
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            width: 50%;
        }
        h3 {
            color: #333;
        }
    </style>
</head>

<?php
// Palabras prohibidas
$prohibidas = [
    "tonto",
    "feo",
    "loco",
    "tonta"
];

// Arrays que sustituiran a las palabras
$sustitutos = [
    "*****",
    "***",
    "****",
    "*****"
];

$texto_limpio = ""; // Variable vacia
$mostrar_resultado = false;

// Comprobacion del formulario
if (isset($_POST['comentario_usuario'])) {

    // Variable con input
    $texto_original = $_POST['comentario_usuario'];

    // Uso de str replace
    $texto_limpio = str_replace($prohibidas, $sustitutos, $texto_original);

    $mostrar_resultado = true;
}
?>

<body>

    <h1>Caja de comentarios</h1>

    <form action="" method="POST">
        <label><b>Escribe aqui tu comentario:</b></label>
        <textarea name="comentario_usuario" placeholder="Escribe algo..."><?php echo isset($_POST['comentario_usuario']) ? $_POST['comentario_usuario'] : ''; ?></textarea>
        <!-- Boton de submit -->
        <input type="submit" value="Publicar">
    </form>

    <?php
    if ($mostrar_resultado) {
        echo "<div class='comentario-final'>";
        echo "<h3>Comentario Publicado:</h3>";
        // Texto ya procesado
        echo "<p> $texto_limpio </p>";
    }
    ?>

</body>

</html>