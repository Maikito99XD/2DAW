<?php
    class Cuatro_ruedas extends Vehiculo{
        private int $numero_puertas;

        function __construct(int $numero_puertas){
            $this->numero_puertas = $numero_puertas;
        }

        function repintar($color){
            $this->color = $color;
        }
    }
?>