<?php
    class Tabla{
        private $mat = [];
        private int $cantidadColumnas;
        private int $cantidadFilas;
        

        function __construct(int $cantidadColumnas,int $cantidadFilas){
            $this->cantidadColumnas = $cantidadColumnas;
            $this->cantidadFilas = $cantidadFilas;
        }

        //A partir de aquí el codigo se usará para hacer el ejercicio 4

        function cargarTabla(int $nFila, int $nColumna, string $dato, string $colorFuente, 
            string $colorFondo){
                require_once ("Celda.php");
                $celda = new Celda($dato,$colorFuente,$colorFondo);
                $this->mat[$nFila][$nColumna] = $celda;
        }

        function crearTabla(){
            echo "<br>Ejercicio 4<br>";
            echo "<table border = 1>";
            foreach($this->mat as $tablas){
                echo "<tr>";
                foreach($tablas as $index => $values){
                    echo $values->cargaCelda();
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        //A partir de aquí el codigo se usará para hacer el ejercicio 5

        private $mat2 = [];
        
        function insertar(Celda $celda, int $cantidadColumnas, int $cantidadFilas){
            $this->mat2[$cantidadColumnas][$cantidadFilas] = $celda;
        }

        function crearTablaPartirObjetos(){
            echo "<br>Ejercicio 5<br>";
            echo "<table border = 1>";
            foreach($this->mat2 as $tablas){
                echo "<tr>";
                foreach($tablas as $index => $values){
                    echo $values->cargaCelda();
                }
                echo "</tr>";
            }
            echo "</table>";
        }

    }
?>