<?php

include "user.php";

$data = array();

session_start();

if (empty($_SESSION["user"]))
{
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION["user"];
$data['status'] = 'ok';
$data['message'] = 'You are admin';
$data['result'] = $usuario->json();
echo json_encode($data);