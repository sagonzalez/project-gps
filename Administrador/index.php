

 <?php
    require 'php/Conectar.php';

    if(isset($_POST['btnenviar'])){
        session_start();
   

        

        //realizamos la conexion con la bd
        $conn = new Conectar();

        $conexion = $conn->getConexion();

        //capturamos el valor de los campos

        $usuario = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from Usuarios where name_user = '$usuario';";

        $resultado = $conexion->query($sql);

        if($resultado->num_rows>0){

            $row = $resultado->fetch_assoc();
            echo "".$row['pass']."<br>";
            if ($password == $row['pass'] and $row['status']=='A'){
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $usuario;
                $_SESSION['start']=time();
                $_SESSION['expire'] = $_SESSION['start']+(8*60);

            //
                header("Location: administrador.php");
            }else{
         
                echo "<script>alert('Username o password incorrecto $usuario , $password');</script>";
            }

        }else{
            echo "<script>alert('Usuario NO registrado');</script>";
        }

        $conexion->close();

    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<header>

</header>

<div>
    <img src="img/logo1.png" alt="" class="logotipo">
    <div>
        <a href="#form1">Iniciar</a>
    </div>
</div>

<div>
    <form class="alinear-form" id="form1" action="index.php" method="post">
        
        <div class="contenedor_datos"> 
            <label class="credenciales">Ingresa tus creedenciales</label>
            <div class="alinear-1">
                <input type="text" id="us" name="user" placeholder="usuario" required/>
            </div>

            <div class="alinear-1">
                <input type="password" id="pa" name="pass" placeholder="contraseña" required/>
            </div>

            <div class="alinear-2">
                <button name="btnenviar">Iniciar sesión</button>
            </div>
            <br>
            <label class="olvidar_contraseña" onclick="olvidar()">Olvidaste tu contraseña?</label>
            <script type="text/javascript">
                function olvidar(){
                    alert("no se la voy a decir compa!");
                }
            </script>
        </div>
    </form>

</div>



<footer>

</footer>

<script src="js/jquery-3.1.1.min.js"></script>

</body>
</html>
