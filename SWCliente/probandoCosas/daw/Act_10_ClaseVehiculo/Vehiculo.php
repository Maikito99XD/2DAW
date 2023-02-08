<?php
    abstract class Vehiculo{
        private string $color;
        private $peso;
        protected static $numero_cambio_color = 0;

        //Creación del constructor de la clase Vehiculo
        function __construct(string $color, $peso){
            //Definir las variables color y peso
            $this->color = $color;
            //Comprobar que el peso que nos pasan sea tipo float o integer y no un string o un char
            if(is_float($peso) || is_integer($peso)){
                $this->peso = $peso;
            }else{
                echo "EL PESO TIENE QUE SER UN ENTERO O CON DECIMALES!";
            }
        }

        //Creación del metodo cirular donde se mostrará que el vehiculo está circulando
        public function circular(){
            echo "El vehiculo esta circulando";
        }
        
        public static function ver_atributo(Object $obj){
            return $obj->__toString();
        }
        //Creación y definir que por cada persona se añada el peso de la misma al peso del vehiculo
        /*
        public function anyadir_persona($pesoPersona){
            if(is_float($pesoPersona) || is_integer($pesoPersona)){
                $this->peso = $this->peso + $pesoPersona;
            }else{
                echo "EL PESO DE LA PERSONA TIENE QUE SER UN ENTERO O CON DECIMALES!";
            }
        }
        */


        //Añadir persona con abstract
        public abstract function anyadir_persona($pesoPersona);

        //Creación de getters y setters
        public function getColor(){
            return $this->color;
        }

        public function getPeso(){
            return $this->peso;
        }

        public function getNumeroCambiosColor(){
            return self::$numero_cambio_color;
        }

        public function setColor($color){
            $this->color = $color;
            self::$numero_cambio_color++;
        }

        public function setPeso($peso){
            if($peso > 2100){
                return "El peso maximo permitido es de 2100kg!";
            }else{
                $this->peso = $peso;
                return $this->peso;
            }
        }
    }
?>