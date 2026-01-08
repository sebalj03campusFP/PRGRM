<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 2</title>

</head>
<!-- Codigo PHP para el titulo -->
<?php
// Condicion por si el usuario decide dejar vacio el campo
if (!empty($_POST['titulo'])) {
    $titulo_mostrar = $_POST['titulo'];
} else {
    $titulo_mostrar = "Titulo de ejemplo";
}
if (isset($_POST['size'])) {
    $letra = $_POST['size'];
} else {
    // El 5 es el valor por defecto
    $letra = 5;
}
if (isset($_POST['pos'])){
    $posicion = $_POST['pos'];
} else {
    $posicion = NULL;
}
?>
<!-- Codigo PHP para el FONDO -->
<?php
// Pequeño condicional para cambiar el fondo y dejarlo en blanco por si el usuario decide no seleccionar ningun fondo
if (isset($_POST['fondo'])) {
    $color = $_POST['fondo'];
} else {
    $color ="white";
}
?>

<body>
    <!-- Formulario HTML con metodo POST -->
    <form action="" method="POST">
        <!-- Manipulacion de titulo -->
        <fieldset>
            <legend>Manipulacion de titulo</legend>
            <input type="text" name="titulo" placeholder="Escribe el titulo que quieres">
            <label>Tamaño de texto</label><input type="range" name="size" min="1" max="16" placeholder="1 - 16">
            <label>Posicion del texto </label>
            <!-- Lista desplegable para posicionamiento del texto -->
            <select name="pos">
                <option value="default" selected disabled>Ninguno</option>
                <option value="center">Centrado</option>
                <option value="right">Derecha</option>
                <option value="left">Izquierda</option>
            </select>
        </fieldset>
        <!-- Manipulacion de Fondo -->
        <fieldset>
            <legend>Fondo</legend>
            <label>Gris</label><input type="radio" name="fondo" value="#838383">
            <label>Vino</label><input type="radio" name="fondo" value="#722f37">
            <label>Beige</label><input type="radio" name="fondo" value="#f5f5dc">
        </fieldset>
        <input type="submit" value="Terminar">
    </form>

    <!-- Salida -->
    <?php
    echo "<style> body {background-color: $color;" . "</style>";
    echo "<style> h2 { font-size: $letra" . "rem; } </style>";
    echo "<style> h2 { text-align: $posicion;" . "</style>";
    echo "<h2> $titulo_mostrar </h2>";
    ?>
</body>

</html>