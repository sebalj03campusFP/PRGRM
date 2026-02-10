<?php foreach ($notas as $n): ?>
  <tr>
    <td><?php echo htmlspecialchars($n->fecha); ?></td>
    <td><?php echo htmlspecialchars($n->texto); ?></td>
  </tr>
<?php endforeach; ?>
