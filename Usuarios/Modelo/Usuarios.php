<?php
require_once('../../Conexion.php');
session_start();

class Usuarios extends Conexion {

    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConexion();
    }

    public function login($Usuario, $Password) {
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE USUARIO = :Usuario AND PASSWORD = :Password");
        $statement->bindParam(":Usuario", $Usuario);
        $statement->bindParam(":Password", $Password);
        $statement->execute();

        if ($statement->rowCount() === 1) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION['NOMBRE'] = $result["NOMBRE"] . " " . $result["APELLIDO"];
            $_SESSION['ID']     = $result["ID_USUARIO"];
            $_SESSION['PERFIL'] = $result["PERFIL"];
            return true;
        }

        return false;
    }

    public function getNombre() {
        return $_SESSION['NOMBRE'] ?? '';
    }

    public function getId() {
        return $_SESSION['ID'] ?? '';
    }

    public function getPerfil() {
        return $_SESSION['PERFIL'] ?? '';
    }

    public function esAdmin() {
        return strtolower($this->getPerfil()) === 'administrador';
    }

    public function esDocente() {
        return strtolower($this->getPerfil()) === 'docente';
    }

    public function validateSession() {
        if (!$this->getId()) {
            header('Location: ../../index.php');
            exit;
        }
    }

    public function validateSessionAdministrador() {
        if (!$this->getId() || !$this->esAdmin()) {
            header('Location: ../../index.php');
            exit;
        }
    }

    public function validateSessionPerfil($perfilPermitido) {
        if (!$this->getId() || strtolower($this->getPerfil()) !== strtolower($perfilPermitido)) {
            header('Location: ../../index.php');
            exit;
        }
    }

    public function validateSessionRoles(array $rolesPermitidos) {
        $perfilActual = strtolower($this->getPerfil());
        $perfiles     = array_map('strtolower', $rolesPermitidos);

        if (!$this->getId() || !in_array($perfilActual, $perfiles)) {
            header('Location: ../../index.php');
            exit;
        }
    }

    public function salir() {
        session_destroy();
        header('Location: ../../index.php');
        exit;
    }
}