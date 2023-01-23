-- MariaDB dump 10.19  Distrib 10.5.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: TICKETING
-- ------------------------------------------------------
-- Server version	10.5.15-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `T_COMMENTAIRE`
--

DROP TABLE IF EXISTS `T_COMMENTAIRE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_COMMENTAIRE` (
  `COM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `COM_TICKET` int(11) NOT NULL,
  PRIMARY KEY (`COM_ID`),
  KEY `TICKET_ID` (`COM_TICKET`),
  CONSTRAINT `T_COMMENTAIRE_ibfk_1` FOREIGN KEY (`COM_TICKET`) REFERENCES `T_TICKET` (`TICKET_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_COMMENTAIRE`
--

LOCK TABLES `T_COMMENTAIRE` WRITE;
/*!40000 ALTER TABLE `T_COMMENTAIRE` DISABLE KEYS */;
INSERT INTO `T_COMMENTAIRE` VALUES (1,'2022-11-17 13:38:40','A. Nonyme','Bravo pour ce début',1),(2,'2022-11-17 13:38:46','Moi','Merci ! Je vais continuer sur ma lancée',1);
/*!40000 ALTER TABLE `T_COMMENTAIRE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_ETAT`
--

DROP TABLE IF EXISTS `T_ETAT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_ETAT` (
  `ETAT_CODE` int(11) NOT NULL,
  `ETAT_LIB` varchar(10) NOT NULL,
  PRIMARY KEY (`ETAT_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_ETAT`
--

LOCK TABLES `T_ETAT` WRITE;
/*!40000 ALTER TABLE `T_ETAT` DISABLE KEYS */;
INSERT INTO `T_ETAT` VALUES (0,'ouvert'),(1,'en dev'),(2,'fermé');
/*!40000 ALTER TABLE `T_ETAT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_TICKET`
--

DROP TABLE IF EXISTS `T_TICKET`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_TICKET` (
  `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TICKET_DATE` datetime NOT NULL,
  `TICKET_TITRE` varchar(100) NOT NULL,
  `TICKET_CONTENU` varchar(400) NOT NULL,
  `TICKET_ETAT` int(11) NOT NULL,
  PRIMARY KEY (`TICKET_ID`),
  KEY `BIL_ETAT` (`TICKET_ETAT`),
  CONSTRAINT `T_TICKET_ibfk_1` FOREIGN KEY (`TICKET_ETAT`) REFERENCES `T_ETAT` (`ETAT_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_TICKET`
--

LOCK TABLES `T_TICKET` WRITE;
/*!40000 ALTER TABLE `T_TICKET` DISABLE KEYS */;
INSERT INTO `T_TICKET` VALUES (1,'2022-11-17 13:38:40','Premier ticket','Bonjour ! Ceci est le premier ticket',2),(2,'2022-11-17 13:38:40','Au travail','Il faut enrichir ce ticketing dès maintenant.',0),(3,'2022-11-17 13:38:43','Ticket 3','Besoin d\'aide',1);
/*!40000 ALTER TABLE `T_TICKET` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-06  8:56:50
