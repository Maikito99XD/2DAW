<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Desarrollo web con PHP</title>
        <meta name="description" content="PHP">
        <meta name="author" content="MIKE">
    </head>
    <body>
        <h1>Tema 2: Actividad 13</h1>
        <?php
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_POST["action"])){
                    session_start();
                    if(!is_null($_POST['nombre']) && strlen($_POST['nombre']) >= 3){
                        echo "<h2>Has iniciado la sesion correctamente</h2><br>";
                        echo "Bienvenido! Has iniciado sesion como: ".$_POST['nombre']."<br><br><br>";
                    }else{
                        echo "<h2>No ha iniciado sesión o ha expirado</h2><br>";
                        echo "Acceso restringido!<br><br><br>";
                    }
                    echo "<a href='index.php'>Ir a la pagina principal</a><br>";
                    echo "<a href='CerrarSesion.php'>Cerrar la sesion</a>";
                }
            }
        ?>
    </body>
</html>