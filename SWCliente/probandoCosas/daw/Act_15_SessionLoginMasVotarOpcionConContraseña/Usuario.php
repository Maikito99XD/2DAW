<?php
    class Usuario{
        private string $usuario;
        private string $contrasenya;

        function __construct(string $usuario, string $contrasenya){
            $this->usuario = $usuario;
            $this->contrasenya = $contrasenya;
        }

        function validarClave(){
            //Estos contadores los uso para saber si hay letras minusculas, mayusculas o numericas
            $contadorMayusculas = 1;
            $contadorMinusculas = 1;
            $contadorNumerico = 1;
            //Creo el array
            $guardaMensajesError = [];
            if(strlen($this->contrasenya) >= 6 && strlen($this->contrasenya) <= 16){
                for($i = 0;$i<strlen($this->contrasenya);$i++){
                    if(is_numeric($this->contrasenya[$i])){
                        $contadorNumerico = $contadorNumerico - 1;
                    }else if(ctype_upper($this->contrasenya[$i])){
                        $contadorMayusculas = $contadorMayusculas - 1;
                    }else if(ctype_lower($this->contrasenya[$i])){
                        $contadorMinusculas = $contadorMinusculas - 1;
                    }
                }
                //Guardo los mensajes en el array guardaMensajesError
                if($contadorMayusculas > 0){
                    $guardaMensajesError[] = "La contraseña tiene que tener al menos una letra mayúscula!<br>";
                    
                }

                if($contadorMinusculas > 0){
                    $guardaMensajesError[] = "La contraseña tiene que tener al menos una letra minuscula!<br>";
                    
                }

                if($contadorNumerico > 0){
                    $guardaMensajesError[] = "La contraseña tiene que tener al menos un carácter númerico!<br>";
                }

            }else{
                $guardaMensajesError[] = "La contraseña tiene menos de 6 o más de 16 carácteres!<br>";
            }
            //Devuelvo el array
            return $guardaMensajesError;

        }

    }
?>