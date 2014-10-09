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
-- Table structure for table `e5lawmcquw_ad_pro_system_linked`
--

DROP TABLE IF EXISTS `e5lawmcquw_ad_pro_system_linked`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_ad_pro_system_linked` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `advertiser_id` mediumint(9) NOT NULL,
  `campaign_id` mediumint(9) NOT NULL,
  `banner_id` mediumint(9) NOT NULL,
  `adzone_id` mediumint(9) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_ad_pro_system_linked`
--

LOCK TABLES `e5lawmcquw_ad_pro_system_linked` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_ad_pro_system_linked` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_ad_pro_system_linked` (`id`, `advertiser_id`, `campaign_id`, `banner_id`, `adzone_id`) VALUES (6,1,1,1,3),(3,2,2,2,1),(5,2,2,3,1),(7,2,2,4,1),(8,1,1,5,1),(9,2,2,6,1);
/*!40000 ALTER TABLE `e5lawmcquw_ad_pro_system_linked` ENABLE KEYS */;
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
