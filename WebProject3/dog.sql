-- MySQL dump 10.13  Distrib 5.5.15, for osx10.6 (i386)
--
-- Host: localhost    Database: dog
-- ------------------------------------------------------
-- Server version	5.5.15

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
-- Table structure for table `dog`
--

CREATE DATABASE IF NOT EXISTS dog;

USE dog;


DROP TABLE IF EXISTS `dog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `maintenance`   varchar(45) DEFAULT NULL,
  `breed` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dog`
--

LOCK TABLES `dog` WRITE;
/*!40000 ALTER TABLE `dog` DISABLE KEYS */;
INSERT INTO `dog` (id, name, age, color, maintenance, breed)
VALUES
    (1, 'Lily', 3, 'brown', 'High', 'yorki'),
    (2, 'Charlie', 7, 'red', 'low', 'chiwawa'),
    (3, 'Buddy', 3, 'black', 'low', 'chiwawa'),
    (4, 'Bear', 6, 'blue', 'high', 'husky'),
    (5, 'Daisy', 11, 'black', 'high', 'beagles'),
    (6, 'Milo', 4, 'red', 'high', 'poodles'),
    (7, 'Max', 19, 'brown', 'high', 'golden-retrievers'),
    (8, 'Cooper', 8, 'blue', 'high', 'mudi'),
    (9, 'Bailey', 2, 'black', 'low', 'chinook'),
    (10, 'Lucy', 1, 'red', 'high', 'stabyhoun');

/*!40000 ALTER TABLE `dog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-01  9:22:24
CREATE DATABASE IF NOT EXISTS user;

USE user;

 

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;

INSERT INTO `user` (id, name, username, password)
VALUES
    (1, 'James', 'jamie', 'jamieblack123'),
    (2, 'John', 'Doe', 'johndoe123'),
    (3, 'Alice', 'Smith', 'alicesmith'),
    (4, 'Bob', 'Johnson', 'bobjohnson'),
    (5, 'Emily', 'Davis', 'emilydavis'),
    (6, 'Michael', 'Wilson', 'michaelwilson'),
    (7, 'Olivia', 'Brown', 'oliviabrown'),
    (8, 'David', 'Martin', 'davidmartin'),
    (9, 'Sophia', 'Anderson', 'sophiaanderson'),
    (10, 'Daniel', 'Thompson', 'danielthompson');

UNLOCK TABLES;