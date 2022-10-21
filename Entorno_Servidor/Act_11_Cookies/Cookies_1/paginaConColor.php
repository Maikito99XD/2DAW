<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="MIKE">
</head>
<body text="<?=$_COOKIE['color'];?>">
<h1 >Tema 2: Actividad 11</h1>
<h2>Seleccion de colores (comprobacion)</h2>
<?php echo "Se ha elegido el color ".$_COOKIE['color'];?>
<p><a href="index.php">Volver a la seleccion de color</a></p>
</body>
</html>