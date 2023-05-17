<?php
// Importas controladres => A nivel general todo controlador que uses
include_once("controllers/userController.php");
include_once("midleware.php");
function rutas()
{
    // handle GET request to /users
    // echo json_encode($_SERVER);
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/users') {
        $userController = new UserController();
        echo  json_encode($userController->getAll());
        return;
    }
    // handle GET request to /user?id=number
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/user\?id=(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        $userController = new UserController();
        echo json_encode($userController->getOne($index));
        return;
    }
    // handle GET request to /user/index
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/user\/(\w+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        $userController = new UserController();
        echo json_encode($userController->getOne($index));
        return;
    }
    // handle POST request to /auth
    if (!validateAuth()) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/auth') {
            $message = "Tiene acceso";
            echo $message;
            return;
        }
    } else {
        return http_response_code(401);
    }
    // handle POST request to /user/create
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/user/create') {
        $json_string = file_get_contents('php://input');
        $data = json_decode($json_string);
        $userController = new UserController();
        echo json_encode($userController->create($data->name, $data->pasword));
        return;
    }
    // handle PATCH request to /user/index
    if ($_SERVER['REQUEST_METHOD'] === 'PATCH' && preg_match('/user\/(\w+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        echo '/userpatch/ ' . $index;
        return;
    }
    // handle DELETE request to /user/delete
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && preg_match('/user\/delete\?id=(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        $userController = new UserController();
        echo json_encode($userController->delete($index));
        return;
    }
    http_response_code(404);
}
