<?php
    require_once 'controllers/userController.php';

    $userController = new UserController();

    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST': 
            $userController->login();
        break;
    }
?>