<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/platillos_fuertes.css">
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
    <meta charset="UTF-8">
    <title>Entradas</title>
</head>
<body>

<div class="menu_principal">
    <ul class="menus">
        <li><a title="INICIO" class="active" href="index.php"> INICIO </a></li>
        <li><a title="MENÚ"> MENÚ </a>
            <ul>
                <li><a href="Entradas.php">Entradas</a></li>
                <li><a href="PlatillosFuertes.php">Plato fuerte</a></li>
                <li><a href="Postres.php">Postres</a></li>
                <li><a href="Bebidas.php">Bebidas</a></li>
            </ul>
        </li>
        <li><a title="EVENTOS" href="Eventos.php"> EVENTOS </a></li>
        <li><a title="RESERVACIONES" href="Reservaciones.php"> RESERVACIONES </a></li>
        <li><a title="CONTACTANOS" href="Contactanos.php"> CONTACTANOS </a></li>
        <li><a title="COMENTARIOS" href="Comentarios.php"> COMENTARIOS </a></li>
    </ul>
</div>

<div id="container-main">
    <h1>ENTRADAS</h1>

<?php

  include 'php/conexion_datos.php';

  $conn = new Conect();

  $registros = $conn->getPlatilloEntradas();

  while ($fila = $registros->fetch_assoc()) {
    echo "

    <div class='accordion-container'>
        <a href='#' class='accordion-titulo'>".$fila['Nombre']."<span class='toggle-icon'></span></a>
        <div class='accordion-content'>
            <img src='".$fila['Img']."' alt=''/>
               <br>
               <p>".$fila['Descripcion']."</p><br><br><br><hr>
               <p class='costo'> Costo: $".$fila['Costo']." </p>

        </div>
    </div>



    ";
  }

 ?>



</div>

</body>

    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="js/CodigoJs.js" ></script>

</html>
