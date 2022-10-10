<?php

//require_once 'Coche.php';
require_once 'Turismo.php';
require_once 'Formula1.php';

$MiCoche = new Turismo('Panda', 'blanco','4589 HDE', 50);
$MiF1 = new Formula1('Version3', 'Rojo-Blanco', 'Ferrari');

echo 'Las características de mi coche son:<br/>';
echo $MiCoche->getMatricula() .'<br/>';
echo $MiCoche->getModelo() .'<br/>';
echo $MiCoche->getColor() .'<br/>';
echo '<br/>';

echo 'Las características de mi F1 son:<br/>';
echo $MiF1 .'<br/>';;
echo '<br/>';

$MiCoche->Acelerar();
$MiCoche->ArrancarApagar();
echo $MiCoche->getVelocidad();
$MiCoche->setVelocidad(40);
echo $MiCoche->getVelocidad();
$MiCoche->Acelerar();
$MiCoche->Acelerar();
$MiCoche->Acelerar();
echo $MiCoche->getVelocidad();
$MiCoche->Frenar();
echo $MiCoche->getVelocidad();
echo '<br/>';

$MiF1->ArrancarApagar();
$MiF1->setVelocidad(200);
echo $MiF1->getVelocidad();
$MiF1->Acelerar();
$MiF1->Acelerar();
$MiF1->Acelerar();
echo $MiF1->getVelocidad();
$MiF1->Frenar();
echo $MiF1->getVelocidad();
