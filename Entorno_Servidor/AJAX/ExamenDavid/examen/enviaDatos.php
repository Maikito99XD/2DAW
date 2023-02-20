<?php
require_once("database/Connection.php");

try{
    $connection = Connection::make();
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $provincia = $_POST['provincia'];
    $contrasenya = $_POST['contrasenya'];

    $sql2 = "SELECT email from usuarios where email = '$email'";
    
    $pdoStatement = $connection->prepare($sql2);

    if($pdoStatement->execute() == false){
        
        $mensaje = "No se ha podido acceder a la BBDD";
    }else{
        
        $emails = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        if(compruebaEmail($emails, $email)){
            print_r("El usuario ya existe en la base de datos");
        }else{
            $pdoStatement = $connection->prepare("INSERT INTO usuarios(nombre,email,provincia,contrasenya) VALUES('$nombre','$email','$provincia','$contrasenya')");
            if($pdoStatement->execute() == false){
        
                $mensaje = "No se ha podido acceder a la BBDD";
            }else{
                print_r("usuario registrado con éxito");
            }
        }
    }

    

}catch(Exception $ex){
    print $ex->getMessage();
}
function compruebaEmail($emails, $email){
    for($i = 0;$i<count($emails); $i++){
        if($emails[$i]['email'] == $email){
            return true;
        }
    }
    return false;
}
?>