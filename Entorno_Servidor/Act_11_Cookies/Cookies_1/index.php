<?php
    function compruebaCookie(){
        if(isset($_GET["color"])){
            $color = $_GET["color"];
            setcookie("color", $color, time()+10);
            return $color;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Desarrollo web con PHP</title>
        <meta name="description" content="PHP">
        <meta name="author" content="MIKE">
    </head>
    <body>
        <h1>Tema 2: Actividad 11</h1>
        <h2>Seleccion de colores (seleccion)</h2>
        <?php echo "Se ha cogido el color ".compruebaCookie();?>
        <p>Cambio de color: </p>
        <ul>
            <li><a href="index.php?color=red">Rojo</a></li>
            <li><a href="index.php?color=blue">Azul</a></li>
            <li><a href="index.php?color=green">Verde</a></li>
        </ul>
        <p><a href="paginaConColor.php">Ir a otra pagina para comprobar la cookie</a><p>


    </body>
</html>