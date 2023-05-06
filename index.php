<?php

include "user.php";

$data = array();

if (empty($_SESSION["user"]))
{
    header("Location: login.php");
    exit();
}