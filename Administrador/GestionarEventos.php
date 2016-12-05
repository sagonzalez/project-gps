<?php

	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	} else {
	   header("Location: index.html");
		 echo "<script>alert('Inicie Sesion');</script>";
	exit();

	}


	$now = time();

	if($now > $_SESSION['expire']) {
	session_destroy();

	header("Location: index.html");
	echo "<script>alert('Su sesion ha terminado');</script>";
	exit();

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestionar Eventos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/GestionarEventos.css">
	<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->
<?php
require 'php/Conectar.php';

$conn = new Conectar();

$resultado = $conn->getEventos();

if(isset($_POST['btn_new'])){
	//se creo un nuevo EventConfig
	if($conn->setEvento($_POST['new_titulo'],$_POST['new_descripcion'],$_POST['new_fecha'],$_POST['new_image'])){
			header("Location: GestionarEventos.php");
	}else {
		echo "No se guardo el nuevo evento";
	}

}else{

	if (isset($_POST['btn_modificar'])) {
		# se actualizo evento proximo
		if($conn->updateEvento($_POST['id'],$_POST['old_titulo'],$_POST['old_descripcion'],$_POST['old_fecha'],$_POST['old_image'])){
				header("Location: GestionarEventos.php");
		}else {
			echo "No se actualizo";
		}
	}

	if(isset($_POST['btn_eliminar'])) {
		# se elimino evento proximo
		if($conn->eliminarEvento($_POST['id'])){
				header("Location: GestionarEventos.php");
		}else {
			echo "No se elimino";
		}
	}
}

 ?>
	<div class="menu_principal">
		Gestionar Eventos <a href="php/logout.php">Cerrar Sesion</a>
	</div>


	<div class="contenedor-nuevo">
			<div class="titulo-nuevo">
					<label>Crear un nuevo evento</label>
					<hr>
			</div>


			<form  action="GestionarEventos.php" method="post">
				<div class="contenedor_izq">
						<input type="text" name="new_titulo" placeholder="Titulo del evento">
						<br>
						<textarea name="new_descripcion" rows="8" cols="40" placeholder="Inserte la descripcion del evento"></textarea>
				</div>

				<div class="contenedor_der">
						<label>Fecha del evento: </label>
						<br>
						<input type="date" name="new_fecha" >
						<br>
						<label>Imagen descriptiva(URL): </label>
						<br>
						<textarea name="new_image" rows="8" cols="40" placeholder='Inserta la URL de la imagen'></textarea>
					<div class="btn_crear">
						<button name="btn_new">Crear Evento</button>
					</div>
				</div>
			</form>
	</div>
	<hr>

	<div class="contenedor-modificar">
		<div class="titulo-modificar">
				<label>Modificar los eventos</label>
		</div>

		<div>
			<ul>

				<?php
						if ($resultado->num_rows > 0) {

							while ($fila = $resultado->fetch_assoc()) {
								echo "

								<li class='por_evento'>
									<span>".$fila['Fecha']."</span>
									<ul>
										<li>
											<form action='GestionarEventos.php' method='post'>

												<input type='hidden' name = 'id' value='".$fila['idEventos']."'>
												<div class='contenedor_izq'>
														<label class='txt_mod'>Titulo del evento: </label>
														<br>
														<input type='text' name='old_titulo' placeholder='Titulo' value='".$fila['Titulo']."'>
														<br>
														<label class='txt_mod'>Descripcion: </label>
														<br>
														<textarea name='old_descripcion' rows='8' cols='40' placeholder='Inserte la descripcion del eventos'>".$fila['Descripcion']."</textarea>
												</div>
												<div class='contenedor_der'>
														<label>Fecha del evento: </label>
														<br>
														<input type='date' name='old_fecha'  value='".$fila['Fecha']."'>
														<br>
														<label>Imagen descriptiva(URL): </label>
														<br>
														<textarea name='old_image' rows='8' cols='40' placeholder='Inserta la URL de la imagen'>".$fila['Img']."</textarea>
													<div>
															<button class='btn_mod' name='btn_modificar'>Modificar</button>
															<button class='btn_del' name='btn_eliminar'>Eliminar</button>
													</div>
												</div>
											</form>

										</li>
									</ul>
								</li>



								";
							}


						}//if


				 ?>
			</ul>
		</div>
	</div>
	<div class="atras">
		<a href="administrador.php">Regresar</a>
	</div>
</body>
</html>
