<?php
    //Se inicializará la sesion
    session_start();
    //Y aquí se destruirá
    session_destroy();

    //Se le comenta al usuario que se ha destruido la sesion
    echo "<h1>Has cerrado sesion correctamente</h1><br><br><br>";
    //Al pulsar se le redirijirá al index
    echo "<a href='index.php'>Ir al Login</a>";
?>