<?php
    class Coche extends Cuatro_ruedas{
        private int $numero_cadenas_nieve;

        function __construct(string $color,$peso,int $numero_puertas,int $numero_cadenas_nieve){
            parent::__construct($color,$peso,$numero_puertas);
            $this->numero_cadenas_nieve = $numero_cadenas_nieve;
        }

        public function anyadir_cadenas_nieve(int $cantidaAnyadir){
            $this->numero_cadenas_nieve = $this->numero_cadenas_nieve + $cantidaAnyadir;
        }

        public function quitar_cadenas_nieve(int $cantidadEliminar){
            $aux = $this->numero_cadenas_nieve - $cantidadEliminar;
            if($aux >= 0){
                $this->numero_cadenas_nieve = $aux;
            }else{
                echo "HAS ELIMINADO DEMASIADAS CADENAS, PON UN NUMERO MÁS BAJO DE: $this->numero_cadenas_nieve";
            }
        }

        public function getCadenasNieve(){
            return $this->numero_cadenas_nieve;
        }

        public function setCadenasNieve(int $modificaCadenasNieve){
            if($modificaCadenasNieve < 0){
                echo "NO PUEDES PONER UN NUMERO NEGATIVO!";
            }else{
                $this->numero_cadenas_nieve = $modificaCadenasNieve;
                return $this->numero_cadenas_nieve;
            }
        }

        public function anyadir_persona($pesoPersona){
            if($this->getPeso()>= 1500 || $this->numero_cadenas_nieve <= 2){
                echo "Atención, ponga 4 cadenas para la nieve.<br>";
            }
        }

        public function __toString(){
            return self::class . ": ".$this->getColor().", ".$this->getPeso()."kg, ".
                $this->getPuertas()." puertas, ".$this->numero_cadenas_nieve." cadenas para la nieve, ".
                $this->getNumeroCambiosColor()." veces se ha cambiado el color<br>";
        }
    }

?>