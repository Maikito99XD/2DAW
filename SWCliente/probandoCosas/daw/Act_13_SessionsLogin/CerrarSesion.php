<?php
    session_start();
    session_destroy();

    echo "<h1>Has cerrado sesion correctamente</h1><br><br><br>";
    echo "<a href='index.php'>Ir al Login</a>";
?>