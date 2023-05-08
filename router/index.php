<?php
//* __DIR__ = directorio actual
//* htaccess le dice que al server que no importa si la ruta no existe lo manda al index
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/router.php');

$router = new Router();
$router->run();