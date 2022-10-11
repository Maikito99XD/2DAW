<?php
    class Vehiculo{
        private string $color;
        private $peso;

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
        
        //Creación y definir que por cada persona se añada el peso de la misma al peso del vehiculo
        public function anyadir_persona($pesoPersona){
            if(is_float($pesoPersona) || is_integer($pesoPersona)){
                $this->peso = $this->peso + $pesoPersona;
            }else{
                echo "EL PESO DE LA PERSONA TIENE QUE SER UN ENTERO O CON DECIMALES!";
            }
        }

        //Creación de getters y setters
        private function getColor(){
            return $this->color;
        }

        private function getPeso(){
            return $this->peso;
        }

        private function setColor($color){
            $this->color = $color;
        }

        private function setPeso($peso){
            $this->peso = $peso;
        }
    }
?>