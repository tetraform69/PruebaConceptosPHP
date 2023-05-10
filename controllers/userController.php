<?php
include '/laragon/www/PruebaConceptosPHP/model/conexion.php';
include '/laragon/www/PruebaConceptosPHP/model/user.php';

class UserController
{
    public $con;

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create($name, $pasword)
    {
        $user = new User($name, $pasword);
        return $user->create();
    }

    public function getAll()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM users");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOExeption $err) {
            return "Error al leer" . $err->getMessage();
        }
    }

    public function getOne($id)
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT id, name, rol FROM users WHERE id = :id");
            $request->bindParam(':id', $id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOExeption $err) {
            return "Error al leer" . $err->getMessage();
        }
    }
}
