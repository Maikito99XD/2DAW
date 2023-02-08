<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="Mike">
</head>
<body>
<h1>Tema 1: Actividad 4</h1>
<?php

    //Este php es para las funciones del ejercicio Act_4_functions2.php 

    //Ejercicio 1
    function generaNumeroAleatorio(int $min,int $max){
        return rand($min,$max);
    }
    //Ejercicio 2

    function sacarFactorial($numero){
        if(is_int($numero)){
            if($numero === 1){
                return 1;
            }else{
                $i = $numero;
                $factorial = 0;
                do{
                    $factorial = $numero + $i;
                    $i = $i - 1;
                }while($i === 1);
                return $factorial;
            }
        }else{
            return "El numero no es un entero!";
        }
    }

    //Ejercicio 3

    function generaLetraAleatoria($DesdeLetra,$HastaLetra){
        $letraAleatoria = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
        return $letraAleatoria;
    }

    //Ejercicio 4
    //Se han realizado varios intentos, los cuales dejaré para que se vean a futuri como referencia.
    function generaOpciones($opciones){
        if(is_array($opciones)){
            echo "<select>";
/*            foreach($opciones as $opcion){
                //foreach($opcion as $values){
                    if(is_null($opcion)){
                        echo "El array no es bidimensional";
                    }else{
                        echo "<option value = $opcion[0]> $opcion[1] </option>";
                    }
                //}
            }
        */
        //Se puede hacer con esta solución que es con For o con la de arriba que es foreach
          for($i = 0;$i<count($opciones);$i++){
                //for($j = 0;$j<count($opciones[$i]);$j++){
                  if(is_null($opciones[$i][0]) || is_null($opciones[$i][1])){
                      echo "El array no es bidimensional";
                  }else{
                      echo "<option value =". $opciones[$i][0].">". $opciones[$i][1] ."</option>";
                  }
                //}
        }
            echo "</select>";
        }else{
            return "No es un array!";
        }
        echo "<br>";
    }

    //Ejercicio 5

    function ordenaAnyos($anyos){
        //Compruebo que es un array
        if(is_array($anyos)){
            //Lo ordeno de mayor a menor
            rsort($anyos);
            //Hago el select 
            echo "<select>";
            //Hago un bucle para poder recorrer el array y mostrarlo
            for($i = 0;$i<count($anyos);$i++){
                //Compruebo que cada dato dentro del array sea un numero entero que serán los años
                if(!is_int($anyos[$i])){
                    //De no ser un numero entero o un año, se saldrá del bucle 
                    echo "Hay un dato que no es un año!";
                    break;
                }else{
                    //De ser un entero aparecerá por pantalla.
                    echo "<option value = $i> $anyos[$i] </opcion>";
                }
            }
            echo "</select>";
        }else{
            echo "No es un array!";
        }
    }


?>
</body>
</html>