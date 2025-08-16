<?php

require_once('../Modelo/Materias.php');

if($_POST){
	$Modelo = new Materias();

	$Id = $_POST['Id'];
	$Modelo->Delete($Id);
}else{
	header('Location: ../../index.php');
}

?>