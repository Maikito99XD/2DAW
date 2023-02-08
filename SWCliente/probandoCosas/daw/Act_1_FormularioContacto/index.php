<?php
require_once 'database/Connection.php';

$nombre = '';
$apellidos = '';
$email = '';
$asunto = '';
$texto = '';
$fecha = '';
$mensaje = '';
$arrayMensaje = [];


try{
    $connection = Connection::make();

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $nombre = $_POST['FirstName'];
        $apellidos = $_POST['LastName'];
        $email = $_POST['email'];
        $asunto = $_POST['subject'];
        $texto = trim(htmlspecialchars($_POST['mensaje']));
        $fecha = date('Y').date('m').date('d').date('H').date('i').date('s');

        $sql = "INSERT INTO mensajes(nombre,apellidos,email,asunto,texto,fecha) 
            VALUES (:nombreMensaje, :apellidosMensaje, :emailMensaje, :asuntoMensaje, 
                :textoMensaje, :fechaMensaje)";
        $pdoStatement = $connection->prepare($sql);
        $parameters = [':nombreMensaje' => $nombre,
                        ':apellidosMensaje' => $apellidos,
                        ':emailMensaje' => $email,
                        ':asuntoMensaje' => $asunto,
                        ':textoMensaje' =>$texto,
                        ':fechaMensaje' => $fecha];
        if($pdoStatement->execute($parameters) == false){
            $mensaje = "No se ha podido acceder a la BBDD";
        }else{
            $mensaje = 'Datos enviados';
        }
    }

    $sql = "SELECT * from mensajes";
    $pdoStatement = $connection->prepare($sql);
    
    if($pdoStatement->execute() == false){
        
        $mensaje = "No se ha podido acceder a la BBDD";
    }else{
        
        $arrayMensaje = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

}catch(FileException $fileException){
    $mensaje = $fileException->getMessage();
}

include("views/partials/ini_partial.php");
include("views/form.view.php");
if(count($arrayMensaje) > 0){
    include("views/mensajes.view.php");
}
include("views/partials/fin_partial.php");

?>