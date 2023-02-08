<!--Formulario que se usará para que el usuario nos de los datos-->
<html>
<head>
</head>
<body>
    <h1>Sube una imagen</h1>
    <!--En el form me he limitado a usar enctype="multipart/form-data" que es para encriptar la información y que no puedan acerse con ella-->
    <form action="index.php" enctype="multipart/form-data" method="POST">
        <label for="ImagenTexto">Imagen</label><br><br>
        <!--En input he puesto de tipo file para que así el botón automaticamente sepa que le voy a pasar una imagen-->
        <input name="imagen" id="imagen" type="file" /><br><br>
        <label for="Descripcion">Descripcion</label><br>
        <textarea name="descripcion" id="descripcion" rows="10" cols="50"></textarea><br><br>
        <input type="submit" name="accion" value="Enviar" /><br><br>
    </form>
</body>
</html>