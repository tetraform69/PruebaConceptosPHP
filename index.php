<?php
//* __DIR__ = directorio actual
//* htaccess le dice que al server que no importa si la ruta no existe lo manda al index
require_once('Routes/rutas.php');

session_start();

if (!empty($_SESSION["user"])) {
    rutas();
} else {
    $json['message'] = "Debe iniciar sesion";
    echo json_encode($json);
    session_destroy();
}