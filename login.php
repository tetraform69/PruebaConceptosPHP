<?php

include 'user.php';

$users = array();
$rol_site = [
    'admin' => 'Location: admin.php',
    'user' => 'Location: user.php'
];

$admin = new user('Admin', '1234', 'admin');
$user = new user('Camilo', '9876', 'user');

$users[$admin->getName()] = $admin;
$users[$user->getName()] = $user;

$name_consulta = $_POST['name'];
$pasword_consulta = $_POST['pasword'];

if (!array_key_exists($name_consulta, $users))
{
    echo "El usuario no existe";
} 
else 
{
    $usuario = $users[$name_consulta];
    if ($usuario->getPasword() != $pasword_consulta)
    {
        echo "Contraseña Incorrecta";
    }
    else
    {
        session_start();
        $_SESSION["user"] = $usuario;
        header($rol_site[$usuario->getRol()]);
    }
}
