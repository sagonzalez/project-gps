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
	<title>Gestion de Usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/Usuarios.css">
	<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
	<meta charset="utf-8">
</head>
<body>

	<?php 
		require "php/Conectar.php";

		$con = new Conectar();

		$usuario = $_SESSION['username']; 
		$result = $con->getUser($usuario);

		



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
					
					<div class='mod_izq'>
						<label>Nombre: </label>
						<br>
						<input type='text' name='nombre' required value='".$valores['Nombre']."'>	
						<br>
						<label>Nombre de Usuario: </label>
						<br>
						<input type='text' name='username'  required value='".$valores['name_user']."'>
						<input type='hidden' name='username_ori'  value='".$valores['name_user']."'>
					</div>

					<div class='mod_der'>
						<label>Contraseña Actual: </label>	
						<br>
						<input type='password' name='pass_ori' placeholder='Contraseña Actual'>
						<br>
						<label>Contraseña Nueva: </label>
						<br>
						<input type='password' name='pass_new' placeholder = 'Nueva Contraseña'>
						<input type='hidden' name='pass_actual' value = '".$valores['pass']."'>
						<br>
					</div>
					
					<button name='btn_1'>Aplicar Cambios</button>
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
 
				<input type='text' name='nombre' placeholder='Nombre del Personal' required>	
				
				<input type='text' name='username' placeholder='Nombre de Usuario' required>
				
				<input type='password' name='password' placeholder='Inserte Contraseña' required>
				<br>		
				<button name="btn_2">Guardar</button>
			
			</form>
	</div>

	<div class="buscar-user">
		<div class="div-titulo">
      		<label>Buscar Usuario</label>
 		 </div>

 		 <form action="Usuarios.php" method="post">
 		 	<input type="text" name="user" placeholder="Buscar" required>
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

						if ($fila['Nombre']=='root') {
							echo "
								
								<select name = 'status'>
									<option value='A'>Activo</option>
								</select>

								";
						}else{
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
						}//else

						
						echo "
						</div>
						<div>
							<button name='btn_3'>Actualizar Estado</button>
						</div>
			 		 </form>

					";


				}else{
					echo "<label class='no_user'>No se encontro al usuario</label>";
				}



			}


		 ?>
 		 

	</div>
	<div class="atras">
			<a href="administrador.php">Regresar</a>
	</div>
</body>
</html>