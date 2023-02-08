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
        <h2>Creación y destrucción de cookies</h2>
        <p>Elija una opción: </p>
        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST["action"])){
                if($_POST["action"] === "Crear"){
                    //Esto es para calcular el tiempo que tardará en caducar la cookie
                    $tiempo = time()+$_POST['seconds'];
                    //Se le asigna el tiempo 
                    setcookie("cookieTemporal",$tiempo, $tiempo);
                }elseif($_POST["action"] === "Comprobar"){
                    if(isset($_COOKIE['cookieTemporal'])){
                        //Se le restará del tiempo actual y tendremos el tiempo que queda
                        echo "La cookie morira en: " . ($_COOKIE['cookieTemporal'] - time()) . " segundos";
                    }else{
                        echo "La cookie no existe";
                    }
                }elseif($_POST["action"] === "Destruir"){
                    if(isset($_COOKIE['cookieTemporal'])){
                        echo "La cookie ha sido destruida";
                        setcookie("cookieTemporal",0, time()-1);
                    }else{
                        echo "La cookie no existe";
                    }
                }
            }
        }
        ?>
        <form action="index.php" method="POST">
            <label for="creaCookie"> Crear una cookie con una duración de tiempo de</label>
            <input type="number" id="seconds" name="seconds" value=""/> 
            <label> segundos (entre 1 y 60) </label>
            <input type="submit" name="action" value="Crear"/><br/>
            <label for="compruebaCookie">Comprobar la cookie </label>
            <input type="submit" name="action" value="Comprobar"/><br/>
            <label for="destruyeCookie">Destruir la cookie </label>
            <input type="submit" name="action" value="Destruir"/><br/>
        </form>
    </body>
</html>