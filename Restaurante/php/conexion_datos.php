<?php

	/**
	*
	*/
	class Conect
	{

		function __construct()
		{

			//echo "Probando constructor";

		}

		private function getConexion(){

			$mysql = new mysqli("127.0.0.1","root","linux123","RestaurantDB"); #mandamos los datos para la conexio

			#verificamos si resulto algun error
			if($mysql->connect_errno){
				echo "Fallo la conexion: "+$mysql->connect_error;
				exit();
			}

			//echo "Conexion correcta: ".$mysql->host_info;
			return $mysql;

		}//realizamos la conexion con la base de datos


		public function getEventos(){

			$consulta = "select Titulo,Descripcion,Fecha,Img from Eventos where Fecha >= now()";

			$conectar = $this->getConexion();

			$resultados = $conectar->query($consulta);

			mysqli_close($conectar);
			return $resultados;

		}//obtenemos la informacion de los eventos proximos del restaurante

		public function setComentario($nombre,$comentario){

			$sql = $this->getConexion();
			$insert = "insert into Comentarios(Nombre_Per,Comentario)values('".$nombre."','".$comentario."');";

			if($sql->query($insert)){
				$sql->close();
				return true;
			}else{
				$sql->close();
				return false;
			}

		}//insertar un comentario a la base de datos


		public function getComentarios(){

			$sql = $this->getConexion();

			$query = "select Comentario from Comentarios;";

			$resultados = $sql->query($query);

			$sql->close();

			return $resultados;

		}//obtener los comentarios de la base de datos


		public function getContacto(){

			$sql = $this->getConexion();
			$query = "select Nombre,Telefono,Telefono2,Email,Direccion,Maps,Horario from Contacto;";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obetenemos infromación del negocio

		public function setReservacion($nombre,$telefono,$hora,$fecha,$num_per,$email){
			$sql = $this->getConexion();
			$query = "insert into Reservaciones(Nombre,Telefono,Hora,Fecha,Num_Personas,Email,Status)values('".$nombre."','".$telefono."','".$hora."','".$fecha."',".$num_per.",'".$email."',0);";
			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}//mandar a guardar la reservacion solicitadas


		public function getPlatilloEntradas()
		{
			$sql = $this->getConexion();
			$query = "select Nombre,Descripcion,Costo,Img from Platillo where Tipo_Platillo = 'Entrada';";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos de entrada

		public function getPlatilloFuertes()
		{
			$sql = $this->getConexion();
			$query = "select Nombre,Descripcion,Sugerencia,Costo,Img from Platillo where Tipo_Platillo = 'Fuerte';";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos fuertes

		public function getPlatilloPostres()
		{
			$sql = $this->getConexion();
			$query = "select Nombre,Descripcion,Costo,Img from Platillo where Tipo_Platillo = 'Postre';";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos de postres

		public function getBebidas()
		{
			$sql = $this->getConexion();
			$query = "select Nombre,Descripcion,Costo,Img from Bebidas;";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos de postres


	}//class

?>
