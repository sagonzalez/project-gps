<!DOCTYPE html>
<html>
<head>
    <title>Eventos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/eventos.css">
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
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


<!---->

<?php

    include 'php/conexion_datos.php';

    $var = new Conect();

    $sql = $var->getEventos();

    while($fila = $sql->fetch_assoc()){

    echo "

<div>
    <div class='contenedor-info'>
        
        <div class='img-evento'>
            <img src='https://static1.squarespace.com/static/52d732a2e4b04290350710bf/t/52f3c3ebe4b0e58bc2c28a34/1391707119702/_DSC0351-2.jpg?format=2500w'>
        </div>

        <div class='info-evento'>
          
            <div>
                <label>".$fila['Titulo']."</label>
            </div>

            <div>
                <label>".$fila['Fecha']."</label>
            </div>

            <div>
                <p align='justify'>
                <label>".$fila['Descripcion']."</label>
                </p>
            </div>
        </div>

    </div>
</div>";
  }//while
?>
</body>
</html>