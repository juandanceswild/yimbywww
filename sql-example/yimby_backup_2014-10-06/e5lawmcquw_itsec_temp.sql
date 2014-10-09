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
-- Table structure for table `e5lawmcquw_itsec_temp`
--

DROP TABLE IF EXISTS `e5lawmcquw_itsec_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_itsec_temp` (
  `temp_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `temp_type` varchar(20) NOT NULL,
  `temp_date` datetime NOT NULL,
  `temp_date_gmt` datetime NOT NULL,
  `temp_host` varchar(20) DEFAULT NULL,
  `temp_user` bigint(20) unsigned DEFAULT NULL,
  `temp_username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`temp_id`),
  KEY `temp_date_gmt` (`temp_date_gmt`),
  KEY `temp_host` (`temp_host`),
  KEY `temp_user` (`temp_user`),
  KEY `temp_username` (`temp_username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_itsec_temp`
--

LOCK TABLES `e5lawmcquw_itsec_temp` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_itsec_temp` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_itsec_temp` (`temp_id`, `temp_type`, `temp_date`, `temp_date_gmt`, `temp_host`, `temp_user`, `temp_username`) VALUES (1,'four_oh_four','2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1',NULL,NULL),(2,'four_oh_four','2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1',NULL,NULL),(3,'four_oh_four','2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1',NULL,NULL),(4,'four_oh_four','2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1',NULL,NULL),(5,'four_oh_four','2014-06-05 09:32:34','2014-06-05 13:32:34','127.0.0.1',NULL,NULL),(6,'four_oh_four','2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1',NULL,NULL),(7,'four_oh_four','2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1',NULL,NULL),(8,'four_oh_four','2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1',NULL,NULL),(9,'four_oh_four','2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1',NULL,NULL),(10,'four_oh_four','2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1',NULL,NULL),(11,'four_oh_four','2014-06-05 09:32:36','2014-06-05 13:32:36','127.0.0.1',NULL,NULL),(12,'four_oh_four','2014-06-05 09:32:36','2014-06-05 13:32:36','127.0.0.1',NULL,NULL),(13,'four_oh_four','2014-06-05 09:32:36','2014-06-05 13:32:36','127.0.0.1',NULL,NULL),(14,'four_oh_four','2014-06-05 09:32:37','2014-06-05 13:32:37','127.0.0.1',NULL,NULL),(15,'four_oh_four','2014-06-05 09:32:37','2014-06-05 13:32:37','127.0.0.1',NULL,NULL),(16,'four_oh_four','2014-06-05 09:32:38','2014-06-05 13:32:38','127.0.0.1',NULL,NULL),(17,'four_oh_four','2014-06-05 09:32:38','2014-06-05 13:32:38','127.0.0.1',NULL,NULL),(18,'four_oh_four','2014-06-05 09:32:38','2014-06-05 13:32:38','127.0.0.1',NULL,NULL),(19,'four_oh_four','2014-06-05 09:32:39','2014-06-05 13:32:39','127.0.0.1',NULL,NULL),(20,'four_oh_four','2014-06-05 09:32:39','2014-06-05 13:32:39','127.0.0.1',NULL,NULL);
/*!40000 ALTER TABLE `e5lawmcquw_itsec_temp` ENABLE KEYS */;
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
