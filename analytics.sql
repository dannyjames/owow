-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: analytics
-- ------------------------------------------------------
-- Server version	5.1.66-0ubuntu0.10.04.3

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
-- Table structure for table `CONTESTS_WON`
--

DROP TABLE IF EXISTS `CONTESTS_WON`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CONTESTS_WON` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `WINS` int(11) DEFAULT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `STORE_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  CONSTRAINT `CONTESTS_WON_ibfk_1` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `EMPLOYEE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CONTESTS_WON`
--

LOCK TABLES `CONTESTS_WON` WRITE;
/*!40000 ALTER TABLE `CONTESTS_WON` DISABLE KEYS */;
INSERT INTO `CONTESTS_WON` VALUES (1,3,1,1),(2,3,1,1),(3,14,1,1),(4,10,1,1),(5,20,1,1),(6,16,1,1),(7,4,1,1),(8,7,2,1),(9,11,2,1),(10,15,2,1),(11,4,2,1),(12,7,2,1),(13,3,2,1),(14,5,2,1),(15,4,3,1),(16,14,3,1),(17,9,3,1),(18,17,3,1),(19,3,3,1),(20,7,3,1),(21,13,3,1),(22,7,3,1),(23,18,3,1),(24,14,3,1),(25,17,3,1),(26,20,3,1),(27,2,3,1),(28,11,3,1),(29,4,3,1),(30,12,4,3),(31,17,4,3),(32,12,4,3),(33,12,4,3),(34,13,4,3),(35,14,4,3),(36,18,5,2),(37,5,5,2),(38,10,5,2),(39,20,5,2),(40,10,5,2),(41,12,5,2),(42,5,5,2),(43,4,5,2),(44,14,5,2),(45,18,5,2),(46,11,5,2),(47,10,5,2),(48,20,5,2),(49,16,5,2),(50,3,5,2),(51,6,5,2),(52,15,6,3),(53,3,6,3),(54,14,6,3),(55,16,6,3),(56,12,6,3),(57,17,6,3),(58,18,6,3),(59,3,6,3),(60,13,6,3),(61,9,6,3),(62,14,6,3),(63,5,6,3),(64,3,6,3),(65,9,6,3),(66,2,6,3),(67,18,7,2),(68,2,7,2),(69,15,7,2),(70,10,7,2),(71,6,7,2),(72,17,7,2),(73,4,7,2),(74,3,7,2),(75,12,8,3),(76,2,8,3),(77,3,8,3),(78,14,8,3),(79,7,8,3),(80,16,8,3),(81,8,8,3),(82,8,8,3),(83,9,8,3),(84,19,9,2),(85,5,9,2),(86,20,9,2),(87,2,9,2),(88,17,9,2),(89,8,9,2),(90,20,10,3),(91,10,10,3),(92,2,10,3),(93,20,10,3),(94,15,10,3),(95,19,10,3),(96,2,10,3),(97,9,10,3),(98,8,10,3),(99,6,10,3),(100,6,10,3),(101,10,10,3),(102,8,10,3),(103,12,10,3),(104,9,11,2),(105,14,11,2),(106,14,11,2),(107,14,11,2),(108,9,11,2),(109,2,12,3),(110,17,12,3),(111,4,12,3),(112,20,12,3),(113,2,12,3),(114,20,13,2),(115,17,13,2),(116,10,13,2),(117,13,13,2),(118,17,13,2),(119,19,13,2),(120,17,14,1),(121,14,14,1),(122,12,14,1),(123,17,14,1),(124,3,14,1),(125,19,14,1),(126,3,14,1),(127,7,14,1),(128,9,14,1),(129,9,14,1),(130,17,14,1),(131,9,14,1),(132,16,14,1),(133,10,14,1);
/*!40000 ALTER TABLE `CONTESTS_WON` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EFFICIENCY_RATIO`
--

DROP TABLE IF EXISTS `EFFICIENCY_RATIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EFFICIENCY_RATIO` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `EFF_RATIO` float DEFAULT NULL,
  `HOUR_OF_DAY` varchar(11) DEFAULT NULL,
  `STORE_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  CONSTRAINT `EFFICIENCY_RATIO_ibfk_1` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `EMPLOYEE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EFFICIENCY_RATIO`
--

LOCK TABLES `EFFICIENCY_RATIO` WRITE;
/*!40000 ALTER TABLE `EFFICIENCY_RATIO` DISABLE KEYS */;
INSERT INTO `EFFICIENCY_RATIO` VALUES (1,1,0.4,'3:00 PM',1),(2,1,0.5,'7:00 PM',1),(3,1,0.7,'7:00 PM',1),(4,1,0.5,'9:00 PM',1),(5,1,0.4,'5:00 PM',1),(6,1,0.5,'9:00 PM',1),(7,1,0.9,'8:00 PM',1),(8,1,0.4,'4:00 PM',1),(9,1,0.3,'12:00 NOON',1),(10,1,0.8,'9:00 PM',1),(11,1,0.4,'5:00 PM',1),(12,1,0.2,'4:00 PM',1),(13,1,0.8,'6:00 PM',1),(14,1,0.2,'9:00 AM',1),(15,1,0.4,'7:00 PM',1),(16,1,0.3,'7:00 PM',1),(17,2,0.6,'12:00 NOON',1),(18,2,0.9,'2:00 PM',1),(19,2,0.7,'7:00 PM',1),(20,2,0.7,'1:00 PM',1),(21,2,0.4,'5:00 PM',1),(22,2,0.2,'1:00 PM',1),(23,2,0.9,'6:00 PM',1),(24,2,0.5,'12:00 NOON',1),(25,3,0.4,'4:00 PM',1),(26,3,0.8,'2:00 PM',1),(27,3,0.9,'6:00 PM',1),(28,3,0.8,'9:00 PM',1),(29,3,0.7,'12:00 NOON',1),(30,3,0.8,'7:00 PM',1),(31,3,0.8,'10:00 AM',1),(32,3,0.5,'12:00 NOON',1),(33,3,0.9,'7:00 PM',1),(34,4,0.8,'3:00 PM',3),(35,4,0.9,'11:00 AM',3),(36,4,0.9,'9:00 PM',3),(37,4,0.4,'7:00 PM',3),(38,4,0.5,'5:00 PM',3),(39,4,0.2,'7:00 PM',3),(40,4,0.9,'5:00 PM',3),(41,4,0.6,'1:00 PM',3),(42,4,0.5,'1:00 PM',3),(43,4,0.3,'2:00 PM',3),(44,4,0.8,'4:00 PM',3),(45,4,0.3,'6:00 PM',3),(46,4,0.3,'1:00 PM',3),(47,4,0.2,'12:00 NOON',3),(48,4,0.3,'7:00 PM',3),(49,4,0.2,'8:00 PM',3),(50,5,0.9,'9:00 PM',2),(51,5,0.2,'8:00 PM',2),(52,5,0.3,'9:00 PM',2),(53,5,0.4,'7:00 PM',2),(54,5,0.9,'1:00 PM',2),(55,5,0.8,'4:00 PM',2),(56,5,0.7,'12:00 NOON',2),(57,6,0.8,'3:00 PM',3),(58,6,0.3,'7:00 PM',3),(59,6,0.8,'3:00 PM',3),(60,6,0.4,'10:00 AM',3),(61,6,0.6,'3:00 PM',3),(62,6,0.4,'5:00 PM',3),(63,6,0.3,'3:00 PM',3),(64,6,0.6,'12:00 NOON',3),(65,6,0.4,'6:00 PM',3),(66,6,0.5,'12:00 NOON',3),(67,6,0.8,'1:00 PM',3),(68,6,0.6,'6:00 PM',3),(69,6,0.4,'7:00 PM',3),(70,6,0.5,'7:00 PM',3),(71,6,0.4,'7:00 PM',3),(72,6,0.6,'12:00 NOON',3),(73,6,0.2,'7:00 PM',3),(74,7,0.8,'12:00 NOON',2),(75,7,0.3,'7:00 PM',2),(76,7,0.7,'5:00 PM',2),(77,7,0.3,'4:00 PM',2),(78,7,0.7,'7:00 PM',2),(79,7,0.2,'9:00 AM',2),(80,7,0.9,'6:00 PM',2),(81,7,0.5,'12:00 NOON',2),(82,7,0.5,'7:00 PM',2),(83,7,0.7,'1:00 PM',2),(84,7,0.2,'3:00 PM',2),(85,7,0.6,'7:00 PM',2),(86,7,0.7,'12:00 NOON',2),(87,7,0.5,'7:00 PM',2),(88,7,0.4,'1:00 PM',2),(89,7,0.7,'12:00 NOON',2),(90,7,0.5,'9:00 PM',2),(91,8,0.2,'4:00 PM',3),(92,8,0.4,'6:00 PM',3),(93,8,0.3,'7:00 PM',3),(94,8,0.7,'12:00 NOON',3),(95,8,0.8,'12:00 NOON',3),(96,9,0.9,'6:00 PM',2),(97,9,0.5,'5:00 PM',2),(98,9,0.8,'4:00 PM',2),(99,9,0.9,'4:00 PM',2),(100,9,0.3,'5:00 PM',2),(101,9,0.7,'5:00 PM',2),(102,9,0.6,'9:00 PM',2),(103,9,0.8,'1:00 PM',2),(104,9,0.2,'12:00 NOON',2),(105,9,0.3,'12:00 NOON',2),(106,9,0.4,'6:00 PM',2),(107,9,0.5,'9:00 PM',2),(108,9,0.9,'12:00 NOON',2),(109,9,0.6,'1:00 PM',2),(110,10,0.8,'7:00 PM',3),(111,10,0.2,'6:00 PM',3),(112,10,0.2,'6:00 PM',3),(113,10,0.4,'7:00 PM',3),(114,10,0.7,'6:00 PM',3),(115,10,0.8,'1:00 PM',3),(116,11,0.5,'8:00 PM',2),(117,11,0.4,'12:00 NOON',2),(118,11,0.3,'4:00 PM',2),(119,11,0.5,'4:00 PM',2),(120,11,0.7,'7:00 PM',2),(121,11,0.3,'12:00 NOON',2),(122,11,0.7,'12:00 NOON',2),(123,11,0.5,'12:00 NOON',2),(124,11,0.3,'5:00 PM',2),(125,11,0.2,'9:00 PM',2),(126,12,0.6,'9:00 AM',3),(127,12,0.3,'9:00 PM',3),(128,12,0.6,'7:00 PM',3),(129,12,0.7,'2:00 PM',3),(130,12,0.3,'10:00 AM',3),(131,12,0.8,'11:00 AM',3),(132,12,0.5,'9:00 AM',3),(133,12,0.4,'7:00 PM',3),(134,12,0.5,'7:00 PM',3),(135,12,0.5,'12:00 NOON',3),(136,12,0.9,'5:00 PM',3),(137,12,0.2,'9:00 AM',3),(138,13,0.4,'1:00 PM',2),(139,13,0.5,'2:00 PM',2),(140,13,0.2,'9:00 PM',2),(141,13,0.9,'12:00 NOON',2),(142,13,0.3,'7:00 PM',2),(143,13,0.7,'9:00 PM',2),(144,13,0.6,'10:00 AM',2),(145,13,0.2,'6:00 PM',2),(146,13,0.8,'12:00 NOON',2),(147,13,0.9,'7:00 PM',2),(148,13,0.5,'7:00 PM',2),(149,13,0.4,'1:00 PM',2),(150,13,0.4,'5:00 PM',2),(151,13,0.2,'7:00 PM',2),(152,13,0.7,'11:00 AM',2),(153,13,0.8,'9:00 PM',2),(154,13,0.4,'1:00 PM',2),(155,13,0.4,'2:00 PM',2),(156,13,0.3,'1:00 PM',2),(157,14,0.4,'12:00 NOON',1),(158,14,0.3,'1:00 PM',1),(159,14,0.7,'1:00 PM',1),(160,14,0.4,'1:00 PM',1),(161,14,0.9,'6:00 PM',1),(162,14,0.3,'7:00 PM',1),(163,14,0.9,'9:00 PM',1),(164,14,0.3,'10:00 AM',1),(165,14,0.3,'7:00 PM',1),(166,14,0.2,'12:00 NOON',1),(167,14,0.5,'12:00 NOON',1),(168,14,0.9,'12:00 NOON',1);
/*!40000 ALTER TABLE `EFFICIENCY_RATIO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE`
--

DROP TABLE IF EXISTS `EMPLOYEE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EMPLOYEE` (
  `ID` int(11) NOT NULL,
  `STORE_DETAILS_ID` bigint(20) NOT NULL,
  `EMPLOYEE_DETAILS_ID` int(11) NOT NULL,
  `EMPLOYEE_TYPE_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `STORE_DETAILS_ID_FK` (`STORE_DETAILS_ID`),
  KEY `EMPLOYEE_DETAILS_ID_FK` (`EMPLOYEE_DETAILS_ID`),
  KEY `EMPLOYEE_TYPE_ID_FK` (`EMPLOYEE_TYPE_ID`),
  CONSTRAINT `EMPLOYEE_DETAILS_ID_FK` FOREIGN KEY (`EMPLOYEE_DETAILS_ID`) REFERENCES `EMPLOYEE_DETAILS` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `EMPLOYEE_TYPE_ID_FK` FOREIGN KEY (`EMPLOYEE_TYPE_ID`) REFERENCES `EMPLOYEE_TYPE` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `STORE_DETAILS_ID_FK` FOREIGN KEY (`STORE_DETAILS_ID`) REFERENCES `STORE_DETAILS` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE`
--

LOCK TABLES `EMPLOYEE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE` DISABLE KEYS */;
INSERT INTO `EMPLOYEE` VALUES (1,1,1,3),(2,1,2,1),(3,1,3,2),(4,3,4,1),(5,2,5,1),(6,3,6,2),(7,2,7,2),(8,3,8,2),(9,2,9,3),(10,3,10,3),(11,2,11,2),(12,3,12,1),(13,2,13,3),(14,1,14,2);
/*!40000 ALTER TABLE `EMPLOYEE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE_DETAILS`
--

DROP TABLE IF EXISTS `EMPLOYEE_DETAILS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EMPLOYEE_DETAILS` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL DEFAULT '',
  `MIDDLE_INITIAL` varchar(45) DEFAULT NULL,
  `ADDRESS` varchar(5000) NOT NULL,
  `PHONE` varchar(45) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `STORE_NAME` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE_DETAILS`
--

LOCK TABLES `EMPLOYEE_DETAILS` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE_DETAILS` DISABLE KEYS */;
INSERT INTO `EMPLOYEE_DETAILS` VALUES (1,'Danny','Haber',NULL,'',NULL,NULL,'3050 El Camino Real'),(2,'James','Campos',NULL,'',NULL,NULL,'3050 El Camino Real'),(3,'Divyesh','Motiwalla',NULL,'',NULL,NULL,'3050 El Camino Real'),(4,'John','Crow',NULL,'',NULL,NULL,'1914 California Ave'),(5,'Chen','Liu',NULL,'',NULL,NULL,'1288 Lakeheaven Ln'),(6,'Amanda','Perez',NULL,'',NULL,NULL,'1914 California Ave'),(7,'Tiffany','Collins',NULL,'',NULL,NULL,'1288 Lakeheaven Ln'),(8,'Andrew ','Tan',NULL,'',NULL,NULL,'1914 California Ave'),(9,'Scott','Wilkins',NULL,'',NULL,NULL,'1288 Lakeheaven Ln'),(10,'Tom','Ziber',NULL,'',NULL,NULL,'1914 California Ave'),(11,'Katy ','Ramus',NULL,'',NULL,NULL,'1288 Lakeheaven Ln'),(12,'Rob','Manly',NULL,'',NULL,NULL,'1914 California Ave'),(13,'Irene','Davidson',NULL,'',NULL,NULL,'1288 Lakeheaven Ln'),(14,'Susan','Travis',NULL,'',NULL,NULL,'3050 El Camino Real');
/*!40000 ALTER TABLE `EMPLOYEE_DETAILS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE_TYPE`
--

DROP TABLE IF EXISTS `EMPLOYEE_TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EMPLOYEE_TYPE` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE_TYPE`
--

LOCK TABLES `EMPLOYEE_TYPE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE_TYPE` DISABLE KEYS */;
INSERT INTO `EMPLOYEE_TYPE` VALUES (1,'Manager'),(2,'Associate'),(3,'Assistant'),(4,'Contractor');
/*!40000 ALTER TABLE `EMPLOYEE_TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `INTERACTION_DETAILS`
--

DROP TABLE IF EXISTS `INTERACTION_DETAILS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `INTERACTION_DETAILS` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `LENGTH` int(11) DEFAULT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `HOUR_OF_DAY` varchar(11) DEFAULT NULL,
  `DAY_OF_WEEK` varchar(11) DEFAULT NULL,
  `DAY_OF_MONTH` int(11) DEFAULT NULL,
  `MONTH` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  CONSTRAINT `interaction_details_ibfk_1` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `EMPLOYEE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `INTERACTION_DETAILS`
--

LOCK TABLES `INTERACTION_DETAILS` WRITE;
/*!40000 ALTER TABLE `INTERACTION_DETAILS` DISABLE KEYS */;
INSERT INTO `INTERACTION_DETAILS` VALUES (1,2,1,'6:00 PM','Thu',7,'November'),(2,3,1,'6:00 PM','Wed',29,'November'),(3,8,2,'7:00 PM','Thu',21,'November'),(4,6,2,'9:00 AM','Sun',21,'November'),(5,6,2,'7:00 PM','Sun',30,'November'),(6,6,3,'8:00 PM','Fri',19,'November'),(7,5,3,'7:00 PM','Sun',5,'November'),(8,1,3,'1:00 PM','Fri',14,'November'),(9,4,3,'7:00 PM','Sat',24,'November'),(10,7,3,'4:00 PM','Fri',13,'November'),(11,3,4,'12:00 NOON','Sat',11,'November'),(12,6,4,'7:00 PM','Sat',28,'November'),(13,5,4,'7:00 PM','Fri',15,'November'),(14,3,4,'1:00 PM','Sat',3,'November'),(15,2,4,'12:00 NOON','Sun',16,'November'),(16,5,5,'9:00 PM','Fri',14,'November'),(17,6,5,'3:00 PM','Sat',10,'November'),(18,7,5,'7:00 PM','Fri',27,'November'),(19,6,5,'7:00 PM','Fri',8,'November'),(20,4,6,'7:00 PM','Fri',4,'November'),(21,2,6,'7:00 PM','Tue',7,'November'),(22,8,6,'6:00 PM','Tue',31,'November'),(23,1,6,'9:00 PM','Fri',29,'November'),(24,8,7,'7:00 PM','Sat',25,'November'),(25,8,7,'6:00 PM','Fri',15,'November'),(26,5,7,'1:00 PM','Wed',6,'November'),(27,1,8,'5:00 PM','Sun',19,'November'),(28,6,8,'4:00 PM','Thu',30,'November'),(29,3,9,'4:00 PM','Sat',11,'November'),(30,4,9,'7:00 PM','Sat',14,'November'),(31,4,9,'7:00 PM','Sat',11,'November'),(32,5,9,'8:00 PM','Sun',3,'November'),(33,5,10,'12:00 NOON','Fri',25,'November'),(34,5,10,'5:00 PM','Thu',24,'November'),(35,1,11,'12:00 NOON','Fri',3,'November'),(36,7,11,'11:00 AM','Fri',21,'November'),(37,8,12,'5:00 PM','Mon',13,'November'),(38,8,12,'9:00 PM','Thu',8,'November'),(39,3,13,'1:00 PM','Fri',20,'November'),(40,7,13,'7:00 PM','Tue',21,'November'),(41,3,13,'9:00 PM','Sun',5,'November'),(42,2,14,'1:00 PM','Sat',8,'November'),(43,1,14,'10:00 PM','Fri',23,'November'),(44,1,1,'4:00 PM','Fri',16,'November'),(45,8,1,'9:00 AM','Mon',11,'November'),(46,7,1,'2:00 PM','Mon',18,'November');
/*!40000 ALTER TABLE `INTERACTION_DETAILS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SESSION`
--

DROP TABLE IF EXISTS `SESSION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SESSION` (
  `ID` int(11) NOT NULL,
  `TIMESTAMP` datetime NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID_FK` (`USER_ID`),
  CONSTRAINT `USER_ID_FK` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SESSION`
--

LOCK TABLES `SESSION` WRITE;
/*!40000 ALTER TABLE `SESSION` DISABLE KEYS */;
/*!40000 ALTER TABLE `SESSION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STORE_DETAILS`
--

DROP TABLE IF EXISTS `STORE_DETAILS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `STORE_DETAILS` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(1000) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `PHONE` varchar(45) NOT NULL,
  `PHONE 2` varchar(45) DEFAULT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `FAX` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STORE_DETAILS`
--

LOCK TABLES `STORE_DETAILS` WRITE;
/*!40000 ALTER TABLE `STORE_DETAILS` DISABLE KEYS */;
INSERT INTO `STORE_DETAILS` VALUES (1,'3050 El Camino Real','','',NULL,'',NULL),(2,'1288 Lakeheaven Ln','','',NULL,'',NULL),(3,'1914 California Ave','','',NULL,'',NULL);
/*!40000 ALTER TABLE `STORE_DETAILS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TRENDING`
--

DROP TABLE IF EXISTS `TRENDING`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TRENDING` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `LENGTH_OF_CONVERSATION` int(11) DEFAULT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `NO_OF_INTERACTIONS` int(11) DEFAULT NULL,
  `DAY_OF_MONTH` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  CONSTRAINT `TRENDING_ibfk_1` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `EMPLOYEE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TRENDING`
--

LOCK TABLES `TRENDING` WRITE;
/*!40000 ALTER TABLE `TRENDING` DISABLE KEYS */;
INSERT INTO `TRENDING` VALUES (2,2,1,19,17),(3,7,1,13,22),(4,1,1,8,2),(5,3,2,11,8),(6,8,2,9,4),(7,4,3,7,12),(8,5,3,16,9),(9,2,3,10,2),(10,7,3,11,21),(11,3,3,20,3),(12,6,4,14,2),(13,6,4,7,7),(14,2,5,16,5),(15,4,5,16,12),(16,5,5,14,21),(17,6,5,6,12),(18,4,6,12,2),(19,4,6,9,13),(20,3,6,7,13),(21,2,7,8,6),(22,3,7,19,4),(23,5,7,14,8),(24,8,8,14,16),(25,3,9,5,8),(26,1,9,8,19),(27,6,10,9,14),(28,2,10,20,5),(29,4,10,7,16),(30,1,11,17,4),(31,3,11,16,7),(32,7,11,19,14),(33,8,11,12,10),(34,6,11,16,17),(35,2,12,14,7),(36,1,12,7,22),(37,5,12,7,5),(38,5,12,7,15),(39,4,12,14,13),(40,6,13,20,18),(41,6,13,18,14),(42,3,13,12,13),(43,8,14,8,17),(44,6,14,8,22),(45,4,14,9,2),(46,6,14,9,14),(47,6,14,12,4);
/*!40000 ALTER TABLE `TRENDING` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(256) NOT NULL,
  `PASSWORD` varchar(256) NOT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL,
  `ACTIVE` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `EMPLOYEE_ID_FK` (`EMPLOYEE_ID`),
  CONSTRAINT `EMPLOYEE_ID_FK` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `EMPLOYEE` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-07  7:05:27
