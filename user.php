<?php

class User
{
    private $name;
    private $pasword;
    private $rol;

    public function __construct(string $name, string $pasword, string $rol)
    {
        $this->name = $name;
        $this->pasword = $pasword;
        $this->rol = $rol;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of pasword
     */
    public function getPasword()
    {
        return $this->pasword;
    }

    /**
     * Set the value of pasword
     */
    public function setPasword($pasword)
    {
        $this->pasword = $pasword;

        return $this;
    }
}
