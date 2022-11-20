<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Subida Imagen</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Gabriel">
    <style>
		label, input{display: block;}
	</style>
</head>
<body>
    <h2>Sube una imagen</h2>
    
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        <p>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen">
        </p>
        <p>
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" rows="6" cols="50"></textarea>
        </p>
        <input type="submit" value="ENVIAR">
        <p><?=$mensaje;?></p>
    </form>
</body>
</html>