
<?php

	/*
		Código que se llama a ejecutar cuando se envie el formulario de comentarios,
		al precionar el boton.

	*/	
	include 'conexion_datos.php';

	$nombre = $_POST['camponombre'];
	$comentario = $_POST['campocomentario'];


	//obtenemos conexion
	$conexion = new Conect();

	if($conexion->setComentario($nombre,$comentario)){
		echo "Se inserto el comentario";
		header("Location: ../Comentarios.php");
	}else{
		echo "No se inserto";
		header("Location: ../Comentarios.php");
	}

	
?>