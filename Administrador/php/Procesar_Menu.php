<?php

require "Conectar.php";

$con = new Conectar();

if(isset($_POST['btn_mod'])){
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $img = $_POST['imagen'];
  $descrip = $_POST['descrip'];
  $costo = $_POST['costo'];
  if ($con->modificarPlatillo($id,$nombre,$img,$descrip,$costo)) {
    header("Location: ../Menu.php");
  }else {
    echo "Error al actualizar 1";
  }

}//Modificar

if (isset($_POST['btn_del'])) {
  $id = $_POST['id'];
  if ($con->eliminarPlatillo($id)) {
    header("Location: ../Menu.php");
  }else {
    echo "Error al eliminar 1";
  }
}//eliminar
if (isset($_POST['btn_del_beb'])) {
  $id = $_POST['id'];
  if ($con->eliminarBebida($id)) {
    header("Location: ../Menu.php");
  }else {
    echo "Error al eliminar 2";
  }
}//eliminar

if (isset($_POST['btn_mod_pf'])) {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $img = $_POST['imagen'];
  $descrip = $_POST['descrip'];
  $sugerencia = $_POST['suger'];
  $costo = $_POST['costo'];
  if ($con->modificarPlatilloF($id,$nombre,$img,$descrip,$sugerencia,$costo)) {
    header("Location: ../Menu.php");
  }else {
    echo "Error actualizar 2";
  }
}//Modificar Platillo fuerte

if (isset($_POST['btn_mod_beb'])) {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $img = $_POST['imagen'];
  $descrip = $_POST['descrip'];
  $costo = $_POST['costo'];
  if ($con->modificarBebida($id,$nombre,$img,$descrip,$costo)) {
    header("Location: ../Menu.php");
  }else {
    echo "Error Modificar 3";
  }
}//actualizar bebida


if (isset($_POST['btn_new'])) {


  $tipo = $_POST['tipo'];

  if ($tipo == "Entrada") {
    $nombre = $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $img = $_POST['img'];
    $costo = $_POST['costo'];

    if ($con->insertPlatillo($nombre,$descrip,$tipo,$costo,$img)) {
      header("Location: ../Menu.php");
    }else {
      echo "Error insert 1";
    }
  }
  if ($tipo=="Fuerte") {
    $nombre = $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $img = $_POST['img'];
    $sugerencia = $_POST['sugerencia'];
    $costo = $_POST['costo'];
    if ($con->insertPlatilloF($nombre,$descrip,$sugerencia,$tipo,$costo,$img)) {
      header("Location: ../Menu.php");
    }else {
      echo "Error insert 2";
    }
  }

  if ($tipo=="Postre") {
    $nombre = $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $img = $_POST['img'];
    $costo = $_POST['costo'];

    if ($con->insertPlatillo($nombre,$descrip,$tipo,$costo,$img)) {
      header("Location: ../Menu.php");
    }else {
      echo "Error insert 3";
    }
  }

  if ($tipo == "Bebida") {
    $nombre = $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $img = $_POST['img'];
    $costo = $_POST['costo'];

    if ($con->insertBebida($nombre,$descrip,$costo,$img)) {
      header("Location: ../Menu.php");
    }else {
      echo "Error insert 4";
    }
  }

}//guardar nuevo platillo o bebida por su tipo
 ?>
