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
			$mysql = new mysqli("127.0.0.1","root","linux123","RestaurantDB");

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
			$consulta = "select idEventos,Titulo,Descripcion,Fecha,Img from Eventos where Fecha >= date(now());";

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
			$consulta = "select * from Reservaciones where Fecha >= date(now()) and Status = 0;";

			$conectar = $this->getConexion();

			$resultados = $conectar->query($consulta);

			mysqli_close($conectar);
			return $resultados;
		}//

		public function getReservacionesHoy()
		{
			$consulta = "

							select r.Nombre,r.Telefono,r.Hora,r.Fecha,r.Num_Personas,r.Email,r.Status,u.Nombre
				from Reservaciones r,Usuarios u
				where r.Fecha = date(now()) and r.Status = 1 and r.user = (select idUsuarios from Usuarios where idUsuarios = r.User  );

			";

			$conectar = $this->getConexion();

			$resultados = $conectar->query($consulta);

			mysqli_close($conectar);
			return $resultados;
		}//


		public function setSolicitud($status,$user,$id){
			$consulta = "update Reservaciones set Status = ".$status.", User = ".$user."	 where idReservaciones = ".$id.";";
			$conectar = $this->getConexion();
			$resultado = $conectar->query($consulta);
			$conectar->close();
			return $resultado;
		}//

		public function buscarReservacion($fecha){
			$consulta = "select * from Reservaciones where Fecha = '".$fecha."'";
			$conectar  = $this->getConexion();
			$resultado = $conectar->query($consulta);
			$conectar->close();
			return $resultado;
		}//

		public function getIDUser($nombre)
		{
			$consulta = "select idUsuarios from Usuarios where name_user = '".$nombre."';";
			$conectar  = $this->getConexion();
			$resultado = $conectar->query($consulta);
			$res = $resultado->fetch_assoc();
			$id = $res['idUsuarios'];
			$conectar->close();
			return $id;
		}

		public function getPlatilloEntradas()
		{
			$sql = $this->getConexion();
			$query = "select idPlatillo,Nombre,Descripcion,Costo,Img from Platillo where Tipo_Platillo = 'Entrada';";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos de entrada

		public function getPlatilloFuertes()
		{
			$sql = $this->getConexion();
			$query = "select idPlatillo,Nombre,Descripcion,Sugerencia,Costo,Img from Platillo where Tipo_Platillo = 'Fuerte';";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos fuertes

		public function getPlatilloPostres()
		{
			$sql = $this->getConexion();
			$query = "select idPlatillo,Nombre,Descripcion,Costo,Img from Platillo where Tipo_Platillo = 'Postre';";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos de postres

		public function getBebidas()
		{
			$sql = $this->getConexion();
			$query = "select idBebidas,Nombre,Descripcion,Costo,Img from Bebidas;";
			$resultados = $sql->query($query);
			$sql->close();
			return $resultados;
		}//obtenemos los registros de los platillos de postres

		//

					//Menu

		//
		public function modificarPlatillo($id,$nombre,$img,$descripcion,$costo)
		{
			$consulta = "update Platillo set Nombre ='".$nombre."' ,Descripcion ='".$descripcion."',Costo  = ".$costo.",Img = '".$img."' where idPlatillo = ".$id.";";
			$conectar = $this->getConexion();
			$resultado = $conectar->query($consulta);
			$conectar->close();
			return $resultado;
		}

		public function modificarPlatilloF($id,$nombre,$img,$descripcion,$sugerencia,$costo)
		{
			$consulta = "update Platillo set Nombre ='".$nombre."' ,Descripcion ='".$descripcion."' ,Sugerencia = '".$sugerencia."' ,Costo  = ".$costo.",Img = '".$img."' where idPlatillo = ".$id.";";
			$conectar = $this->getConexion();
			$resultado = $conectar->query($consulta);
			$conectar->close();
			return $resultado;
		}

		public function eliminarPlatillo($id)
		{
			$sql = $this->getConexion();

			$query = "delete from Platillo where idPlatillo = ".$id.";";

			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}

		public function modificarBebida($id,$nombre,$img,$descripcion,$costo)
		{

			$consulta = "update Bebidas set Nombre ='".$nombre."' ,Descripcion ='".$descripcion."' ,Costo  = ".$costo.",Img = '".$img."' where idBebidas = ".$id.";";
			$conectar = $this->getConexion();
			$resultado = $conectar->query($consulta);
			$conectar->close();
			return $resultado;
		}

		public function eliminarBebida($id)
		{
			$sql = $this->getConexion();
			$query = "delete from Bebidas where idBebidas = ".$id.";";
			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}


		public function insertPlatilloF($nombre,$descripcion,$sugerencia,$tipo,$costo,$img)
		{
			$sql = $this->getConexion();

			$query =  "insert into Platillo (Nombre,Descripcion,Sugerencia,Tipo_Platillo,Costo,Img)values('".$nombre."','".$descripcion."','".$sugerencia."','".$tipo."',".$costo.",'".$img."');";

			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}

		public function insertPlatillo($nombre,$descripcion,$tipo,$costo,$img)
		{
						$sql = $this->getConexion();

						$query =  "insert into Platillo (Nombre,Descripcion,Tipo_Platillo,Costo,Img)values('".$nombre."','".$descripcion."','".$tipo."',".$costo.",'".$img."');";

						$resultado = $sql->query($query);
						$sql->close();
						return $resultado;
		}

		public function insertBebida($nombre,$descripcion,$costo = 14.3,$img)
		{
			$sql = $this->getConexion();

			$query =  "insert into Bebidas (Nombre,Descripcion,Costo,Img)values('".$nombre."','".$descripcion."',".$costo.",'".$img."');";

			$resultado = $sql->query($query);
			$sql->close();
			return $resultado;
		}

	}//class

?>
