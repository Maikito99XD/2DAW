<?php

require_once('database/Connection.php');
include("views/partials/ini_partial.php");

try{
    $connection = Connection::make();
    session_start();

    //Es una putada pero quería hacerlo con FETCH_CLASS para más nota pero no se puede todo en la vida :p
    $sql = "SELECT DISTINCT nombreDpto from departamentos";
    $pdoStatement = $connection->prepare($sql);
    
    if($pdoStatement->execute() == false){
        $mensaje = "No se ha podido acceder a la BBDD";
    }else{
        $departamentos = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['accion'])){
            $departamentoBuscar = $_POST['departamento'];
            $_SESSION['departamento'] = $_POST['departamento'];
            $sql = "SELECT e.* from empleados as e, departamentos as d 
            where e.codDepto = d.codDepto and d.nombreDpto = '$departamentoBuscar'";
            $pdoStatement = $connection->prepare($sql);
            
            if($pdoStatement->execute() == false){
                $mensaje = "No se ha podido acceder a la BBDD";
            }else{
                $empleados = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['empleados'] = $empleados;
            }
            include("views/empleados.view.php");
        }
        if(isset($_POST['nuevoEmpleado'])){
            $id = $_POST['id'];
            $nombre = $_POST['nombreEmpleado'];
            $sexo = $_POST['sexo'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $fechaIncorporacion = $_POST['fechaIncorporacion'];
            $salario = $_POST['salario'];
            $comision = $_POST['comision'];
            $cargo = $_POST['cargo'];
            $idJefe = $_POST['idJefe'];
            $codDepartamento = $_POST['codDepartamento'];
            $departamentoBuscar =  $_SESSION['departamento'];

            $sql = "INSERT INTO empleados(nDIEmp,nomEmp,sexEmp,fecNac,fecIncorporacion,salEmp,comisionE,
                cargoE,jefeID,codDepto) VALUES(:id,:nombre,:sexo,:fechaNacimiento,:fechaIncorporacion,
                    :salario,:comision,:cargo,:jefe,:codDepartamento)";
            $pdoStatement = $connection->prepare($sql);
            $parameters = [':id'=>$id,
                ':nombre' => $nombre,
                ':sexo' => $sexo,
                ':fechaNacimiento' => $fechaNacimiento,
                ':fechaIncorporacion' => $fechaIncorporacion,
                ':salario' => $salario,
                ':comision' => $comision,
                ':cargo' => $cargo,
                ':jefe' => $idJefe,
                ':codDepartamento' => $codDepartamento];
                
            
            if($pdoStatement->execute($parameters) == false){
                $mensaje = "No se ha podido acceder a la BBDD";
            }else{
                $empleados = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            }

            $sql = "SELECT e.* from empleados as e, departamentos as d 
            where e.codDepto = d.codDepto and d.nombreDpto = '$departamentoBuscar'";
            $pdoStatement = $connection->prepare($sql);
            
            if($pdoStatement->execute() == false){
                $mensaje = "No se ha podido acceder a la BBDD";
            }else{
                $empleados = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['empleados'] = $empleados;
            }
            include("views/empleados.view.php");

        }
    }else{
        include("views/departamentos.view.php");
    }

}catch(FileException $fileException){
    $mensaje = $fileException->getMessage();
}


include("views/partials/fin_partial.php");
?>