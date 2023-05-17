<?php
include_once ('model/conexion.php');
include_once ('model/conexion.php');

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

    public function update($id, $name, $pasword)
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE users SET name = :name, pasword = :pasword WHERE id = :id");
            $request->bindParam(':name', $name);
            $request->bindParam(':pasword', $pasword);
            $request->bindParam(':id', $id);
            $request->execute();
            return "Actualizado";
        } catch (PDOExeption $err) {
            return "Error al actualizar" . $err->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $request = $this->con->getCon()->prepare("DELETE FROM users WHERE id = :id");
            $request->bindParam(':id', $id);
            $request->execute();
            return "Eliminado";
        } catch (PDOExeption $err) {
            return "Error al eliminar" . $err->getMessage();
        }
    }
}
