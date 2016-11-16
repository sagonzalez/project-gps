<?php

  require 'conexion_datos.php';

  //obtenemos los datos del formulario
  $nombre = $_POST['nombre'];
  $tel = $_POST['telefono'];
  $hora = $_POST['hora'];
  $fecha  =$_POST['fecha'];
  $num_per = $_POST['num_per'];
  $email  = $_POST['email'];


  //creamos el objeto de la clase conexion
  $conn  = new Conect();

  if ($conn->setReservacion($nombre,$tel,$hora,$fecha,$num_per,$email)) {
    echo "Reservación Hecha";
    //header("location: ../Reservaciones.php");
  }else{
    echo "No se realizo la reservacion";
    //header("location: ../Reservaciones.php");
  }

 ?>
