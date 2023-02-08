<?php

require_once 'utils/Interfaces/I_ElementoQueSeTira.php';

class DadoPoker implements I_ElementoQueSeTira
{
    
    // Atributo caras que contendra las caras del dado
    private static $caras = array("As", "K", "Q", "J", "7", "8");

    // Atributo donde guardamos la ultima tirada
    private $tirada;
    
    // Funcion tira
    public function tira()
    {
        // Guardamos lo que haya salido en la $tirada (valor aleatorio entre 0 y 5)
        $this->tirada = self::$caras[random_int(0, 5)];
    }
    
    // Funcion que devuelve la ultima figura que ha salido en el dado
    public function getTirada() : string
    {
        return $this->tirada;
    }
    
}