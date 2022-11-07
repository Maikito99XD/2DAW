<?php
    class FileException extends Exception{
        //Creo la variable mensaje
        private string $mensaje;
        //El constructor
        function __construct(string $messaje){
            parent::__construct($messaje);
            $this->mensaje = $messaje;
        }
        //La funcion mensajeError que nos mostrará el mensaje de erro que haya sucedido.
        function mensajeError(){
            //El mensaje que le hayamos pasado será el que saldrá por pantalla.
            echo $this->mensaje;
        }
    }
?>