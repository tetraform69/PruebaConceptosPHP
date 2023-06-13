<?php
include_once('model/conexion.php');
include_once('model/user.php');

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
            $request = $this->con->getCon()->prepare("SELECT * FROM users WHERE estado = 1");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            return "Error al leer " . $err->getMessage();
        }
    }

    public function getAllAdmin()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM users WHERE rol != 'admin'");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            return "Error al leer " . $err->getMessage();
        }
    }

    public function getOne($id)
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM users WHERE id = :id");
            $request->bindParam(':id', $id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            return "Error al leer " . $err->getMessage();
        }
    }

    public function update($id, $name, $pasword, $estado)
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE users SET name = :name, pasword = :pasword, estado = :estado WHERE id = :id");
            $request->bindParam(':name', $name);
            $request->bindParam(':pasword', $pasword);
            $request->bindParam(':estado', $estado);
            $request->bindParam(':id', $id);
            $request->execute();
            return "Actualizado";
        } catch (PDOException $err) {
            return "Error al actualizar " . $err->getMessage();
        }
    }

    public function state($id, $state)
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE users SET estado = :state WHERE id = :id");
            $request->bindParam(':state', $state);
            $request->bindParam(':id', $id);
            $request->execute();
            if ($state == 0) {
                return "Inactive";
            } else {
                return "Active";
            }
        } catch (PDOException $err) {
            return "Error: " . $err->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $request = $this->con->getCon()->prepare("DELETE FROM users WHERE id = :id");
            $request->bindParam(':id', $id);
            $request->execute();
            return "Eliminado";
        } catch (PDOException $err) {
            return "Error al eliminar " . $err->getMessage();
        }
    }
}
