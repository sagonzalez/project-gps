<!DOCTYPE html>
<html>
<head>
	<title>Queta's Grill and Steaks</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link rel="stylesheet" type="text/css" href="css/platillos_fuertes.css">
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->

	<div class="menu_principal">
		Panel de Control <a href="php/logout.php">Cerrar Sesion</a>
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

		<?php

			$registros = $conn->getPlatilloEntradas();

			  while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."'><br> 
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen'>".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip'  >".$fila['Descripcion']."</textarea><br><br><br><hr>
			               <label>Costo: </label><input type='text' name='costo' value='".$fila['Costo']."'> 

			               <div class='botones'>
			               		<button name='btn_mod'>Modificar</button>
			               		<button name='btn_del'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";
		?>

	</div>

	<!--	Platillos Fuertes -->

	<div class="menu-mod">
		<div id="platofuerte" class="div-titulo">
			<a href="#entradas">Entradas</a>
			<a href="#platofuerte">Plato Fuerte</a>
			<a href="#postres">Postres</a>
			<a href="#bebidas">Bebidas</a>
			<a href="#nuevo">Agregar</a>
		</div>

		<?php
			$registros = $conn->getPlatilloFuertes();

				  while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."'><br> 
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen'>".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip'  >".$fila['Descripcion']."</textarea><br><br><br><hr>
			               <label>Sugerencia: </label><textarea name='suge'>".$fila['Sugerencia']."<br>
			               <label>Costo: </label><input type='text' name='costo' value='".$fila['Costo']."'> 

			               <div class='botones'>
			               		<button name='btn_mod_pf'>Modificar</button>
			               		<button name='btn_del'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";

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

		<?php

			$registros = $conn->getPlatilloPostres();

			while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."'><br> 
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen'>".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip'  >".$fila['Descripcion']."</textarea><br><br><br><hr>
			               <label>Costo: </label><input type='text' name='costo' value='".$fila['Costo']."'> 

			               <div class='botones'>
			               		<button name='btn_mod'>Modificar</button>
			               		<button name='btn_del'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";

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

		<?php

			$registros = $conn->getBebidas();

			while ($fila = $registros->fetch_assoc()) {
			    echo "
			    <form action='php/Procesar_Menu.php' method='post'>
			    <div class='accordion-container'>
			        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
			        <div class='accordion-content'>
			        	<label>Nombre: </label><input type='text' name='nombre' value='".$fila['Nombre']."'><br> 
			            <label>Imagen: </label><img src='".$fila['Img']."' alt=''/><textarea name='imagen'>".$fila['Img']."</textarea>
			               <br>
			               <label>Descripcion: </label><textarea   name='descrip'  >".$fila['Descripcion']."</textarea><br><br><br><hr>
			               <label>Costo: </label><input type='text' name='costo' value='".$fila['Costo']."'> 

			               <div class='botones'>
			               		<button name='btn_mod'>Modificar</button>
			               		<button name='btn_del'>Eliminar</button>
			               </div>
			        </div>
			    </div>

			    </form>

			    ";


		?>
	</div>


	<!--	Nuevo Platillo -->
	<div class="form-nuevo">
		<div id="entradas" class="div-titulo">
			<a href="#entradas">Entradas</a>
			<a href="#platofuerte">Plato Fuerte</a>
			<a href="#postres">Postres</a>
			<a href="#bebidas">Bebidas</a>
			<a href="#nuevo">Agregar</a>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="js/CodigoJs.js" ></script>
</body>
</html>
