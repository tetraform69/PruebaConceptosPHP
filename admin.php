<?php
include "user.php";

session_start();

if (empty($_SESSION["user"]))
{
    header("Location: formLogin.php");
    exit();
}

$usuario = $_SESSION["user"];
echo "Usted es el Administrador: " . $usuario->getName();
?>

<a href="logout.php">Cerrar Sesion</a>