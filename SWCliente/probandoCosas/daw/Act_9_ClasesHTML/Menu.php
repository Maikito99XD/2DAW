<?php
    class Menu{
        private int $cantidadOpciones;
        private string $forma;
        private string $url;
        public $opciones=[];

        function __construct(int $cantidadOpciones, string $forma, string $url){
            $this->cantidadOpciones = $cantidadOpciones;
            $this->forma = $forma;
            $this->url = $url;
        }

        function generaOpciones(){
            for($i = 0;$i<$this->cantidadOpciones;$i++){
                $this->opciones[] = "Opcion ".$i;

            }
        }

        //Método que muestra el menú horizontal
        public function mostrarHorizontal()
        {
            for($f=0;$f<$this->cantidadOpciones;$f++){
                echo '<a href="'.$this->url.'">'.$this->opciones[$f].'</a>';
                echo " - ";
            }
        }

        //Función que muestra el menú vertical
        public function mostrarVertical(){
            for($i = 0;$i<$this->cantidadOpciones;$i++){
                echo '<a href="'.$this->url.'">'.$this->opciones[$i].'</a>';
                echo "<br>";
            }
        }

        function muestraMenu(){
            echo "<br>Ejercicio 2<br>";
            if($this->forma === "vertical"){
                $this->mostrarVertical();
            }else if($this->forma === "horizontal"){
                $this->mostrarHorizontal();
            }else{
                $this->mostrarVertical();
            }
        }
    }
?>