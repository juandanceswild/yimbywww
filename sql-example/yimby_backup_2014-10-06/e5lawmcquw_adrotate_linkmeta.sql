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
-- Table structure for table `e5lawmcquw_adrotate_linkmeta`
--

DROP TABLE IF EXISTS `e5lawmcquw_adrotate_linkmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e5lawmcquw_adrotate_linkmeta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ad` int(5) NOT NULL DEFAULT '0',
  `group` int(5) NOT NULL DEFAULT '0',
  `block` int(5) NOT NULL DEFAULT '0',
  `user` int(5) NOT NULL DEFAULT '0',
  `schedule` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e5lawmcquw_adrotate_linkmeta`
--

LOCK TABLES `e5lawmcquw_adrotate_linkmeta` WRITE;
/*!40000 ALTER TABLE `e5lawmcquw_adrotate_linkmeta` DISABLE KEYS */;
INSERT INTO `e5lawmcquw_adrotate_linkmeta` (`id`, `ad`, `group`, `block`, `user`, `schedule`) VALUES (5,2,0,0,7,0),(6,3,0,0,7,0),(7,4,0,0,7,0),(12,8,0,0,8,0),(13,9,1,0,0,0),(15,10,1,0,0,0),(18,11,0,0,11,0),(19,12,1,0,0,0),(20,13,1,0,0,0),(23,15,3,0,0,0),(24,16,1,0,0,0),(25,17,3,0,0,0),(47,18,3,0,0,0),(52,20,1,0,0,0),(56,21,3,0,0,0),(58,22,1,0,0,0),(62,23,3,0,0,0),(65,24,3,0,0,0),(68,25,3,0,0,0),(71,26,3,0,0,0),(74,27,3,0,0,0),(75,1,1,0,0,0),(93,1,0,0,0,63),(94,9,0,0,0,64),(95,10,0,0,0,65),(96,12,0,0,0,66),(97,13,0,0,0,67),(98,15,0,0,0,68),(99,16,0,0,0,69),(100,17,0,0,0,70),(101,18,0,0,0,71),(102,20,0,0,0,72),(103,21,0,0,0,73),(104,22,0,0,0,74),(105,23,0,0,0,75),(106,24,0,0,0,76),(107,26,0,0,0,77),(108,27,0,0,0,78),(109,28,1,0,0,0),(110,28,0,0,0,63),(113,29,0,0,0,79),(114,29,1,0,0,0),(116,30,0,0,0,80),(118,30,3,0,0,0),(119,31,3,0,0,0),(121,31,0,0,0,81),(122,32,3,0,0,0),(124,32,0,0,0,82),(125,33,3,0,0,0),(126,33,0,0,0,83),(127,34,3,0,0,0),(128,34,0,0,0,84),(129,35,1,0,0,0),(130,35,0,0,0,86),(131,36,0,0,0,87),(132,36,3,0,0,0),(133,37,3,0,0,0),(134,37,0,0,0,88),(135,38,3,0,0,0),(136,38,0,0,0,89),(137,39,1,0,0,0),(138,39,0,0,0,90),(140,40,0,0,0,91),(142,41,0,0,0,92),(143,41,3,0,0,0),(144,40,3,0,0,0),(147,42,3,0,0,0),(148,42,0,0,0,94),(151,44,0,0,0,97),(152,43,0,0,0,98),(153,44,3,0,0,0),(154,43,3,0,0,0),(155,45,3,0,0,0),(156,45,0,0,0,99),(157,46,3,0,0,0),(158,46,0,0,0,100),(159,47,1,0,0,0),(160,47,0,0,0,101);
/*!40000 ALTER TABLE `e5lawmcquw_adrotate_linkmeta` ENABLE KEYS */;
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
