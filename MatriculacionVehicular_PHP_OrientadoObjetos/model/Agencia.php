<?php
    include("../config/Database.php");
    class agencia{

        private $ID;
        private $descripcion;
        private $direccion;
        private $telefono;
        public function __construct()
        {
            
        }

        public function setID($_ID){
            $this->ID = $_ID;
        }
        public function getID(){
            return $this->ID;
        }

        public function setFecha($_descripcion){
            $this->descripcion= $_descripcion;
        }
        public function getFecha(){
            return $this->descripcion;
        }

        public function setVehiculo($_dir){
            $this->direccion = $_dir;
        }
        public function getVehiculo(){
            return $this->direccion;
        }

        public function setAgencia($_telf){
            $this->telefono= $_telf;
        }
        public function getNombre(){
            return $this->telefono;
        }

        public function buscarAgencias(){
            $conn = new Database();
            $sql = "select * FROM agencia;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;

        }

    }


?>