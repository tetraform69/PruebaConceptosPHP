<?php

include_once "conexion.php";
class User
{
    private $name;
    private $pasword;
    private $rol;
    public $con;

    public function __construct(string $name, string $pasword)
    {
        $this->name = $name;
        $this->pasword = $pasword;
        $this->rol = "user";
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO users(name, pasword, rol) VALUES(:name, :pasword, :rol)");
            $request->bindParam(':name', $this->name);
            $request->bindParam(':pasword', $this->pasword);
            $request->bindParam(':rol', $this->rol);
            $request->execute();
            return "message: User creado";
        } catch (PDOException $err) {
            return "message: Error al crear" . $err->getMessage();
        }
    }

    public function json()
    {
        $data = array("name" => $this->name, "rol" => $this->rol);
        return $data;
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
