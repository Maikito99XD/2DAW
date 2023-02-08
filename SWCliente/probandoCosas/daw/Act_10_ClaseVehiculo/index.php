<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="TU NOMBRE">
</head>
<body>
<h1>Tema 2: Actividad 10</h1>
<?php
    include ("Vehiculo.php");
    include ("Cuatro_ruedas.php");
    include ("Dos_ruedas.php");
    include ("Coche.php");
    include ("Camion.php");

    /*Esto es lo que salía en el primer "Página mostrar.php " lo dejo todo comentado, debido a que
    vehiculo al ser abstracta todo lo que he hecho no se muestra y saltan errores, así que lo dejo
    por aquí para que se vea que lo he realizado.
    */ 
    /*
    $vehiculo1 = new Vehiculo("Negro",1500);
    echo "<br>Coche ".$vehiculo1->getColor()." con peso de ".$vehiculo1->getPeso()."<br>";
    echo $vehiculo1->circular()."<br>";
    echo "Se ha subido al vehiculo una persona, ".$vehiculo1->anyadir_persona(70).
        " ahora el vehiculo pesa ".$vehiculo1->getPeso()."<br>";
    $coche1 = new Coche("Verde",1400,0,0);
    echo "<br>Coche ".$coche1->getColor()." con peso de ".$coche1->getPeso()."<br>";
    echo "Se ha subido al vehiculo una persona, ".$coche1->anyadir_persona(65)."<br>";
    echo "Se ha subido al vehiculo una persona, ".$coche1->anyadir_persona(65).
        " ahora el vehiculo pesa ".$coche1->getPeso()."<br>";
    echo "<br>Se ha pintado el coche, antes era ".$coche1->getColor()." y ahora es de color "
        .$coche1->setColor("Rojo")."<br>";
    echo "Se han añadido ".$coche1->setCadenasNieve(2)." cadenas para la nieve para el coche de color "
        .$coche1->getColor()."<br>";
    $moto1 = new Dos_ruedas("Negra",120,0);
    echo "<br>Moto ".$moto1->getColor()." con peso de ".$moto1->getPeso()."<br>";
    echo "Se sube una persona, ahora la moto pesa ".$moto1->anyadir_persona(80)."".$moto1->getPeso()."<br>";
    echo "Se ponen 20 litros de gasolina a la moto, ahora pesa ".$moto1->poner_gasolina(20)."".$moto1->getPeso()."kg <br>";
    $camion1 = new Camion("Azul",10000,2,10);
    echo "<br>Camion ".$camion1->getColor()." con peso de ".$camion1->getPeso()."kg con ".
        $camion1->getPuertas()." puertas y ".$camion1->getLongitud()." metros de longitud<br>";
    echo "Se ha añadido un remolque al camión, ahora la longitud del camión es de ".
        $camion1->anyadir_remolque(5)."".$camion1->getLongitud()." metros<br>";
    echo "Se ha subido una persona al vehiculo, ".$camion1->anyadir_persona(80)." ahora el camion pesa ".
        $camion1->getPeso()."kg <br>";
    */
    $dosRuedas1 = new Dos_ruedas("Rojo",150,1000);
    $dosRuedas1->anyadir_persona(70);
    echo $dosRuedas1->__toString();
    echo $dosRuedas1->setColor("Verde");
    echo $dosRuedas1->ver_atributo($dosRuedas1);
    echo "<br>";
    $camion2 = new Camion("Blanco",6000,2,100);
    echo $camion2->__toString();
    $camion2->anyadir_persona(84);
    $camion2->setColor("Azul");
    echo $camion2->ver_atributo($camion2);
    echo "<br>";
    $coche2 = new Coche("Verde",2100,4,4);
    echo $coche2->__toString();
    $coche2->anyadir_cadenas_nieve(2);
    $coche2->anyadir_persona(80);
    echo $coche2->__toString();
    $coche2->setColor("Azul");
    $coche2->quitar_cadenas_nieve(4);
    echo $coche2->__toString();
    $coche2->setColor("Negro");
    echo $coche2->ver_atributo($coche2);

    


?>
</body>
</html>