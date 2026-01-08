<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 1</title>
    <!-- Un pequeño estilo  -->
    <style>
        * {
            color: black;
        }

        body {

            background-color: grey;
        }

        h3 {
            color: greenyellow;
        }
        p {
            color:red
        }
    </style>



</head>

<body>
    <!-- Formulario con POST -->
    <form action="" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contra" placeholder="Contraseña" required>
        <input type="submit" value="Entrar">

    </form>
<!-- PHP -->
    <?php

    $usuarios = [
        [
            "usuario" => "admin",
            "contra" => "1234",
        ],
        [
            "usuario" => "pepe",
            "contra" => "hola"
        ],
        [
            "usuario" => "ana",
            "contra" => "secreto"
        ]
    ];
    // Comprobacion
    if (isset($_POST['usuario']) && isset($_POST['contra'])) {
        $usuario_input = $_POST['usuario'];
        $contra_input = $_POST['contra'];
        $encontrado = false;
        $total_user = count($usuarios);

        for ($i = 0; $i < $total_user && $encontrado == false; $i++) {
            if ($usuarios[$i]['usuario'] == $usuario_input && $usuarios[$i]['contra'] == $contra_input) {
                $encontrado = true;
            }
        }
        // Salida
        if ($encontrado) {
            echo "<h3> Bienvenido, $usuario_input </h3>";
        } else {
            echo "<p> Usuario no encontrado </p>";
        }
    }

    ?>
</body>

</html>