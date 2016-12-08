-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: RestaurantDB
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Bebidas`
--

DROP TABLE IF EXISTS `Bebidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bebidas` (
  `idBebidas` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Costo` double DEFAULT NULL,
  `Img` varchar(700) DEFAULT NULL,
  PRIMARY KEY (`idBebidas`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bebidas`
--

LOCK TABLES `Bebidas` WRITE;
/*!40000 ALTER TABLE `Bebidas` DISABLE KEYS */;
INSERT INTO `Bebidas` VALUES (2,'Mojito Cubano','Bebida preparada a base de ron, lima, menta y otros ingredientes que se pueden aÃ±adir adicionalmente...\r\n',45.12,'http://cdn2.recetasgratis.net/es/images/1/5/3/img_mojito_cubano_original_43351_600_square.jpg'),(3,'Caipirinha','Rico coctel de Brasil, consistente en cachaza, lima, azucar y hielo....',35.19,'http://www.vinoybebidas.com/home/images/stories/caipirinha-8386.jpg'),(4,'Vino Tinto','Vino de color rojo oscuro que se obtiene del mosto de uva negra fermentado con las pepitas y los hollejos de la uva pregunta por nuestra cosecha....',55.1,'http://static.vix.com/es/sites/default/files/styles/large/public/imj/p/propiedades-curativas-del-vino-tinto-1.jpg?itok=M5Mf28MC'),(5,'Vino Blanco','Delicioso vino blanco para acompaÃ±ar tus platillos, pregunta por la cosecha de la casa...',48.12,'http://bloggraficasvarias.es/wp-content/uploads/2016/01/9281552_l.jpg'),(6,'Agua Cabonatada (Sodas)','Pregunta por nuestros distintos sabores',23.12,'http://img-aws.ehowcdn.com/300x200/photos.demandstudios.com/getty/article/83/119/181397947_XS.jpg'),(7,'Agua Natural y Sabor','Pregunta por los sabores que tenemos...',18.62,'https://milittlecorner.files.wordpress.com/2014/09/0d2bca5618309bc9806b34e5c07f5b9e.jpg');
/*!40000 ALTER TABLE `Bebidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Comentarios`
--

DROP TABLE IF EXISTS `Comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comentarios` (
  `idComentarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Per` varchar(45) DEFAULT NULL,
  `Comentario` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idComentarios`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comentarios`
--

LOCK TABLES `Comentarios` WRITE;
/*!40000 ALTER TABLE `Comentarios` DISABLE KEYS */;
INSERT INTO `Comentarios` VALUES (6,'Alan Ibarra','Muy buena comida, muy rica');
/*!40000 ALTER TABLE `Comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contacto`
--

DROP TABLE IF EXISTS `Contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contacto` (
  `idContacto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Telefono2` int(11) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  `Maps` varchar(500) DEFAULT NULL,
  `Horario` varchar(200) DEFAULT NULL,
  `titulo_inicio` varchar(100) DEFAULT NULL,
  `slogan` varchar(200) DEFAULT NULL,
  `logo_empresa` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`idContacto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contacto`
--

LOCK TABLES `Contacto` WRITE;
/*!40000 ALTER TABLE `Contacto` DISABLE KEYS */;
INSERT INTO `Contacto` VALUES (1,'Restaurant  GPS',2142029,2130938,'quetas@gmail.com','Emiliano Zapata Ore. 92, Centro, Tepic Nayarit','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3711.953711217395!2d-104.89277705029835!3d21.509532976499067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842737381fb3daa3%3A0x471d19d40fabc82d!2sRestaurant+Emiliano!5e0!3m2!1ses!2smx!4v1478738196452','9:00 - 10:00 pm','Bienvenidos a mi Restaurant!','Una combinacion de carnes y cortes para tu paladar.','http://capettos.com/wp-content/uploads/2016/06/CHICKEN-WINGS-LOGO-PNG.png');
/*!40000 ALTER TABLE `Contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Destacados`
--

DROP TABLE IF EXISTS `Destacados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Destacados` (
  `idDestacados` int(11) NOT NULL AUTO_INCREMENT,
  `idPlatillo` int(11) DEFAULT NULL,
  `idBebida` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDestacados`),
  KEY `idPlatillo_idx` (`idPlatillo`),
  KEY `idBebida_idx` (`idBebida`),
  CONSTRAINT `idBebida` FOREIGN KEY (`idBebida`) REFERENCES `Bebidas` (`idBebidas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idPlatillo` FOREIGN KEY (`idPlatillo`) REFERENCES `Platillo` (`idPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Destacados`
--

LOCK TABLES `Destacados` WRITE;
/*!40000 ALTER TABLE `Destacados` DISABLE KEYS */;
INSERT INTO `Destacados` VALUES (2,5,NULL),(3,8,NULL),(4,14,NULL),(5,18,NULL);
/*!40000 ALTER TABLE `Destacados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Especial_del_dia`
--

DROP TABLE IF EXISTS `Especial_del_dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Especial_del_dia` (
  `idEspecial_del_dia` int(11) NOT NULL,
  `id_Platillo` int(11) DEFAULT NULL,
  `Dia` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idEspecial_del_dia`),
  KEY `Platillo_idx` (`id_Platillo`),
  CONSTRAINT `Platillo` FOREIGN KEY (`id_Platillo`) REFERENCES `Platillo` (`idPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Especial_del_dia`
--

LOCK TABLES `Especial_del_dia` WRITE;
/*!40000 ALTER TABLE `Especial_del_dia` DISABLE KEYS */;
INSERT INTO `Especial_del_dia` VALUES (1,8,'Martes');
/*!40000 ALTER TABLE `Especial_del_dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Eventos`
--

DROP TABLE IF EXISTS `Eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Eventos` (
  `idEventos` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Img` varchar(700) DEFAULT NULL,
  PRIMARY KEY (`idEventos`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Eventos`
--

LOCK TABLES `Eventos` WRITE;
/*!40000 ALTER TABLE `Eventos` DISABLE KEYS */;
INSERT INTO `Eventos` VALUES (1,'Lunes de 2x1 en platillo de tacos!','Ven a disfrutar este lunes de nuestra gran promocion de tacos al 2x1, tortilla torteada y el mejor corte de carne, ven y acompañanos.','2016-11-17','img/lunestacos.jpg'),(2,'Martes de pizza!','Este martes tendremos la promocio de nuestra nueva pizza a la plancha, ven a probarla en compañia de tus amigos y familia, y comentanos que te parece.','2016-11-18','img/martespizza.jpg'),(3,'Miercoles de ensalada!','Si no te gusta la carne descuida este es tambien el lugar para ti, ven a probar nuestra ensalada mega con los ingredientes de tu agrado, ven y conocela en el menu, pruebala y dejanos tu comentario.','2016-11-20','img/miercolesensalada.jpg'),(4,'Jueves Before party!','Ven y ambientate en nuestra barra libre con musica electronica, traete a tus amigos y disfruta del ambiente, y compartenos tu comentario.','2016-11-21','img/juevesparty.jpg'),(5,'viernes de musica!','Relajate con el gran ambiente de la banda los Johny tocando en vivo y disfrutando de una buena comida ven te divertiras.','2016-11-22','img/viernesmusica.jpg'),(7,'Martes de mariscos ','Ven a disfrutar de la especialidad de los martes: !mariscosÂ¡','2016-11-28','http://files.goldnutrition-com.webnode.mx/200000237-91a0a9299f/mariscos.jpg'),(8,'Viernes de pizza','alfa','2016-01-03','sdadas'),(9,'Viernes after party','Ven a disfrutar de la fiesta es fin de semana','2017-01-01','https://highape.com/wp-content/uploads/2015/11/New-Year-Party-2016-2.jpg'),(10,'Martes de mariscos jalapeÃ±os','unos riscos marisquitos','2017-01-03','https://paginas.seccionamarilla.com.mx/img/upload/bs1-mariscos-la-playa.jpg');
/*!40000 ALTER TABLE `Eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Platillo`
--

DROP TABLE IF EXISTS `Platillo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Platillo` (
  `idPlatillo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(500) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Sugerencia` varchar(1000) DEFAULT NULL,
  `Costo` double DEFAULT NULL,
  `Tipo_Platillo` varchar(50) DEFAULT NULL,
  `Img` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`idPlatillo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Platillo`
--

LOCK TABLES `Platillo` WRITE;
/*!40000 ALTER TABLE `Platillo` DISABLE KEYS */;
INSERT INTO `Platillo` VALUES (2,'Calabacitas Diana','Calabacitas de cosecha tierna sazonadas con crema acompaÃ±adas de pasta...',NULL,48.82,'Entrada','http://mxcdn.ar-cdn.com/recipes/originalxl/70cb885b-8dda-4d05-8cfc-4135a7d9291b.jpg'),(3,'Pay de Atun','Rico pay casero hecho con los mejores ingredientes que se encuentran en la region...',NULL,27.5,'Entrada','http://mxcdn.ar-cdn.com/recipes/originalxl/de158c9e-f1f8-4a67-a519-097f20ae09d3.jpg'),(4,'Ensalada Tricolor','Rebanadas de aguacate, queso mozzarella fresco y jitomate, aderezadas con aceite de oliva y vinagre ',NULL,56.82,'Entrada','http://mxcdn.ar-cdn.com/recipes/originalxl/9b8551dc-32e4-48f9-b9a7-3ac545212b0c.jpg'),(5,'Molletes Mexicanos','Deliciosos molletes acompaÃ±ados de chorizo casero, salsa picada y acompaÃ±ados de aguacate.',NULL,52.93,'Entrada','https://3.bp.blogspot.com/-ItMvy2Fz5SI/Vyqu6MxEhKI/AAAAAAAARrg/DAnoJV_xJU0Rakkw76-q-diCBsLwDCpqQCLcB/s640/Molletes%2Brecipes.jpg'),(8,'Albondigas en Chipotle','AlbÃ³ndigas preparadas con la mejor carne, sazonadas y acompaÃ±adas con la mejor receta de la casa...','AcompaÃ±a tu platillo con un agua carbonatada o si lo prefieres una soda...',85.28,'Fuerte','https://mejorconsalud.com/wp-content/uploads/2015/03/albondigas-de-pan-500x334.jpg'),(9,'Medallones sellados en sartÃ³n','Ricos medallones de res sellados al sartï¿½n Medallones sellados en sartï¿½n con salsa de oporto simple.','Acompaï¿½a tu platillo con una buena copa de vino tinto...',89.41,'Fuerte','http://saboresdecanada.mx/images/Pan_seared_medallions_category_thumbnail.jpg'),(10,'SalmÃ³n a la parrilla','SalmÃ³n a la parrilla en costra de cilantro, con salteado otoÃ±al de chÃ­charos mixtos preparado con la mejor receta...','AcompaÃ±alo con una copa de ino blanco o bien elige alguna de nuestra bebidas preparadas...',98.12,'Fuerte','http://saboresdecanada.mx/images/Grilled_salmon_with_coriander_category_thumbnail.jpg'),(12,'Flan Napolitano','Flan cocinado a baÃ±o MarÃ­a dentro del horno tiene un sabor exquisito y una textura firme, pero muy delicada.',NULL,33.98,'Postre','http://mxcdn.ar-cdn.com/recipes/originalxl/b8d297d8-37d9-4c6f-b036-be817dc9be65.jpg'),(13,'Arroz con Leche','Delicioso arroz preparado con leche, endulzado y con un toque de canela espolvoreada en su exterior...',NULL,28.12,'Postre','http://mxcdn.ar-cdn.com/recipes/originalxl/69c10b1b-ef89-4738-95bd-064151e45d81.jpg'),(14,'Helado Choco','Delicioso helado acompaÃ±ado con cubierta de chocolate y frutas rojas, pregunta por los sabores...',NULL,44.99,'Postre','http://cdn2.uvnimg.com/dims4/default/b1760d7/2147483647/resize/956x717%3E/quality/75/?url=http%3A%2F%2Fcdn3.uvnimg.com%2Ffc%2Fd5%2Fe7a893b0483ebc6f98350e50d61f%2F9ebe155a2a23423c8267223300e6b285'),(15,'Banana Split','Rica banana acompaÃ±ada de helado sabor vainilla, chocolate y nuez...',NULL,65.41,'Postre','http://img.loquenosabias.com/postres/2011/09/02/banana-split-postre-estadounidense.jpg'),(18,'Chilaquiles','ricos chilaquiles',NULL,12313,'Entrada','http://www.schallerweber.com/cms/wp-content/uploads/2012/02/GooseLiver.jpg'),(19,'Pizza de Peperoni','Mucha delicias comunicaciÃ³n ',NULL,23,'Entrada','http://puntofinal.mx/wp-content/uploads/2016/08/ppizza.jpg');
/*!40000 ALTER TABLE `Platillo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reservaciones`
--

DROP TABLE IF EXISTS `Reservaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reservaciones` (
  `idReservaciones` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Num_Personas` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `User` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReservaciones`),
  KEY `Usuario_idx` (`User`),
  CONSTRAINT `Usuario` FOREIGN KEY (`User`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reservaciones`
--

LOCK TABLES `Reservaciones` WRITE;
/*!40000 ALTER TABLE `Reservaciones` DISABLE KEYS */;
INSERT INTO `Reservaciones` VALUES (1,'Alan Eduardo','2142028','06:00:00','2016-11-18',5,'alan_ibalop@outlook.com',0,NULL),(2,'Raul Guzman','231231','06:00:00','2016-11-26',5,'raul@gmail.com',0,NULL),(3,'Carlos Pereda','2323231','04:00:00','2016-11-28',2,'pereda@gmail.com',1,1),(4,'Alan Ibarra','2142028','04:30:00','2016-11-29',3,'alan_ibalop@outlook.com',1,1),(5,'Andres Volpi','3212323','03:30:00','2016-11-27',5,'volpi@gmail.com',1,1),(6,'Daniel Luduena','21312','10:00:00','2016-12-10',3,'ludo@gmail.co',1,1),(7,'Manuel Gonzalez','131231','11:00:00','2016-12-19',5,'gonzo@gmail.com',1,1),(8,'Pedro Ramirez','123123','03:00:00','2016-11-23',3,'pe@gmail.com',0,NULL),(9,'Pedro Damian','21231','06:00:00','2016-11-26',2,'dama@gmail.com',1,1),(10,'Carlos Gonzalez','4131313','10:03:00','2016-11-27',3,'gonza@gmail.com',1,1),(11,'Pedro Ramirez','342313','12:02:00','2016-11-26',4,'pd@gmail.com',3,1),(12,'Daniel Medina','131313','13:12:00','2016-11-26',4,'medina@gmail.com',3,1),(13,'Raul Moreno','1313','13:01:00','2016-12-12',2,'moreno@gmail.com',2,1);
/*!40000 ALTER TABLE `Reservaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `name_user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'Alan Eduardo Ibarra Lopez','ibalop','holamundo','A'),(2,'Alan Ibarra','ibalop','holamundo','A'),(3,'Pedro Alvarez','pd','hola','A'),(4,'Pedro Ramirez','pds','hola','A'),(5,'Carlos Gonzalez','ibalop','hola','A'),(6,'root','root','root','A');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-08 15:58:45
