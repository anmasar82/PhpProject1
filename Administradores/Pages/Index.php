<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Administradores.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession(); // Verifica si la sesión está iniciada

// Verifica que el usuario tiene perfil "Administrador"
if ($ModeloUsuarios->getPerfil() !== 'Administrador') {
    header('Location: ../../index.php');
    exit;
}

$ModeloAdministradores = new Administradores();
$Administradores = $ModeloAdministradores->get();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Notas</title>
    <link rel="stylesheet" href="../../../Proyecto/estilos.css">

</head>
<body>
    <!-- Header dinámico -->
    <div class="header" id="header"></div>

    <div class="main">
        <h1>
            <a href="#">Administradores</a> -
            <a href="../../Docentes/Pages/index.php">Docentes</a> -
            <a href="../../Materias/Pages/index.php">Materias</a> -
            <a href="../../Estudiantes/Pages/index.php">Estudiantes</a> -
            <a href="../../Usuarios/Controladores/Salir.php">Salir</a>
        </h1>
        
        <h3>Bienvenido: <?php echo $ModeloUsuarios->getNombre(); ?> - <?php echo $ModeloUsuarios->getPerfil(); ?></h3>
        
        <a href="Add.php" target="_blank">Registrar Nuevo Administrador</a><br><br>
        
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php if (!empty($Administradores)): ?>
                <?php foreach ($Administradores as $Administrador): ?>
                    <tr>
                        <td><?php echo $Administrador['ID_USUARIO']; ?></td>
                        <td><?php echo $Administrador['NOMBRE']; ?></td>
                        <td><?php echo $Administrador['APELLIDO']; ?></td>
                        <td><?php echo $Administrador['USUARIO']; ?></td>
                        <td><?php echo $Administrador['PERFIL']; ?></td>
                        <td><?php echo $Administrador['ESTADO']; ?></td>
                        <td>
                            <a href="Edit.php?Id=<?php echo $Administrador['ID_USUARIO']; ?>" target="_blank">Editar</a>
                            <a href="Delete.php?Id=<?php echo $Administrador['ID_USUARIO']; ?>" target="_blank">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">No se encontraron administradores registrados.</td></tr>
            <?php endif; ?>
        </table>
    </div>
    
    <!-- Footer dinámico -->
    <div class="footer" id="footer"></div>

<!-- Script para cargar header y footer -->
    <script>
    fetch('../../Componentes/header.php')
        .then(res => res.text())
        .then(data => document.getElementById('header').innerHTML = data);

    fetch('../../Componentes/footer.php')
        .then(res => res.text())
        .then(data => document.getElementById('footer').innerHTML = data);
    </script>
</body>
</html>