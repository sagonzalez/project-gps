<!DOCTYPE html>
<html>
<head>
    <title>Comentarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/comentarios.css">
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<!--    <div>
        <img class="img" src="img/Logo_edt.png">
    </div> -->

<div class="menu_principal">
    <ul class="menus">
        <li><a title="INICIO" class="active" href="index.php"> INICIO </a></li>
        <li><a title="MENÚ">MENÚ</a>
            <ul>
                <li><a href="Entradas.php">Entradas</a></li>
                <li><a href="PlatillosFuertes.php">Plato fuerte</a></li>
                <li><a href="Postres.php">Postres</a></li>
                <li><a href="Bebidas.php">Bebidas</a></li>
            </ul>
        </li>
        <li><a title="EVENTOS" href="Eventos.php"> EVENTOS </a></li>
        <li><a title="RESERVACIONES" href="Reservaciones.php"> RESERVACIONES </a></li>
        <li><a title="CONTACTANOS" href="Contactanos.php""> CONTACTANOS </a></li>
        <li><a title="COMENTARIOS" href="Comentarios.php"> COMENTARIOS </a></li>
    </ul>
</div>

<div>
    <!-- <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p> -->
</div>

<!---->


<form  action="php/procesar_comentario.php" method="POST">
    <div class="div-agregar-comentario">

        <div class="primeros-campos">
            <label>Déjanos tu comentario! </label>
            <br>
            <br>
            <input type="text" name="camponombre" required placeholder="Escribe tu nombre">
            <br>
            <br>
        </div>        
        
        <textarea required name = "campocomentario" cols="47" rows="10" placeholder="Escríbenos!... Leemos todos tus comentarios"></textarea>
        <br>
        <button id="btnCommentario">Enviar</button>
       
    </div>
</form>

<div class="lista-comentarios" overflow="auto">


    <ul id="lista">
    <?php

        include 'php/conexion_datos.php';

        $con = new Conect();

        $comentarios = $con->getComentarios();

        while($registro = $comentarios->fetch_assoc()){

            echo "
                <li>".$registro['Comentario']."</li>";
            
        }
        
    ?>
        
    </ul>


</div>


<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/appComentarios.js"></script>

</body>
</html>
