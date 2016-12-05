<!DOCTYPE html>
<html>
<head>
	<title>Bistrót</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link rel="stylesheet" type="text/css" href="css/slides.css">
	<link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png"> 
</head>
<body>
<!-- 	<div>
		<img class="img" src="imagenes/Logo_edt.png">
	</div> -->

	<div class="menu_principal">
		<ul class="menus">
			<li><a title="INICIO" href="index.php"> INICIO </a></li>
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

	<?php 

		require "php/conexion_datos.php";

		$con = new Conect();
		$datos = $con->getInfoContacto();
		$desta = $con->getDestacados();

	 ?>

	<div class="contenedor">
		<!--
		<div class="img1">
			
		</div>

		-->
		<div class="bienvenido">
			<p>
				<h2>
					<!--Mensaje de bienvenida de la empresa-->
					<?php 
						if ($f = $datos->fetch_assoc()) {
							echo "<label>".$f['titulo_inicio']."</label>";	
						}

					 ?>
					
					<hr>
				</h2>
			</p>
			<p>
				<h3>
					<!-- Slogan o mensaje particular-->
					<?php 

						echo "<label>".$f['slogan']."</label>";

					 ?>
				</h3>
			</p>
		
		</div>


		<div class='logo-empresa'>
			<!--Aqui va el logo de la empresa-->
			<?php 

				echo "<img src='".$f['logo_empresa']."'>;";

			 ?>

		</div>

		<div class="especial_hoy">
			<p>

				<?php 

					$especial = $con->getEspecial();

					if ($f = $especial->fetch_assoc()) {
						
						echo "
							<h2>Especial del dia ".$f['Dia']." ! <br>".$f['Nombre']."</h2>	
						";
					}



				 ?>
				
			</p>
			<img src="http://www.mycolombianrecipes.com/wp-content/uploads/2009/08/Colombian-chicharron-recipe.jpg">
			
		</div>
		<div title="Steak Meat Tomato Grilled Seared Rosemaryño!">
			


		</div>

		<!--

		<div class="img1_descrip">
		<p>
			<h4>Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit, sed do eiusmod.
			</h4>	
		</p>
	</div>
	-->
	</div>

	<!-- Contenedor de imagenes -->
	<div class="slideshow-container" title="Platillos destacados">
	   
	   <?php 


	   		while ($f = $desta->fetch_assoc()) {
	   			echo "

				
				<div class='mySlides fade'>
			    	<img src='".$f['Img']."' style='width: 100%'>
			    	<div class='text'>".$f['Nombre']."</div>
			    </div>



	   		";
	   		}


	    ?>
	    

	   

	    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>

  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
    <span class="dot" onclick="currentSlide(4)"></span> 
  </div>
  
  	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/slides.js"></script>
</body>
</html>