<?php
    class Camion extends Cuatro_ruedas{
        private $longitud;

        function __construct(string $color,$peso,int $numero_puertas,$longitud){
            parent::__construct($color,$peso,$numero_puertas);
            $this->longitud = $longitud;
        }

        public function anyadir_remolque($longitud_remolque){
            $this->longitud = $this->longitud + $longitud_remolque;
        }

        public function getLongitud(){
            return $this->longitud;
        }

        public function setLongitud($longitud){
            if(is_integer($longitud) || is_float($longitud)){
                $this->longitud = $longitud;
            }else{
                echo "Tienes que poner un dato entero o con decimales!";
            }
        }

        public function __toString(){
            return self::class . ": ".$this->getColor().", ".$this->getPeso()."kg, ".
                $this->getPuertas()." puertas, ".$this->longitud." metros<br>";
        }
    }
?>