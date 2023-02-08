<?php
    class Celda extends Tabla{
        private string $texto;
        private string $colorFuente;
        private string $colorFondo;

        function __construct(string $texto,string $colorFuente,string $colorFondo){
            $this->texto = $texto;
            $this->colorFuente = $colorFuente;
            $this->colorFondo = $colorFondo;
        }

        function cargaCelda(){
            return "<th style='color : $this->colorFuente; background-color : $this->colorFondo'>$this->texto</th>";
        }

    }
?>