<?php

	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	} else {
	   header("Location: index.php");
		 echo "<script>alert('Inicie Sesion');</script>";
	exit();

	}


	$now = time();

	if($now > $_SESSION['expire']) {
	session_destroy();

	header("Location: index.php");
	echo "<script>alert('Su sesion ha terminado');</script>";
	exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel de Control</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->

	<div class="menu_principal">
		Panel de Control <a href="php/logout.php">Cerrar Sesion</a>
	</div>

	<div class="opciones1">

		<div>
			<a href="Inicio.php">Modificar Inicio</a>
		</div>
		<div>

				<a href="Menu.php">Modificar Menu</a>
		</div>
		<div>
			<a href="GestionarEventos.php">Gestionar Eventos</a>
		</div>
	</div>

	<div class="opciones2">
		<div>
			<a href="AdministrarReservaciones.php">Administrar Reservaciones</a>
		</div>
		<div>
			<a href="ModificarContacto.php">Modificar Contactanos</a>
		</div>
		<div>
			<a href="comentarios.php">Gestionar Comentarios</a>
		</div>
		<div>
		<a href="Usuarios.php">Administrar Usuarios</a>
		</div>
	</div>

	

</body>
</html>
