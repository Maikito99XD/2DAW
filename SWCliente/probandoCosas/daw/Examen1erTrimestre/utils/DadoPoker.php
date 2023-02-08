<?php
    class DadoPoker implements ElementoQueSeTira{
        private array $posiblesTiradas = ["As", "K", "Q", "J", "7","8"];
        private $tirada;

        public function tira(){
            $ladoDelDado = random_int(0, (count($this->posiblesTiradas)-1));
            $this->tirada = $this->posiblesTiradas[$ladoDelDado];
        }

        public function getTirada(){
            return $this->tirada;
        }

    }
?>