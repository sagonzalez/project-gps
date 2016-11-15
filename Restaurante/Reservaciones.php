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

<form action="php/procesar_reservaciones.php" method="POST">

<div class="datos">
    <p class="texto">Nombre</p>
<input type="text" name="nomres" required>
    <p class="texto">Telefono</p>
<input type="number" required>

    <p class="texto">Correo Electronico:</p>
        <input type="text" name="emailres" required>

    <p class="texto">Para la fecha:</p>
    <input  type="date" name="fechares" required>
    <p class="texto">Hora</p>
    <input type="time" required>


    <button type="button">Enviar</button>

</div>

</form>
</body>
</html>