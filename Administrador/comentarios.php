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
	<title>Gestion de Comentarios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->

	<div class="menu_principal">
		Gestionar Comentarios <a href="php/logout.php">Cerrar Sesion</a>
	</div>


	<div class="lista-comentarios">

		<ul>

			<?php

					require 'php/Conectar.php';

					$conn = new Conectar();

					$resultado = $conn->getComentarios();

					if(isset($_POST['num_com'])){
					  $num = $_POST['num_com'];
					  echo "".$num;
					  if($conn->eliminarComentario($num)){
					      header("Location:comentarios.php");
					  }else {
					    echo "No se pudo eliminar comentario";
					  }

					}

					if($resultado->num_rows >0){
							while ($fila = $resultado->fetch_assoc()) {

								echo "
									<form action = 'comentarios.php' method='post'>

										<li>

											<label>No.Comentario: ".$fila['idComentarios']."</label><input type='hidden' name='num_com' value='".$fila['idComentarios']."'><br>
											<label>Por: ".$fila['Nombre_Per']."</label><br>
											<label>".$fila['Comentario']."</label><br>
											<button class='btn_eliminar'>Eliminar</button>

										</li>

									</form>


								";
							}
					}


			?>

		</ul>

	</div>

	<div class="atras">
		<a href="administrador.php">Regresar</a>
	</div>
</body>
</html>
