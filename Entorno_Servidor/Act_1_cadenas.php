<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="Mike Steel Marin">
</head>
<body>
<h1>Tema 1: Actividad 1</h1>
<?php
    $nombre = array();
    $prefijo = array();
    $findme = 'a';
    $findme0 = 'o';
    $replace = '0';
    $url = 'http://username:password@hostname:9090/path?arg=value';
    
    
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
    }else{
        $nombre = 'Mike';
    }
    $prefijo = $_GET['prefijo'];
    $pos = strpos($nombre, $prefijo);
    if($pos === false){
        echo "El prefijo no es igual!";
    }else{
        echo "El prefijo es igual";
    }
    $trimmed = trim($nombre, "/");
    echo "<br>";
    echo $trimmed;
    echo "<br>";
    echo strlen($trimmed);
    echo "<br>";
    echo strtoupper($trimmed);
    echo "<br>";
    echo strtolower($trimmed);
    echo "<br>";
    echo "Hay ".substr_count($nombre,strtoupper($findme))+substr_count($nombre,strtolower($findme))." en mayúscula y minuscula<br>";
    $posicion = stripos($nombre, strtolower($findme));
    if($posicion === false){
        echo "No se ha encontrado la $findme";
    }else{
        echo "La primera a está en la posición $posicion";
    }
    $nombreRemplazado = str_ireplace($findme0,$replace,$trimmed);
    echo "<br>";
    echo $nombreRemplazado;
    echo "<br>";
    echo parse_url($url, PHP_URL_SCHEME);
    echo "<br>";
    echo parse_url($url, PHP_URL_USER);
    echo "<br>";
    echo parse_url($url, PHP_URL_PATH);
    echo "<br>";
    echo parse_url($url, PHP_URL_QUERY);
    echo "<br>";


?>
</body>
</html>