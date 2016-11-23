<?php

require 'Conectar.php';

$conn = new Conectar();

//Si asignamos una nueva reservaciones
if ($_POST['btn_new']) {
  #obtenemos el puro id para actualizar su estatus y tambien obtenemos el usuario actualizar
  $id = $_POST['id_solicitud'];
  $usr = $_POST['user'];

  if($id == 'Aceptada'){
    if($conn->setSolicitud(1,$usr)){
      header("Location: ../AdministrarReservaciones.php");
    }else {
      echo "Error al actualizar1";
    }
  }elseif ($id == 'Rechazada') {
    if ($conn->setSolicitud(2,$usr)) {
      header("Location: ../AdministrarReservaciones.php");
    }else {
      echo "Error al actualizar2";
    }
  }//

}//if btn new


if ($_POST['btn_mod']) {
  $id = $_POST['id_solicitud'];
  $usr = $_POST['user'];

  if($id == 'Cancelar'){
    if($conn->setSolicitud(3,$usr)){
      header("Location: ../AdministrarReservaciones.php");
    }else {
      echo "Error al cancelar";
    }

}


 ?>
