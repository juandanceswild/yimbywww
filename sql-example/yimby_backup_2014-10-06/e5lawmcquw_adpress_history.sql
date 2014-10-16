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
-- Table structure for table `e5lawmcquw_adpress_history`
--

DROP TABLE IF EXISTS `e5lawmcquw_adpress_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_adpress_history` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ad_id` int(3) NOT NULL,
  `approved_at` text,
  `expired_at` text,
  `ad_info` text,
  `campaign_info` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_adpress_history`
--

LOCK TABLES `e5lawmcquw_adpress_history` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_adpress_history` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_adpress_history` (`id`, `ad_id`, `approved_at`, `expired_at`, `ad_info`, `campaign_info`) VALUES (1,3,'1378856245','1378856376','O:13:\"wp_adpress_ad\":9:{s:11:\"campaign_id\";s:1:\"3\";s:5:\"param\";a:3:{s:10:\"image_link\";s:81:\"http://newyorkyimby.com/wp-content/uploads/2013/09/CTBUH_YIMBY_WebAd_300x2501.jpg\";s:3:\"url\";s:16:\"http://ctbuh.org\";s:6:\"paypal\";b:0;}s:6:\"status\";s:7:\"running\";s:7:\"user_id\";i:2;s:28:\"\0wp_adpress_ad\0ad_definition\";a:11:{s:6:\"number\";i:1;s:5:\"price\";i:1000;s:7:\"cta_url\";s:16:\"http://ctbuh.org\";s:8:\"cta_fill\";N;s:4:\"type\";s:5:\"image\";s:4:\"size\";a:2:{s:6:\"height\";i:250;s:5:\"width\";i:300;}s:7:\"columns\";i:1;s:7:\"cta_img\";s:80:\"http://newyorkyimby.com/wp-content/uploads/2013/09/CTBUH_YIMBY_WebAd_300x250.jpg\";s:8:\"contract\";s:9:\"pageviews\";s:9:\"pageviews\";i:100000;s:8:\"rotation\";N;}s:20:\"\0wp_adpress_ad\0state\";s:3:\"set\";s:5:\"stats\";a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}s:4:\"time\";s:10:\"1378856245\";s:2:\"id\";i:3;}','O:19:\"wp_adpress_campaign\":4:{s:2:\"id\";s:1:\"3\";s:8:\"settings\";a:3:{s:4:\"name\";s:14:\"300x250 Banner\";s:11:\"description\";s:31:\"Above the fold rectangle banner\";s:5:\"state\";s:6:\"active\";}s:13:\"ad_definition\";a:11:{s:6:\"number\";i:1;s:5:\"price\";i:1000;s:7:\"cta_url\";s:16:\"http://ctbuh.org\";s:8:\"cta_fill\";N;s:4:\"type\";s:5:\"image\";s:4:\"size\";a:2:{s:6:\"height\";i:250;s:5:\"width\";i:300;}s:7:\"columns\";i:1;s:7:\"cta_img\";s:80:\"http://newyorkyimby.com/wp-content/uploads/2013/09/CTBUH_YIMBY_WebAd_300x250.jpg\";s:8:\"contract\";s:9:\"pageviews\";s:9:\"pageviews\";i:100000;s:8:\"rotation\";N;}s:26:\"\0wp_adpress_campaign\0state\";s:3:\"set\";}'),(2,1,'1377320730','1378856380','O:13:\"wp_adpress_ad\":9:{s:11:\"campaign_id\";s:1:\"1\";s:5:\"param\";a:3:{s:10:\"image_link\";s:81:\"http://newyorkyimby.com/wp-content/uploads/2013/08/CTBUH_YIMBY_WebAd_300x2505.jpg\";s:3:\"url\";s:16:\"http://ctbuh.org\";s:6:\"paypal\";b:0;}s:6:\"status\";s:7:\"running\";s:7:\"user_id\";i:2;s:28:\"\0wp_adpress_ad\0ad_definition\";a:8:{s:6:\"number\";i:1;s:5:\"price\";i:0;s:4:\"type\";s:5:\"image\";s:4:\"size\";a:2:{s:6:\"height\";i:250;s:5:\"width\";i:300;}s:7:\"columns\";i:1;s:8:\"contract\";s:6:\"clicks\";s:6:\"clicks\";i:1;s:8:\"rotation\";N;}s:20:\"\0wp_adpress_ad\0state\";s:3:\"set\";s:5:\"stats\";a:2:{s:5:\"views\";a:0:{}s:4:\"hits\";a:0:{}}s:4:\"time\";s:10:\"1377320730\";s:2:\"id\";i:1;}','O:19:\"wp_adpress_campaign\":4:{s:2:\"id\";s:1:\"1\";s:8:\"settings\";a:3:{s:4:\"name\";s:9:\"YIMBYgram\";s:11:\"description\";s:9:\"YIMBYgram\";s:5:\"state\";s:6:\"active\";}s:13:\"ad_definition\";a:8:{s:6:\"number\";i:1;s:5:\"price\";i:0;s:4:\"type\";s:5:\"image\";s:4:\"size\";a:2:{s:6:\"height\";i:250;s:5:\"width\";i:300;}s:7:\"columns\";i:1;s:8:\"contract\";s:6:\"clicks\";s:6:\"clicks\";i:1;s:8:\"rotation\";N;}s:26:\"\0wp_adpress_campaign\0state\";s:3:\"set\";}');
/*!40000 ALTER TABLE `e5lawmcquw_adpress_history` ENABLE KEYS */;
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
