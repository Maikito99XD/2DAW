<h1>Empleados</h1>
    <table border="1">
        <thead>
            <tr>
                <?php foreach ($_SESSION['empleados'][0] as $key => $dato) : ?>
                    <th><?=$key?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['empleados'] as $empleado) : ?>
                <tr>
                    <?php foreach ($empleado as $dato) : ?>
                        <td><?=$dato?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table><br><br>
    <form action="index.php" enctype="multipart/form-data" method="POST">
        <label>ID</label><br>
        <input type="text" name="id" value=""></input><br><br>
        <label>Nombre</label><br>
        <input type="text" name="nombreEmpleado" value=""></input><br><br>
        <label>Sexo</label><br>
        <input type="text" name="sexo" value=""></input><br><br>
        <label>Fecha de Nacimiento</label><br>
        <input type="text" name="fechaNacimiento" value=""></input><br><br>
        <label>Fecha de incorporacion</label><br>
        <input type="text" name="fechaIncorporacion" value=""></input><br><br>
        <label>Salario</label><br>
        <input type="text" name="salario" value=""></input><br><br>
        <label>Comision</label><br>
        <input type="text" name="comision" value=""></input><br><br>
        <label>Cargo</label><br>
        <input type="text" name="cargo" value=""></input><br><br>
        <label>Jefe</label><br>
        <input type="text" name="idJefe" value=""></input><br><br>
        <label>Codigo del departamento</label><br>
        <input type="text" name="codDepartamento" value=""></input><br><br>
        <input type="submit" name="nuevoEmpleado" value="Enviar" /><br><br>
    </form>

    <a href="index.php">Inicio</a>

