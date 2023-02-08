<?php
	include "views/titulo.view.php";

	if(!isset($_SESSION)){
		session_start();
	}
	if(!isset($_SESSION['alumnos'])){
		$_SESSION['alumnos'] = array();
	}

//	$alumnos = [
//		[
//			'nombre' => 'Pedro',
//			'apellido' => 'García',
//			'email' => 'pedro@gmail.com',
//			'fecha' => '10/09/2000',
//		],
//		[
//			'nombre' => 'Carlos',
//			'apellido' => 'Ruiz',
//			'email' => 'carlos@gmail.com',
//			'fecha' => '20/03/1999',
//		],
//		[
//			'nombre' => 'Juan',
//			'apellido' => 'Pérez',
//			'email' => 'juan@gmail.com',
//			'fecha' => '18/06/2002',
//		]
//	];

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$nombre = trim(htmlspecialchars($_POST['nombre']));
		$apellido = trim(htmlspecialchars($_POST['apellido']));
		$email = trim(htmlspecialchars($_POST['email']));
		$fecha = trim(htmlspecialchars($_POST['fecha']));
		$validacionOK = true;

		if(!empty($nombre) && !empty($email) && !empty($fecha)){
			echo "<p>Nombre: $nombre</p>";
			echo "<p>Apellido: $apellido</p>";
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				$validacionOK = false;
				echo "<p> El correo electrónico no es correcto";
			}
			else
				echo "<p>e-mail: $email</p>";
			if (DateTime::createFromFormat('d/m/Y', $fecha) === false){
				$validacionOK = false;
				echo "<p> La fecha no es correcta";
			}
			else
				echo "<p>Fecha: $fecha</p>";
		}
		else{
			$validacionOK = false;
			echo "Alguno de los campos requeridos se ha quedado vacío";
		}
		if($validacionOK == true){
			$alumno = ['nombre'=>$nombre, 'apellido'=>$apellido, 'email'=>$email, 'fecha'=>$fecha];

			$_SESSION['alumnos'][] = $alumno;
		}
	}
	else{
		$nombre = '';
		$apellido = '';
		$email = '';
		$fecha = '';
	}

	require "views/formulario.view.php";

?>
