<?php

require_once('../Modelo/Administradores.php');

if($_POST){
	$ModeloAdministradores = new Administradores();

	$Id = $_POST['Id'];
	$ModeloAdministradores->Delete($Id);
}else{
	header('Location: ../../index.php');
}

?>