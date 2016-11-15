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

			$mysql = new mysqli("localhost","root","root","restaurantdb"); #mandamos los datos para la conexio

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

	}//class

?>