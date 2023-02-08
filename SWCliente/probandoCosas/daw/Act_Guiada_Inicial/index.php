<?php
    require_once 'Connection.php';
    $Ej = 0;

    //Con esto abrimos la conexión y lo guardamos en una variable
    $connection = Connection::make();

    function ejecutarConsulta($connection, $sql){
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }
        return $filas;
    }

    try{

        //Ejercicio 1. Obtener los datos completos de los empleados.
        
        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        $Ej++;
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
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 2. Obtener los datos completos de los departamentos

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT * from departamentos";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 3. Obtener los datos de los empleados con cargo 'Secretaria'.


        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT * from empleados WHERE lower(cargoE) = 'secretaria'";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 4

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, salEmp from empleados ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 5

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT * from empleados WHERE lower(cargoE) = 'vendedor' ORDER BY nomEmp";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 6 

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nombreDpto from departamentos";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 7. Obtener el nombre y cargo de todos los empleados, ordenado por salario

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, cargoE, salEmp from empleados ORDER BY salEmp";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 8. Listar los salarios y comisiones de los empleados del departamento 2000, ordenado por comisión.

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT salEmp, comisionE, codDepto from empleados WHERE codDepto = 2000 ORDER BY comisionE";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 9. Listar todas las comisiones.

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT DISTINCT comisionE from empleados";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 10. Obtener el valor total a pagar que resulta de sumar a los empleados del departamento
        3000 una bonificación de 500.000, en orden alfabético del empleado.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, salEmp, (salEmp+500000) as 'Total' from empleados WHERE codDepto = 3000 ORDER BY nomEmp";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 11. Obtener la lista de los empleados que ganan una comisión superior a su sueldo.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, salEmp, comisionE  from empleados WHERE comisionE > salEmp ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        //Ejercicio 12. Listar los empleados cuya comisión es menor o igual que el 30% de su sueldo

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, salEmp, comisionE  from empleados where comisionE <= (salEmp * 0.3) ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 13. Hallar el salario y la comisión de aquellos empleados cuyo número de documento de
        identidad es superior al '19.709.802'
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nDIEmp, nomEmp, salEmp, comisionE  from empleados where nDIEmp > '19709802' ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 14. Muestra los empleados cuyo nombre empiece entre las letras J y Z (rango). Liste estos
        empleados y su cargo por orden alfabético
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nDIEmp, nomEmp, salEmp, comisionE  from empleados where (lower(nomEmp)> 'j') and (lower(nomEmp)<'z')  ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 15. Listar el salario, la comisión, el salario total (salario + comisión), documento de
        identidad del empleado y nombre, de aquellos empleados que tienen comisión
        superior a 1.000.000, ordenar el informe por el número del documento de identidad.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT salEmp, comisionE, (salEmp + comisionE) as SalarioTotal, nDIEmp, nomEmp  from empleados where comisionE > '1000000' 
            order by nDIEmp ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 16. Obtener un listado similar al anterior, pero de aquellos empleados que NO tienen comisión
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT salEmp, comisionE, (salEmp + comisionE) as SalarioTotal, nDIEmp, nomEmp  from empleados where comisionE = '0' 
            order by nDIEmp ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        
        /*
        Ejercicio 17. Hallar los empleados cuyo nombre no contiene la cadena "MA"
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT  nDIEmp, nomEmp  from empleados where  lower(nomEmp) not LIKE '%ma%' ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

         /*
        Ejercicio 18. Obtener los nombres de los departamentos que no sean "Ventas" ni "Investigación" ni
        "Mantenimiento", ordenados por ciudad.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT  nombreDpto  from departamentos where  (lower(nombreDpto) not in ('ventas','investigación', 'mantenimiento'))";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

         /*
        Ejercicio 19.Obtener el nombre y el departamento de los empleados con cargo 'Secretaria' o
        'Vendedor', que no trabajan en el departamento de “PRODUCCION”, cuyo salario es
        superior a $1.000.000, ordenados por fecha de incorporación
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT E.nomEmp, D.nombreDpto, E.cargoE, E.salEmp  
            from departamentos as D, empleados as E where  E.codDepto = D.codDepto 
            and (lower(E.cargoE) like 'secretaria' or lower(E.cargoE) like 'vendedor')
            and lower(D.nombreDpto) not like 'producción'
            and E.salEmp > 1000000";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 20. Obtener información de los empleados cuyo nombre tiene 11 o menos caracteres.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp from  empleados where length(nomEmp) <= 11";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 21. Listar los datos de los empleados cuyo nombre inicia por la letra 'M', su salario es
        mayor a $800.000 o reciben comisión y trabajan para el departamento de 'VENTAS'
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT e.nomEmp, d.nombreDpto, e.salEmp, e.comisionE from empleados e, departamentos d 
            where e.codDepto = d.codDepto     
            and lower(e.nomEmp) like 'm%' 
            and (e.salEmp > 800000 or e.comisionE > 0)
            and lower(d.nombreDpto) = 'ventas'";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 22. Obtener los nombres, salarios y comisiones de los empleados que reciben un salario
        situado entre la mitad de la comisión la propia comisión.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, salEmp, comisionE from empleados where salEmp BETWEEN (salEmp/2) and comisionE";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 23. Mostrar el salario más alto de la empresa
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, salEmp from empleados where salEmp = (select max(salEmp) from empleados)";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

         /*
        Ejercicio 24. Mostrar cada una de las comisiones y el número de empleados que las reciben. Solo si
        tiene comisión.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT comisionE, count(*) as CantidadEmpleados from empleados group by comisionE having comisionE > 0";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

         /*
        Ejercicio 25. Mostrar el nombre del último empleado de la lista por orden alfabético.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp from empleados order by nomEmp desc";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

         /*
        Ejercicio 26. Hallar el salario más alto, el más bajo y la diferencia entre ellos.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT max(salEmp), min(salEmp), (max(salEmp) - min(salEmp)) as diferencia from empleados ";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

         /*
        Ejercicio 27. Mostrar el número de empleados de sexo femenino y de sexo masculino, por
        departamento..
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT codDepto, sexEmp, count(*) from empleados
            group by codDepto, sexEmp";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 28. Hallar el salario promedio por departamento
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT codDepto , AVG(salEmp) from empleados
            group by codDepto";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 29. Mostrar la lista de los empleados cuyo salario es mayor o igual que el promedio de la
        empresa. Ordenarlo por departamento.
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT nomEmp, salEmp ,AVG(salEmp) from empleados
            where salEmp >= (Select AVG(salEmp) from empleados)
            order by codDepto";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 30. Hallar los departamentos que tienen más de tres empleados. Mostrar el número de
        empleados de esos departamentos
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT d.nombreDpto, count(*) from empleados e, departamentos d where e.codDepto = d.codDepto
                group by d.nombreDpto
                HAVING count(*)>3";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 31. Mostrar el código y nombre de cada jefe, junto al número de empleados que dirige.
        Solo los que tengan más de dos empleados (2 incluido).
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT e.jefeID, j.nomEmp, count(*) 
                from empleados e, empleados j 
                where e.jefeID = j.nDIEmp
                group by j.nomEmp
                HAVING count(*)>=2";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 32. Hallar los departamentos que no tienen empleados
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT d.nombreDpto, count(*) 
                from empleados e, departamentos d
                where e.codDepto = d.codDepto
                group by d.nombreDpto";
                //HAVING count(*) = 0";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";

        /*
        Ejercicio 33. Mostrar el nombre del departamento cuya suma de salarios sea la más alta, indicando
        el valor de la suma
        */

        $Ej++;

        //Con esto abrimos la conexión y lo guardamos en una variable
        $connection = Connection::make();
        //Creamos la consulta
        $sql = "SELECT d.nombreDpto, sum(e.salEmp) as SumaSalarios
                from empleados e, departamentos d
                where e.codDepto = d.codDepto
                group by d.nombreDpto
                ORDER BY sum(e.salEmp) desc
                LIMIT 1";
        //Preparamos la consulta a ser ejecutada
        $pdoStatement = $connection->prepare($sql);
        //En caso de que al ejecutar la consulta de false, saltará un mensaje de error
        if($pdoStatement->execute() === false){
            $mensaje = "No se ha podido acceder a la BBDD";
        //Si ha funcionado los almacenaremos en un array
        }else{
            $filas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
            //$cabeceras = array_keys($filas[0]);
        }

        include "tabla.view.php";


    }catch(Exception $e){
        $mensaje = $e->getMessage();
    }
    
?>
