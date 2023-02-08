<?php
    //Los includes para poder acceder a los php
    include("views/formulario.view.php");
    include("utils/exceptions/FileException.php");
    include("utils/classes/File.php");
    //Recibiendo la petición post
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Manejando las excepciones con try catch
        try{
            //Aquí compruebo que ha recibido las peticiones independientemente de si están vacias o con datos
            if((isset($_FILES['imagen'])) && (isset($_POST['descripcion']))){
                //Aquí creo y almaceno en unas variables lo que me llega del file y post para un uso más comodo luego
                $imagenTemporal = $_FILES['imagen']['name'];
                $descripcion = $_POST['descripcion'];
               //Aquí le indico que si tanto files como post no están vacios que sigan
                if (isset($imagenTemporal) && $imagenTemporal != "" && !empty($descripcion)){
                    //Aquí almaceno tanto el tipo como el tamaño de la imagen.
                    $tipo = $_FILES['imagen']['type'];
                    $tamano = $_FILES['imagen']['size'];
                    //En este if compruebo que el tipo del archivo pasado sea gif, jpeg, jpg o png y el tamaño maximo (Le he puesto mucho para probar)
                    if (((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))){
                        //Aquí creo el objeto File y aquí viene la jugada, le doy tanto el nombre temporal como el real y la descripcion para luego poder jugar con ellos
                        $imagen = new File($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name'],$_POST['descripcion']);
                        //Uso el metodo saveUploadFile de la clase File que he creado
                        $imagen->saveUploadFile();
                    //De no cumplirse las anteriores condiciones, saltará un FileException    
                    }else{
                        throw new FileException("Error. La extensión del archivo no es correcta.<br/>
                        - Se permiten archivos .gif, .jpg, .png.");
                    }
                //De no cumplirse las anteriores condiciones saltará un FileException
                }else{
                    throw new FileException("Se ha quedado algún campo vacio...");
                }
            }
        }catch(FileException $fe){
            //Aquí simplemente se llama al metodo mensajeError de la clase FileException
            echo $fe->mensajeError();
        }
    }
?>