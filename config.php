<?php
//* se extrae de donde se ejecuto el script de mostrar el index, se obtiene la url actual y luego obtenemos los parametros de la url
$folderPath = dirname($_SERVER['SCRIPT_NAME']);
$urlPath = $_SERVER['REQUEST_URI'];
$url = substr($urlPath, strlen($folderPath));
//* se crea una constante global
define('URL', $url);