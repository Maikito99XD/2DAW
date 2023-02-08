<html>
    <head>
</head>
<body>
    <?php
        function dividir_exception($x,$y){
            if($y == 0){
                throw new Exception("Error ha ocurrido una division por 0");
            }
            return $x/$y;
        }
        function dividir($x,$y){
           
            return $x/$y;
        }

        try{
            echo dividir(10,0);
        }catch(Error $er){
            echo "<p>Capturada una excepcion: ".$er->getMessage()."</p>";
        }

        try{
            echo dividir_exception(10,0);
            
        }catch(Exception $e){
            echo "<p>Capturada una excepcion: ".$e->getMessage()."</p>";
        }
        finally{
            echo "Esta linea se ejecuta siempre";
        }

        function manejador_personalizado($exception){
            echo "<p>Excepcion personalizada capturada: ".$exception->getMessage();
        }

        set_exception_handler("manejador_personalizado");

        echo dividir(10,0);
    ?>
</body>
</html>