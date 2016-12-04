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
	<title>Usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/Usuarios.css">
	<meta charset="utf-8">
</head>
<body>

	<?php 
		require "php/Conectar.php";

		$con = new Conectar();

		$result = $con->getUser("ibalop");

		



	 ?>

	<div class="menu-principal">
		Gestion de Usuarios<a href="php/logout.php">Cerrar Sesion</a>
	</div>

	<div class="info-user">
		
		<div class="div-titulo">
      		<label>Datos del Administrador Actual</label>
 		 </div>

		<?php 

			if(isset($_POST['btn_1'])){


				if ($con->validarUser($_POST['username'],$_POST['username_ori'],0)) {
					
					if(!empty($_POST['pass_new'])){		
							if (!empty($_POST['pass_ori'])) {

								if($_POST['pass_actual'] == $_POST['pass_ori']){
									
									if($con->modificarUserCompleto($_POST['id'],$_POST['nombre'],$_POST['username'],$_POST['pass_new'])){
										header("Location: Usuarios.php");
										//echo "<script>alert('Exito completo');</script>";
									}else{
										echo "<script>alert('Error al actualizar completo');</script>";
									}	

								}else{
									echo "<script>alert('Contraseña actual no coincide con la del usuario');</script>";	
								}
								
							}else{
								echo "<script>alert('Inserte el campo de Contraseña Actual');</script>";
							} //modficacion completa

					
					}else{

							//modificacion sencilla
						if($con->modificarUserSimple($_POST['id'],$_POST['nombre'],$_POST['username'])){
						//echo "<script>alert('Exito');</script>";
						header("Location: Usuarios.php");
						}else{
							echo "<script>alert('Error al actualizar simple');</script>";
						}
					}

				}else{

					echo "<script>alert('Nombre de usuario ya existe, escoja otro.');</script>";
				}


						

				




			}//

			$valores = $result->fetch_assoc();

			echo "


					<form action='Usuarios.php' method='post'>
					
					<input type='hidden' name='id' value='".$valores['idUsuarios']."'> 
					<div>
						<label>Nombre: </label><input type='text' name='nombre' required value='".$valores['Nombre']."'>	
					</div>

					<div>
						<label>Nombre de Usuario: </label><input type='text' name='username'  required value='".$valores['name_user']."'>
						<input type='hidden' name='username_ori'  value='".$valores['name_user']."'>
					</div>

					<div>
					<label>Contraseña Actual: </label>	<input type='password' name='pass_ori' placeholder='Contraseña Actual'>
						<label>Contraseña Nueva: </label><input type='password' name='pass_new' placeholder = 'Nueva Contraseña'>
						<input type='hidden' name='pass_actual' value = '".$valores['pass']."'>
					</div>

					<div>
						
						<button name='btn_1'>Aplicar Cambios</button>
					</div>
					


					</form>



			";



		 ?>
	


	</div>	

	
	<div class="nuevo-user">
		<div class="div-titulo">
      		<label>Crear un nuevo Usuario</label>
 		 </div>

			<?php 

				if (isset($_POST['btn_2'])) {
					if ($con->validarUser($_POST['username'],$valores['name_user'],1)) {
							if ($con->insertUser($_POST['nombre'],$_POST['username'],$_POST['password'])) {
								header("Location: Usuarios.php");
							}else{
								echo "<script>alert('Error al insertar');</script>";
							}
						}else{
							echo "<script>alert('Nombre de usuario no disponible');</script>";
						}	
				}

			 ?>
 		 <form method="post" action="Usuarios.php">

		     <div>
				<input type='text' name='nombre' placeholder='Nombre del Personal' required>	
			</div>

			<div>
				<input type='text' name='username' placeholder='Nombre de Usuario' required>
			</div>

			<div>
				<input type='password' name='password' placeholder='Inserte Contraseña' required>
			</div>

			<div>
				
				<button name="btn_2">Guardar</button>
			</div>

			</form>
	</div>

	<div class="buscar-user">
		<div class="div-titulo">
      		<label>Buscar Usuario</label>
 		 </div>

 		 <form action="Usuarios.php" method="post">
 		 	<label>Inserte nombre de Usuario: </label>
 		 	<input type="text" name="user" required>
 		 	<button name="btn_buscar">Buscar</button>
 		 </form>

		<?php 

			if(isset($_POST['btn_3'])){

				if($con->modificarStatus($_POST['id'],$_POST['status'])){
					$registro = $con->buscarUser($_POST['user1']);

				if ($fila = $registro->fetch_assoc()) {
			
					echo "
						
						<form action='Usuarios.php' method='post'>

			 		 	<div class='label-buscar'>
			 		 		<input type='hidden' name='id' value='".$fila['idUsuarios']."'>
			 		 		<input type='hidden' name = 'user1' value='".$fila['Nombre']."'> 
			 		 		<label><span class='campos'>Nombre:</span> ".$fila['Nombre']." </label>	
						</div>

						<div class='label-buscar'>
							<label><span class='campos'>Username:</span> ".$fila['name_user']." </label>
						</div>


						<div>
						";

						if($fila['status']=='A'){
							echo "
								
								<select name = 'status'>
									<option value='A'>Activo</option>
									<option value='I'>Inactivo</option>
								</select>

							";
						}else{
							echo "
								
								<select name = 'status'>
									<option value='I'>Inactivo</option>
									<option value='A'>Activo</option>
								</select>

							";
						}
							
						

						echo "
						</div>
						<div>
							<button name='btn_3'>Actualizar Estado</button>
						</div>
			 		 </form>
						<div><label>Se Actualizo el Status</label></div>
					";
				}else{
					echo "<script>alert('Error al actualizar status');";
				}
			}

		}

			if (isset($_POST['btn_buscar'])) {
				
					
				$registro = $con->buscarUser($_POST['user']);

				if ($fila = $registro->fetch_assoc()) {
			
					echo "
						
						<form action='Usuarios.php' method='post'>

			 		 	<div class='label-buscar'>
			 		 		<input type='hidden' name='id' value='".$fila['idUsuarios']."'>
			 		 		<input type='hidden' name = 'user1' value='".$fila['Nombre']."'> 
			 		 		<label><span class='campos'>Nombre:</span> ".$fila['Nombre']." </label>	
						</div>

						<div class='label-buscar'>
							<label><span class='campos'>Username:</span> ".$fila['name_user']." </label>
						</div>


						<div>
						";

						if($fila['status']=='A'){
							echo "
								
								<select name = 'status'>
									<option value='A'>Activo</option>
									<option value='I'>Inactivo</option>
								</select>

							";
						}else{
							echo "
								
								<select name = 'status'>
									<option value='I'>Inactivo</option>
									<option value='A'>Activo</option>
								</select>

							";
						}
							
						

						echo "
						</div>
						<div>
							<button name='btn_3'>Actualizar Estado</button>
						</div>
			 		 </form>

					";


				}else{
					echo "<label>No se encontro al usuario</label>";
				}



			}


		 ?>
 		 

	</div>
</body>
</html>