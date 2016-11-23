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
	<link rel="stylesheet" type="text/css" href="css/ModificarContacto.css">
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->

	<div class="menu_principal">
		Modificar Contacto <a href="php/logout.php">Cerrar Sesion</a>
	</div>

  <?php

      require 'php/Conectar.php';

      $conn = new Conectar();

      $resultado = $conn->getContactanos();

      if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $email = $_POST['email'];
        $dire = $_POST['dire'];
        $mapa = $_POST['mapa'];
				$horario = $_POST['horario'];

        if($conn->setContactanos($id,$nombre,$tel1,$tel2,$email,$dire,$mapa,$horario)){
          header("Location: ModificarContacto.php");
        }else {
          echo "Error al actualizar contacto";
        }
      }
    ?>
	<div class="campos-contacto">
			<div class="titulo-contacto">
					CONTACTO
			</div>
    <form action="ModificarContacto.php" method="post">
        <?php

            if($resultado->num_rows > 0){

              $fila = $resultado->fetch_assoc();

              echo "
                <input type='hidden' name='id' value='".$fila['idContacto']."'>

								<div class='div-izquierdo'>

                <div>
								<input type='text' name='nombre' placeholder='Nombre' value='".$fila['Nombre']."' required>
								</div>

								<div>
								<input type='number' name='tel1' placeholder='Telefono 1' value='".$fila['Telefono']."' required>
								<input type='number' name='tel2' placeholder='Telefono 2' value='".$fila['Telefono2']."' >
								</div>

								<div>
								<input type='text' name='dire' placeholder='Direccion' value='".$fila['Direccion']."' required>
								</div>

								</div>

								<div class='div-derecho'>
								<div>
									<input type='text' name='email' placeholder='Correo Electronico' value='".$fila['Email']."' required>
								</div>
								<div>
									<textarea name='mapa' placeholder='Agrega el Mapa de Google!'>".$fila['Maps']."</textarea>
								</div>
                <div>
								<input type='text' name='horario' placeholder='Hoario' value='".$fila['Horario']."' required>
								</div>
								</div>

                <div><button>Guardar Cambios</button></div>

              ";

            }



         ?>
    </form>



	</div>


</body>
</html>
