<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
</head>
<body>
    
  <div class="contenedor">
    <h1>Tareas MVC</h1>

    <div class="menu">
      <a href="index.php?accion=listar">📋 Listar</a>
      <a href="index.php?accion=crear">➕ Nueva Tarea</a>
    </div>

    <hr>

    <?php
      // Aquí se inserta la vista concreta (listar.php o crear.php, etc.)
      require $vistaContenido;
    ?>

  </div>

</body>
</html>