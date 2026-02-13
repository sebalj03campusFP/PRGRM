<!-- alumnos/listar.php -->
<?php if (!empty($error)): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<div class="tarjeta">
    <h2> Listado de Alumnos </h2>
    <?php if (empty($alumnos)): ?>
        <p> No hay alumnos todavía.... </p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos as $a): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($a->fechaCreacion); ?>
                        <td><?php echo htmlspecialchars($a->nombre); ?>
                        <td><?php echo htmlspecialchars($a->edad); ?>
                        <td><?php echo htmlspecialchars($a->email); ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>