<?php
require_once 'utils/classes/File.php';
require_once 'utils/classes/Connection.php';
require_once 'utils/classes/ImagenGaleria.php';

$descripcion = '';
$mensaje = '';

try{
    $connection = Connection::make();

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        try
        {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

            $imagen = new File('imagen', $tiposAceptados);
            $imagen->saveUploadFile('images/');


            $sql = "INSERT INTO imagenes(nombre,descripcion) VALUES (:nombreImagen, :descripcion)";
            $pdoStatement = $connection->prepare($sql);
            $parameters = [':nombreImagen' => $imagen->getFileName(),
                            ':descripcion' => $descripcion];
            if($pdoStatement->execute($parameters) == false){
                $mensaje = "No se ha podido acceder a la BBDD";
            }else{
                $mensaje = 'Datos enviados';
            }
            
        }
        catch(FileException $fileException)
        {
            $mensaje = $fileException->getMessage();
        }
    }
    $sql = "SELECT * from imagenes";
    $pdoStatement = $connection->prepare($sql);
    echo "Esta pasando";
    if($pdoStatement->execute() == false){
        echo "Esta pasando";
        $mensaje = "No se ha podido acceder a la BBDD";
    }else{
        echo "Esta pasando";
        $imagenes = $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'ImagenGaleria');
    }

    var_dump($imagenes);
    include 'views/form.view.php';
    include 'views/imagenes.view.php';
}catch(FileException $fileException){
    $mensaje = $fileException->getMessage();
}

?>