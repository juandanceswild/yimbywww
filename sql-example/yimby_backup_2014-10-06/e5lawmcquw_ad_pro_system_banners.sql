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
-- Table structure for table `e5lawmcquw_ad_pro_system_banners`
--

DROP TABLE IF EXISTS `e5lawmcquw_ad_pro_system_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_ad_pro_system_banners` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `advertiser_id` mediumint(9) NOT NULL,
  `campaign_id` mediumint(9) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file` varchar(300) NOT NULL,
  `fallback` varchar(300) NOT NULL,
  `ext_file` varchar(300) NOT NULL,
  `size` varchar(100) NOT NULL,
  `custom_size` varchar(100) NOT NULL,
  `ad_mode_ppc` varchar(100) NOT NULL,
  `ad_mode_ppv` varchar(100) NOT NULL,
  `html` text NOT NULL,
  `add_timestamp` varchar(10) NOT NULL,
  `url` text NOT NULL,
  `target` varchar(50) NOT NULL,
  `adzone` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `plan` varchar(10) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_ad_pro_system_banners`
--

LOCK TABLES `e5lawmcquw_ad_pro_system_banners` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_ad_pro_system_banners` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_ad_pro_system_banners` (`id`, `advertiser_id`, `campaign_id`, `name`, `file`, `fallback`, `ext_file`, `size`, `custom_size`, `ad_mode_ppc`, `ad_mode_ppv`, `html`, `add_timestamp`, `url`, `target`, `adzone`, `country`, `status`, `plan`, `start_date`, `end_date`) VALUES (1,1,1,'Instagram','','','','','300x250','','','<script type=\"text/javascript\"><!--\r\ngoogle_ad_client = \"ca-pub-1149803299565656\";\r\n/* yimbyad2 */\r\ngoogle_ad_slot = \"2029791351\";\r\ngoogle_ad_width = 300;\r\ngoogle_ad_height = 600;\r\n//-->\r\n</script>\r\n<script type=\"text/javascript\"\r\nsrc=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\r\n</script>','','http://instagram.com/newyorkyimby','_blank','','','1','',NULL,NULL),(3,2,2,'CTBUH Banner','http://newyorkyimby.com/wp-content/uploads/2013/08/CTBUH_YIMBY_WebAd_300x2503.jpg','','','300x250','','','','','','http://ctbuh.org','_blank','','','1','',NULL,NULL);
/*!40000 ALTER TABLE `e5lawmcquw_ad_pro_system_banners` ENABLE KEYS */;
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
