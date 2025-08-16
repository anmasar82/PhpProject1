<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Materias.php');

$ModeloUsuarios = new Usuarios();

// Verificamos sesión general, no específica aún
$ModeloUsuarios->validateSession();

// Verificamos si el usuario es realmente administrador
if ($ModeloUsuarios->getPerfil() !== 'Administrador') {
    header('Location: ../../index.php'); // redirige si no es administrador
    exit;
}

$Modelo = new Materias();
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

<div class="header" id="header"></div>

	<div class="main">
		<h1>
			<a href="#">Materias</a> -
			<a href="../../Docentes/Pages/index.php">Docentes</a> -
			<a href="../../Administradores/Pages/index.php">Administradores</a> -
			<a href="../../Estudiantes/Pages/index.php">Estudiantes</a> -
			<a href="../../Usuarios/Controladores/Salir.php">Salir</a>
		</h1>
		<a href="Add.php" target="_blank">Registrar Materia</a> <br><br>
		<table border="1">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</tr>
			<?php
			$Materias = $Modelo->get();
			if($Materias != null){
				foreach($Materias as $Materia){
			?>
			<tr>
				<td><?php echo $Materia['ID_MATERIA']; ?></td>
				<td><?php echo $Materia['MATERIA']; ?></td>
				<td>
					<a href="Edit.php?Id=<?php echo $Materia['ID_MATERIA']; ?>" target="_blank">Editar</a>
					<a href="Delete.php?Id=<?php echo $Materia['ID_MATERIA']; ?>" target="_blank">Eliminar</a>
				</td>
			</tr>
			<?php
				}
			}
			?>
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