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
-- Table structure for table `e5lawmcquw_adpress_ads`
--

DROP TABLE IF EXISTS `e5lawmcquw_adpress_ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_adpress_ads` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(3) NOT NULL,
  `ad_settings` text,
  `ad_stats` text,
  `status` text,
  `time` text,
  `user_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_adpress_ads`
--

LOCK TABLES `e5lawmcquw_adpress_ads` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_adpress_ads` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_adpress_ads` (`id`, `campaign_id`, `ad_settings`, `ad_stats`, `status`, `time`, `user_id`) VALUES (1,1,'a:0:{}','a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}','available','',0),(9,3,'N;','a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}','available','',0),(8,3,'N;','a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}','available','',0),(4,2,'N;','a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}','available','',0),(7,3,'N;','a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}','available','',0),(6,3,'N;','a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}','available','',0),(5,3,'N;','a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}','available','',0);
/*!40000 ALTER TABLE `e5lawmcquw_adpress_ads` ENABLE KEYS */;
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
