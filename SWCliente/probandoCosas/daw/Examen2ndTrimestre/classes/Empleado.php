<?php
    class Empleado{
        private $id;
        private $name;
        private $sexo;
        private $fechaNacimiento;
        private $fechaIncorporacion;
        private $salario;
        private $comision;
        private $cargo;
        private $jefe;
        private $codDepartamento;

        function construct($id,$name,$sexo,$fechaNacimiento,$fechaIncorporacion,$salario,
            $comision,$cargo,$jefe,$codDepartamento){

        }

        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of sexo
         */ 
        public function getSexo()
        {
                return $this->sexo;
        }

        /**
         * Get the value of fechaNacimiento
         */ 
        public function getFechaNacimiento()
        {
                return $this->fechaNacimiento;
        }

        /**
         * Get the value of fechaIncorporacion
         */ 
        public function getFechaIncorporacion()
        {
                return $this->fechaIncorporacion;
        }

        /**
         * Get the value of salario
         */ 
        public function getSalario()
        {
                return $this->salario;
        }

        /**
         * Get the value of comision
         */ 
        public function getComision()
        {
                return $this->comision;
        }

        /**
         * Get the value of cargo
         */ 
        public function getCargo()
        {
                return $this->cargo;
        }

        /**
         * Get the value of jefe
         */ 
        public function getJefe()
        {
                return $this->jefe;
        }

        /**
         * Get the value of codDepartamento
         */ 
        public function getCodDepartamento()
        {
                return $this->codDepartamento;
        }
    }
?>