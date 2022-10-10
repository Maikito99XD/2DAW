<!DOCTYPE html>
<html>
	<head>
		<title>Titulo</title>
	</head>
	<body>
		<?php
			include ("CabeceraPagina.php");
            include ("Menu.php");
			include ("Tabla_Base.php");
			include ("Tabla.php");

            $c1 = new Cabecera("titulo","center","red","green");
            $c1->muestraTitulo();
            $m1 = new Menu(5,"vertical","https://www.youtube.com/");
            $m1->generaOpciones();
            $m1->muestraMenu();
			$tabla1 = new Tabla_Base(3,10);
			$tabla1->cargaTabla(1,1,"titulo 1","#356AA0","#FFFF88");
			$tabla1->cargaTabla(1,2,"titulo 2","#356AA0","#FFFF88");
			$tabla1->cargaTabla(1,3,"titulo 3","#356AA0","#FFFF88");
			for($f=2;$f<=10;$f++)
			{
				$tabla1->cargaTabla($f,1,"x","#0000ff","#EEEEEE");
				$tabla1->cargaTabla($f,2,"x","#0000ff","#EEEEEE");
				$tabla1->cargaTabla($f,3,"x","#0000ff","#EEEEEE");
			}
			$tabla1->creaTabla();
			$tabla2 = new Tabla(3,10);
			$tabla2->cargarTabla(1,1,"titulo 1","#356AA0","#FFFF88");
			$tabla2->cargarTabla(1,2,"titulo 2","#356AA0","#FFFF88");
			$tabla2->cargarTabla(1,3,"titulo 3","#356AA0","#FFFF88");
			for($f=2;$f<=10;$f++)
			{
				$tabla2->cargarTabla($f,1,"x","#0000ff","#EEEEEE");
				$tabla2->cargarTabla($f,2,"x","#0000ff","#EEEEEE");
				$tabla2->cargarTabla($f,3,"x","#0000ff","#EEEEEE");
			}
			$tabla2->crearTabla();
			$tabla3 = new Tabla(3,10);
			$celda=new Celda('titulo 1','#356AA0','#FFFF88');
			$tabla3->insertar($celda,1,1);
			$celda=new Celda('titulo 2','#356AA0','#FFFF88');
			$tabla3->insertar($celda,1,2);
			for($f=2;$f<=10;$f++)
			{
				$celda=new Celda('x','#0000ff','#eeeeee');
				$tabla3->insertar($celda,$f,1);
				$celda=new Celda('y','#0000ff','#eeeeee');
				$tabla3->insertar($celda,$f,2);
			}
			$tabla3->crearTablaPartirObjetos();
			
			

		?>
	</body>
</html>