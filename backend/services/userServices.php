<?php
    require_once '../models/user.php';
    require_once '../db/datebase.php';
    require_once '../interfaces/userInterface.php';

    class UserService implements userInterface {
        private $db;

        public function __constructor($db) {
            $this->db = $db;
        }

        public function registrarUsuario($usuario) {
            $nombre = $usuario->getNombre();
            $apaterno = $usuario->getApaterno();
            $amaterno = $usuario->getAmaterno();
            $direccion = $usuario->getDireccion();
            $telefono = $usuario->getTelefono();
            $correo = $usuario->getCorreo();
            $userName = $usuario->getUsuario();
            $password = password_hash($usuario->getPassword(), PASSWORD_DEFAULT); 

            // Query que recibe la base de datos
            $sql_insertar = "INSERT INTO usuarios (nombre, apaterno, amaterno, direccion, telefono, correo, usuario, password) 
                            VALUES(null, '$nombre', '$apaterno', '$amaterno', '$direccion', '$telefono', '$correo', '$userName', '$password',)";

            if($this->db->query($sql_insertar) === TRUE) 
                return true;
            else 
                return false;
        }

        public function login($usuario, $password) {
            $sql_usuario = "SELECT * usuarios WHERE usuario = '$usuario' ";

            $result = $this->db->query($sql_usuario);

            if($result->num_rows == 1) {
                $user = $result->fetch_assoc(); // Convertimos a arreglo el resultado de la query.
                if(password_verify($password, $user['password'])) {
                    return $user;
                }
            }
            return false;
        }

        // Funcion para seleccionar TODOS los Usuario:
        public function obtenerTodosUsuarios() {
            $sql = "SELECT * FROM usuarios";
            $result = $this->db->query($sql);
            $users = array(); // Como pueden ser varios usuarios, los almacenamos en arreglos

            // Si hay mas de 1 usuario, guardamos 1 a 1 en un arreglo
            if($result->num_rows > 0) {
                while($row = $result-> fetch_assoc()) {
                    $users[] = $row;
                }
            }
            return $users;
        }

        // Funcion para actualizar usuarios:
        public function actualizarUsuario($usuario) {
            // Tomar en cuenta los criterios de integridad !! - Uno como programador debe pensar bien en esto.
            $id = $usuario->getId();
            $nombre = $usuario->getNombre();
            $apaterno = $usuario->getApaterno();
            $amaterno = $usuario->getAmaterno();
            $direccion = $usuario->getDireccion();
            $telefono = $usuario->getTelefono();
            $correo = $usuario->getCorreo();
            $userName = $usuario->getUsuario();

            // Escribimos Query para actualizar:
            $sql_update = "UPDATE usuarios SET nombre = '$nombre', apaterno = '$apaterno', 
                            amaterno = '$amaterno', direccion = '$direccion', telefono = '$telefono'
                            correo = '$correo', username = '$usuario'  
                            WHERE id = '$id' ";

            if($this->db->query($sql_update) == TRUE) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        // Funcion para borrar usuario:
        public function borrarUsuario($id) {
            $sql_borrar = "DELETE FROM usuarios WHERE id = '$id' ";
            if(this->db->query($sql_borrar)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        // Funcion para seleccionar Usuario por id:
        public function obtenerUsuarioPorId($id) {
            $sql = "SELECT * FROM usuarios WHERE id='$id' ";
            $result = $this->db->query($sql);
            // $users = array();

            if($result->num_rows = 1) {
                return $row = $result-> fetch_assoc();
            }
            return null;
        }

        // Funcion para buscar usuario por correo: 
        public function obtenersUsuarioPorCorreo($correo) {
            $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
            $result = $this->db->query($sql);
            // $users = array();

            if($result->num_rows = 1) {
                return $row = $result-> fetch_assoc();
            }
            return null;
        }
    }
?>