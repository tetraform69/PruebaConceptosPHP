<?php

function validateAuth()
{
    if (isset($_SERVER['HTTP_AUTH'])) {
        $auth = $_SERVER['HTTP_AUTH'];
        return $auth == 3;
    }
    return false;
}

function validateNumber()
{
    if (isset($_SERVER['HTTP_NUMBER'])) {
        $number = $_SERVER['HTTP_NUMBER'];

        if (!is_numeric($number)) {
            echo "No es un numero";
            return false;
        }

        if ($number != 3) {
            echo "El numero no es igual a 3";
            return false;
        }

        return true;
    }

    return false;
}
