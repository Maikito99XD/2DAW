

	<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		<label for="nombre">Nombre *</label>
		<input type="text" name="nombre" value="<?php $nombre ?>" required>
		<label for="apellido">Apellido</label>
		<input type="text" name="apellido" value="<?php $apellido ?>">
		<label for="email">Correo electrónico *</label>
		<input type="text" name="email" value="<?php $email ?>" required>
		<label for="fecha">Fecha nacimiento *</label>
		<input type="text" name="fecha" value="<?php $fecha ?>" required>
		<input type="hidden" name="valores" value="<?php    ?>">
		<input type="submit" value="Enviar">
	</form>

    <table border="1">
        <tr>
            <th>Nombre</th><th>Apellido</th><th>Correo electronico</th><th>Fecha nacimiento</th>
        </tr>
        <?php foreach ($_SESSION['alumnos'] as $alumno) : ?>
            <tr>
                <td><?php echo $alumno['nombre'] ?></td>
                <td><?= $alumno['apellido'] ?></td>
                <td><?= $alumno['email'] ?></td>
                <td><?= $alumno['fecha'] ?></td>
            </tr>
		<?php endforeach; ?>
    </table>

</body>
</html>