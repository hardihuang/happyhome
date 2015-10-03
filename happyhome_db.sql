-- MySQL dump 10.13  Distrib 5.6.26, for Linux (x86_64)
--
-- Host: localhost    Database: happyhome
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `hh_fee`
--

DROP TABLE IF EXISTS `hh_fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_fee` (
  `mid` int(11) NOT NULL,
  `fee` int(10) NOT NULL,
  `date` date NOT NULL,
  `dueDate` date NOT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hh_fen`
--

DROP TABLE IF EXISTS `hh_fen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_fen` (
  `mid` int(11) NOT NULL,
  `fen` int(15) NOT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hh_member`
--

DROP TABLE IF EXISTS `hh_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_member` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `birthday` date DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `regTime` date DEFAULT NULL,
  `sid` tinyint(1) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `qq` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `notes` text,
  `avatar` varchar(64) DEFAULT NULL,
  `activeFlag` tinyint(1) DEFAULT NULL,
  `gender` enum('boy','girl') DEFAULT 'boy',
  `grade` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hh_phone`
--

DROP TABLE IF EXISTS `hh_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_phone` (
  `mid` int(11) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `owner` varchar(20) DEFAULT NULL,
  UNIQUE KEY `mid` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hh_school`
--

DROP TABLE IF EXISTS `hh_school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_school` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hh_score`
--

DROP TABLE IF EXISTS `hh_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_score` (
  `mid` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `rank` int(5) DEFAULT NULL,
  `math` int(3) DEFAULT NULL,
  `physics` int(3) DEFAULT NULL,
  `chemistry` int(3) DEFAULT NULL,
  `english` int(3) DEFAULT NULL,
  `biology` int(3) DEFAULT NULL,
  `geography` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-03 17:26:25
