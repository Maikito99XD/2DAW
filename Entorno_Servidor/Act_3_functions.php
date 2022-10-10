<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="Mike">
</head>
<body>
<h1>Tema 1: Actividad 3</h1>
<?php
    //Ejercicio 1
    $nombre = "alumnos";
    $alumnos = array(
        "nombres" => array(
            'Mike','Sergio', 'Javi', 'Antonio'
        ),
        "apellidos" => array(
            'Steel','Valero','Alvarez', 'Parenyo'
        )
        );
    
    function insert($nombre, $alumnos){
        echo "Insert into $nombre (";
        print_r(implode(", ",array_keys($alumnos)).") values (:".implode(", :",array_keys($alumnos)).")");
    
    }

    insert($nombre, $alumnos);
    echo "<br>";

    //Ejercicio 2

    function insertRef(string &$sql, string $tabla, array $campos){
        $sql = str_replace('tabla', $tabla, $sql);

        $columns = implode(', ',array_keys($campos));

        $values = ':'.implode(', :',array_keys($campos));

        $sql = str_replace('campos', $columns, $sql);

        $sql = str_replace('valores', $values, $sql);

    }

    $sql = "insert into tabla (campos) values (valores)";
    insertRef($sql, 'alumnos', ['nombres'=>'Mike','apellido' => 'Steel']);
    echo $sql;
    echo "<br>";
    //Ejercicio 3

    function suma($a,$b){
        return $a + $b;
    }

    function multiplicacion($a,$b){
        return $a * $b;
    }

    //Para hacer la comparacion de functions mediante un string se pueden poner () y php comprueba como se llaman las funciones
    function realizarOperacion(string $operacion, string $operando,int $a, int $b){
        $resultado = $operacion($a,$b);
        echo "$a $operando $b = $resultado";
    }

    realizarOperacion('suma','+',5,3);
?>
</body>
</html>