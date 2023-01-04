<?php
    include("../config/Database.php");
    class usuarioModel{

        private $ID;
        private $nombre;
        private $usuario;
        private $pass;
        private $rol;
        private $status;

        public function __construct()
        {
            
        }

        public function setID($_ID){
            $this->ID = $_ID;
        }
        public function getID(){
            return $this->ID;
        }

        public function setNombre($_nombre){
            $this->nombre= $_nombre;
        }
        public function getNombre(){
            return $this->nombre;
        }


        public function setUsuario($_usuario){
            $this->usuario= $_usuario;
        }
        public function getUsuario(){
            return $this->usuario;
        }

        public function setPass($_pass){
            $this->pass = $_pass;
        }
        public function getPass(){
            return $this->pass;
        }

        public function setRol($_rol){
            $this->rol= $_rol;
        }
        public function getRol(){
            return $this->rol;
        }

        public function setStatus($_status){
            $this->status= $_status;
        }
        public function getStatus(){
            return $this->status;
        }



        public function buscarUsuario(){
            $conn = new Database();
            $sql = "select * FROM usuario WHERE nombre = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$this->nombre);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;

        }

    }


?>