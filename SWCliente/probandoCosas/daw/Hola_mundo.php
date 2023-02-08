<!DOCTYPE html>
<html>
	<body>
	<head>
		<title>Hello world</title
	</head>
	</body>
		<?php
			//define es para definir una constante
			define("Lim", 400);
			//Variables
			$var= "6";
			
			echo "Hello world <br>";
			echo "$var <br>";
			//Comillas simples es para definir un literal, las dobles es para definir una o varias variables
			
			$var1 = "3";
			if($var1 < 0) echo "Es menor que cero";
			if($var1 > 0) echo "Es mayor que cero";
			for($i=0;$i<$var1;$i++){
				echo "<br>$i";
			}
			echo "<br>";
			$var2 = 3;
			switch($var2){
				case 1:
					echo "Es un $var2";
					break;
				case 2: 
					echo "Es un $var2";
					break;
				case 3:
					echo "Es un $var2";
					break;
				default:
					echo "No es ninguno";
					break;
			}
			echo "<br>";
			$x = 0;
			while($x < 5){
				echo "$x <br>";
				$x+= 1;
			}
			//Break acepta que le pongas 1,2,3 para poder romper los bucles o ifs que quieras salir
			// 3 iguales (===) es para comparar tanto el valor como el tipo de la variable
			
			$igu1=3;
			$igu2="3";
			if($igu1 == $igu2){
				echo "Son iguales";
			}else{
				echo "No son iguales";
			}
			echo "<br>";
			if($igu1 === $igu2){
				echo "Son iguales";
			}else{
				echo "No son iguales";
			}
			echo "<br>";
			//!== Se utiliza para saber que tanto el valor como el tipo no son iguales de las variables
			if($igu1 !== $igu2){
				echo "No son iguales";
				
			}else{
				echo "Son iguales";
			}
			//Para hacer la potencia es **
			$igu3 = $igu1**$igu2;
			echo "<br> $igu3";
		?>
	</body
</html>