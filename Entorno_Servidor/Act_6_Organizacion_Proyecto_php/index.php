<!---Ejercicio 1:  Separar la logica y ponerla encima del DOCTYPE--->
<?php
    $alumnos = [
        [
        'nombre' => 'Pedro',
            'apellido' => 'García',
            'email' => 'pedro@gmail.com',
            'fecha' => '10/09/2000',
        ],
        [
            'nombre' => 'Carlos',
            'apellido' => 'Ruiz',
            'email' => 'carlos@gmail.com',
            'fecha' => '20/03/1999',
        ],
        [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan@gmail.com',
            'fecha' => '18/06/2002',
        ]
    ];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellido = trim(htmlspecialchars($_POST['apellido']));
        $email = trim(htmlspecialchars($_POST['email']));
        $fecha = trim(htmlspecialchars($_POST['fecha']));
        //Esto es para validar que los datos del alumno nuevo están bien y no hay ningún error para mostrarlo
        $validado = false;
        $nuevoAlumno = array();
        if(!empty($nombre) && !empty($email) && !empty($fecha)){
        echo "<h1>Tema 1: Actividad 6</h1>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Apellido: $apellido</p>";
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                echo "<p> El correo electrónico no es correcto";
                $validado = false;
            }
            else{
                echo "<p>e-mail: $email</p>";
                array_push($nuevoAlumno,$email);
                if (DateTime::createFromFormat('d/m/Y', $fecha) === false){
                    echo "<p> La fecha no es correcta";
                    $validado = false;
                }
                else{
                    echo "<p>Fecha: $fecha</p>";
                    $validado = true;
                }
            }
            if($validado){
                array_push($alumnos, ['nombre' => $nombre,'apellido' => $apellido,'email' => $email, 'fecha' => $fecha]);
            }
        }
        else
            echo "Alguno de los campos requeridos se ha quedado vacío";
    }  
    require_once 'views/formulario.view.php';
?>