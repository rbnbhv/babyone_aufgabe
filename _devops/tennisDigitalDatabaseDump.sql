-- MySQL dump 10.13  Distrib 5.7.39, for Linux (x86_64)
--
-- Host: localhost    Database: tennis_digital
-- ------------------------------------------------------
-- Server version	5.7.39-0ubuntu0.18.04.2

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
-- Table structure for table `court`
--

DROP TABLE IF EXISTS `court`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `court` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courtNumber` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `court`
--

LOCK TABLES `court` WRITE;
/*!40000 ALTER TABLE `court` DISABLE KEYS */;
INSERT INTO `court` VALUES (1,'Platz 1'),(2,'Platz 2'),(3,'Platz 3'),(4,'Platz 4'),(5,'Platz 5'),(6,'Platz 6'),(7,'Platz 7'),(8,'Platz 8');
/*!40000 ALTER TABLE `court` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_v1`
--

DROP TABLE IF EXISTS `member_v1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_v1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `forename` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isTrainer` tinyint(1) NOT NULL DEFAULT '0',
  `phonenumber` varchar(255) NOT NULL,
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_v1`
--

LOCK TABLES `member_v1` WRITE;
/*!40000 ALTER TABLE `member_v1` DISABLE KEYS */;
INSERT INTO `member_v1` VALUES (2,'anton@btv.de','Anton','$2y$10$UKNg4qiBQm/erFQFHZ.toOdXiSM.XMxelTjN0xPRuFXbAoJNlexFS',1,'02521515112515'),(4,'bert@btv.de','Bert','$2y$10$KGnkyTRbmcevKWv3kFjsKeUqJH30wp.nwYS/58w60F0m6hJe7OMBW',1,''),(3,'chris@btv.de','Chris','$2y$10$HPJmeM.DjF9/i4vSfJPyGeqIZVLcSoitxaHblI2l7Xs0DMwa7ojvW',1,''),(1,'ruben@btv.de','Ruben','$2y$10$BRjpSeghBhgDhxmN8QGZ1eGs258yp/JpxutIByN/T6fuK/AOh6nf.',0,'0255151121242251');
/*!40000 ALTER TABLE `member_v1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `court_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `partner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `court_id` (`court_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `court_id` FOREIGN KEY (`court_id`) REFERENCES `court` (`id`),
  CONSTRAINT `member_id` FOREIGN KEY (`member_id`) REFERENCES `member_v1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (21,'2022-10-23 15:00:00',1,2,'4'),(22,'2022-10-28 19:00:00',4,2,'3'),(23,'2022-10-23 18:00:00',3,2,'3');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-23 21:16:48
