<?php
    class Dos_ruedas extends Vehiculo{
        private int $cilindrada;

        function __construct($cilindrada){
            $this->cilindrada = $cilindrada;
        }

        public function poner_gasolina($litros){
            if(is_integer($litros) || is_float($litros)){
                $this->peso = $litros;
            }
        }
    }
?>