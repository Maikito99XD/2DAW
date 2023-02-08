<?php
    //Se inicia la sesion
    session_start();
    //Comprueba que se ha realizado una petición post
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Comprueba que boton se ha pulsado si blue, yellow o cero
        if($_POST['blue']){
            //Se le sumara a blue
            $_SESSION['a'] = $_SESSION['a'] + 1;
        }elseif($_POST['yellow']){
            //Se le sumara a yellow
            $_SESSION['b'] = $_SESSION['b'] + 1;
        }elseif($_POST['cero']){
            //Se inicializarán a 0
            $_SESSION['a'] = 0;
            $_SESSION['b'] = 0;
        }
    }
    //Header nos redirigirá a la localización que le especifiquemos SIN MOSTRAR Recuento.php
    header("Location:PanelControl.php");
?>