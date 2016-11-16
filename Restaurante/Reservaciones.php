<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservaciones</title>
    <link rel="stylesheet" type="text/css" href="css/reservaciones.css">
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



<div class="el_div">
    <p class="texto">FORMULARIO PARA RESERVACIÓN</p>

<form action="php/procesar_reservaciones.php" method="post">
    <div class="datos1">
        <input type="number" placeholder="Número de comensales" min="1" max="20" required name="num_per">
        <br>
        <input type="text" placeholder="Nombre" required name="nombre">
        <br>
        <input type="tel" placeholder="Teléfono" required name="telefono">
        <br>
        <input type="emial" placeholder="Email" required name="email">
    </div>
    <div class="datos2">
        <p class="otro_texto">Para la fecha:</p>
        <input type="date" placeholder="Selecciona una fecha" required name="fecha">
        <p class="otro_texto">Hora:</p>
        <input type="time" required name="hora">
        <br>
        <button>Enviar</button>
    </div>
</div>
</form>

</body>
</html>
