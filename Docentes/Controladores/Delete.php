<?php

require_once('../Modelo/Docentes.php');

if($_POST){
	$ModeloDocentes = new Docentes();

	$Id = $_POST['Id'];
	$ModeloDocentes->Delete($Id);
}else{
	header('Location: ../../index.php');
}

?>