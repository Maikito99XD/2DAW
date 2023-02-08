<h1>Departamentos</h1>
<!--En el form me he limitado a usar enctype="multipart/form-data" que es para encriptar la información y que no puedan acerse con ella-->
<form action="index.php" enctype="multipart/form-data" method="POST">
<label>Elige un departamento</label><br><br>
<select name='departamento'>
<?php foreach($departamentos as $departamento): ?>
    <?php foreach($departamento as $value): ?>
        <option value='<?= $value ?>' ><?= $value ?></option>
    <?php endforeach; ?>
<?php endforeach; ?>
</select><br><br>
    <input type="submit" name="accion" value="Enviar" /><br><br>
</form>


