-- MySQL dump 10.13  Distrib 5.5.15, for osx10.6 (i386)
--
-- Host: localhost    Database: film
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
-- Table structure for table `film`
--

CREATE DATABASE if NOT EXISTS film;
USE film;

DROP TABLE IF EXISTS film;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE film (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `description` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film`
--

LOCK TABLES film WRITE;
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO film VALUES (1, 'Annabelle', '2016', 'Horror', 'A doll that is cursed in the ancient centuries starts to haunt people'),
                          (2, 'Avatar: The way of Water', '2023', 'Action', 'After the disaster and war between human and avatar, they are going to find a place to hide from human'),
                          (3, 'Transformer: The Dark Moon', '2019', 'Action', 'The dark side of the moon has secrets... It was a big spaceship! Is it enemy or ally?'),
                          (4, 'Pitch Perfect 3', '2018', 'Comedy', 'The gang is graduated from university and starts to find their jobs in the society, but they find it boring and losing their purpose of life');
UNLOCK TABLES;


/*User*/
CREATE DATABASE if NOT EXISTS `user`;
USE `user`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;


LOCK TABLES user WRITE;
INSERT INTO `user` VALUES (1, 'John Smith', 'john89', 'gte5674435', 'john.jpg'),
                        (2, 'Claire DeLune', 'clairelune', '82345gjrhg156', 'claire.jpg'),
                        (3, 'Adam Renold', 'adamrenold325', '8904453fdew', 'adam.jpg'),
                        (4, 'Marie Lim', 'marielimchinhuan', '0866sedef352', 'marie.jpg'),
                        (5, 'Kenny Lim', 'marielimchinhuan', '0866sedef352', 'marie.jpg');
UNLOCK TABLES;