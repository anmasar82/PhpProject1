<?php

require_once('../../Usuarios/Modelo/Usuarios.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

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


	<div class ="main">
		<h1>Registrar Administrador</h1>
		<form action="../Controladores/Add.php" method="POST">
			Nombre <br>
			<input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"> <br><br>
			Apellido <br>
			<input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido"> <br><br>
			Usuario <br>
			<input type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario"> <br><br>
			Password <br>
			<input type="Password" name="Password" required="" autocomplete="off" placeholder="Password"> <br><br>
			<input type="submit" value="Registrar Administrador">
			<input type="button" value="Cancelar" onclick="window.location.href='index.php'">
		</form>
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