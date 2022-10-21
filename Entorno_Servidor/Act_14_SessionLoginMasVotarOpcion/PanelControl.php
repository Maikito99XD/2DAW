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
            session_start();
            //Esto es para comprobar que las variables de session no están creadas
            //y así no se inicialice todo el rato a 0
            if (!isset($_SESSION['a']) || !isset($_SESSION['b'])){
                //De no estarlo las inicializa a 0
                $_SESSION['a'] = 0;
                $_SESSION['b'] = 0;
            }

            //Esto es para que lo que llegue de nombre del post, se guarde en una variable de la sesion
            if(isset($_POST['nombre'])){
                //Se guarda
                $_SESSION['nombre'] = $_POST['nombre'];
            }
            //Se comprueba mediante post y session el nombre
            //Esto es para que cuando se haga el recuento y se redirija, que tenga guardado el nombre en la sesion
            if(isset($_POST['nombre']) || isset($_SESSION['nombre'])){                                  
                //Strlen es para comprobar la longitud de un string en php
                if(!is_null($_SESSION['nombre']) && strlen($_SESSION['nombre']) >= 3){
                    echo "<h1>Panel para votar</h1>";
                    echo "Bienvenido! Has iniciado sesion como: ".$_SESSION['nombre']."<br><br><br>";
                    echo "<form action = 'Recuento.php' method = 'POST'> ";
                    echo "<button type='submit' name='blue' id='blue' value='blue' style='fontsize: 60px; line-height: 50px; color: blue;''>✔</button>".$_SESSION['a']."<br>";
                    echo "<button type='submit' name='yellow' id='yellow' value='yellow' style='fontsize: 60px; line-height: 50px; color: yellow;''>✔</button>".$_SESSION['b']."<br>";
                    echo "<button type='submit' name='cero' id='cero' value='cero'>Poner a cero</button><br>";
                }else{
                    echo "<h2>No ha iniciado sesión o ha expirado</h2><br>";
                    echo "Acceso restringido!<br><br><br>";
                    echo "<a href='index.php'>Ir a la pagina principal</a><br>";
                }
                echo "<a href='CerrarSesion.php'>Cerrar la sesion</a><br>";
              
            }
            
        ?>

    </body>
</html>