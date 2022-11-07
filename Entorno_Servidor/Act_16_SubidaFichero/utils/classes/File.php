<?php
    class File{
        //Creo las variables privadas 
        private $imagen;
        private string $nombreRealImagen;
        private string $descripcion;
        //El constructor
        function __construct($imagen, string $nombreRealImagen, string $descripcion){
            //Le paso el nombre temporal
            $this->imagen = $imagen;
            //Le paso el nombre real
            $this->nombreRealImagen = $nombreRealImagen;
            //Le paso la descripcion
            $this->descripcion = $descripcion;
        }
        //El getFileName
        function getFileName(){
            return $_FILES['imagen'][$this->imagen];
        }
        //El metodo saveUploadFile donde ocurre la magia
        function saveUploadFile(){
            //Este if se encarga de comprobar si el archivo fue pasado por POST de ahí que necesite el nombre temporal ya que el real no lo acepta
            if(is_uploaded_file ($this->imagen)){
                //La variable arrFiles será un array que contenga todos los nombres de los archivos y directorios del directorio que le pasemos
                //Tip: El metodo getcwd() es para obtener el directorio actual y scandir es para recopilar todos los nombres dentro de un directorio 
                $arrFiles = scandir(getcwd()."/images");
                //Una variable booleana para comprobar que haya un nombre duplicado
                $duplicado = true;
                //Hago el for para comprobar que no hayan nombres duplicados
                for($i = 0;$i<count($arrFiles);$i++){
                    //De haber nombres duplicados, duplicado pasará a true y se saldrá del for
                    if($arrFiles[$i] == $this->nombreRealImagen){
                        $duplicado = true;
                        break 1;
                    }else{
                        //En caso contrario, será false
                        $duplicado = false;
                    }
                }
                //Este if se encargará de comprobar si duplicado está a true, haciendonos saber que hay un duplicado en la carpeta
                if($duplicado == true){
                    //De haber un duplicado, le generaré un nombre aleatorio, poniendolo con letras y numeros aleatorios para que sea más dificil que se repitan
                    $DesdeLetra = "a";
                    $HastaLetra = "z";
                    $DesdeNumero = 1;
                    $HastaNumero = 10000;
                    //Tip: rand, chr, ord son para poder obtener valores random de letras hasta numeros
                    $letraAleatoria = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
                    $numeroAleatorio = rand($DesdeNumero, $HastaNumero);
                    //Le doy un nuevo nombre indicando el viejo y poniendo el nuevo después
                    /*
                    Tip: Es mejor poner los valores aleatorios delante para que así no se solape con la extensión, 
                    haciendo así que el Sistema Operativo no entienda lo que es el archivo, por ello es mejor ponerlos delante que detras.
                    */
                    $nuevoNombre = rename('images/'.$this->nombreRealImagen,'images/'.$letraAleatoria.$numeroAleatorio.$this->nombreRealImagen);
                    //Con el move_uploaded_file he podido copiar el archivo a la ruta que quería
                    move_uploaded_file($this->imagen,$nuevoNombre);
                }else{
                    //En caso de que no esté duplicado, simplemente se copiará a la ruta que le he puesto
                    move_uploaded_file($this->imagen,'images/'.$this->nombreRealImagen);
                }
                //Pondremos por pantalla que los datos se han enviado
                echo "Datos enviados";
            //En caso contrario y que no se cumpla, sacará un FileException    
            }else{
                throw new FileException("Se ha intentado hacer un ataque de fuerza bruta, recargue la página por favor...");
            }
        }
    }
?>