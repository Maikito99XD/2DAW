<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="MIKE">
</head>
<body>
<h1>Tema 2: Actividad 15</h1>
<form action="index.php" method="POST">
<h1>Creando la sesion</h1>
<label for="nombres">Nombres: </label>
<input type="text" id="nombre" name="nombre" value="" /><br/><br/>
<label for="contrasenya">Contraseña: </label>
<input type="text" id="contrasenya" name="contrasenya" value="" /><br/><br/>
<label for="contrasenya">La contraseña debe cumplir las siguientes condiciones:</label>
<ul>
    <li>Contener al menos 6 carácteres</li>
    <li>Contener menos de 16 carácteres</li>
    <li>Contener al menos 1 letra mayúscula</li>
    <li>Contener al menos 1 letra minuscula</li>
    <li>Contener al menos 1 carácter númerico</li>
</ul>         
<input type="submit" name="accion" value="Login" />
</form>

<?php
    //Se hacen los includes para poder acceder a las clases php
    include("Usuario.php");
    include("ContrasenyaInvalidaException.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Se comprueba que el usuario ha hecho el post para que así no le salgan errores
        if(!isset($_POST['nombre']) || !isset($_POST['contrasenya'])){
            echo "Algún campo se ha quedado vacio...";
        }else{
            //Se le da el nombre y la contraseña a la clase usuario
            try{
                $usuario = new Usuario($_POST['nombre'],$_POST['contrasenya']);
                
                $aux = $usuario->validarClave();
                //Se comprueba la clave 
                if(empty($aux)){
                    header("Location:PanelControl.php");
                }else{
                    throw new ContrasenyaInvalidaException($aux);
                }
                
            }catch(ContrasenyaInvalidaException $cie){
                //Se muestra el mensaje de error por pantalla
                echo $cie->contrasenyaInvalida();
            }
        }
    }

?>

</body>
</html>