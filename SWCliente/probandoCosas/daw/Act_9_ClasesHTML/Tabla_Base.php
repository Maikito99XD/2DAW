<?php
    class Tabla_Base{
        private int $cantidadFilas;
        private int $cantidadColumnas;
        private array $tabla=[];

        function __construct(int $cantidadFilas, int $cantidadColumnas){
            $this->cantidadFilas = $cantidadFilas;
            $this->cantidadColumnas = $cantidadColumnas;
        }

        function cargaTabla(int $nFila, int $nColumna, string $dato, string $colorFuente, 
            string $colorFondo){
                $this->tabla[$nFila][$nColumna]="<th style='color : $colorFuente; background-color : $colorFondo'>
                        $dato </th>";
        }

        function creaTabla(){
            echo "<br>Ejercicio 3<br>";
            echo "<table border = 1>";
            foreach($this->tabla as $tablas){
                echo "<tr>";
                foreach($tablas as $index => $values){
                    echo $values;
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        /*
        Esta funcion era para que en una sola casilla en concreto se pusiera del color seleccionado
        function generaTablaConDirectrices(int $nFila, int $nColumna, string $dato, string $colorFuente, 
            string $colorFondo){
                echo "<br>Ejercicio 3<br>";
                if($this->compruebaFilasColumnas($nFila,$nColumna)){
                    echo "<table border = 1>";
                    for($i = 0;$i<$this->cantidadColumnas;$i++){
                        echo "<tr>";
                        for($j = 0;$j<$this->cantidadFilas;$j++){
                            if($nColumna === $i){
                                if($nFila === $j){
                                    echo "<th style='color : $colorFuente; background-color : $colorFondo'>";
                                    echo $dato;
                                }else{
                                    echo "<th>";
                                    echo "Tabla";
                                }
                            }else{
                                echo "<th>";
                                echo "Tabla";
                            }
                            echo "</th>";
                        }
                        echo "</tr>";
                    }
                }else{
                    echo "NO PUEDES PONER MENOS DE 0 COLUMNAS o 0 FILAS!";
                }
        }
        */

        /*
        Esta funcion era para comprobar que el numero de filas y columnas era mayor a 0
        function compruebaFilasColumnas(int $nFila, int $nColumna){
            if($nFila < 0){
                return false;
            }
            if($nColumna < 0){
                return false;
            }else{
                return true;
            }
        }
        */
    }
?>