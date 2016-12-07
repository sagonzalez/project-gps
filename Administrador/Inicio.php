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
	<title>Modficiar Inicio</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/Inicio.css">
	<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->

	<?php 

		require "php/Conectar.php";

		$con = new Conectar();

	 ?>
	<div class="menu_principal">
		Modificar Página Principal <a href="php/logout.php">Cerrar Sesion</a>
	</div>

	<div class="encabezado">
		
		<div class="titulo">
			<label>Información de Inicio</label>	
		</div>

		<?php 

			if (isset($_POST['btn_1'])) {
				
				if ($con->updateInfoInicio($_POST['mensaje'],$_POST['slogan'],$_POST['logo'])) {
					header("Location: Inicio.php");
				}else{
					echo "No se pudieron actualizar los datos";
				}
			}


			$datos = $con->getInfoInicio();

			$fila = $datos->fetch_assoc();




		 ?>



		<form action="Inicio.php" method="post">
			
			<div>

				<label>Mensaje de Bienvenida: </label>
				<?php
				 echo "<input type='text' name='mensaje'  required  value='".$fila['titulo_inicio']."'>";
				?>
			</div>
			<div>
				<label>Slogan: </label>
				<?php echo 

					"<textarea cols='40' rows='5' name='slogan' required>".$fila['slogan']."</textarea>";

				 ?>	
				
			</div>

			<div>
				<label>Logo de la Empresa: </label>
				<?php echo 

					"<textarea cols='40' rows='5' name='logo' required>".$fila['logo_empresa']."</textarea>";

				 ?>	
			</div>

			<div>
				<button name="btn_1">Guardar Datos</button>
			</div>

		</form>

	</div>

	<div class="encabezado">
		
		<div class="titulo">
			<label>Platillo especial del dia</label>	
		</div>
			
			<?php 

				if (isset($_POST['btn_2'])) {
					//echo "venga";
						if ($con->updateEspecial($_POST['platillo'],$_POST['dia'])) {
							header("Location: Inicio.php");
						}else{
							echo "<script>alert('Error al guardar platillo del dia');</script>";
						}
				}

				$dia = $con->getPlatilloFuertesNombres();
				$actual = $con->getPlatilloDia();



			 ?>
			 <form action="Inicio.php" method="post">
					 <div>
						<label>Seleccion un Dia: </label>
						<select required name="dia">
						<option value="">-Seleccione Dia-</option>
						<option value="Lunes">Lunes</option>
						<option value="Martes">Martes</option>
						<option value="Miercoles">Miercoles</option>
						<option value="Jueves">Jueves</option>
						<option value="Viernes">Viernes</option>
						<option value="Sabado">Sabado</option>
						<option value="Domingo">Domingo</option>
					</select>

					<label>Seleccione un Platillo: </label>
					
						<select name="platillo" required>
							<option value="">-Seleccione Platillo-</option>
							<?php 
								while ($fila = $dia->fetch_assoc()) {
									echo "


										<option value='".$fila['idPlatillo']."'>".$fila['Nombre']."</option>  


									";

								}


							 ?>
						</select>
						
						<button name='btn_2'>Guardar Especial</button>

					</div>

			 </form>
			
			
			<div>
				
				
				<label>Dia actual Guardado: </label>
				<?php 
				$fila = $actual->fetch_assoc();

				echo 
					"
			
						<label>".$fila['Dia']."</label>
					";

				 ?>

				<label>Platillo del día actual guardado: </label>

				<?php echo 

					"
			
						<label>".$fila['Nombre']."</label>
					";

				 ?>

			</div>
			

	</div>


	<!--

	   Destacados 


	   -->
		<div class="encabezado">
		
		<div class="titulo">
			<label>Destacados</label>	
		</div>

			<?php 

				//boton quitar
				if (isset($_POST['btn_3'])) {
					
					if ($con->eliminarDestacado($_POST['destacados'])) {
						header("Location: Inicio.php");
					}else{
						echo "<script>alert('Error al eliminar');</script>;";
					}
				}

				//boton agregar

				if (isset($_POST['btn_4'])) {
					if ($con->insertarDestacado($_POST['destacados'])) {
						
					}else{
						echo "<script>alert('Error al Insertar');</script>;";
					}
				}


				//obtenemos los datos
				$reg1 = $con->getPlatillos();
				$reg2 = $con->getDestacados();



			 ?>
			<div>
				<form action='Inicio.php' method='post'>
				
					<label>Lista de Destacados: </label>

					<select name='destacados'>
						<?php 

							while ($f = $reg2->fetch_assoc()) {
								
								echo "

									<option value = '".$f['idDestacados']."'>".$f['Nombre']."</option>

								";

							}



						 ?>

					</select>

					<button name="btn_3">Quitar de Destacados</button>	

				</form>
					
			</div>

			<div>
				<form action='Inicio.php' method='post'>
					<label>Agregar nuevo destacado: </label>

					<select name="destacados" required>
						
						<option value=''>-Seleccione un Destacado-</option>

						<?php 

							while ($f = $reg1->fetch_assoc()) {
								echo "

									
									<option value = '".$f['idPlatillo']."'>".$f['Nombre']."</option>


								";
							}

						 ?>
					</select>

					<button name="btn_4">Agregar a Destacados</button>


				</form>
				
			</div>


		</div>
			
	

</body>
</html>
