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
-- Table structure for table `e5lawmcquw_adrotate_groups`
--

DROP TABLE IF EXISTS `e5lawmcquw_adrotate_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_adrotate_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT 'group',
  `modus` tinyint(1) NOT NULL DEFAULT '0',
  `fallback` varchar(5) NOT NULL DEFAULT '0',
  `sortorder` int(5) NOT NULL DEFAULT '0',
  `cat` longtext NOT NULL,
  `cat_loc` tinyint(1) NOT NULL DEFAULT '0',
  `cat_par` tinyint(1) NOT NULL DEFAULT '0',
  `page` longtext NOT NULL,
  `page_loc` tinyint(1) NOT NULL DEFAULT '0',
  `page_par` tinyint(1) NOT NULL DEFAULT '0',
  `geo` tinyint(1) NOT NULL DEFAULT '0',
  `wrapper_before` longtext NOT NULL,
  `wrapper_after` longtext NOT NULL,
  `gridrows` int(3) NOT NULL DEFAULT '2',
  `gridcolumns` int(3) NOT NULL DEFAULT '2',
  `admargin` int(2) NOT NULL DEFAULT '0',
  `admargin_bottom` int(2) NOT NULL DEFAULT '0',
  `admargin_left` int(2) NOT NULL DEFAULT '0',
  `admargin_right` int(2) NOT NULL DEFAULT '0',
  `adwidth` varchar(6) NOT NULL DEFAULT '125',
  `adheight` varchar(6) NOT NULL DEFAULT '125',
  `adspeed` int(5) NOT NULL DEFAULT '6000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_adrotate_groups`
--

LOCK TABLES `e5lawmcquw_adrotate_groups` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_adrotate_groups` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_adrotate_groups` (`id`, `name`, `modus`, `fallback`, `sortorder`, `cat`, `cat_loc`, `cat_par`, `page`, `page_loc`, `page_par`, `geo`, `wrapper_before`, `wrapper_after`, `gridrows`, `gridcolumns`, `admargin`, `admargin_bottom`, `admargin_left`, `admargin_right`, `adwidth`, `adheight`, `adspeed`) VALUES (1,'300x250 Banner',0,'',0,'',0,0,'',0,0,1,'','',1,1,1,1,1,1,'300','250',6000),(3,'Lower 300x250 Banner',0,'',0,'',0,0,'',0,0,1,'','',1,1,1,1,1,1,'300','250',6000),(4,'',0,'0',0,'',0,0,'',0,0,0,'','',2,2,0,0,0,0,'125','125',6000);
/*!40000 ALTER TABLE `e5lawmcquw_adrotate_groups` ENABLE KEYS */;
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
