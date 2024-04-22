<?php
    // Para realizar las operaciones, requerimos de:
    require_once '../services/userServices.php';

    class userController {
        private $userService;

        public function __constructor() {
            // Otorgamos acceso a la base de datos:
            $db = (new Database())->getConnection();
            $this->userService = new UserService($db);
        }

        // Primera funcion a manejar: 
        public function login() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];

                if(!empty($usuario) && !empty($password)) {
                    $user = $this->userService->login($usuario, $password);
                    
                    if($user) {
                        // Redirigirme a otra pagina
                        echo json_decode(array("success" => true), "message" => "Inicio Satisfactorio");
                    }
                } else {
                    echo json_decode(array("success" => false), "message" => "Credenciales Incorrectas");
                }
            } else {
                echo json_decode(array("success" => false), "message" => "Tipo de peticion Incorrecta");
            }
        }
    }
?>