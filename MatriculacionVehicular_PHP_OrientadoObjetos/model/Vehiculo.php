<?php
    include("../config/Database.php");
    //require_once "../conexion.php";
    //include("../conexion.php");

    class vehiculo{
        

        private $ID;
        private $placa;
        private $marca;
        private $motor;
        private $chasis;
        private $combustible;
        private $anio; 
        private $color;
        private $foto;
        private $avaluo;

        public function __construct()
        {
            
        }

        public function setID($_ID){
            $this->ID = $_ID;
        }
        public function getID(){
            return $this->ID;
        }

        public function setPlaca($_placa){
            $this->placa = $_placa;
        }
        public function getPlaca(){
            return $this->placa;
        }

        public function setMarca($_marca){
            $this->marca = $_marca;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function setMotor($_motor){
            $this->motor = $_motor;
        }
        public function getMotor(){
            return $this->motor;
        }

        public function setChasis($_chasis){
            $this->chasis = $_chasis;
        }
        public function getChasis(){
            return $this->chasis;
        }

        public function setCombustible($_combustible){
            $this->combustible = $_combustible;
        }
        public function getCombustible(){
            return $this->combustible;
        }

        public function setAnio($_anio){
            $this->anio = $_anio;
        }
        public function getAnio(){
            return $this->anio;
        }
        
        public function setColor($_color){
            $this->color = $_color;
        }
        public function getColor(){
            return $this->color;
        }
        
        public function setFoto($_foto){
            $this->foto = $_foto;
        }
        public function getFoto(){
            return $this->foto;
        }
   
        public function setAvaluo($_avaluo){
            $this->avaluo = $_avaluo;
        }
        public function getAvaluo(){
            return $this->avaluo;
        }

        public function insertarVehiculo(){
            $conn = new Database();
            
            $sql = "Insert into vehiculo (id,placa,marca,motor,chasis,combustible, anio, color, foto,avaluo) values (null,?,?,?,?,?,?,?,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("sssssssss",$this->placa,$this->marca,$this->motor,$this->chasis,$this->combustible,$this->anio,$this->color,$this->foto,$this->avaluo);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function buscarTodos(){
            $conn = new Database();
            $sql = "select * from vehiculo;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;

        }
        public function buscarMarca($num){
            $conn = new Database();
            $sql = "select * from marca where idmarca = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$num);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;

        }
        public function buscarColor($num){
            $conn = new Database();
            $sql = "select * from color where idcolor = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$num);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;
        }


    }


?>