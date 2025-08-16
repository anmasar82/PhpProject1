<?php
require_once('../Modelo/Usuarios.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Usuario = $_POST['Usuario'] ?? '';
    $Password = $_POST['Contrasena'] ?? '';

    $Modelo = new Usuarios();

    if ($Modelo->login($Usuario, $Password)) {
        $perfil = strtolower($_SESSION['PERFIL'] ?? '');

        switch ($perfil) {
            case 'administrador':
                header('Location: ../../Administradores/Pages/index.php');
                break;
            case 'docente':
                header('Location: ../../Estudiantes/Pages/index.php');
                break;
            default:
                header('Location: ../../index.php'); // Perfil desconocido
        }

        exit;
    } else {
        // Usuario o contraseña incorrectos
        header('Location: ../../index.php');
        exit;
    }
} else {
    header('Location: ../../index.php');
    exit;
}