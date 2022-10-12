<?php
    class Dos_ruedas extends Vehiculo{
        private int $cilindrada;

        function __construct($color, $peso, $cilindrada){
            parent::__construct($color,$peso);
            $this->cilindrada = $cilindrada;
        }

        public function poner_gasolina($litros){
            $aux;
            if(is_integer($litros) || is_float($litros)){
                $aux = $this->getPeso() + ($litros);
                $this->setPeso($aux);
            }
        }
        
        public function anyadir_persona($pesoPersona){
            if(is_float($pesoPersona) || is_integer($pesoPersona)){
                $this->setPeso($this->getPeso() + ($pesoPersona+2));
            }else{
                echo "EL PESO DE LA PERSONA TIENE QUE SER UN ENTERO O CON DECIMALES!";
            }
        }

        public function getCilindrada(){
            return $this->cilindrada;
        }

        public function __toString(){
            return self::class . ": ".$this->getColor().", ".$this->getPeso()."kg, ".
                $this->cilindrada." cilindrada<br>";
        }
    }
?>