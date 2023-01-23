-- MariaDB dump 10.19  Distrib 10.5.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ticketing
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
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `G_ID` int(8) NOT NULL,
  `G_LIB` varchar(16) NOT NULL,
  PRIMARY KEY (`G_ID`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`G_ID`) REFERENCES `whitelist` (`WL_USER_GROUP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (0,'membre'),(1,'support');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `M_ID` int(8) NOT NULL AUTO_INCREMENT,
  `M_TICKET` int(8) NOT NULL,
  `M_USER` int(8) NOT NULL,
  `M_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `M_CONTENT` varchar(255) NOT NULL,
  PRIMARY KEY (`M_ID`),
  KEY `M_TICKET` (`M_TICKET`),
  KEY `M_USER` (`M_USER`),
  CONSTRAINT `message_ticket_fk` FOREIGN KEY (`M_TICKET`) REFERENCES `ticket` (`T_ID`),
  CONSTRAINT `message_user_fk` FOREIGN KEY (`M_USER`) REFERENCES `user` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (19,2,1,'2022-12-09 02:12:41','help'),(20,5,2,'2022-12-13 23:41:51','aaaaaaa'),(21,5,1,'2022-12-13 23:41:56','drghdrhrdhd'),(22,5,1,'2022-12-14 00:12:24','rgrgrrg'),(23,5,1,'2022-12-14 01:12:52','Message'),(24,5,1,'2022-12-14 01:12:53','Message'),(25,5,1,'2022-12-14 01:12:54','aaaaaaaaaaa'),(26,5,1,'2022-12-14 01:12:04','aaaaaaaaaaa'),(27,5,1,'2022-12-14 01:12:09','aaaaaaaaaaa'),(28,5,1,'2022-12-14 02:12:31','Bienvenue');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisation` (
  `O_ID` int(8) NOT NULL AUTO_INCREMENT,
  `O_NAME` varchar(16) NOT NULL,
  `O_OWNER` int(8) NOT NULL,
  PRIMARY KEY (`O_ID`,`O_NAME`),
  KEY `group_user_fk` (`O_OWNER`),
  CONSTRAINT `group_user_fk` FOREIGN KEY (`O_OWNER`) REFERENCES `user` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisation`
--

LOCK TABLES `organisation` WRITE;
/*!40000 ALTER TABLE `organisation` DISABLE KEYS */;
INSERT INTO `organisation` VALUES (1,'google',1),(2,'microsoft',1),(6,'Samsung',1),(7,'Samsung2',1),(8,'discord',1),(9,'discord2',1),(3,'apple',2),(4,'aaa',3),(5,'bbb',3);
/*!40000 ALTER TABLE `organisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statut` (
  `S_ID` int(8) NOT NULL,
  `S_LIB` varchar(16) NOT NULL,
  PRIMARY KEY (`S_ID`),
  CONSTRAINT `statut_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `ticket` (`T_STATUT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO `statut` VALUES (0,'ouvert'),(1,'en attente'),(2,'fermé');
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `T_ID` int(8) NOT NULL AUTO_INCREMENT,
  `T_ORGANISATION` int(8) NOT NULL,
  `T_USER` int(8) NOT NULL,
  `T_NAME` varchar(16) NOT NULL,
  `T_CONTENT` varchar(255) NOT NULL,
  `T_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `T_STATUT` int(8) NOT NULL,
  PRIMARY KEY (`T_ID`,`T_ORGANISATION`,`T_USER`),
  KEY `T_ORGANISATION` (`T_ORGANISATION`),
  KEY `T_USER` (`T_USER`),
  KEY `T_STATUT` (`T_STATUT`),
  CONSTRAINT `ticket_organisation_fk` FOREIGN KEY (`T_ORGANISATION`) REFERENCES `organisation` (`O_ID`),
  CONSTRAINT `ticket_statut_fk` FOREIGN KEY (`T_STATUT`) REFERENCES `statut` (`S_ID`),
  CONSTRAINT `ticket_user_fk` FOREIGN KEY (`T_USER`) REFERENCES `user` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,1,1,'google help','google','2022-12-09 14:43:32',1),(2,2,2,'microsoft help','microsoft','2022-12-13 15:19:42',2),(3,3,3,'apple help','apple','2022-12-09 14:43:50',2),(4,3,3,'iPhone','iphone','2022-12-09 16:00:32',1),(5,2,3,'Windows','W10','2022-12-09 16:01:03',0),(6,2,1,'vs code','bug vscode','2022-12-13 23:27:29',0);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `U_ID` int(8) NOT NULL AUTO_INCREMENT,
  `U_EMAIL` varchar(32) NOT NULL,
  `U_PASSWORD` varchar(64) NOT NULL,
  `U_NAME` varchar(32) NOT NULL,
  PRIMARY KEY (`U_ID`,`U_EMAIL`),
  KEY `U_ID` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'a@a.fr','a','a'),(2,'b@b.fr','b','b'),(3,'c@c.fr','c','c');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whitelist`
--

DROP TABLE IF EXISTS `whitelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `whitelist` (
  `WL_ORGANISATION` int(8) NOT NULL,
  `WL_USER` int(8) NOT NULL,
  `WL_USER_GROUP` int(8) NOT NULL,
  PRIMARY KEY (`WL_ORGANISATION`,`WL_USER`),
  KEY `WL_USER_GROUP` (`WL_USER_GROUP`),
  KEY `WL_USER` (`WL_USER`),
  CONSTRAINT `wl_group_fk` FOREIGN KEY (`WL_USER_GROUP`) REFERENCES `group` (`G_ID`),
  CONSTRAINT `wl_organisation_fk` FOREIGN KEY (`WL_ORGANISATION`) REFERENCES `organisation` (`O_ID`),
  CONSTRAINT `wl_user_fk` FOREIGN KEY (`WL_USER`) REFERENCES `user` (`U_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whitelist`
--

LOCK TABLES `whitelist` WRITE;
/*!40000 ALTER TABLE `whitelist` DISABLE KEYS */;
INSERT INTO `whitelist` VALUES (2,1,0),(2,3,0),(3,2,0),(1,1,1),(2,2,1),(3,1,1),(3,3,1);
/*!40000 ALTER TABLE `whitelist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-15 18:21:05
