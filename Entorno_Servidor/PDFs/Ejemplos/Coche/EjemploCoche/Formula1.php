<?php

require_once 'Coche.php';

class Formula1 extends Coche
{
    const INCREMENTO_VEL = 40;    //Km/h
    private string $escuderia;

    //CONSTRUCTOR
    function __construct(string $modelo, string $color, string $escuderia)
    {
        parent::__construct($modelo, $color);
        $this->escuderia = $escuderia;
    }

    function __toString()
    {
        return parent::__toString() .' Escuderia: '. $this->escuderia;
    }

    //GETTERS Y SETTERS

    public function getEscuderia(){
        return $this->escuderia;
    }

    //METODOS
    protected function getIncrementoVelocidad(){
        return self::INCREMENTO_VEL;
    }

}