<?php

require_once(__DIR__ . '/../../Conexion.php');

class Administradores extends Conexion {

    public function __construct() {
        parent::__construct();

        // Validación opcional para verificar conexión
        if (!isset($this->db)) {
            die("Error: No se pudo establecer la conexión con la base de datos.");
        }
    }

    public function add($Nombre, $Apellido, $Usuario, $Password){
        $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, USUARIO, PASSWORD, PERFIL, ESTADO) VALUES (:Nombre, :Apellido, :Usuario, :Password, 'Administrador', 'Activo')");
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);

        if ($statement->execute()){
            header('Location: ../Pages/index.php');
        } else {
            header('Location: ../Pages/Add.php');
        }
    }

    public function get(){
        $rows = [];
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador'");
        $statement->execute();

        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $result;
        }

        return $rows;
    }

    public function getByID($Id){
        $rows = [];
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador' AND ID_USUARIO = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->execute();

        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $result;
        }

        return $rows;
    }

    public function update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado) {
        $statement = $this->db->prepare("UPDATE usuarios SET NOMBRE = :Nombre, APELLIDO = :Apellido, USUARIO = :Usuario, PASSWORD = :Password, ESTADO = :Estado WHERE ID_USUARIO = :Id");
        $statement->bindParam(":Id", $Id);
        $statement->bindParam(":Nombre", $Nombre);
        $statement->bindParam(":Apellido", $Apellido);
        $statement->bindParam(":Usuario", $Usuario);
        $statement->bindParam(":Password", $Password);
        $statement->bindParam(":Estado", $Estado);

        if ($statement->execute()) {
            header('Location: ../Pages/index.php');
        } else {
            header('Location: ../Pages/Edit.php');
        }
    }

    public function delete($Id) {
        $statement = $this->db->prepare("DELETE FROM usuarios WHERE ID_USUARIO = :Id");
        $statement->bindParam(":Id", $Id);

        if ($statement->execute()) {
            header('Location: ../Pages/index.php');
        } else {
            header('Location: ../Pages/Delete.php');
        }
    }
}
?>