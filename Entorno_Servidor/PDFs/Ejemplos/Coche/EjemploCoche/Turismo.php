<?php

require_once 'Coche.php';

class Turismo extends Coche
{
    const INCREMENTO_VEL = 5;    //Km/h
    private string $matricula;
    private int $litrosMaletero;

    //CONSTRUCTOR
    function __construct(string $modelo, string $color, string $matricula, int $litrosMaletero)
    {
        parent::__construct($modelo, $color);
        $this->matricula = $matricula;
        $this->litrosMaletero = $litrosMaletero;
    }

    function __toString()
    {
        return parent::__toString() .'matricula: '. $this->matricula;
    }


    //GETTERS Y SETTERS
    public function getMatricula(){
        return $this->matricula;
    }

    //No defino set para que la matricula no se pueda cambiar

    public function getLitrosMaletero(){
        return $this->litrosMaletero;
    }

    public function setLitrosMaletero(int $litrosMaletero) : Turismo{
        $this->litrosMaletero = $litrosMaletero;
        return $this;
    }

    //METODOS
    protected function getIncrementoVelocidad(){
        return self::INCREMENTO_VEL;
    }

}