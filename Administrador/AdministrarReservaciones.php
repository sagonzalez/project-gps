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
	<title>Queta's Grill and Steaks</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/AdministrarReservaciones.css">
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->
  <?php

  require 'php/Conectar.php';

  $conn = new Conectar();

  $reservaciones = $conn->getSolicitudes(); #obtenemos solicitudes

   ?>
	<div class="menu_principal">
		Administrar Reservaciones <a href="php/logout.php">Cerrar Sesion</a>
	</div>

<div class="div-lista-solicitudes">
  <div class="div-titulo-reservacion">
      <label id='titulo-solicitudes'>Solicitudes para Reservado</label>
  </div>
  <?php
      if($reservaciones->num_rows >0){
				echo "".$_SESSION['username'];
        while ($fila = $reservaciones->fetch_assoc()) {
          echo
          "
          <div class='div-solicitudes'>
            <form action='php/Procesar_Reservaciones.php' method='post'>
          <div>
            <input type='hidden' name='id_solicitud' value='".$fila['idReservaciones']."'>
						<input type='hidden' name = 'user' value='".$_SESSION['username']."'>
          </div>
          <div>
            <label>Nombre: ".$fila['Nombre']."</label><input type='hidden' name='name_solicitud' value='".$fila['Nombre']."'>
          </div>
          <div >
            <label>Telefono: ".$fila['Telefono']." </label><input type='hidden' name='tel_solicitud' value='".$fila['Telefono']."'>
          </div>
          <div >
            <label>Hora: ".$fila['Hora']." </label><input type='hidden' name='hora_solicitud' value='".$fila['Hora']."'>
          </div>
          <div >
            <label>Fecha: ".$fila['Fecha']."</label><input type='hidden' name='fecha_solicitud' value='".$fila['Fecha']."'>
          </div>
          <div >
            <label>No. Personas: ".$fila['Num_Personas']."</label><input type='hidden' name='noper_solicitud' value='".$fila['Num_Personas']."'>
          </div>
          <div >
            <label>Email: ".$fila['Email']."</label><input type='hidden' name='email_solicitud' value='".$fila['Email']."'>
          </div>
          <div>
          <label>Estado de la reservacion:</label>  <select required name='status_solicitud'>
                <option value=''>-Seleccione-</option>
                <option value='Aceptada'>Aceptada</option>
                <option value='Rechazada'>Rechazada</option>
            </select>
          </div>

          <div>
            <button name='btn_new'>Enviar Respuesta</button>
          </div>

          </div>

            </form>

          ";
        }//while


      }//if


   ?>

</div>



  <div class="div-reservaciones-hoy">
		<div class="div-titulo-reservacion">
			<label id='titulo-reservaciones-hoy'>Reservaciones para Hoy</label>
		</div>


		<?php
				$reservaciones = $conn->getReservacionesHoy();
	      if($reservaciones->num_rows >0){
	        while ($fila = $reservaciones->fetch_assoc()) {
	          echo
	          "
	          <div class='div-solicitudes'>
	            <form action='php/Procesar_Reservaciones.php' method='post'>
	          <div>
	            <input type='hidden' name='id_solicitud' value='".$fila['idReservaciones']."'>
							<input type='hidden' name = 'user' value='".$_SESSION['username']."'>
	          </div>
	          <div>
	            <label>Nombre: ".$fila['Nombre']."</label><input type='hidden' name='name_solicitud' value='".$fila['Nombre']."'>
	          </div>
	          <div >
	            <label>Telefono: ".$fila['Telefono']." </label><input type='hidden' name='tel_solicitud' value='".$fila['Telefono']."'>
	          </div>
	          <div >
	            <label>Hora: ".$fila['Hora']." </label><input type='hidden' name='hora_solicitud' value='".$fila['Hora']."'>
	          </div>
	          <div >
	            <label>Fecha: ".$fila['Fecha']."</label><input type='hidden' name='fecha_solicitud' value='".$fila['Fecha']."'>
	          </div>
	          <div >
	            <label>No. Personas: ".$fila['Num_Personas']."</label><input type='hidden' name='noper_solicitud' value='".$fila['Num_Personas']."'>
	          </div>
	          <div >
	            <label>Email: ".$fila['Email']."</label><input type='hidden' name='email_solicitud' value='".$fila['Email']."'>
	          </div>
	          <div>
	          <label>Estado de la reservacion:</label>  <select required name='status_solicitud'>
	                <option value=''>-Seleccione-</option>
	                <option value='Cancelar'>Rechazada</option>
	            </select>
	          </div>
						<div>
							<label>Autorizo: ".$fila['User']."</label><input type='hidden' name='user_autorizo' value='".$fila['User']." >'
						</div>
	          <div>
	            <button name='btn_mod'>Cancelar</button>
	          </div>

	          </div>

	            </form>

	          ";
	        }//while


	      }//if


	   ?>

  </div>


  <div class="div-buscar">
  		<div class="div-titulo-reservacion">
			<label id='titulo-reservaciones-buscar'>Buscar Reservaciones por fecha</label>
		</div>

		<form action="php/Procesar_Reservaciones.php" method="post">
			
			<div>
				<label>Ingrese una fecha: </label><input type="date" name="fecha_buscar" required><button name="btn_buscar">Buscar</button>
			</div>

			<?php 

				if (isset($_POST['btn_buscar'])) {
					# si se solicito una busqueda



					
				}//if


			 ?>	

		</form>
		
  </div>
</body>
</html>
