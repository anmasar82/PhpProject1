<?php

require_once('../../Conexion.php');

class Materias extends Conexion {

    protected $db; // ← Corregido: coincide con la clase padre 'Conexion'

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion(); // ← Usa el método definido en Conexion.php
    }

    public function add($Materia) {
        $statement = $this->db->prepare("INSERT INTO materias (MATERIA) VALUES (:Materia)");
        $statement->bindParam(':Materia', $Materia);
        if ($statement->execute()) {
            header('Location: ../Pages/index.php');
        } else {
            header('Location: ../Pages/Add.php');
        }
    }

    public function get() {
        $rows = [];
        $statement = $this->db->prepare("SELECT * FROM materias");
        $statement->execute();
        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getById($Id) {
        $rows = [];
        $statement = $this->db->prepare("SELECT * FROM materias WHERE ID_MATERIA = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->execute();
        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($Id, $Materia) {
        $statement = $this->db->prepare("UPDATE materias SET MATERIA = :Materia WHERE ID_MATERIA = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Materia', $Materia);
        if ($statement->execute()) {
            header('Location: ../Pages/index.php');
        } else {
            header('Location: ../Pages/Edit.php');
        }
    }

    public function delete($Id) {
        $statement = $this->db->prepare("DELETE FROM materias WHERE ID_MATERIA = :Id");
        $statement->bindParam(':Id', $Id);
        if ($statement->execute()) {
            header('Location: ../Pages/index.php');
        } else {
            header('Location: ../Pages/Delete.php');
        }
    }
}

?>