-- MySQL dump 10.13  Distrib 5.5.39, for Linux (x86_64)
--
-- Host: localhost    Database: staging2_nyyimbyDB
-- ------------------------------------------------------
-- Server version	5.5.39

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
-- Table structure for table `e5lawmcquw_adrotate_schedule`
--

DROP TABLE IF EXISTS `e5lawmcquw_adrotate_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_adrotate_schedule` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `starttime` int(15) NOT NULL DEFAULT '0',
  `stoptime` int(15) NOT NULL DEFAULT '0',
  `maxclicks` int(15) NOT NULL DEFAULT '0',
  `maximpressions` int(15) NOT NULL DEFAULT '0',
  `spread` varchar(5) NOT NULL DEFAULT 'N',
  `hourimpressions` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_adrotate_schedule`
--

LOCK TABLES `e5lawmcquw_adrotate_schedule` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_adrotate_schedule` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_adrotate_schedule` (`id`, `name`, `starttime`, `stoptime`, `maxclicks`, `maximpressions`, `spread`, `hourimpressions`) VALUES (63,'Schedule for ad 1',1408287542,1439823542,0,0,'N',0),(64,'Schedule for ad 9',1408287542,1439823542,0,0,'N',0),(65,'Schedule for ad 10',1408287542,1439823542,0,0,'N',0),(66,'Schedule for ad 12',1408287542,1439823542,0,0,'N',0),(67,'Schedule for ad 13',1408287542,1439823542,0,0,'N',0),(68,'Schedule for ad 15',1408287542,1439823542,0,0,'N',0),(69,'Schedule for ad 16',1408287540,1439823540,0,0,'N',0),(70,'Schedule for ad 17',1408287542,1439823542,0,0,'N',0),(71,'Schedule for ad 18',1408287542,1439823542,0,0,'N',0),(72,'Schedule for ad 20',1408287542,1439823542,0,0,'N',0),(73,'Schedule for ad 21',1408287542,1439823542,0,0,'N',0),(74,'Schedule for ad 22',1408287542,1439823542,0,0,'N',0),(75,'Schedule for ad 23',1408287542,1439823542,0,0,'N',0),(76,'Schedule for ad 24',1408287542,1439823542,0,0,'N',0),(77,'Schedule for ad 26',1408287540,1439823540,0,0,'N',0),(78,'Schedule for ad 27',1408287542,1439823542,0,0,'N',0),(79,'Schedule for ad 29',1408359060,1439895060,0,0,'N',0),(80,'Schedule for ad 30',1408535940,1415793540,0,0,'N',0),(81,'Schedule for ad 31',1408536780,1440072780,0,0,'N',0),(82,'Schedule for ad 32',1408536900,1440072900,0,0,'N',0),(83,'Schedule for ad 33',1408536900,1440072900,0,0,'N',0),(84,'Schedule for ad 34',1408536960,1440072960,0,0,'N',0),(86,'Schedule for ad 35',1409231208,1440767208,0,0,'N',0),(87,'Schedule for ad 36',1409231208,1440767208,0,0,'N',0),(88,'Schedule for ad 37',1410048000,1417305600,0,0,'N',0),(89,'Schedule for ad 38',1409529600,1416787200,0,0,'N',0),(90,'Schedule for ad 39',1409529600,1416787200,0,0,'N',0),(91,'Schedule for ad 40',1409529600,1416787200,0,0,'N',0),(92,'Schedule for ad 41',1409529600,1416787200,0,0,'N',0),(93,'Schedule for ad 42',1412035200,1419984000,0,0,'N',0),(94,'Schedule for ad 42',1412035200,1419984000,0,0,'N',0),(95,'Schedule for ad 43',1412208000,1417737600,0,0,'N',0),(96,'Schedule for ad 43',1412208000,1417737600,0,0,'N',0),(97,'Schedule for ad 44',1412208000,1417651200,0,0,'N',0),(98,'Schedule for ad 43',1412208000,1417478400,0,0,'N',0),(99,'Schedule for ad 45',1412208000,1417478400,0,0,'N',0),(100,'Schedule for ad 46',1412208000,1420070400,0,0,'N',0),(101,'Schedule for ad 47',1412380800,1419897600,0,0,'N',0);
/*!40000 ALTER TABLE `e5lawmcquw_adrotate_schedule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-06 21:41:14
