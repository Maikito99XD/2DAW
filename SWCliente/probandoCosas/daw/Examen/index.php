<?php
    require_once 'utils/Classes/Cubilete.php';

    //______INICIALIZACION______
    // Iniciamos la sesion
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
        session_destroy();
    // Inicializamos las variables de la sesion
    if (!isset($_SESSION['Tiradas']) || !isset($_SESSION['numTiradas']))
    {
        $_SESSION['Tiradas'] = [];
        $_SESSION['numTiradas'] = 0;
    }
    //Para mantener el numero dados en el formulario
    if (isset($_POST['nDados']))
        $_SESSION['numDados'] = $_POST['nDados'];
    else
        $_SESSION['numDados'] = 0;
    
    //______FORMULARIO______
    // Encabezado y titulo en HTML
    include "views/partials/ini.part.php";
    //Formulorio cantidad de dados
    include "views/form.view.php";

    //______PETICION POST______
    // Si pulsamos tirar el dado
    if (isset($_POST['nDados']) && ($_POST['nDados'] > 0))
    {
        $numDados = $_POST['nDados'];
        $_SESSION['numDados'] = $numDados;
        $cubilete = new Cubilete($numDados);

        //Recuperamos el historico de la session
        $historicoTiradas=$_SESSION['Tiradas'];
        $cubilete->setTiradasTotales($_SESSION['numTiradas']);

        // Tiramos el cubilete
        $cubilete->tira();
        // Recogemos las figuras que hayan salido
        $tiradaActual = $cubilete->getTirada();

        // Guardamos la ultima tirada en el historico
        $historicoTiradas[$cubilete->getTiradasTotales()]=$tiradaActual;
        // Recogemos la cantidad de veces que hemos tirado
        $numTiradas = $cubilete->getTiradasTotales();

        //Guardar el historico en session
        $_SESSION['Tiradas']=$historicoTiradas;
        $_SESSION['numTiradas']=$numTiradas;

        //Calcular maximo numero de dados
        $max_tirada = 0;
        for ($i=1; $i<=count($historicoTiradas); $i++)
        {
            $max_tirada_temp = count($historicoTiradas[$i]);
            if ($max_tirada_temp>$max_tirada)
                $max_tirada= $max_tirada_temp;
        }

        //______TABLA TIRADAS______
        //Mostramos en HTML la tabla del historico de tiradas
        include "views/tabla.view.php";
    }
    //Parte final del HTML (cierre)
    include "views/partials/fin.part.php";
?>
        

