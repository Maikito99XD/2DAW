<?php
    require_once 'Connection.php';
    try{
        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT * from empleados";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            var_dump(0);
            //$cabeceras = array_keys($filas[0]);
        }
    }catch(Exception $e){
        $mensaje = $e->getMessage();
    }
?>