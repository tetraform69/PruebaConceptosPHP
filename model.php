<?php

declare(strict_types=1);

namespace Acme;

use \Vendor\Foo\{ClassA as A, ClassB};
use \Vendor\Bar;

use function Vendor\Package\{functionA, functionB, functionC};

use const Another\Vendor\CONSTANT_D;

//TODO este documento es para tener de ejemplo de la estructura y los estandares de PHP
//! Varias cosas usadas no existen, por eso da error

class MyClass extends ParentClass implements 
  MyFirstInterface, 
  MySecondInterface
{
    use MyTrait; //* Si se usan traits se deben poner despues de la llave de apertura
}

public function fooBarBaz($arg1, &$arg2, $arg3 = [])
{
    //* Funcion con los argumentos en una linea
}

public function fooBarBaz(
    int $arg1, 
    string $arg2, 
    array $arg3 = []
) {
    //* Funcion con los argumentos en varias lineas
}