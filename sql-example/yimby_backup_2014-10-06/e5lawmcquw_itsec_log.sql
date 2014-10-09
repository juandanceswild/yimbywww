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
-- Table structure for table `e5lawmcquw_itsec_log`
--

DROP TABLE IF EXISTS `e5lawmcquw_itsec_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_itsec_log` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_type` varchar(20) NOT NULL DEFAULT '',
  `log_function` varchar(255) NOT NULL DEFAULT '',
  `log_priority` int(2) NOT NULL DEFAULT '1',
  `log_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_host` varchar(20) DEFAULT NULL,
  `log_username` varchar(20) DEFAULT NULL,
  `log_user` bigint(20) unsigned DEFAULT NULL,
  `log_url` varchar(255) DEFAULT NULL,
  `log_referrer` varchar(255) DEFAULT NULL,
  `log_data` longtext NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_type` (`log_type`),
  KEY `log_date_gmt` (`log_date_gmt`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_itsec_log`
--

LOCK TABLES `e5lawmcquw_itsec_log` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_itsec_log` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_itsec_log` (`log_id`, `log_type`, `log_function`, `log_priority`, `log_date`, `log_date_gmt`, `log_host`, `log_username`, `log_user`, `log_url`, `log_referrer`, `log_data`) VALUES (1,'four_oh_four','404 Error',3,'2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1','',0,'/wp-content/uploads/2013/11/6152-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(2,'four_oh_four','404 Error',3,'2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1','',0,'/wp-content/uploads/2013/12/onevandam3-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(3,'four_oh_four','404 Error',3,'2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1','',0,'/wp-content/uploads/2013/10/209sullivan2-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(4,'four_oh_four','404 Error',3,'2014-06-05 09:32:33','2014-06-05 13:32:33','127.0.0.1','',0,'/wp-content/uploads/2013/10/10bond1-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(5,'four_oh_four','404 Error',3,'2014-06-05 09:32:34','2014-06-05 13:32:34','127.0.0.1','',0,'/wp-content/uploads/2013/11/6152.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(6,'four_oh_four','404 Error',3,'2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1','',0,'/wp-content/uploads/2013/10/27_Wooster_3-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(7,'four_oh_four','404 Error',3,'2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1','',0,'/wp-content/uploads/2013/07/61fifth1-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(8,'four_oh_four','404 Error',3,'2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1','',0,'/wp-content/uploads/2013/09/onevandam1-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(9,'four_oh_four','404 Error',3,'2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1','',0,'/wp-content/uploads/2013/06/20130604_154243-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(10,'four_oh_four','404 Error',3,'2014-06-05 09:32:35','2014-06-05 13:32:35','127.0.0.1','',0,'/wp-content/uploads/2013/05/stvincents4-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(11,'four_oh_four','404 Error',3,'2014-06-05 09:32:36','2014-06-05 13:32:36','127.0.0.1','',0,'/wp-content/uploads/2013/05/tns21-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(12,'four_oh_four','404 Error',3,'2014-06-05 09:32:36','2014-06-05 13:32:36','127.0.0.1','',0,'/wp-content/uploads/2013/03/35xv315-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(13,'four_oh_four','404 Error',3,'2014-06-05 09:32:36','2014-06-05 13:32:36','127.0.0.1','',0,'/wp-content/uploads/2013/05/20121127_140620-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(14,'four_oh_four','404 Error',3,'2014-06-05 09:32:37','2014-06-05 13:32:37','127.0.0.1','',0,'/wp-content/uploads/2013/05/20121016_174654-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(15,'four_oh_four','404 Error',3,'2014-06-05 09:32:37','2014-06-05 13:32:37','127.0.0.1','',0,'/wp-content/uploads/2013/05/sustainability-corner-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(16,'four_oh_four','404 Error',3,'2014-06-05 09:32:38','2014-06-05 13:32:38','127.0.0.1','',0,'/wp-content/uploads/2013/12/onevandam3.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(17,'four_oh_four','404 Error',3,'2014-06-05 09:32:38','2014-06-05 13:32:38','127.0.0.1','',0,'/wp-content/uploads/2013/10/10bond1.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(18,'four_oh_four','404 Error',3,'2014-06-05 09:32:38','2014-06-05 13:32:38','127.0.0.1','',0,'/wp-content/uploads/2013/10/10bond2-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(19,'four_oh_four','404 Error',3,'2014-06-05 09:32:39','2014-06-05 13:32:39','127.0.0.1','',0,'/wp-content/uploads/2013/10/209sullivan2.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(20,'four_oh_four','404 Error',3,'2014-06-05 09:32:39','2014-06-05 13:32:39','127.0.0.1','',0,'/wp-content/uploads/2013/10/209sullivan1-76x76.jpg','http://ny.dev/neighborhoods/greenwichvillage','a:1:{s:12:\"query_string\";s:0:\"\";}'),(21,'lockout','Host or User Lockout',10,'2014-06-05 09:32:39','2014-06-05 13:32:39','127.0.0.1','',0,'','','a:3:{s:7:\"expires\";s:19:\"2014-06-05 09:47:39\";s:11:\"expires_gmt\";s:19:\"2014-06-05 13:47:39\";s:4:\"type\";s:12:\"four_oh_four\";}');
/*!40000 ALTER TABLE `e5lawmcquw_itsec_log` ENABLE KEYS */;
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
