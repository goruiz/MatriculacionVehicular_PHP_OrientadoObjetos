<?php
    include("../config/Database.php");
    class matricula{

        private $ID;
        private $fecha;
        private $vehiculo;
        private $agencia;
        private $anio;
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

        public function setFecha($_fecha){
            $this->fecha= $_fecha;
        }
        public function getFecha(){
            return $this->fecha;
        }

        public function setVehiculo($_vehiculo){
            $this->vehiculo = $_vehiculo;
        }
        public function getVehiculo(){
            return $this->vehiculo;
        }

        public function setAgencia($_agencia){
            $this->agencia= $_agencia;
        }

        public function getAgencia(){
            return $this->agencia;
        }

        public function setAnio($_anio){
            $this->anio= $_anio;
        }
        public function getAnio(){
            return $this->anio;
        }

        public function setStatus($_status){
            $this->status = $_status;
        }
        public function getStatus(){
            return $this->status;
        }



        public function buscarMatricula(){
            $conn = new Database();
            $sql = "select * FROM matricula;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;

        }

        public function insertarMatricula(){
            $conn = new Database();
            $sql = "Insert into matricula (id,fecha,vehiculo,agencia,anio,status) values (null,?,?,?,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("siiss",$this->fecha,$this->vehiculo,$this->agencia,$this->anio,$this->status);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function buscarVehiculo($num){
            $conn = new Database();
            $sql = "select * from vehiculo where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$num);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;
        }
        public function buscarAgencia($num){
            $conn = new Database();
            $sql = "select * from agencia where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$num);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();;
        }
        
        public function cambiarStatus($num){
            $conn = new Database();
            $sql = "update matricula SET status ='aprobado' WHERE id = ?";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$num);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);

        }

        public function cambiarStatusDenegado($num){
            $conn = new Database();
            $sql = "update matricula SET status ='denegado' WHERE id = ?";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$num);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        
        

    }


?>