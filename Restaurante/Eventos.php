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


    if(mysqli_num_rows($sql)==0){
        echo "<script type='text/javascript'>alert('No hay eventos proximos');</script>";
    }else{

            while($fila = $sql->fetch_assoc()){

                    echo "

                <div>
                    <div class='contenedor-info'>
                        
                        <div class='img-evento'>
                            <img src='".$fila['Img']."'>
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

    }

?>
</body>
</html>