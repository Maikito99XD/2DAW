<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="Mike">
</head>
<body>
<h1>Tema 1: Actividad 5</h1>
<?php
    //Ejercicio 1

    function compruebaPalindromo($cadena){
        if(strrev($cadena) == $cadena){
            return 1;
        }else{
            return 0;
        }
    }

    $palindromo = "DAD";

    if(compruebaPalindromo($palindromo)){
        echo "Es un palindromo <br>";
    }else{
        echo "No es un palindromo <br>";
    }

    //Ejercicio 2

    function devuelveNumeros($numeros, $limite){
        $nuevoArray = array();
        $numerosTotales = 0;

        if(is_null($numeros)){
            echo "El array esta vacio";
        }else{
            for($i = 0;$i<count($numeros);$i++){
                if(is_int($numeros[$i])){
                    if($numeros[$i] <= $limite){
                        $nuevoArray[$numerosTotales] = $numeros[$i];
                        $numerosTotales++;
                    }
                }
            }
        }

        return $nuevoArray;
    }
    $numeros = array(10,5,3,8,20,15,12);
    print_r(devuelveNumeros($numeros,15));

    //Ejercicio 3

    function ordenaMayorMenor($array){
        if(is_array($array)){
            if(!is_null($array)){
                for($i = 0;$i<count($array);$i++){
                    if(!is_int($array[$i])){
                        return false;
                    }
                }
                rsort($array);
                return $array;
            }
        }else{
            return null;
        }
    }

    $arrayNumeros = array(10,5,3,8,20,15,12);

    if(ordenaMayorMenor($arrayNumeros) == null || ordenaMayorMenor($arrayNumeros) == false){
        echo "<br>El array está vacio o se ha encontrado un valor que no es un numero entero!";
    }else{
        echo "<br>";
        print_r($arrayNumeros);
    }

    //Ejercicio 4

    function resuelveEcuacion2Grado($a,$b,$c){
    
        if($a > 0){
            $neg = -1;
            $resultados = array();

            $c = $c *(-1);

            $menosb = $b * $neg;
            $oper1 = pow($b,2); 
            $oper2 = 4*$a*$c; 
            $resta = $oper1-$oper2; 
            $raiz = sqrt($resta); 
            $dosa = 2*$a; 

            $result2 = ($menosb - $raiz)/$dosa; 
            $result1 = ($menosb + $raiz)/$dosa;

            $resultados[0] = $result2;
            $resultados[1] = $result1;
            
            return $resultados;
        }else{
            echo "No se puede hacer la raiz con un 0 o un numero negativo!";
        }
    }

    //Si se pone 1,-5,6 funciona, sin embargo si se pone 3,2,2 saldrá false en ambos.
    echo "<br>";
    print_r(resuelveEcuacion2Grado(3,2,2));

    
?>
</body>
</html>