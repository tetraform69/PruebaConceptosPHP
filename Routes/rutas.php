<?php
// Importas controladres => A nivel general todo controlador que uses
include_once "/laragon/www/PruebaConceptosPHP/controllers/userController.php";
function rutas()
{
    // handle GET request to /user
    // echo json_encode($_SERVER);
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/user') {
        // Importas Controlador Usuario
        $userController = new UserController();
        // Invocas metodo usuario get all
        // Retornas datos
        echo  json_encode($userController->getAll());
        return;
    }

    // handle GET request to /user?prueba=number
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/user\?id=(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        $userController = new UserController();
        echo json_encode($userController->getOne($index));
        return;
    }
    // handle GET request to /user/index
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/^\/user\/(\w+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        echo '/user/ ' . $index;
        return;
    }
    // handle POST request to /auth
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/auth') {
        echo '/auth';
        return;
    }
    // handle POST request to /user/create
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/user/create') {
        echo '/user/create';
        return;
    }
    // handle PATCH request to /user/index
    if ($_SERVER['REQUEST_METHOD'] === 'PATCH' && preg_match('/^\/user\/(\w+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        echo '/userpatch/ ' . $index;
        return;
    }
    // handle DELETE request to /user/delete
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/user/delete') {
        echo '/user/delete';
        return;
    }
    http_response_code(404);
}
