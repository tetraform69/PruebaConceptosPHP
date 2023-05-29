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
    //* POST /login
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/login') {
        if (!isset($_SESSION['user'])) {
            $userController = new UserController();
            $users = $userController->getAll();

            $json_string = file_get_contents('php://input');
            $data = json_decode($json_string);

            $name_consulta = $data->name;
            $pasword_consulta = $data->pasword;
            
            foreach ($users as $user) {
                if ($user['name'] == $name_consulta && $user['pasword'] == $pasword_consulta) {
                    $_SESSION["user"] = $user;
                    $json['status'] = 'ok';
                    $json['message'] = 'You have Login';
                }
            }
        } else {
            $json['message'] = 'you have a session started';
        }
        echo json_encode($json);
        return;
    }
    //* POST logout
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/PruebaConceptosPHP/logout') {
        if (isset($_SESSION['user'])) {
            session_destroy();

            $json['status'] = 'ok';
            $json['message'] = 'You Logout';

        } else {
            $json['message'] = "you haven't a session";
        }
        echo json_encode($json);
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
        $json_string = file_get_contents('php://input');
        $data = json_decode($json_string);
        $userController = new UserController();
        echo json_encode($userController->update($index, $data->name, $data->pasword));
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
