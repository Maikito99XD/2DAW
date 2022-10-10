
<?php
    $Saludo = "Hola";

    $anonima = function($nombre) use ($Saludo){
        echo "$Saludo $nombre";
    };

    function saluda($fnSaluda){
        $fnSaluda('Juan');
    }
?>
<?php
    $saludo = "Hola";
    $nom = array();
    $nom1 = ['Pedro','Mike','Javi','German'];
    $alumnos = [
        [
        'nombre' => "Pedro",
        'apellido' => "Sanchez",
        'edad' => 22,
        'phone' => 67863474
        ],
        [
        'nombre' => "Marta",
        'apellido' => "Gimenez",
        'edad' => 23,
        'phone' => 67165614
        ],
        [
        'nombre' => "Maria",
        'apellido' => "Perez",
        'edad' => 25,
        'phone' => 123456789
        ]
    ]
?>

<html>
    <head>
        
    </head>
    <body>
        <?php 
            if (isset ($_GET['nombre'])){
                $nom = $_GET['nombre'];
            }else{
                $nom = "Anonimo";
            }

            echo $nom;
            echo "<br>";
            print_r($alumnos);

            

        ?>

        <ul>
        
        <?php
            foreach($nom1 as $nom){
                echo "<li> Nombre: $nom</li>";
            }
            echo $alumnos[1]['nombre'];
            echo "<ul>";
            foreach($alumnos as $alumno){
                foreach($alumno as $indice=>$valor){
                    echo "<li>$indice: $valor</li>";
                }
            }
            echo "</ul>";
            echo "<br>";
        ?>
        </ul>
        <?php 
           
        //valor por defecto si no queremos pasarle un parametro, siempre hay que pasarlos al final
            //El & es para hacer una referencia a otra variable ya puesta para que la variable pueda almacenarla en la referenciada.
            //Con int estamos definiendo que la salida sea un entero, por ello nos pedirá el return obligatoriamente
            function suma(int &$result, int $b=6, int $c= 2) : int
            {
                return $result = $b+$c;
            }
            $a = 0;
            $resultado = suma($a,1,1); 
            echo "El resultado de la suma es ".$resultado;
            echo "<br>";
        ?>
        <?php 
            $anonima('Alex');
            echo "<br>";
            saluda($anonima);
        ?>
    </body>
</html>