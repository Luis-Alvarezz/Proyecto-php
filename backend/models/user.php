<?php
    class User() {
        private $id;
        private $nombre;
        private $apaterno;
        private $amaterno;
        private $direccion;
        private $telefono;
        private $correo;
        private $usuario;
        private $password;

        // Crecion del Constructor de la clase
        public function __contruct($id, $nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password) {
            $this->nombre = $nombre;
            $this->apaterno = $apaterno;
            $this->amaterno = $amaterno;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->usuario = $usuario;
            $this->password = $password;

        }
        // Getters y Setters para cada una de las propiedades 
        public function getId() {
            return $this->id; // Getter
        }
        public function setId($id) {
            $this->id = $id // Setter
        }

        public function getNombre() {
            return $this->nombre; // Getter
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre // Setter
        }

        public function getApaterno() {
            return $this->apaterno; // Getter
        }
        public function setApaterno($apaterno) {
            $this->apaterno = $apaterno// Setter
        }

        public function getAmaterno() {
            return $this->amaterno; // Getter
        }
        public function setAmaterno($amaterno) {
            $this->amaterno = $amaterno // Setter
        }

        public function getDireccion() {
            return $this->direccion; // Getter
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion // Setter
        }

        public function getTelefono() {
            return $this->telefono; // Getter
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono // Setter
        }

        public function getCorreo() {
            return $this->correo; // Getter
        }
        public function setCorreo($correo) {
            $this->correo = $correo // Setter
        }

        public function getUsuario() {
            return $this->usuario; // Getter
        }
        public function setUsuario($usuario) {
            $this->usuario = $usuario // Setter
        }

        public function getPassword() {
            return $this->password; // Getter
        }
        public function setPassword($password) {
            $this->password = $password // Setter
        }
    }
?>