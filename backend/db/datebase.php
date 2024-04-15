<?php
    require_once '../config/config.php';

    class Database {
        private $conn; 

        public function __contruct() {
            $this->conm = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->conn->connect_error) {
                die('ERROR de conexion!' . $this->conn->connect_error);
            }
        }

        public function getConnection() {
            return $this->conn;
        }
    }
?>