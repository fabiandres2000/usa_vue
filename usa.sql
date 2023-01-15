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
-- Table structure for table `asignacion_practica`
--

DROP TABLE IF EXISTS `asignacion_practica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignacion_practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` varchar(45) DEFAULT NULL,
  `id_convenio` varchar(45) DEFAULT NULL,
  `id_tutor_sp` varchar(45) DEFAULT NULL,
  `id_tutor_usa` varchar(45) DEFAULT NULL,
  `campo` varchar(450) DEFAULT NULL,
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_final` varchar(45) DEFAULT NULL,
  `arl` varchar(450) DEFAULT NULL,
  `comunicado` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion_practica`
--

LOCK TABLES `asignacion_practica` WRITE;
/*!40000 ALTER TABLE `asignacion_practica` DISABLE KEYS */;
INSERT INTO `asignacion_practica` VALUES (6,'2','1','2','2','Campo Educativo','2022-12-20','2023-01-07','arl_2022_12_20_01_31_09_PM.pdf','comunicado_2022_12_20_01_31_09_PM.pdf'),(7,'3','2','3','2','Campo Educativo','2022-12-21','2022-12-31','arl_2022_12_20_01_31_12_PM.pdf','comunicado_2022_12_20_01_31_12_PM.pdf');
/*!40000 ALTER TABLE `asignacion_practica` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `convenio` VALUES (1,'Centro Comercial Guatapuri','1344234','MZ 2 CASA 8 TAYRONA','Fabian Quintero','documento2022_12_19_08_06_24_PM.pdf','2022-12-09','2022-12-31','Si','Si','Si','No','No','1'),(2,'Mayales Plaza','134423443234','MZ 2 CASA 8 TAYRONA','Fabian Quintero','documento2022_12_09_08_05_12_PM.pdf','2022-12-16','2022-12-24','No','No','Si','No','Si','1'),(3,'Universidad Sergio Arboleda','546546456','MZ 2 CASA 8 TAYRONA','Fabian Quintero Mendez','documento2022_12_09_10_53_58_PM.pdf','2022-11-27','2022-12-10','Si','No','No','Si','No','1'),(4,'ICBF','7567567567','Barrio Centro','Cristian Quintero','documento2022_12_19_08_06_10_PM.pdf','2022-12-01','2023-01-12','Si','Si','Si','Si','Si','1');
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
INSERT INTO `estudiante` VALUES (2,'1008','Andres Quintero','3042065930','IX','2029-2','1','0'),(3,'1009','Andres Quintero 2','3042065930','IX','2029-2','1','0'),(4,'1010','Andres Quintero 3','3042065930','IX','2029-2','0','0'),(5,'1011','Andres Quintero 4','3042065930','I','2029-2','0','0'),(6,'1012','Andres Quintero 5','3042065930','II','2029-2','0','0'),(7,'1013','Andres Quintero 6','3042065930','IX','2029-2','0','0'),(8,'1014','Andres Quintero 7','3042065930','X','2029-2','0','0'),(9,'1015','Andres Quintero 8','3042065930','X','2029-2','0','0'),(10,'5654','Andres Quintero 9','3042065930','VIII','2029-2','0','0');
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
  `fecha_observacion` varchar(408) DEFAULT NULL,
  `hora_observacion` varchar(400) DEFAULT NULL,
  `id_tutor` varchar(405) DEFAULT NULL,
  `tipo` varchar(405) DEFAULT NULL,
  `tipo_obs` varchar(405) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observacion`
--

LOCK TABLES `observacion` WRITE;
/*!40000 ALTER TABLE `observacion` DISABLE KEYS */;
INSERT INTO `observacion` VALUES (1,'1','prueba de correcciones','observacion_2023_01_15_08_02_46_PM.pdf','15-01-2023','08:02:46','2','USA','Tutor Universidad Sergio Arboleda'),(2,'1','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','observacion_2023_01_15_08_03_16_PM.pdf','15-01-2023','08:03:16','2','USA','Tutor Universidad Sergio Arboleda'),(3,'2','when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum','observacion_2023_01_15_08_03_46_PM.pdf','15-01-2023','08:03:46','2','USA','Tutor Universidad Sergio Arboleda');
/*!40000 ALTER TABLE `observacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personalidad_calificaciones`
--

DROP TABLE IF EXISTS `personalidad_calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personalidad_calificaciones` (
  `id_calificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` text NOT NULL,
  `Ansiedad` int(11) NOT NULL,
  `Hostilidad` int(11) NOT NULL,
  `Depresion` int(11) NOT NULL,
  `Ansiedad_Social` int(11) NOT NULL,
  `Impulsividad` int(11) NOT NULL,
  `Vulnerabilidad` int(11) NOT NULL,
  `Neuroticismo` int(11) NOT NULL,
  `Cordialidad` int(11) NOT NULL,
  `Gregarismo` int(11) NOT NULL,
  `Asertividad` int(11) NOT NULL,
  `Actividad` int(11) NOT NULL,
  `Busqueda_emociones` int(11) NOT NULL,
  `Emociones_positivas` int(11) NOT NULL,
  `Extraversion` int(11) NOT NULL,
  `Fantasia` int(11) NOT NULL,
  `Estetica` int(11) NOT NULL,
  `Sentimientos` int(11) NOT NULL,
  `Acciones` int(11) NOT NULL,
  `Ideas` int(11) NOT NULL,
  `Valores` int(11) NOT NULL,
  `Apertura` int(11) NOT NULL,
  `Confianza` int(11) NOT NULL,
  `Franqueza` int(11) NOT NULL,
  `Altruismo` int(11) NOT NULL,
  `A_Conciliadora` int(11) NOT NULL,
  `Modestia` int(11) NOT NULL,
  `Sensibilidad` int(11) NOT NULL,
  `Amabilidad` int(11) NOT NULL,
  `Competencia` int(11) NOT NULL,
  `Orden` int(11) NOT NULL,
  `Deber` int(11) NOT NULL,
  `Logro` int(11) NOT NULL,
  `Autodisciplina` int(11) NOT NULL,
  `Deliberacion` int(11) NOT NULL,
  `Responsabilidad` int(11) NOT NULL,
  `Negativismo` int(11) NOT NULL,
  `Aquiescencia` int(11) NOT NULL,
  PRIMARY KEY (`id_calificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personalidad_calificaciones`
--

LOCK TABLES `personalidad_calificaciones` WRITE;
/*!40000 ALTER TABLE `personalidad_calificaciones` DISABLE KEYS */;
INSERT INTO `personalidad_calificaciones` VALUES (1,'2',20,17,14,17,16,16,100,14,20,13,17,19,16,99,15,17,18,13,20,12,95,18,15,16,15,16,17,97,17,15,15,16,16,21,100,190,40),(2,'3',18,14,10,14,17,16,89,12,17,16,15,12,17,89,18,14,13,18,14,16,93,14,18,13,18,16,13,92,14,18,14,15,16,14,91,227,0);
/*!40000 ALTER TABLE `personalidad_calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personalidad_respuestas`
--

DROP TABLE IF EXISTS `personalidad_respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personalidad_respuestas` (
  `id_estudiante` varchar(45) NOT NULL,
  `preg_1` int(11) DEFAULT NULL,
  `preg_2` int(11) DEFAULT NULL,
  `preg_3` int(11) DEFAULT NULL,
  `preg_4` int(11) DEFAULT NULL,
  `preg_5` int(11) DEFAULT NULL,
  `preg_6` int(11) DEFAULT NULL,
  `preg_7` int(11) DEFAULT NULL,
  `preg_8` int(11) DEFAULT NULL,
  `preg_9` int(11) DEFAULT NULL,
  `preg_10` int(11) DEFAULT NULL,
  `preg_11` int(11) DEFAULT NULL,
  `preg_12` int(11) DEFAULT NULL,
  `preg_13` int(11) DEFAULT NULL,
  `preg_14` int(11) DEFAULT NULL,
  `preg_15` int(11) DEFAULT NULL,
  `preg_16` int(11) DEFAULT NULL,
  `preg_17` int(11) DEFAULT NULL,
  `preg_18` int(11) DEFAULT NULL,
  `preg_19` int(11) DEFAULT NULL,
  `preg_20` int(11) DEFAULT NULL,
  `preg_21` int(11) DEFAULT NULL,
  `preg_22` int(11) DEFAULT NULL,
  `preg_23` int(11) DEFAULT NULL,
  `preg_24` int(11) DEFAULT NULL,
  `preg_25` int(11) DEFAULT NULL,
  `preg_26` int(11) DEFAULT NULL,
  `preg_27` int(11) DEFAULT NULL,
  `preg_28` int(11) DEFAULT NULL,
  `preg_29` int(11) DEFAULT NULL,
  `preg_30` int(11) DEFAULT NULL,
  `preg_31` int(11) DEFAULT NULL,
  `preg_32` int(11) DEFAULT NULL,
  `preg_33` int(11) DEFAULT NULL,
  `preg_34` int(11) DEFAULT NULL,
  `preg_35` int(11) DEFAULT NULL,
  `preg_36` int(11) DEFAULT NULL,
  `preg_37` int(11) DEFAULT NULL,
  `preg_38` int(11) DEFAULT NULL,
  `preg_39` int(11) DEFAULT NULL,
  `preg_40` int(11) DEFAULT NULL,
  `bloque_1` int(11) DEFAULT NULL,
  `preg_41` int(11) DEFAULT NULL,
  `preg_42` int(11) DEFAULT NULL,
  `preg_43` int(11) DEFAULT NULL,
  `preg_44` int(11) DEFAULT NULL,
  `preg_45` int(11) DEFAULT NULL,
  `preg_46` int(11) DEFAULT NULL,
  `preg_47` int(11) DEFAULT NULL,
  `preg_48` int(11) DEFAULT NULL,
  `preg_49` int(11) DEFAULT NULL,
  `preg_50` int(11) DEFAULT NULL,
  `preg_51` int(11) DEFAULT NULL,
  `preg_52` int(11) DEFAULT NULL,
  `preg_53` int(11) DEFAULT NULL,
  `preg_54` int(11) DEFAULT NULL,
  `preg_55` int(11) DEFAULT NULL,
  `preg_56` int(11) DEFAULT NULL,
  `preg_57` int(11) DEFAULT NULL,
  `preg_58` int(11) DEFAULT NULL,
  `preg_59` int(11) DEFAULT NULL,
  `preg_60` int(11) DEFAULT NULL,
  `preg_61` int(11) DEFAULT NULL,
  `preg_62` int(11) DEFAULT NULL,
  `preg_63` int(11) DEFAULT NULL,
  `preg_64` int(11) DEFAULT NULL,
  `preg_65` int(11) DEFAULT NULL,
  `preg_66` int(11) DEFAULT NULL,
  `preg_67` int(11) DEFAULT NULL,
  `preg_68` int(11) DEFAULT NULL,
  `preg_69` int(11) DEFAULT NULL,
  `preg_70` int(11) DEFAULT NULL,
  `preg_71` int(11) DEFAULT NULL,
  `preg_72` int(11) DEFAULT NULL,
  `preg_73` int(11) DEFAULT NULL,
  `preg_74` int(11) DEFAULT NULL,
  `preg_75` int(11) DEFAULT NULL,
  `preg_76` int(11) DEFAULT NULL,
  `preg_77` int(11) DEFAULT NULL,
  `preg_78` int(11) DEFAULT NULL,
  `preg_79` int(11) DEFAULT NULL,
  `preg_80` int(11) DEFAULT NULL,
  `bloque_2` int(11) DEFAULT NULL,
  `preg_81` int(11) DEFAULT NULL,
  `preg_82` int(11) DEFAULT NULL,
  `preg_83` int(11) DEFAULT NULL,
  `preg_84` int(11) DEFAULT NULL,
  `preg_85` int(11) DEFAULT NULL,
  `preg_86` int(11) DEFAULT NULL,
  `preg_87` int(11) DEFAULT NULL,
  `preg_88` int(11) DEFAULT NULL,
  `preg_89` int(11) DEFAULT NULL,
  `preg_90` int(11) DEFAULT NULL,
  `preg_91` int(11) DEFAULT NULL,
  `preg_92` int(11) DEFAULT NULL,
  `preg_93` int(11) DEFAULT NULL,
  `preg_94` int(11) DEFAULT NULL,
  `preg_95` int(11) DEFAULT NULL,
  `preg_96` int(11) DEFAULT NULL,
  `preg_97` int(11) DEFAULT NULL,
  `preg_98` int(11) DEFAULT NULL,
  `preg_99` int(11) DEFAULT NULL,
  `preg_100` int(11) DEFAULT NULL,
  `preg_101` int(11) DEFAULT NULL,
  `preg_102` int(11) DEFAULT NULL,
  `preg_103` int(11) DEFAULT NULL,
  `preg_104` int(11) DEFAULT NULL,
  `preg_105` int(11) DEFAULT NULL,
  `preg_106` int(11) DEFAULT NULL,
  `preg_107` int(11) DEFAULT NULL,
  `preg_108` int(11) DEFAULT NULL,
  `preg_109` int(11) DEFAULT NULL,
  `preg_110` int(11) DEFAULT NULL,
  `preg_111` int(11) DEFAULT NULL,
  `preg_112` int(11) DEFAULT NULL,
  `preg_113` int(11) DEFAULT NULL,
  `preg_114` int(11) DEFAULT NULL,
  `preg_115` int(11) DEFAULT NULL,
  `preg_116` int(11) DEFAULT NULL,
  `preg_117` int(11) DEFAULT NULL,
  `preg_118` int(11) DEFAULT NULL,
  `preg_119` int(11) DEFAULT NULL,
  `preg_120` int(11) DEFAULT NULL,
  `bloque_3` int(11) DEFAULT NULL,
  `preg_121` int(11) DEFAULT NULL,
  `preg_122` int(11) DEFAULT NULL,
  `preg_123` int(11) DEFAULT NULL,
  `preg_124` int(11) DEFAULT NULL,
  `preg_125` int(11) DEFAULT NULL,
  `preg_126` int(11) DEFAULT NULL,
  `preg_127` int(11) DEFAULT NULL,
  `preg_128` int(11) DEFAULT NULL,
  `preg_129` int(11) DEFAULT NULL,
  `preg_130` int(11) DEFAULT NULL,
  `preg_131` int(11) DEFAULT NULL,
  `preg_132` int(11) DEFAULT NULL,
  `preg_133` int(11) DEFAULT NULL,
  `preg_134` int(11) DEFAULT NULL,
  `preg_135` int(11) DEFAULT NULL,
  `preg_136` int(11) DEFAULT NULL,
  `preg_137` int(11) DEFAULT NULL,
  `preg_138` int(11) DEFAULT NULL,
  `preg_139` int(11) DEFAULT NULL,
  `preg_140` int(11) DEFAULT NULL,
  `preg_141` int(11) DEFAULT NULL,
  `preg_142` int(11) DEFAULT NULL,
  `preg_143` int(11) DEFAULT NULL,
  `preg_144` int(11) DEFAULT NULL,
  `preg_145` int(11) DEFAULT NULL,
  `preg_146` int(11) DEFAULT NULL,
  `preg_147` int(11) DEFAULT NULL,
  `preg_148` int(11) DEFAULT NULL,
  `preg_149` int(11) DEFAULT NULL,
  `preg_150` int(11) DEFAULT NULL,
  `preg_151` int(11) DEFAULT NULL,
  `preg_152` int(11) DEFAULT NULL,
  `preg_153` int(11) DEFAULT NULL,
  `preg_154` int(11) DEFAULT NULL,
  `preg_155` int(11) DEFAULT NULL,
  `preg_156` int(11) DEFAULT NULL,
  `preg_157` int(11) DEFAULT NULL,
  `preg_158` int(11) DEFAULT NULL,
  `preg_159` int(11) DEFAULT NULL,
  `preg_160` int(11) DEFAULT NULL,
  `bloque_4` int(11) DEFAULT NULL,
  `preg_161` int(11) DEFAULT NULL,
  `preg_162` int(11) DEFAULT NULL,
  `preg_163` int(11) DEFAULT NULL,
  `preg_164` int(11) DEFAULT NULL,
  `preg_165` int(11) DEFAULT NULL,
  `preg_166` int(11) DEFAULT NULL,
  `preg_167` int(11) DEFAULT NULL,
  `preg_168` int(11) DEFAULT NULL,
  `preg_169` int(11) DEFAULT NULL,
  `preg_170` int(11) DEFAULT NULL,
  `preg_171` int(11) DEFAULT NULL,
  `preg_172` int(11) DEFAULT NULL,
  `preg_173` int(11) DEFAULT NULL,
  `preg_174` int(11) DEFAULT NULL,
  `preg_175` int(11) DEFAULT NULL,
  `preg_176` int(11) DEFAULT NULL,
  `preg_177` int(11) DEFAULT NULL,
  `preg_178` int(11) DEFAULT NULL,
  `preg_179` int(11) DEFAULT NULL,
  `preg_180` int(11) DEFAULT NULL,
  `preg_181` int(11) DEFAULT NULL,
  `preg_182` int(11) DEFAULT NULL,
  `preg_183` int(11) DEFAULT NULL,
  `preg_184` int(11) DEFAULT NULL,
  `preg_185` int(11) DEFAULT NULL,
  `preg_186` int(11) DEFAULT NULL,
  `preg_187` int(11) DEFAULT NULL,
  `preg_188` int(11) DEFAULT NULL,
  `preg_189` int(11) DEFAULT NULL,
  `preg_190` int(11) DEFAULT NULL,
  `preg_191` int(11) DEFAULT NULL,
  `preg_192` int(11) DEFAULT NULL,
  `preg_193` int(11) DEFAULT NULL,
  `preg_194` int(11) DEFAULT NULL,
  `preg_195` int(11) DEFAULT NULL,
  `preg_196` int(11) DEFAULT NULL,
  `preg_197` int(11) DEFAULT NULL,
  `preg_198` int(11) DEFAULT NULL,
  `preg_199` int(11) DEFAULT NULL,
  `preg_200` int(11) DEFAULT NULL,
  `bloque_5` int(11) DEFAULT NULL,
  `preg_201` int(11) DEFAULT NULL,
  `preg_202` int(11) DEFAULT NULL,
  `preg_203` int(11) DEFAULT NULL,
  `preg_204` int(11) DEFAULT NULL,
  `preg_205` int(11) DEFAULT NULL,
  `preg_206` int(11) DEFAULT NULL,
  `preg_207` int(11) DEFAULT NULL,
  `preg_208` int(11) DEFAULT NULL,
  `preg_209` int(11) DEFAULT NULL,
  `preg_210` int(11) DEFAULT NULL,
  `preg_211` int(11) DEFAULT NULL,
  `preg_212` int(11) DEFAULT NULL,
  `preg_213` int(11) DEFAULT NULL,
  `preg_214` int(11) DEFAULT NULL,
  `preg_215` int(11) DEFAULT NULL,
  `preg_216` int(11) DEFAULT NULL,
  `preg_217` int(11) DEFAULT NULL,
  `preg_218` int(11) DEFAULT NULL,
  `preg_219` int(11) DEFAULT NULL,
  `preg_220` int(11) DEFAULT NULL,
  `preg_221` int(11) DEFAULT NULL,
  `preg_222` int(11) DEFAULT NULL,
  `preg_223` int(11) DEFAULT NULL,
  `preg_224` int(11) DEFAULT NULL,
  `preg_225` int(11) DEFAULT NULL,
  `preg_226` int(11) DEFAULT NULL,
  `preg_227` int(11) DEFAULT NULL,
  `preg_228` int(11) DEFAULT NULL,
  `preg_229` int(11) DEFAULT NULL,
  `preg_230` int(11) DEFAULT NULL,
  `preg_231` int(11) DEFAULT NULL,
  `preg_232` int(11) DEFAULT NULL,
  `preg_233` int(11) DEFAULT NULL,
  `preg_234` int(11) DEFAULT NULL,
  `preg_235` int(11) DEFAULT NULL,
  `preg_236` int(11) DEFAULT NULL,
  `preg_237` int(11) DEFAULT NULL,
  `preg_238` int(11) DEFAULT NULL,
  `preg_239` int(11) DEFAULT NULL,
  `preg_240` int(11) DEFAULT NULL,
  `bloque_6` int(11) DEFAULT NULL,
  `estado_calificado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personalidad_respuestas`
--

LOCK TABLES `personalidad_respuestas` WRITE;
/*!40000 ALTER TABLE `personalidad_respuestas` DISABLE KEYS */;
INSERT INTO `personalidad_respuestas` VALUES ('2',0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,2,1,1,1,1,1,1,2,1,1,1,4,4,4,4,4,4,4,4,4,4,4,4,4,4,3,4,4,4,4,4,4,4,4,3,4,4,4,4,4,3,4,4,4,4,4,4,4,3,4,4,1,1),('3',0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,0,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,2,1,1,1,1,2,1,1,1,1,2,1,1,1,2,1,1,1),('undefined',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0);
/*!40000 ALTER TABLE `personalidad_respuestas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practica`
--

LOCK TABLES `practica` WRITE;
/*!40000 ALTER TABLE `practica` DISABLE KEYS */;
INSERT INTO `practica` VALUES (1,'Andres Quintero','X','2023-1','prueba de practicas 2','1','2','3.0','2','4.0','practica2023_01_10_04_23_57_PM.pdf','si','Ninguno editado','excel_1_R2023_01_10_04_23_57_PM.xlsx','si','Ninguno editado x 2','excel_2_R2023_01_10_04_23_57_PM.xlsx',2),(2,'Andres Quintero 2','X','2029-2','prueba de practicas 23423423','2','3','5','2','5','practica2023_01_13_01_56_26_AM.pdf','no','Ninguno','','si','Ninguno editado x 2','excel_2_R2023_01_13_01_56_26_AM.xlsx',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sociodemografico`
--

LOCK TABLES `sociodemografico` WRITE;
/*!40000 ALTER TABLE `sociodemografico` DISABLE KEYS */;
INSERT INTO `sociodemografico` VALUES (1,'2','andres quintero','IX','TI','1008','23','Masulino','Estrato 1','3042065930','valledupar','1','Madre','Si','Una vez al día','No','1 a 8','Santa Marta','Padre-Madre-Hermano(s)','Semanalmente','Hasta media hora','Pasear-Practicar deporte-Salir con amigos','2','No','no','Sopa-Verduras-Papa','234','4.8','2022-2','34','Bachiller','Ama de casa','34','No es bachiller','Independiente');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_sp`
--

LOCK TABLES `tutor_sp` WRITE;
/*!40000 ALTER TABLE `tutor_sp` DISABLE KEYS */;
INSERT INTO `tutor_sp` VALUES (2,'Blanca','del carmen','grovveip4213412341234@gmail.com','3042065930','4523452345','Campo Educativo','2022-I','1','1'),(3,'kariako Jose','Mendez Quintero','kariako.mendez@gmail.com','2134234234','34523452345','Campo Social','2022-I','2','1'),(4,'Jorge','Restrepo','joge@gmail.com','3042065930','1008','Campo Social','2022-II','2','1'),(5,'patricia','del carmen','psti@gmail.com','3042065930','546234656','Campo Organizacional','2022-II','2','1'),(6,'Cristian Jose','Quintero Mendez','cristian@usa.edu.co','3042065930','1009','Campo Educativo','2022-II','1','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_usa`
--

LOCK TABLES `tutor_usa` WRITE;
/*!40000 ALTER TABLE `tutor_usa` DISABLE KEYS */;
INSERT INTO `tutor_usa` VALUES (1,'Blanca','Mendez','fab.mendez.18@gmail.com','3042065930','342342134','Campo Educativo','2022-I','documento2022_12_15_02_31_08_PM.pdf','1'),(2,'Andres','Restrepo Gonzales','andres@gmail.com','3042065930','1008','Campo Organizacional','2022-I','documento2022_12_15_02_55_20_PM.pdf','1'),(3,'Prueba','Mendez','grovveip22341234@gmail.com','3042065930','412341234','Campo Social','2022-I','documento2022_12_15_02_40_47_PM.pdf','1');
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
  `id_tutor_usa` varchar(45) DEFAULT NULL,
  `id_tutor_sp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Admin','admin@usa.edu.co','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Decanatura',NULL,NULL,NULL),(19,'Andres Quintero','grovveip@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','2',NULL,NULL),(20,'Andres Quintero 2','grovveip2@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','3',NULL,NULL),(21,'Andres Quintero 3','grovveip3@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','4',NULL,NULL),(22,'Andres Quintero 4','grovveip4@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','5',NULL,NULL),(23,'Andres Quintero 5','grovveip5@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','6',NULL,NULL),(24,'Andres Quintero 6','grovveip6@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','7',NULL,NULL),(25,'Andres Quintero 7','grovveip7@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','8',NULL,NULL),(26,'Andres Quintero 8','grovveip8@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','9',NULL,NULL),(27,'Andres Quintero 9','grovveip9@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Estudiante','10',NULL,NULL),(31,'Fabian Quintero','practicas@usa.edu.co','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Practicas',NULL,NULL,NULL),(42,'Blanca Mendez','fab.mendez.18@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor USA',NULL,'1',NULL),(43,'Andres Restrepo Gonzales','andres@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor USA',NULL,'2',NULL),(44,'Prueba Mendez','grovveip22341234@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor USA',NULL,'3',NULL),(45,'Blanca del carmen','grovveip4213412341234@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor SP',NULL,NULL,'2'),(46,'kariako Jose Mendez Quintero','kariako.mendez@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor SP',NULL,NULL,'3'),(47,'Jorge Restrepo','joge@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor SP',NULL,NULL,'4'),(48,'patricia del carmen','psti@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor SP',NULL,NULL,'5'),(49,'Cristian Jose Quintero Mendez','cristian@usa.edu.co','827ccb0eea8a706c4c34a16891f84e7b','pic.png','Tutor SP',NULL,NULL,'6');
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

-- Dump completed on 2023-01-15 18:41:10
