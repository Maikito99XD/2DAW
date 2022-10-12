<?php
    class Cuatro_ruedas extends Vehiculo{
        private int $numero_puertas;

        function __construct(string $color,$peso,int $numero_puertas){
            parent::__construct($color,$peso);
            $this->numero_puertas = $numero_puertas;
        }

        function repintar($color){
            $this->color = $color;
        }

        public function anyadir_persona($pesoPersona){
            if(is_float($pesoPersona) || is_integer($pesoPersona)){
                $this->setPeso($this->getPeso() + $pesoPersona);
            }else{
                echo "EL PESO DE LA PERSONA TIENE QUE SER UN ENTERO O CON DECIMALES!";
            }
        }

        public function getPuertas(){
            return $this->numero_puertas;
        }

        public function setPuertas(int $numPuertas){
            $this->numero_puertas = $numPuertas;
            return $this->numero_puertas;
        }

        public function __toString(){
            return self::class . ": ".$this->getColor().", ".$this->getPeso()."kg, ".
                $this->numero_puertas." puertas<br>";
        }
    }
?>