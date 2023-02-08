<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="Mike">
<style>
table, tr, td, th{
border: 1px solid black;
}
</style>
</head>
<body>
<h1>Tema 1: Actividad 2</h1>
<?php
$nombres = ["Oscar","Mike","Antonio","Sergio","Juanca","Javi","Medset"];
$cantidadNombres = count($nombres);
$alumnos = array(
    1 => array (
        'id' => 1,
        'nombre' => "Mike",
        'edad' => 23
    ),
    2 => array (
        'id' => 2,
        'nombre' => "Medset",
        'edad' => 20
    ),
    3 => array (
        'id' => 3,
        'nombre' => "Juanca",
        'edad' => 24
    )
);
$numeros = array(1,2,3,4,5,6,7,8,9,10);
echo "Hay $cantidadNombres nombres<br>";
echo implode(' ',$nombres);
echo "<br>";
//La función asort lo ordena y luego hay que imprimirlo por pantalla
asort($nombres);
print_r($nombres);
echo "<br>";
//Este es el 5
print_r(array_reverse($nombres));
echo "<br>";
//Este es el 6
echo "La posicion de mi nombre en el array es ".array_search('Mike',$nombres);
echo "<br>";
echo "<table>";
foreach($alumnos as $alumno){
    echo "<tr>";
    foreach($alumno as $indice=>$valor){
        echo "<td>$indice: $valor</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<br>";
$nombresAlumnos = array_column($alumnos, 'nombre');
print_r($nombresAlumnos);
echo "<br>";
echo "La suma de los numeros del array es de ".array_sum($numeros);
?>
</body>
</html>