<?php
    class Cabecera{
        private string $titulo;
        //Este atributo será para saber si quiere el titulo a la izq. centrado o a la der.
        private string $orientacion;
        //Este atributo es para saber el color del titulo
        private string $colorFondo;
        //Este atributo es para saber la fuente
        private string $colorFuente;


        function __construct(string $titulo,string $orientacion, string $colorFondo, string $colorFuente){
            $this->titulo = $titulo;
            $this->orientacion = $orientacion;
            $this->colorFondo = $colorFondo;
            $this->colorFuente = $colorFuente;
        }

        function muestraTitulo(){
            echo "Ejercicio 1";
            echo "<h1 style='color: ".$this->colorFondo.";background-color: ".$this->colorFuente.";text-align: ".$this->orientacion."' \>";
            echo $this->titulo;
            echo "</h1>";
        }
    }
?>