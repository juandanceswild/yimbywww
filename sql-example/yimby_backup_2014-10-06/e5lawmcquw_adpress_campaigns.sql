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
-- Table structure for table `e5lawmcquw_adpress_campaigns`
--

DROP TABLE IF EXISTS `e5lawmcquw_adpress_campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_adpress_campaigns` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `settings` text,
  `ad_definition` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_adpress_campaigns`
--

LOCK TABLES `e5lawmcquw_adpress_campaigns` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_adpress_campaigns` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_adpress_campaigns` (`id`, `settings`, `ad_definition`) VALUES (1,'a:3:{s:4:\"name\";s:9:\"YIMBYgram\";s:11:\"description\";s:9:\"YIMBYgram\";s:5:\"state\";s:6:\"active\";}','a:8:{s:6:\"number\";i:1;s:5:\"price\";i:0;s:4:\"type\";s:5:\"image\";s:4:\"size\";a:2:{s:6:\"height\";i:250;s:5:\"width\";i:300;}s:7:\"columns\";i:1;s:8:\"contract\";s:6:\"clicks\";s:6:\"clicks\";i:1;s:8:\"rotation\";N;}'),(2,'a:3:{s:4:\"name\";s:10:\"Image Test\";s:11:\"description\";s:4:\"test\";s:5:\"state\";s:8:\"inactive\";}','a:8:{s:6:\"number\";i:1;s:5:\"price\";i:0;s:4:\"type\";s:5:\"image\";s:4:\"size\";a:2:{s:6:\"height\";i:600;s:5:\"width\";i:300;}s:7:\"columns\";i:1;s:8:\"contract\";s:9:\"pageviews\";s:9:\"pageviews\";i:150000;s:8:\"rotation\";N;}'),(3,'a:3:{s:4:\"name\";s:14:\"300x250 Banner\";s:11:\"description\";s:31:\"Above the fold rectangle banner\";s:5:\"state\";s:6:\"active\";}','a:11:{s:6:\"number\";i:5;s:5:\"price\";i:1000;s:7:\"cta_url\";s:16:\"http://ctbuh.org\";s:8:\"cta_fill\";N;s:4:\"type\";s:5:\"image\";s:4:\"size\";a:2:{s:6:\"height\";i:250;s:5:\"width\";i:300;}s:7:\"columns\";i:1;s:7:\"cta_img\";s:80:\"http://ny.dev/wp-content/uploads/2013/09/CTBUH_YIMBY_WebAd_300x250.jpg\";s:8:\"contract\";s:6:\"clicks\";s:6:\"clicks\";i:100000;s:8:\"rotation\";s:1:\"5\";}');
/*!40000 ALTER TABLE `e5lawmcquw_adpress_campaigns` ENABLE KEYS */;
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
