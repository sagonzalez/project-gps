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

			$mysql = new mysqli("localhost","root","linux123","RestaurantDB"); #mandamos los datos para la conexio

			#verificamos si resulto algun error
			if($mysql->connect_errno){
				echo "Fallo la conexion: "+$mysql->connect_error;
				exit();
			}

			//echo "Conexion correcta: ".$mysql->host_info;
			return $mysql;

		}//realizamos la conexion con la base de datos


		public function getEventos(){

			$consulta = "select Titulo,Descripcion,Fecha from Eventos where Fecha >= now()";

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
			$query = "insert into Reservaciones(Nombre,Telefono,Hora,Fecha,Num_Personas,Email)values('".$nombre."','".$telefono."','".$hora."','".$fecha."',".$num_per.",'".$email."');";
			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}//mandar a guardar la reservacion solicitadas
	}//class

?>
