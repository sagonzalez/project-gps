<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/platillos_fuertes.css">
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
    <meta charset="UTF-8">
    <title>Postres</title>
</head>
<body>

<div class="menu_principal">
    <ul class="menus">
        <li><a title="INICIO" class="active" href="index.html"> INICIO </a></li>
        <li><a title="MENÚ"> MENÚ </a>
            <ul>
                <li><a href="Entradas.html">Entradas</a></li>
                <li><a href="PlatillosFuertes.html">Plato fuerte</a></li>
                <li><a href="Postres.html">Postres</a></li>
                <li><a href="Bebidas.html">Bebidas</a></li>
            </ul>
        </li>
        <li><a title="EVENTOS" href="Eventos.html"> EVENTOS </a></li>
        <li><a title="RESERVACIONES" href="Reservaciones.html"> RESERVACIONES </a></li>
        <li><a title="CONTACTANOS" href="Contactanos.html"> CONTACTANOS </a></li>
        <li><a title="COMENTARIOS" href="Comentarios.html"> COMENTARIOS </a></li>
    </ul>
</div>

<div id="container-main">
    <h1>POSTRES</h1>

<?php

  include 'php/conexion_datos.php';

  $conn = new Conect();

  $registros = $conn->getPlatilloPostres();

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
