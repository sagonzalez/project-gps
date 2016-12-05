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
	<title>Modificar Menú</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/platillos_fuertes.css">
	<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->

	<div class="menu_principal">
		<div class="encabezado">
			Menú <a href="php/logout.php">Cerrar Sesion</a>
		</div>
	</div>

	<?php
		#Obtenemos la conexion para usar dentro

		include 'php/Conectar.php';

  		$conn = new Conectar();

	?>

	<!--	Entradas -->
	<div class="menu-mod">
		<div id="entradas" class="div-titulo">
			<a href="#entradas">Entradas</a>
			<a href="#platofuerte">Plato Fuerte</a>
			<a href="#postres">Postres</a>
			<a href="#bebidas">Bebidas</a>
			<a href="#nuevo">Agregar</a>
		</div>

		<div class="titulo">
				<label>Platillos de Entrada</label>
		</div>
		<?php

			$registros = $conn->getPlatilloEntradas();

			  while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
							<input type='hidden' name='id' value='".$fila['idPlatillo']."'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."' required ><br>
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen' required >".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip' required >".$fila['Descripcion']."</textarea><br><br><br><hr>
			               <label>Costo: </label><input type='number' name='costo' step='0.01' required value='".$fila['Costo']."'>

			               <div class='botones'>
			               		<button name='btn_mod'>Modificar</button>
			               		<button name='btn_del'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";
				}
		?>

	</div>

	<!--	Postres -->
	<div class="menu-mod">
		<div id="platofuerte" class="div-titulo">
			<a href="#entradas">Entradas</a>
			<a href="#platofuerte">Plato Fuerte</a>
			<a href="#postres">Postres</a>
			<a href="#bebidas">Bebidas</a>
			<a href="#nuevo">Agregar</a>
		</div>
		<div class="titulo">
				<label>Platillos Fuerte</label>
		</div>
		<?php

			$registros = $conn->getPlatilloFuertes();

			while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
								<input type='hidden' name='id' value='".$fila['idPlatillo']."'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."' required ><br>
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen' required >".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip'  required >".$fila['Descripcion']."</textarea><br><br><br>
										 <label>Sugerencia: </label><textarea   name='suger' required >".$fila['Sugerencia']."</textarea><br><br><br><hr>
			               <label>Costo: </label><input type='number' name='costo' step='0.01' value='".$fila['Costo']."' required >

			               <div class='botones'>
			               		<button name='btn_mod_pf'>Modificar</button>
			               		<button name='btn_del'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";
				}

		?>
	</div>

	<!--	Postres -->
	<div class="menu-mod">
		<div id="postres" class="div-titulo">
			<a href="#entradas">Entradas</a>
			<a href="#platofuerte">Plato Fuerte</a>
			<a href="#postres">Postres</a>
			<a href="#bebidas">Bebidas</a>
			<a href="#nuevo">Agregar</a>
		</div>
		<div class="titulo">
				<label>Postres</label>
		</div>
		<?php

			$registros = $conn->getPlatilloPostres();

			while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
							<input type='hidden' name='id' value='".$fila['idPlatillo']."'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."' required ><br>
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen' required >".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip'  required >".$fila['Descripcion']."</textarea><br><br><br><hr>
			               <label>Costo: </label><input type='number' name='costo' step='0.01' value='".$fila['Costo']."' required >

			               <div class='botones'>
			               		<button name='btn_mod'>Modificar</button>
			               		<button name='btn_del'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";
				}

		?>
	</div>

	<!--	Bebidas -->
	<div class="menu-mod">
		<div id="bebidas" class="div-titulo">
			<a href="#entradas">Entradas</a>
			<a href="#platofuerte">Plato Fuerte</a>
			<a href="#postres">Postres</a>
			<a href="#bebidas">Bebidas</a>
			<a href="#nuevo">Agregar</a>
		</div>
		<div class="titulo">
				<label>Bebidas</label>
		</div>
		<?php

			$registros = $conn->getBebidas();

			while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."' required ><br>
								<input type='hidden' name='id' value='".$fila['idBebidas']."'>
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen' required >".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip'  required >".$fila['Descripcion']."</textarea><br><br><br><hr>
			               <label>Costo: </label><input type='number' name='costo' step='0.01' value='".$fila['Costo']."' required >

			               <div class='botones'>
			               		<button name='btn_mod_beb'>Modificar</button>
			               		<button name='btn_del_beb'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";
				}

		?>
	</div>


	<!--	Nuevo Platillo -->
	<div class="form-nuevo">
		<div id="nuevo" class="div-titulo">
			<a href="#entradas">Entradas</a>
			<a href="#platofuerte">Plato Fuerte</a>
			<a href="#postres">Postres</a>
			<a href="#bebidas">Bebidas</a>
			<a href="#nuevo">Agregar</a>
		</div>

		<div class="titulo">
				<label>Nuevo Platillo</label>
		</div>

		<form action="php/Procesar_Menu.php" method="post">
		<div class="formulario-nuevo">
				<div>
						<input type="text" name="nombre" required placeholder="Nombre del Platillo (Postre, Bebida, Platillo)">
				</div>
				<div>
					<textarea name="descrip" rows="8" cols="40" required placeholder="Añadir Descripcion"></textarea>
				</div>
				<div>
					<textarea name="sugerencia" rows="8" cols="40" placeholder="Añadir Sugerencia"></textarea>
				</div>
				<div>
					<textarea name="img" rows="8" cols="40" required placeholder="Añadir Link de Imagen del Platillo"></textarea>
				</div>

				<div>
						<input type="number" name="costo" required placeholder="Ingrese su Costo" step="0.01">
				</div>

				<div>
					<select name="tipo" required >
						<option value="">- Seleccion el Tipo -</option>
						<option value="Entrada">Entrada</option>
						<option value="Fuerte">Fuerte</option>
						<option value="Postre">Postre</option>
						<option value="Bebida">Bebida</option>
					</select>
				</div>

				<div>
					<button name="btn_new">Agregar</button>
				</div>
		</div>
	</form>
	</div>

	<div class="atras">
		<a href="administrador.php">Regresar</a>
	</div>
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="js/CodigoJs.js" ></script>
</body>
</html>
