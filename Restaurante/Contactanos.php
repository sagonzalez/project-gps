<!DOCTYPE html>
<html>
<head>
    <title>Contactanos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/contactanos.css">
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

<!--    -->
<?php
    
    include 'php/conexion_datos.php';

    $con = new Conect();

    $datos = $con->getContacto();

    $valores = $datos->fetch_assoc(); //como solo es un registro, no necesitaremos del while 




?>


<div class="contenedor-divs" id="contenedor">
    <div class="mapa" id="div1">

    <?php

        echo "
        <iframe src='".$valores['Maps']."' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>
        ";
        ?>
    </div>

    <div class="info-ubicacion" id="div2">

        <div>
            <?php
            echo "
            <label>".$valores['Nombre']."</label>";

            ?>
        </div>

        <div>
            <?php
            echo "
            <label for=''>Tel(1): ".$valores['Telefono']."</label>";

            ?>
        </div>

        <div>

            <?php
            echo "
            <label for=''>Tel(2): ".$valores['Telefono2']."</label>";
            ?>
        </div>

        <div>

            <?php
            echo "
            <label for=''>Email: ".$valores['Email']."</label>";
            ?>
        </div>

        <div>
            <?php
            echo "
            <label for=''>Dirección: ".$valores['Direccion']."</label>";
            ?>
        </div>

        <div>
            <?php
            echo "
            <label for=''>Horario: ".$valores['Horario']."</label>";
            ?>
        </div>
    </div>


</div>


</body>
</html>