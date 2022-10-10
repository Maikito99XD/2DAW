<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="TU NOMBRE">
</head>
<body>
<h1>Tema 2: Actividad 8</h1>
<?php
    include("Persona.php");
    $p1 = new Persona("Juan", "Alberto", "23","74013002");
    $p1->mayorEdad();
    echo "<br>";
    $p1->nombreCompleto();
    echo "<br>";
    $p1->dentificacionCompleta();

?>
</body>
</html>