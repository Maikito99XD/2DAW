<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="Mike">
</head>
<body>
<?php
    //Este php es para las llamadas que se realizaran para el ejercicio Act_4_functions2.php 
    include("Act_4_functions2.php");
    //Ejercicio 1 

    echo "El numero aleatorio que ha salido es: ".generaNumeroAleatorio(0,10)."<br>";

    //Ejercicio 2

    echo "El factorial del numero es : ".sacarFactorial(4)."<br>";

    //Ejercicio 3

    echo "La letra aleatoria que ha saldio es: ".generaLetraAleatoria("a","z")."<br>";

    //Ejercicio 4

    $array = [
        [1, "Madrid"],
        [2, "Nueva York"],
        [3, "Londres"],
        [4, "Barcelona"]
    ];

    echo generaOpciones($array);

    //Ejercicio 5

    $numeros = array(1998,1999,1960,2010);

    echo ordenaAnyos($numeros);



?>
</body>
</html>