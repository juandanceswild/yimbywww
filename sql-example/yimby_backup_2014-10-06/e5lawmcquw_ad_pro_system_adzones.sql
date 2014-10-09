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
-- Table structure for table `e5lawmcquw_ad_pro_system_adzones`
--

DROP TABLE IF EXISTS `e5lawmcquw_ad_pro_system_adzones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_ad_pro_system_adzones` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(100) NOT NULL,
  `atonce` varchar(50) NOT NULL,
  `custom` int(2) NOT NULL,
  `responsive` int(2) NOT NULL,
  `bg` int(2) NOT NULL,
  `rotation` int(5) NOT NULL,
  `rotation_time` int(10) NOT NULL,
  `banner_price` decimal(20,2) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_ad_pro_system_adzones`
--

LOCK TABLES `e5lawmcquw_ad_pro_system_adzones` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_ad_pro_system_adzones` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_ad_pro_system_adzones` (`id`, `name`, `description`, `size`, `atonce`, `custom`, `responsive`, `bg`, `rotation`, `rotation_time`, `banner_price`) VALUES (1,'Right sidebar','Right sidebar','300x250','1x1',0,0,0,0,30,0.00),(2,'res','res','','0',0,1,0,1,0,0.00),(3,'300x600','','300x600','0',1,0,0,0,0,0.00);
/*!40000 ALTER TABLE `e5lawmcquw_ad_pro_system_adzones` ENABLE KEYS */;
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
