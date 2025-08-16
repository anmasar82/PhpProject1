<?php 

require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Materias.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo = new Materias();

$Id = $_GET['Id'];
$InformacionMateria = $Modelo->getById($Id);

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
		
		<h1>Editar Materia</h1>
		<form method="POST" action="../Controladores/Edit.php">
			<input type="hidden" name="Id" value="<?php echo $Id ?>">
			<?php
			if($InformacionMateria != null){
				foreach($InformacionMateria as $Info){
			?>
			Nombre <br>
			<input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre Materia" value= "<?php echo $Info['MATERIA'] ?>"> <br><br>
			<?php
				}
			}
			?>	
			<input type="submit" value="Editar Materia">
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