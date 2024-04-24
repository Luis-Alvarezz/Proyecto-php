<?php
    // Para realizar las operaciones, requerimos de:
    require_once '../services/userServices.php';

    class userController {
        private $userService;

        public function __constructor() { // constructor sirve para definir a lo que tendra acceso, en este caso a la base de datos
            // Otorgamos acceso a la base de datos:
            $db = (new Database())->getConnection();
            $this->userService = new UserService($db); // La variable local userService, le damos acceso a todos los metodos creados en el servidio y desde aqui mandarlos a llamar
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