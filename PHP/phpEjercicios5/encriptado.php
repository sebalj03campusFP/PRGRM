<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 21 Hacker</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>leet speak converter</legend>
            <textarea name="frase" placeholder="escribe algo aqui..."></textarea><br>
            <input type="submit" value="hackear">
        </fieldset>
    </form>

    <?php
    if (!empty($_POST)) {
        $fraseOriginal = $_POST['frase'];

        // diccionarios de traduccion
        $letras = ["a", "e", "i", "o", "s"];
        $leet = ["4", "3", "1", "0", "5"];

        // reemplazo ignorando mayusculas
        $fraseHacker = str_ireplace($letras, $leet, $fraseOriginal);

        echo "<p>frase original: $fraseOriginal</p>";
        echo "<p>frase hackeada: <strong>$fraseHacker</strong></p>";
    }
    ?>
</body>
</html>