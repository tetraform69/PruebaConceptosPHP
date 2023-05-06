<?php

include 'user.php';

$users = array();
$json = array();
$rol_site = [
    'admin' => 'Location: admin.php',
    'user' => 'Location: index.php'
];

$admin = new user('Admin', '1234', 'admin');
$user = new user('Camilo', '9876', 'user');

$users[$admin->getName()] = $admin;
$users[$user->getName()] = $user;

$json_string = file_get_contents('php://input');
$data = json_decode($json_string);

$name_consulta = $data->name;
$pasword_consulta = $data->pasword;

if (!array_key_exists($name_consulta, $users))
{
    $json['status'] = 'error';
    $json['result'] = 'No existe un usuario con esos datos';
    echo json_encode($json);
} 
else 
{
    $usuario = $users[$name_consulta];
    if ($usuario->getPasword() != $pasword_consulta)
    {
        $json['status'] = 'error';
        $json['result'] = 'contraseña incorrecta';
        echo json_encode($json);
    }
    else
    {
        session_start();
        $_SESSION["user"] = $usuario;
        header($rol_site[$usuario->getRol()]);
    }
}
