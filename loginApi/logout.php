<?php

session_start();
session_destroy();

$json = array();

$json['status'] = 'ok';
$json['message'] = 'You Logout';

echo json_encode($json);