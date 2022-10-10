<?php

require_once 'IVehiculo.php';

abstract class Coche implements IVehiculo
{
    const CANTIDAD_RUEDAS = 4;
    private string $modelo;
    private string $color;
    private bool $estaEncendido = false;
    private int $velocidad;

    //CONSTRUCTOR
    function __construct(string $modelo, string $color)
    {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->estaEncendido = false;
        $this->velocidad = 0;
    }

    function __toString()
    {
        return $this->modelo .' '. $this->color;
    }

    //GETTERS Y SETTERS
    public function getModelo(){
        return $this->modelo;
    }
    //No defino set para que el modelo no se pueda cambiar

    public function getColor(){
        return $this->color;
    }

    public function setColor(string $color) : Turismo{
        $this->color = $color;
        return $this;
    }

    public function getEstaEncendido(){
        if($this->estaEncendido)
            echo 'El coche está ENCENDIDO<br/>';
        else
            echo 'El coche está APAGADO<br/>';
    }

    //el set lo haremos con el metodo arrancarParar
//    public function setEstaEncendido(string $estaEncendido) : Turismo{
//        if($estaEncendido === 'Encender')
//            $this->estaEncendido = true;
//        elseif($estaEncendido === 'Apagar')
//            $this->estaEncendido = false;
//        return $this;
//    }

    public function getVelocidad(){
        return 'La velocidad es '. $this->velocidad .'km/h<br/>';
    }

    public function setVelocidad(int $velocidad){
        if($this->estaEncendido){
            $this->velocidad = $velocidad;
            echo 'La velocidad se ha puesto a '. $this->velocidad .'km/h<br/>';
        }
        else
            echo 'El coche está apagado<br/>';
    }

    //Se podrian cambiar los getters modelo y color por una funcion mostrarDatos

    //METODOS
    private function Arrancar(){
        $this->estaEncendido = true;
        echo 'El coche se ha encendido<br/>';
    }

    private function Apagar(){
        $this->estaEncendido = false;
        echo 'El coche se ha apagado<br/>';
    }
    
    public function ArrancarApagar(){
        if($this->estaEncendido)
            $this->Apagar();
        else
            $this->Arrancar();
    }

    abstract protected function getIncrementoVelocidad();

    public function Acelerar(){
        if($this->estaEncendido){
            $this->velocidad += $this->getIncrementoVelocidad();
            echo 'Ahora va a '. $this->velocidad .'km/h<br/>';
        }
        else
            echo 'El coche está apagado<br/>';
    }

    public function Frenar(){
        if($this->estaEncendido){
            $this->velocidad -= $this->getIncrementoVelocidad();
            echo 'Ahora va a '. $this->velocidad .'km/h<br/>';
        }
        else
            echo 'El coche está apagado<br/>';
    }

}