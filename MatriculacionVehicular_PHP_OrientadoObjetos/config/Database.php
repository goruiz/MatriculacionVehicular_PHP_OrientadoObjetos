<?php

    class Database{
        private $dbhost = "localhost:33065";
        private $dbuser = "root";
        private $dbPWD = "";
        private $dbName = "matriculacion";


        public function __construct()
        {
            $this->ms = new mysqli($this->dbhost, $this->dbuser, $this->dbPWD, $this->dbName);
            if ($this->ms->connect_error) {
                die("Connection failed: " . $this->ms->connect_error);
             }
            //echo "Connected successfully";
            return $this->ms;
        }

        public function __destruct()
        {
            $this->ms->close();
        }

        
    }


?>