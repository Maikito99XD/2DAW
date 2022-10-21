<?php
    class Session{
        
        function __construct(){
            //Esto es para comprobar que la sesion no esté iniciada
            if(!isset($_SESSION)){
                //De no estarlo la inicia
                session_start();
            }else{
                echo "Sesion ya iniciada";
            }
        }

        private function checkSession($atributo, $fnSet){
            if(
                (session_status() === PHP_SESSION_ACTIVE) && 
                (is_string($atributo)) && (isset($_SESSION[$atributo]) || $fnSet)
            ){
                return true;
            }
            return false;
        }

        function setAttribute($atributo, $valor){
            $_SESSION[$atributo] = $valor;
        }

        public function getAttribute($atributo){
            return $_SESSION[$atributo];
        }

        function deleteAttribute($atributo){
            unset($_SESSION[$atributo]);
        }

        function destroySession(){
            session_destroy();
        }


    }
?>