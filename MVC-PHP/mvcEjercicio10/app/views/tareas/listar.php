
<?php if (!empty($error)): ?>
  <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<div class="tarjeta">
  <h2>Listado de Tareas</h2>

  <?php if (empty($tareas)): ?>
    <p>No hay tareas asignadas.</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Título</th>
          <th>Estado</th>
          <th>Fecha Creación</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tareas as $t): ?>
          <tr>
            <td><?php echo htmlspecialchars($t->titulo); ?></td>
            <td><?php echo htmlspecialchars($t->estado); ?></td>
            <td><?php echo htmlspecialchars($t->fechaCreacion); ?></td>
            <td>
              <a href="index.php?accion=borrar&id=<?php echo urlencode($t->id); ?>"
                 onclick="return confirm('¿Seguro que quieres borrar esta tarea?');">
                🗑 Borrar
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>