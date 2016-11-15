<?php
	
	include 'conexion_datos.php';

	$nombre = $_POST['camponombre'];
	$comentario = $_POST['campocomentario'];
	header('Location: ../Comentarios.php');
?>