<?php
    require_once 'database/Connection.php';
    try{
        $connection = Connection::make();
    
        $sql = "SELECT nombre from provincias";
        $pdoStatement = $connection->prepare($sql);
        
        if($pdoStatement->execute() == false){
            
            $mensaje = "No se ha podido acceder a la BBDD";
        }else{
            $provincias = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        }

    }catch(FileException $fileException){
        $mensaje = $fileException->getMessage();
    }



?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <script src="js/jquery-3.6.3.min.js"></script>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <h1>Formulario de registro</h1>
        <form id="formulario">
            <div class="form-group">
                <label for="pwd">Nombre de usuario (NICK)</label><br/>
                <input type="name" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Tu correo electrónico</label><br/>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="urlF">Escribe de nuevo tu correo electrónico</label><br/>
                <input type="email" class="form-control" id="emailRepite" name="emailRepite">
            </div>
            <div class="form-group">
                <label for="prov">Provincia</label><br/>
                <select id="provincias">
                    <?php foreach($provincias as $provincia) : ?> 
                        <option><?= $provincia['nombre'] ?></option>
                    <?php endforeach ?>
                </select><br/>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label><br/>
                <input type="password" class="form-control" id="passw" name="passw">
            </div>
            <div class="form-group">
                <div id="div1" style="font-size: 40px;"></div>
            </div><br/>
            <div class="form-group">
                
                <input type="checkbox"  id="terms"  name="terms" value="terms">Acepto los términos y condiciones
            </div>
        
        <button type="button" class="btn btn-primary" >Enviar datos</button>
        <script>

            
            $(document).ready(function(){
                $("button").click(function(){
                    var nombre = $("#name").val();
                    var email = $("#email").val();
                    var repEmail = $("#emailRepite").val();
                    var provincia = $("#provincias").val();
                    var contrasenya = $("#passw").val();
                    var patternEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
           
                    if(nombre === "" || email === "" || !patternEmail.test(email) || repEmail === "" || !patternEmail.test(repEmail) 
                    || contrasenya === "" ||!$("input[type='checkbox']").is(":checked") ){
                        alert("No se han completado algunos campos");
                    }else{
                        if(String(email) == String(repEmail)){
                            if(contrasenya.length >= 8){
                                $.post("enviaDatos.php",
                                {
                                    nombre: nombre,
                                    email: email,
                                    provincia: provincia,
                                    contrasenya: contrasenya
                                },
                                function(data,status){
                                    alert(data);
                                });
                            
                            }else{
                                alert("La contraseña tiene que tener 8 caracteres o más");
                            }
                        }else{
                            alert("Los correos no coinciden");
                        }
                    }
                });
            });
        </script>
    </body>
</html>