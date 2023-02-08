<?php
    class Persona{
        private string $nombre;
        private string $apellido;
        private int $edad;
        private int $dni;

        function __construct(string $nombre, string $apellido, int $edad, int $dni){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
            $this->dni = $dni;
        }

        //Getters

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getEdad(){
            return $this->edad;
        }

        public function getDni(){
            return $this->dni;
        }

        //Setters

        public function setNombre(string $nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function setApellido(string $apellido){
            $this->apellido = $apellido;
            return $this;
        }

        public function setEdad(string $edad){
            $this->edad = $edad;
            return $this;
        }

        public function setDni(int $dni){
            $this->dni = $dni;
            return $this;
        }

        //Funciones

        public function mayorEdad(){
            if($this->edad > 18){
                echo "Es mayor de edad";
            }else{
                echo "Es menor de edad";
            }
        }

        public function nombreCompleto(){
            echo "El nombre completo es: ".$this->nombre." ".$this->apellido;
        }

        public function dentificacionCompleta(){
            echo "Su dni es ".$this->dni." y la letra que usa es ".substr ("TRWAGMYFPDXBNJZSQVHLCKEO", $this->dni % 23, 1);
        }
    }
?>