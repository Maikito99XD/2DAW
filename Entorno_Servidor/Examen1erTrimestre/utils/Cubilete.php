<?php
    class Cubilete implements ElementoQueSeTira{
        private array $ladosDeLosDados = [];
        private array $dados= [];

        public function creaDados($numeroDados){
            for($i = 0;$i<$numeroDados;$i++){
                $this->dados[$i] = new DadoPoker();
            }
        }

        public function tira(){
            for($i = 0;$i<count($this->dados);$i++){
                $this->dados[$i]->tira();
                $this->ladosDeLosDados[$i] = $this->dados[$i]->getTirada();
            }
        }

        public function getLadosDeLosDados(){
            return $this->ladosDeLosDados;
        }

        public function getTirada(){

        }

    }
?>