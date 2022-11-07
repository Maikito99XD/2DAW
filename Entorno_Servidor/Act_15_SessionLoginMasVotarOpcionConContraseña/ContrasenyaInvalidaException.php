<?php
    class ContrasenyaInvalidaException extends Exception{

        private array $mensaje;

        function __construct(array $message){
            //Aquí le quito el parent ya que no acepta arrays, le asigno el array que se me pase a la variable mensaje
            //parent::__construct($message);
            $this->mensaje = $message;
        }

        //Aquí recorro el array y saco por pantalla todos los mensajes que haya en el array
        public function contrasenyaInvalida(){
            for($i = 0;$i<count($this->mensaje);$i++){
                echo $this->mensaje[$i];
            }
            
        } 
    }
?>