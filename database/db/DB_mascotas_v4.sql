-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: proyecto_mascotas
-- ------------------------------------------------------
-- Server version	8.0.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mascotas` (
  `id_mascotas` int unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int unsigned DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo` enum('PERRO','GATO','OTRO') NOT NULL,
  `sexo` enum('M','H') DEFAULT NULL,
  `tamaño` enum('CHICO','MEDIANO','GRANDE') DEFAULT NULL,
  `edad` enum('CACHORRO','MEDIANO','ADULTO') DEFAULT NULL,
  `estado` enum('PERDIDA','ENCONTRADA') NOT NULL,
  `zona` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `fechaPerdidaOEncontrada` date DEFAULT NULL,
  `estadoAviso` enum('PENDIENTE','ACEPTADO','RECHAZADO') DEFAULT 'PENDIENTE',
  PRIMARY KEY (`id_mascotas`),
  KEY `fk_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascotas`
--

LOCK TABLES `mascotas` WRITE;
/*!40000 ALTER TABLE `mascotas` DISABLE KEYS */;
INSERT INTO `mascotas` VALUES (1,1,'Pericles','OTRO','M','CHICO','CACHORRO','PERDIDA',NULL,'La Matanza',NULL,'mascotas/otro(1).png',NULL,'PENDIENTE'),(2,1,'Manuelita','OTRO','H','CHICO','ADULTO','PERDIDA',NULL,'Pehuaho',NULL,'mascotas/otro(1).jpg',NULL,'PENDIENTE'),(3,2,'Braulio','OTRO','M','MEDIANO','CACHORRO','ENCONTRADA',NULL,'Avellaneda',NULL,'mascotas/otro(2).jpg','2020-06-01','PENDIENTE'),(4,2,'Carlos','OTRO','M','CHICO','CACHORRO','PERDIDA',NULL,'Ayacucho',NULL,'mascotas/otro(3).jpg','1997-05-02','PENDIENTE'),(5,3,'Filomena','OTRO','H','MEDIANO','CACHORRO','ENCONTRADA',NULL,'Bahia Blanca',NULL,'mascotas/otro(4).jpg',NULL,'PENDIENTE'),(6,3,'Loki','PERRO','M','CHICO','CACHORRO','PERDIDA',NULL,'Balcarce',NULL,'mascotas/perro(1).jpeg',NULL,'PENDIENTE'),(7,4,'Filomena','OTRO','H','MEDIANO','CACHORRO','ENCONTRADA',NULL,'Avellaneda',NULL,'mascotas/otro(5).jpg',NULL,'PENDIENTE'),(8,4,'Loki','PERRO','M','CHICO','CACHORRO','PERDIDA',NULL,'Ayacucho',NULL,'mascotas/perro(1).png',NULL,'PENDIENTE'),(9,5,'Laika','OTRO','H','GRANDE','CACHORRO','ENCONTRADA',NULL,'Benavidez',NULL,'mascotas/otro(6).jpg',NULL,'PENDIENTE'),(10,5,'Pancho','PERRO','M','GRANDE','CACHORRO','PERDIDA',NULL,'Bolivar',NULL,'mascotas/perro(1).jpg',NULL,'PENDIENTE'),(11,6,'Goofy','OTRO','M','CHICO','CACHORRO','ENCONTRADA',NULL,'Burzaco',NULL,'mascotas/otro(7).jpg',NULL,'PENDIENTE'),(12,6,'Niebla','PERRO','H','MEDIANO','CACHORRO','PERDIDA',NULL,'Cañuelas',NULL,'mascotas/perro(2).jpg',NULL,'PENDIENTE'),(13,7,'Gary','OTRO','M','CHICO','MEDIANO','ENCONTRADA',NULL,'Caseros',NULL,'mascotas/otro(8).jpg',NULL,'PENDIENTE'),(14,7,'Rocky','PERRO','M','MEDIANO','ADULTO','PERDIDA',NULL,'Castelar',NULL,'mascotas/perro(3).jpg',NULL,'PENDIENTE'),(15,8,'Jalba','OTRO','H','CHICO','MEDIANO','ENCONTRADA',NULL,'Chacabuco',NULL,'mascotas/otro(9).jpg',NULL,'PENDIENTE'),(16,8,'Punky','GATO','M','MEDIANO','ADULTO','PERDIDA',NULL,'Chivilcoy',NULL,'mascotas/gato(1).jpg',NULL,'PENDIENTE'),(17,9,'Cooper','OTRO','M','GRANDE','ADULTO','ENCONTRADA',NULL,'Dock Sud',NULL,'mascotas/otro(10).jpg',NULL,'PENDIENTE'),(18,9,'Loki','GATO','M','MEDIANO','CACHORRO','PERDIDA',NULL,'Dolores','','mascotas/gato(2).jpg',NULL,'PENDIENTE'),(19,10,'Dexter','OTRO','M','CHICO','CACHORRO','ENCONTRADA',NULL,'Dock Sud',NULL,'mascotas/otro(11).jpg',NULL,'PENDIENTE'),(20,10,'Volton','GATO','M','GRANDE','CACHORRO','PERDIDA',NULL,'Dolores',NULL,'mascotas/gato(3).jpg',NULL,'PENDIENTE'),(21,11,'Darcy','PERRO','H','CHICO','CACHORRO','ENCONTRADA',NULL,'El Palomar',NULL,'mascotas/perro(4).jpg',NULL,'PENDIENTE'),(22,11,'Volton','PERRO','M','GRANDE','CACHORRO','PERDIDA',NULL,'Dolores',NULL,'mascotas/perro(5).jpg',NULL,'PENDIENTE'),(23,12,'Kurt','PERRO','M','CHICO','ADULTO','ENCONTRADA',NULL,'General Lavalle',NULL,'mascotas/perro(6).jpg',NULL,'PENDIENTE'),(24,12,'Larry','PERRO','M','GRANDE','MEDIANO','PERDIDA',NULL,'Guernica',NULL,'mascotas/perro(7).jpg',NULL,'PENDIENTE'),(25,13,'Baxter','PERRO','M','CHICO','CACHORRO','ENCONTRADA',NULL,'Haedo',NULL,'mascotas/perro(8).jpg',NULL,'PENDIENTE'),(26,13,'Blue','PERRO','H','CHICO','MEDIANO','PERDIDA',NULL,'Hurlingam',NULL,'mascotas/perro(9).jpg',NULL,'PENDIENTE'),(27,14,'Lorenzo','PERRO','M','CHICO','CACHORRO','ENCONTRADA',NULL,'Haedo',NULL,'mascotas/perro(10).jpg',NULL,'PENDIENTE'),(28,14,'Pluto','PERRO','H','CHICO','CACHORRO','PERDIDA',NULL,'Ituzaingo',NULL,'mascotas/perro(11).jpg',NULL,'PENDIENTE'),(29,15,'Felix','GATO','M','GRANDE','MEDIANO','ENCONTRADA',NULL,'Zarate',NULL,'mascotas/gato(4).jpg',NULL,'PENDIENTE'),(30,15,'Peggy','PERRO','H','GRANDE','ADULTO','PERDIDA',NULL,'Zarate',NULL,'mascotas/perro(13).jpg',NULL,'PENDIENTE'),(31,16,'Hipolito','GATO','H','MEDIANO','MEDIANO','ENCONTRADA',NULL,'Lanus',NULL,'mascotas/gato(5).jpg',NULL,'PENDIENTE'),(32,16,'Slot','PERRO','M','GRANDE','ADULTO','PERDIDA',NULL,'Lincoln',NULL,'mascotas/perro(14).jpg',NULL,'PENDIENTE'),(33,17,'Leonidas','GATO','M','CHICO','CACHORRO','ENCONTRADA',NULL,'Loberia',NULL,'mascotas/gato(6).jpg',NULL,'PENDIENTE'),(34,17,'Apolo','PERRO','M','GRANDE','MEDIANO','PERDIDA',NULL,'Magdalena',NULL,'mascotas/perro(15).jpg',NULL,'PENDIENTE'),(35,18,'Cloe','GATO','H','MEDIANO','ADULTO','ENCONTRADA',NULL,'Merlo',NULL,'mascotas/gato(7).jpg',NULL,'PENDIENTE'),(36,18,'Greta','PERRO','H','GRANDE','CACHORRO','PERDIDA',NULL,'Monte Hermoso',NULL,'mascotas/perro(16).jpg',NULL,'PENDIENTE'),(37,19,'Frida','GATO','H','CHICO','ADULTO','ENCONTRADA',NULL,'Navarro',NULL,'mascotas/gato(8).jpg',NULL,'PENDIENTE'),(38,19,'Aurora','PERRO','H','MEDIANO','CACHORRO','PERDIDA',NULL,'Necochea',NULL,'mascotas/perro(17).jpg',NULL,'PENDIENTE'),(39,20,'Coca','PERRO','H','GRANDE','MEDIANO','ENCONTRADA',NULL,'Olavarria',NULL,'mascotas/perro(18).jpg',NULL,'PENDIENTE'),(40,20,'Simba','PERRO','M','MEDIANO','CACHORRO','PERDIDA',NULL,'Pilar',NULL,'mascotas/perro(19).jpg',NULL,'PENDIENTE'),(41,21,'Roman','PERRO','M','CHICO','MEDIANO','ENCONTRADA',NULL,'Saladillo',NULL,'mascotas/perro(20).jpg',NULL,'PENDIENTE'),(42,21,'Tevez','PERRO','M','MEDIANO','CACHORRO','PERDIDA',NULL,'Salto',NULL,'mascotas/perro(21).jpg',NULL,'PENDIENTE'),(43,22,'Salvio','PERRO','M','CHICO','CACHORRO','ENCONTRADA',NULL,'Roque Perez',NULL,'mascotas/perro(22).jpg',NULL,'PENDIENTE'),(44,22,'Pavon','PERRO','M','CHICO','CACHORRO','PERDIDA',NULL,'San Fernando',NULL,'mascotas/perro(23).jpg',NULL,'PENDIENTE'),(45,23,'Frank','PERRO','M','CHICO','MEDIANO','ENCONTRADA',NULL,'San Isidro',NULL,'mascotas/perro(24).jpg',NULL,'PENDIENTE'),(46,23,'Almendra','GATO','H','CHICO','ADULTO','PERDIDA',NULL,'San Isidro',NULL,'mascotas/gato(9).jpg',NULL,'PENDIENTE'),(47,24,'Charlie','PERRO','M','MEDIANO','MEDIANO','ENCONTRADA',NULL,'Santa Maria',NULL,'mascotas/perro(25).jpg',NULL,'PENDIENTE'),(48,24,'Fluffy','GATO','H','CHICO','CACHORRO','PERDIDA',NULL,'Buenos Aires',NULL,'mascotas/gato(10).jpg',NULL,'PENDIENTE'),(49,25,'Anya','PERRO','H','MEDIANO','CACHORRO','ENCONTRADA',NULL,'Sarandi',NULL,'mascotas/perro(26).jpg',NULL,'PENDIENTE'),(50,25,'Fifi','GATO','H','CHICO','ADULTO','PERDIDA',NULL,'Tandil',NULL,'mascotas/gato(11).jpg',NULL,'PENDIENTE'),(51,25,'Pichichus','PERRO','M','MEDIANO','MEDIANO','ENCONTRADA','barrio pichincha','Berazategui',NULL,'mascotas/tqRrBMAgNZtDmXRCKZgoavigfyv1gxgWEzY1js4e.jpg',NULL,'PENDIENTE'),(52,25,'Berazategui','GATO','M','CHICO','MEDIANO','ENCONTRADA',NULL,'54545',NULL,'default_mascota.png',NULL,'PENDIENTE'),(53,25,'LOLA','GATO','H','CHICO','ADULTO','PERDIDA',NULL,'blablaa',NULL,'default_mascota.png','2021-11-14','PENDIENTE');
/*!40000 ALTER TABLE `mascotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int unsigned NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` int unsigned DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `esAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `nroDeAvisos` int unsigned DEFAULT '0',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'agustinma','agustinmartnez@gmail.com','agusm202202','Agustin','Martinez',115438994,'Buenos Aires',NULL,0,0),(2,'maurilucero','maurilucero@gmail.com','ml418913','Mauricio','Lucero',1156546456,'Buenos Aires',NULL,0,0),(3,'cristianpa','cpacheco@gmail.com','cp131313','Cristian','Pacheco',115645631,'Buenos Aires',NULL,0,0),(4,'sebaespi','sebaespinoza@gmail.com','999999999','Sebastian','Espinoza',115147399,'Buenos Aires',NULL,0,0),(5,'aguspal','agustinapalermo@gmail.com','apal1388','Agustina','Palermo',115177139,'Buenos Aires',NULL,0,0),(6,'verobazan','verobazan@gmail.com','veronica123','Veronica','Bazan',112324569,'Buenos Aires',NULL,0,0),(7,'alfonsorod','alfonrod@gmail.com','446688','Alfonso','Rodriguez',114414569,'Buenos Aires',NULL,0,0),(8,'luciofernandez','lfernandez@gmail.com','lf44lf13','Lucio','Fernandez',114889941,'Buenos Aires',NULL,0,0),(9,'juliojimenez','julioj@gmail.com','123456789','Julio','Jimenez',115566712,'Buenos Aires',NULL,0,0),(10,'maxirodriguez','mrod13@gmail.com','546456456','Maxi','Rodriguez',1154886321,'Buenos Aires',NULL,0,0),(11,'paolosarmiento','paolosarmiento@gmail.com','psar1388','Paolo','Sarmiento',115654321,'Buenos Aires',NULL,0,0),(12,'jimeparlanti','jimenaparlanti@gmail.com','jparla5464','Jimena','Parlanti',115678451,'Buenos Aires',NULL,0,0),(13,'nicanor33','nicanor22@gmail.com','ncar213321','Nicanor','Fernandez',115677441,'Buenos Aires',NULL,0,0),(14,'aleayos','a.ayos@hotmail.com','13331','Alejandro','Ayos',216546589,'Mendoza','Ciudad',1,0),(15,'josefina22','joselopez24@gmail.com','202202','Josefina','Lopez',115442644,'Buenos Aires',NULL,0,0),(16,'pablosuarez','psuarez95@gmail.com','45678','Pablo','Suarez',115355656,'PBA','La Matanza',1,0),(17,'eugeniotorres','etorres45@gmail.com','91199','Eugenio','Torres',1156456544,'Buenos Aires',NULL,0,0),(18,'feliperobledo','frobledo@hotmail.com','99863','Felipe','Robledo',115886456,'CABA','Capital Federal',1,0),(19,'lautaromm','lautaromendez@gmail.com','453478','Lautaro','Mendez',1156546572,'Buenos Aires',NULL,0,0),(20,'valuserv','valuserv@hotmail.com','456813','Val','Serv',112132445,'CABA','Capital Federal',1,0),(21,'mmilagros','mmilagroz@gmail.com','881564','Milagros','Rodriguez',1154989564,'Buenos Aires',NULL,0,0),(22,'chris','ianchris@hotmail.com','121813','Ian','Chris',115324599,'CABA','Capital Federal',1,0),(23,'guadalupe99','guadavargas@gmail.com','112264','Guadalupe','Vargas',115699321,'Buenos Aires',NULL,0,0),(24,'lula','lulari@hotmail.com','77153813','Laura','Rie',11546465,'CABA','Capital Federal',1,0),(25,'jacinta20','jazalonso@gmail.com','ab55123','Jacinta','Alonso',115943213,'Buenos Aires',NULL,0,0),(26,'brianyn','brianyanelli@hotmail.com','888888','Brian','Yanelli',11588865,'CABA','Capital Federal',1,0),(27,'elsapito','elsapito22@gmail.com','el454333','Elias','Tobares',1153129321,'Buenos Aires',NULL,0,0),(28,'juampi','juampo90@gmail.com','js11111','Juan Pablo','Spal',114848948,'CABA','Capital Federal',1,0),(29,'luquitas33','luquitas33@gmail.com','544133lu','Lucas','Alario',115964456,'Buenos Aires',NULL,0,0),(30,'marcelogal','elmuneco@gmail.com','178913','Marcelo','Gallardo',114848948,'Merlo','Buenos Aires',1,0),(31,'leopiscu','leopiscu@gmail.com','77321','Leonardo','Pisculichi',115645647,'Buenos Aires',NULL,0,0),(32,'enzofran','enzofran@gmail.com','99421','Enzo','Franchesco',11994564,'La Plata','Buenos Aires',1,0),(33,'miltonc','mcasco@gmail.com','72211mil','Milton','Casco',1152345324,'Buenos Aires',NULL,0,0),(34,'javipin','jpinola@gmail.com','442121','Javier','Pinola',11441556,'Olivos','Buenos Aires',1,0),(36,'enzope','enzope@gmail.com','778899','Enzo','Perez',11546456,'Maipu','Mendoza',1,0),(37,'jalvarez','laarana@gmail.com','123211ju','Julian','Alvarez',1154654564,'Buenos Aires',NULL,0,0),(38,NULL,'tomas23058@gmail.com','1223213','rew3','erewr',NULL,'Berazategui','Berazategui',0,0),(39,NULL,'carlos1234344@gmail.com','1231231245','casdfew','r23423',43434,NULL,'324',0,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-21 13:42:27
