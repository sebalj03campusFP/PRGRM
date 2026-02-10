<?php
$antiguos= $antiguos ?? ["titulo"=>" ","estado"=>" ", "fechaCreacion"=>" "];
?>

<?php if(!empty($error)): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<div class="tarjeta">
    <h2>Nueva tarea </h2>
    <form method="post" action="index.php?accion=guardar">

    <label> Titulo </label>
    <input type="text" name="titulo" value="<?php echo htmlspecialchars($antiguos['titulo']); ?>" required>

    <label> Estado </label>
    <select name="estado">
    <option value="pendiente" 
        <?php echo ($antiguos['estado'] == 'pendiente') ? 'selected' : ''; ?> >
        Pendiente
    </option>
    <option value="realizada" 
        <?php echo ($antiguos['estado'] == 'realizada') ? 'selected' : ''; ?> >
        Realizada
    </option>
</select>
<button type="submit">Guardar Tarea</button>
    </form>

</div>