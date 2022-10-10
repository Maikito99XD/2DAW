<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo web con PHP</title>
    <style>
        table, th, td {
            border:1px solid black;
        }
        label, input
        {
            display: block;
        }
    </style>
    <meta name="description" content="PHP">
    <meta name="author" content="Mike Steel Marín">
</head>
<body>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" value="<?php if(isset($_POST['nombre'])){ echo $_POST['nombre'];} ?>" required>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" value="<?php if(isset($_POST['apellido'])){ echo $_POST['apellido'];} ?>">
        <label for="email">Correo electrónico *</label>
        <input type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" required>
        <label for="fecha">Fecha nacimiento *</label>
        <input type="text" name="fecha" value="<?php if(isset($_POST['fecha'])){ echo $_POST['fecha'];} ?>" required>
        <input type="submit" value="Enviar">
    </form>

    <table style="width:35%">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Fecha Nacimiento</th>
        </tr>
        
        <?php foreach ($alumnos as $alumno) : ?>
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