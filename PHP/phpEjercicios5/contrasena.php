<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 19 Password</title>
</head>
<?php
// funcion para validar las reglas de la contraseña
function validarPass($pass, $user) {
    // longitud minima
    if (strlen($pass) < 8) {
        return "error: la contraseña debe tener al menos 8 caracteres";
    }
    
    // buscar simbolos especiales
    $tieneSimbolo = false;
    for ($i = 0; $i < strlen($pass); $i++) {
        if ($pass[$i] == "@" || $pass[$i] == "#") {
            $tieneSimbolo = true;
        }
    }
    if (!$tieneSimbolo) {
        return "error: falta un simbolo (@ o #)";
    }

    // no igual al usuario
    if ($pass == $user) {
        return "error: la contraseña no puede ser igual al usuario";
    }

    return "ok";
}
?>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>validador de seguridad</legend>
            <input type="text" name="usuario" placeholder="usuario" required><br><br>
            <input type="password" name="pass" placeholder="contraseña" required><br><br>
            <input type="submit" value="validar">
        </fieldset>
    </form>

    <?php
    if (!empty($_POST)) {
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

        $resultado = validarPass($pass, $usuario);

        if ($resultado == "ok") {
            echo "<p>contraseña segura</p>";
        } else {
            echo "<p>$resultado</p>";
        }
    }
    ?>
</body>
</html>