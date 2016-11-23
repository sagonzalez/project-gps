<?php

	/**
	*
	*/
	class Conectar
	{

		function __construct()
		{

		}

		public function getConexion(){
			$mysql = new mysqli("localhost","root","linux123","RestaurantDB");

			if ($mysql->connect_errno) {
				echo "Fallo la conexion con la bd";
				exit();
			}

			return $mysql;


		}//obtener conexion

		public function getComentarios(){

			$sql = $this->getConexion();

			$query = "select * from Comentarios;";

			$resultados = $sql->query($query);

			$sql->close();

			return $resultados;

		}


		public function eliminarComentario($ide){
			$sql = $this->getConexion();

			$query = "delete from Comentarios where idComentarios = ".$ide.";";

			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}

		public function getContactanos(){
			$sql = $this->getConexion();

			$query = "select * from Contacto;";

			$resultados = $sql->query($query);

			$sql->close();

			return $resultados;
		}

		public function setContactanos($id,$nombre,$tel1,$tel2,$email,$dire,$maps,$horario){
			$sql = $this->getConexion();

			$query = "update Contacto set Nombre='".$nombre."',Telefono=".$tel1.",Telefono2=".$tel2.",Email='".$email."',Direccion='".$dire."',Maps='".$maps."',Horario='".$horario."' where idContacto=".$id.";";

			$resultados = $sql->query($query);

			$sql->close();

			return $resultados;
		}

		public function setEvento($titulo,$des,$fecha,$img){
			$sql = $this->getConexion();

			$query = "insert into Eventos(Titulo,Descripcion,Fecha,Img)values('".$titulo."','".$des."','".$fecha."','".$img."');";

			$resultados = $sql->query($query);

			$sql->close();

			return $resultados;
		}

		public function updateEvento($id,$titulo,$des,$fecha,$img){
			$sql = $this->getConexion();

			$query = "update Eventos set Titulo='".$titulo."',Descripcion='".$des."',Fecha='".$fecha."',Img='".$img."' where idEventos=".$id.";";

			$resultados = $sql->query($query);

			$sql->close();

			return $resultados;
		}

		public function getEventos(){
			$consulta = "select idEventos,Titulo,Descripcion,Fecha,Img from Eventos where Fecha >= now()";

			$conectar = $this->getConexion();

			$resultados = $conectar->query($consulta);

			mysqli_close($conectar);
			return $resultados;
		}

		public function eliminarEvento($ide){
			$sql = $this->getConexion();

			$query = "delete from Eventos where idEventos = ".$ide.";";

			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}//

		public function getSolicitudes()
		{
			$consulta = "select * from Reservaciones where Fecha >= now() and Status = 0;";

			$conectar = $this->getConexion();

			$resultados = $conectar->query($consulta);

			mysqli_close($conectar);
			return $resultados;
		}//

		public function getReservacionesHoy()
		{
			$consulta = "select * from Reservaciones where Fecha == now() and Status = 1;";

			$conectar = $this->getConexion();

			$resultados = $conectar->query($consulta);

			mysqli_close($conectar);
			return $resultados;
		}//


		public function setSolicitud($status,$user){
			$consulta = "update Reservaciones set Status = $status, User = '$user';";
			$conectar = $this->getConexion();
			$resultado = $conectar->query($consulta);
			$conectar->close();
			return $resultado;
		}
	}//class

?>