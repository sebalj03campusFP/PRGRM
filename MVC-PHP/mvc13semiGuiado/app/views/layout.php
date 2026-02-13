<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de alumnos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .contenedor { max-width: 900px; margin: 0 auto; }
    table { width:100%; border-collapse: collapse; margin-top: 12px; }
    th, td { border: 1px solid #ccc; padding: 8px; }
    th { background: #f5f5f5; }
    .error { background: #ffe6e6; border: 1px solid #ffb3b3; padding: 10px; margin: 10px 0; }
  </style>
</head>
<body>
  <div class="contenedor">
    <h1>Alumnos (READ con PDO)</h1>
    <p>Esta web solo lee alumnos desde MySQL.</p>

    <hr>

    <?php require $viewContent; ?>
  </div>
</body>
</html>
