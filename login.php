<?php

include 'controllers/userController.php';

$userController = new UserController();
$users = $userController->getAll();

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);

$name_consulta = $data->name;
$pasword_consulta = $data->pasword;

foreach ($users as $user) {
    if ($user['name'] == $name_consulta && $user['pasword'] == $pasword_consulta) {
        session_start();
        $_SESSION["user"] = $user;
        $json['status'] = 'ok';
        $json['message'] = 'You have Login';
    }
}

echo json_encode($json);
