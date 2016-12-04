<!DOCTYPE html>
<html>
<head>
	<title>Usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/Usuarios.css">
	<meta charset="utf-8">
</head>
<body>


	<div class="menu-principal">
		Gestion de Usuarios<a href="php/logout.php">Cerrar Sesion</a>
	</div>

	<div class="info-user">
		
		<div class="div-titulo">
      		<label>Datos del Administrador Actual</label>
 		 </div>

		<form action="Usuarios.php" method="post">
			
			<input type='hidden' name='id' value=''> 
			<div>
				<label>Nombre: </label><input type='text' name='nombre' value=''>	
			</div>

			<div>
				<label>Nombre de Usuario: </label><input type='text' name='username' value=''>
			</div>

			<div>
				<label>Contraseña: </label><input type='text' name='password' value=''>
			</div>

			<div>
				
				<button>Aplicar Cambios	</button>
			</div>
			


		</form>


	</div>	

	
	<div class="nuevo-user">
		<div class="div-titulo">
      		<label>Crear un nuevo Usuario</label>
 		 </div>

 		 <form method="post" action="Usuarios.php">

		     <div>
				<input type='text' name='nombre' placeholder='Nombre del Personal' required>	
			</div>

			<div>
				<input type='text' name='username' placeholder='Nombre de Usuario' required>
			</div>

			<div>
				<input type='text' name='password' placeholder='Inserte Contraseña' required>
			</div>

			<div>
				
				<button>Guardar</button>
			</div>

			</form>
	</div>

	<div class="buscar-user">
		<div class="div-titulo">
      		<label>Buscar Usuario</label>
 		 </div>

 		 <form action="Usuarios.php" method="post">
 		 	<label>Inserte nombre de Usuario: </label>
 		 	<input type="text" name="user">
 		 	<button>Buscar</button>
 		 </form>


 		 <form action='Usuarios.php' method='post'>

 		 	<div class='label-buscar'>
 		 		<input type='hidden' name='id' value=''>
 		 		<label><span class='campos'>Nombre:</span> Alan Ibarra </label>	
			</div>

			<div class='label-buscar'>
				<label><span class='campos'>Username:</span> ibalop </label>
			</div>


			<div>
				<select>
					<option value=""></option>
				</select>
			</div>


			<div>
				<button>Actualizar</button>
			</div>
 		 </form>

	</div>
</body>
</html>