<?php

require 'Conectar.php';

$conn = new Conectar();

//Si asignamos una nueva reservaciones
if (isset($_POST['btn_new'])) {
  #obtenemos el puro id para actualizar su estatus y tambien obtenemos el usuario actualizar
  echo "string";
  $id = $_POST['id_solicitud'];
  $usr = $_POST['user'];

  echo "".$_POST['status_solicitud']."";
  if($_POST['status_solicitud'] == 'Aceptada'){
    echo "string2"; 
    #Se supone que si aceptamos la solicitud de reservacion del usuario, se le mandara un correo 
    if($conn->setSolicitud(1,$conn->getIDUser($usr),$id)){
      header("Location: ../AdministrarReservaciones.php");
    }else {
      echo "Error al actualizar1";
    }

  }elseif ($_POST['status_solicitud'] == 'Rechazada') {
    if ($conn->setSolicitud(2,$conn->getIDUser($usr),$id)) {
      header("Location: ../AdministrarReservaciones.php");
    }else {
      echo "Error al actualizar2";
    }
  }//

}//if btn new
elseif (isset($_POST['btn_mod'])) {
  echo "string";
  $id = $_POST['id_solicitud'];
  $usr = $_POST['user'];

  if($_POST['status_solicitud'] == 'Cancelar'){
    if($conn->setSolicitud(3,$conn->getIDUser($usr),$id)){
      header("Location: ../AdministrarReservaciones.php");
    }else {
      echo "Error al cancelar";
    }
  }
}//


 ?>
