<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="MIKE">
</head>
<body>
<h1>Tema 2: Actividad 12</h1>
<?php
    require_once "session.php";

    $session = new Session();

    echo $session->getAttribute("nombre")."<br>";

    $session->setAttribute("nombre", "Fernando");

    echo "Valor de la propiedad nombre ".$session->getAttribute("nombre")."<br>";
    
    $session->deleteAttribute("nombre");

    echo "Se ha borrado la propiedad nombre <br>";

    $session->destroySession();

    echo "Se ha destruido la sesion<br>";


?>
</body>
</html>