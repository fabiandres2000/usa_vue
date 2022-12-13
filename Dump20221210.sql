-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: usa
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `convenio`
--

DROP TABLE IF EXISTS `convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(400) DEFAULT NULL,
  `nit` varchar(400) DEFAULT NULL,
  `direccion` varchar(400) DEFAULT NULL,
  `representante_legal` varchar(400) DEFAULT NULL,
  `documento_convenio` varchar(400) DEFAULT NULL,
  `fecha_inicio` varchar(400) DEFAULT NULL,
  `fecha_final` varchar(400) DEFAULT NULL,
  `campo_educativo` varchar(400) DEFAULT NULL,
  `campo_social` varchar(400) DEFAULT NULL,
  `campo_organizacional` varchar(400) DEFAULT NULL,
  `campo_clinico_salud` varchar(400) DEFAULT NULL,
  `campo_juridico` varchar(400) DEFAULT NULL,
  `estado` varchar(45) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenio`
--

LOCK TABLES `convenio` WRITE;
/*!40000 ALTER TABLE `convenio` DISABLE KEYS */;
INSERT INTO `convenio` VALUES (1,'Centro Comercial Guatapuri','1344234','MZ 2 CASA 8 TAYRONA','Fabian Quintero','documento2022_12_09_08_02_08_PM.pdf','2022-12-09','2022-12-17','Si','Si','Si','No','No','1'),(2,'Mayales Plaza','134423443234','MZ 2 CASA 8 TAYRONA','Fabian Quintero','documento2022_12_09_08_05_12_PM.pdf','2022-12-16','2022-12-24','No','No','Si','No','Si','1'),(3,'Universidad Sergio Arboleda','546546456','MZ 2 CASA 8 TAYRONA','Fabian Quintero Mendez','documento2022_12_09_10_53_58_PM.pdf','2022-11-27','2022-12-10','Si','No','No','Si','No','1'),(4,'ICBF','7567567567','Barrio Centro','Cristian Quintero','documento2022_12_09_10_34_40_PM.pdf','2022-12-01','2022-12-08','Si','Si','Si','Si','Si','1');
/*!40000 ALTER TABLE `convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `semestre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asignado` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `registro_practica` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (2,'1008','Andres Quintero','3042065930','IX','2029-2','0','0'),(3,'1009','Andres Quintero 2','3042065930','IX','2029-2','0','0'),(4,'1010','Andres Quintero 3','3042065930','IX','2029-2','0','0'),(5,'1011','Andres Quintero 4','3042065930','I','2029-2','0','0'),(6,'1012','Andres Quintero 5','3042065930','II','2029-2','0','0'),(7,'1013','Andres Quintero 6','3042065930','IX','2029-2','0','0'),(8,'1014','Andres Quintero 7','3042065930','X','2029-2','0','0'),(9,'1015','Andres Quintero 8','3042065930','X','2029-2','0','0'),(10,'5654','Andres Quintero 9','3042065930','VIII','2029-2','0','0');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observacion`
--

DROP TABLE IF EXISTS `observacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_practica` varchar(400) DEFAULT NULL,
  `observaciones` longtext DEFAULT NULL,
  `archivo` varchar(400) DEFAULT NULL,
  `fecha_observacion` varchar(48) DEFAULT NULL,
  `hora_observacion` varchar(400) DEFAULT NULL,
  `usuario_realiza` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observacion`
--

LOCK TABLES `observacion` WRITE;
/*!40000 ALTER TABLE `observacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `observacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practica`
--

DROP TABLE IF EXISTS `practica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(400) DEFAULT NULL,
  `semestre` varchar(400) DEFAULT NULL,
  `fecha` varchar(400) DEFAULT NULL,
  `tema` varchar(400) DEFAULT NULL,
  `sitio` varchar(400) DEFAULT NULL,
  `tutor_sp` varchar(400) DEFAULT NULL,
  `valoracion_tutor_sp` varchar(400) DEFAULT NULL,
  `tutor_usa` varchar(400) DEFAULT NULL,
  `valoracion_tutor_usa` varchar(400) DEFAULT NULL,
  `proyecto` varchar(400) DEFAULT NULL,
  `aplico_instrumento` varchar(400) DEFAULT NULL,
  `instrumento` varchar(400) DEFAULT NULL,
  `excel_1` varchar(400) DEFAULT NULL,
  `aplico_instrumento_2` varchar(400) DEFAULT NULL,
  `instrumento_2` varchar(400) DEFAULT NULL,
  `excel_2` varchar(400) DEFAULT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practica`
--

LOCK TABLES `practica` WRITE;
/*!40000 ALTER TABLE `practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `practica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sociodemografico`
--

DROP TABLE IF EXISTS `sociodemografico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sociodemografico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` varchar(400) DEFAULT NULL,
  `nombre` varchar(400) DEFAULT NULL,
  `semestre` varchar(400) DEFAULT NULL,
  `tipo_id` varchar(400) DEFAULT NULL,
  `identifi` varchar(400) DEFAULT NULL,
  `edad` varchar(400) DEFAULT NULL,
  `sexo` varchar(400) DEFAULT NULL,
  `estrato` varchar(400) DEFAULT NULL,
  `celular` varchar(400) DEFAULT NULL,
  `ciudad` varchar(400) DEFAULT NULL,
  `cantidad_hijos` varchar(400) DEFAULT NULL,
  `dependencia` varchar(400) DEFAULT NULL,
  `sustancias` varchar(400) DEFAULT NULL,
  `frecuencia` varchar(400) DEFAULT NULL,
  `tratamiento` varchar(400) DEFAULT NULL,
  `cantidad_labora` varchar(400) DEFAULT NULL,
  `ciudad_uni` varchar(400) DEFAULT NULL,
  `personas_estudia` varchar(400) DEFAULT NULL,
  `actividad_fisica` varchar(400) DEFAULT NULL,
  `intensidad_fisica` varchar(400) DEFAULT NULL,
  `actividades` varchar(400) DEFAULT NULL,
  `horas` varchar(400) DEFAULT NULL,
  `enfermedad` varchar(400) DEFAULT NULL,
  `cual_enfermedad` varchar(400) DEFAULT NULL,
  `comidas` varchar(400) DEFAULT NULL,
  `icfes` varchar(400) DEFAULT NULL,
  `promedio` varchar(400) DEFAULT NULL,
  `periodo` varchar(400) DEFAULT NULL,
  `edad_madre` varchar(400) DEFAULT NULL,
  `estudios_madre` varchar(400) DEFAULT NULL,
  `dedicacion_madre` varchar(400) DEFAULT NULL,
  `edad_padre` varchar(400) DEFAULT NULL,
  `estudios_padre` varchar(400) DEFAULT NULL,
  `dedicacion_padre` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sociodemografico`
--

LOCK TABLES `sociodemografico` WRITE;
/*!40000 ALTER TABLE `sociodemografico` DISABLE KEYS */;
/*!40000 ALTER TABLE `sociodemografico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor_sp`
--

DROP TABLE IF EXISTS `tutor_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor_sp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(400) DEFAULT NULL,
  `apellidos` varchar(400) DEFAULT NULL,
  `correo` varchar(400) DEFAULT NULL,
  `celular` varchar(400) DEFAULT NULL,
  `cedula` varchar(400) DEFAULT NULL,
  `campo` varchar(400) DEFAULT NULL,
  `fecha` varchar(400) DEFAULT NULL,
  `id_convenio` varchar(400) DEFAULT NULL,
  `estado` varchar(45) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_sp`
--

LOCK TABLES `tutor_sp` WRITE;
/*!40000 ALTER TABLE `tutor_sp` DISABLE KEYS */;
INSERT INTO `tutor_sp` VALUES (1,'Andres','Quintero Mendez','andres345345@gmail.com','542354235235','564567456456','Campo Educativo','2022-II','4','1'),(2,'Blanca','Restrepo','jwalshy_g472f@gmail.com','3042065930','345342523','Campo Social','2022-I','2','1');
/*!40000 ALTER TABLE `tutor_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor_usa`
--

DROP TABLE IF EXISTS `tutor_usa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor_usa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(400) DEFAULT NULL,
  `apellidos` varchar(400) DEFAULT NULL,
  `correo` varchar(400) DEFAULT NULL,
  `celular` varchar(400) DEFAULT NULL,
  `cedula` varchar(400) DEFAULT NULL,
  `campo` varchar(400) DEFAULT NULL,
  `fecha` varchar(400) DEFAULT NULL,
  `documento_contrato` varchar(400) DEFAULT NULL,
  `estado` varchar(45) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_usa`
--

LOCK TABLES `tutor_usa` WRITE;
/*!40000 ALTER TABLE `tutor_usa` DISABLE KEYS */;
INSERT INTO `tutor_usa` VALUES (2,'fabian','del carmen','tutor_usa_1@usa.edu.co','3042065930','3242134123','Campo Educativo','2022-II','documento2022_12_10_04_18_39_PM.pdf','1'),(3,'Blanca','Quintero Mendez','tutor_usa_2@usa.edu.co','3042065930','567567457','Campo Organizacional','2022-II','documento2022_12_10_03_10_36_PM.pdf','0'),(4,'Andres','Mendoza Lopez','tutor_usa_3@usa.edu.co','3020659334','67457457','Campo clinico y salud','2022-I','documento2022_12_10_04_18_27_PM.pdf','1');
/*!40000 ALTER TABLE `tutor_usa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(405) DEFAULT NULL,
  `correo` varchar(405) DEFAULT NULL,
  `password` varchar(405) DEFAULT NULL,
  `foto` varchar(405) DEFAULT NULL,
  `tipo` varchar(405) DEFAULT NULL,
  `id_estudiante` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Admin','admin@usa.edu.co','ee61e766467546320854c3446ccde3d4','pic.png','Decanatura',NULL),(19,'Andres Quintero','grovveip@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','2'),(20,'Andres Quintero 2','grovveip2@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','3'),(21,'Andres Quintero 3','grovveip3@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','4'),(22,'Andres Quintero 4','grovveip4@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','5'),(23,'Andres Quintero 5','grovveip5@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','6'),(24,'Andres Quintero 6','grovveip6@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','7'),(25,'Andres Quintero 7','grovveip7@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','8'),(26,'Andres Quintero 8','grovveip8@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','9'),(27,'Andres Quintero 9','grovveip9@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','10'),(31,'Fabian Quintero','practicas@usa.edu.co','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Practicas',NULL),(33,'fabian del carmen','tutor_usa_1@usa.edu.co','9d5aae505f7a3df3741a3f6fc388e4bb','pic.png','Tutor USA',NULL),(34,'Blanca Quintero Mendez','tutor_usa_2@usa.edu.co','8c319cddaedbabb0d2737b08c042bc25','pic.png','Tutor USA',NULL),(35,'Andres Mendoza Lopez','tutor_usa_3@usa.edu.co','b1255b4c3590bd939a532f1f7a612cc0','pic.png','Tutor USA',NULL),(36,'Andres Quintero Mendez','andres345345@gmail.com','90f2ffd58fe77997e7c7e88d02b67dc3','pic.png','Tutor SP',NULL),(37,'Andres Quintero Mendez','andres345345@gmail.com','ce5aadd8a4533e8909f8d5d3b0eb690e','pic.png','Tutor SP',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-12 17:40:58