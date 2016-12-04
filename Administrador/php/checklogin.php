 <?php

 	session_start();

 ?>

 <?php

 	require 'Conectar.php';


 	//realizamos la conexion con la bd
 	$conn = new Conectar();

 	$conexion = $conn->getConexion();

 	//capturamos el valor de los campos

 	$usuario = $_POST['user'];
 	$password = $_POST['pass'];

 	$sql = "select * from Usuarios where name_user = '$usuario';";

 	$resultado = $conexion->query($sql);

 	if($resultado->num_rows>0){

 		$row = $resultado->fetch_assoc();
 		echo "".$row['pass']."<br>";
 		if ($password == $row['pass'] and $row['status']=='A'){
 			$_SESSION['loggedin'] = true;
 			$_SESSION['username'] = $usuario;
 			$_SESSION['start']=time();
 			$_SESSION['expire'] = $_SESSION['start']+(8*60);

 		//
 			header("Location:../administrador.php");
 		}else{
      header("Location: ../index.html");
 			echo "<script>alert('Username o password incorrecto $usuario , $password');</script>";
 		}

 	}else{
 		#header("Location: ../index.html");
 		echo "Error al iniciar sesion";
 		echo "<br><a href='../index.html'>Login</a>";
 	}

 	$conexion->close();

 ?>
