<?php

class Conexion {

    protected $db;
    private $driver = "mysql";
    private $host = "localhost:3308"; // Usa tu puerto personalizado
    private $bd = "notas";
    private $usuario = "root";
    private $contrasena = "";

    public function __construct() {
        try {
            $this->db = new PDO(
                "{$this->driver}:host={$this->host};dbname={$this->bd}",
                $this->usuario,
                $this->contrasena
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "❌ Error al conectar con la base de datos: " . $e->getMessage();
        }
    }

    public function getConexion() {
        return $this->db;
    }
}
?>