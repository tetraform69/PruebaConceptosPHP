<?php

include 'controllers/userController.php';

$userController = new UserController();
$users = $userController->getAll();
$json = array();

try {

    $json_string = file_get_contents('php://input');
    $data = json_decode($json_string);

    $name_consulta = $data->name;
    $pasword_consulta = $data->pasword;

    var_dump($users);

    foreach ($users as $user) {
        if ($user['name'] == $name_consulta && $user['pasword'] == $pasword_consulta) {
            session_start();
            $_SESSION["user"] = $user;
        }
    }

    if (!array_key_exists($name_consulta, $users)) {
        $json['status'] = 'error';
        $json['result'] = 'No existe un usuario con esos datos';
    } else {
        $usuario = $users[$name_consulta];
        if ($usuario->getPasword() != $pasword_consulta) {
            $json['status'] = 'error';
            $json['result'] = 'contraseña incorrecta';
        } else {
            session_start();
            $_SESSION["user"] = $usuario;
            $json['status'] = 'ok';
            $json['message'] = 'You have Login';
            $json['result'] = $usuario->json();
        }
    }
} catch (RuntimeException $e) {
    $json['status'] = 'error';
    $json['result'] = $e->getMessage();
}
echo json_encode($json);
