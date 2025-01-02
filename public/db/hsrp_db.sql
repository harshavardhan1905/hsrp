-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: hsrpbooking
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `state` varchar(50) DEFAULT NULL,
  `wheeler_reg_no` varchar(20) NOT NULL,
  `chassis_no` varchar(50) DEFAULT NULL,
  `engine_no` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`wheeler_reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES ('Andhra Pradesh','1233232','XXXXXX12345','XXXXXX12345','2025-01-01 10:50:22'),('Telangana','1234','XXXXXX12345','XXXXXX12345','2024-12-28 16:27:03'),('Telangana','1234322','XXXXXX12345','XXXXXX12345','2024-12-28 18:19:56'),('Telangana','123445','XXXXXX12345','XXXXXX12345','2024-12-28 16:29:04'),('Telangana','1234567','XXXXXX12345','XXXXXX12345','2024-12-28 16:34:14'),('Andhra Pradesh','12345yu','XXXXXX12345','XXXXXX12345','2025-01-01 11:11:14'),('Arunachal Pradesh','1235448855chutt','dewd','asdfadsf','2025-01-01 06:07:42'),('Andhra Pradesh','123erderre','aewdadasd','adsadasd','2025-01-01 06:13:55'),('Sikkim','123Harsha','XXXXXX12345','XXXXXX12345','2024-12-28 17:32:30'),('Telangana','16876890','XXXXXX12345','XXXXXX12345','2024-12-28 17:53:58'),('Telangana','2121212121','XXXXXX12345','XXXXXX12345','2024-12-28 18:17:55'),('Telangana','213','XXXXXX12345','XXXXXX12345','2024-12-28 17:31:08'),('Telangana','23456','XXXXXX12345','XXXXXX12345','2024-12-28 18:04:00'),('Telangana','420','XXXXXX12345','XXXXXX12345','2024-12-28 18:15:32'),('Arunachal Pradesh','456redgg','XXXXXX12345','XXXXXX12345','2025-01-01 06:46:41'),('Andhra Pradesh','7330823490','XXXXXX12345','XXXXXX12345','2025-01-01 06:54:45'),('Arunachal Pradesh','80741502152','XXXXXX12345','XXXXXX12345','2025-01-01 10:50:41'),('Himachal Pradesh','908987','XXXXXX1234986','XXXXXX758940','2024-12-28 18:04:44'),('Andhra Pradesh','dafadf','dewd','asdfadsf','2025-01-01 06:05:58'),('Arunachal Pradesh','dafadf1122','dewd','asdfadsf','2025-01-01 06:06:59'),('Andhra Pradesh','ddsdasd323232','harsha1212121212121212121212121212','harsha1212121212121212121212121212','2025-01-01 06:49:45'),('Telangana','DLXXXXXX01','XXXXXX12345','XXXXXX12345','2024-12-28 16:19:55'),('Andhra Pradesh','gretr','XXXXXX12345','XXXXXX12345','2025-01-01 11:15:40'),('Andhra Pradesh','harsha12121','harsha1212121212121212121212121212','harsha1212121212121212121212121212','2025-01-01 06:48:23'),('Telangana','harsha1234','XXXXXX12345','XXXXXX12345','2024-12-28 16:41:10'),('Telangana','harsha1893','XXXXXX12345','XXXXXX12345','2024-12-28 18:41:25'),('Andhra Pradesh','harsha1905','XXXXXX12345','XXXXXX12345','2025-01-01 06:31:36'),('West Bengal','harsha1905123','XXXXXX12345','XXXXXX12345','2025-01-01 06:33:41'),('West Bengal','harsha19051232','XXXXXX12345','XXXXXX12345','2025-01-01 06:34:35'),('Arunachal Pradesh','hyu','XXXXXX12345','XXXXXX12345','2025-01-01 11:17:26'),('Telangana','ki95lo6789','XXXXXX12345','XXXXXX12345','2024-12-28 17:55:49'),('Andhra Pradesh','resa','XXXXXX12345','XXXXXX12345','2025-01-01 11:11:55'),('Andhra Pradesh','resdd','XXXXXX12345','XXXXXX12345','2025-01-01 11:12:59'),('Andhra Pradesh','trere','XXXXXX12345','XXXXXX12345','2025-01-01 11:15:25'),('Arunachal Pradesh','XXXXX1233','dewdfefwwwwfe','asdfadsf','2025-01-01 06:11:47'),('Andhra Pradesh','XXXXX123321','dewdfefwwwwfe','asdfadsf','2025-01-01 06:13:11');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hsrp`
--

DROP TABLE IF EXISTS `hsrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hsrp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state` varchar(45) DEFAULT NULL,
  `wheeler_re_no` varchar(45) DEFAULT NULL,
  `chassis_no` varchar(45) DEFAULT NULL,
  `eng_no` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hsrp`
--

LOCK TABLES `hsrp` WRITE;
/*!40000 ALTER TABLE `hsrp` DISABLE KEYS */;
INSERT INTO `hsrp` VALUES (1,'Andhra Pradesh','red','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,'harsiha','harsha@gmail.com','1234t','hyd'),(3,'Andhra Pradesh','redgf','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(4,'Andhra Pradesh','gefd','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(5,NULL,NULL,NULL,NULL,'fdadad','meoaeijo@gmail.com','321','rere'),(6,'Andhra Pradesh','12134','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(7,'Andhra Pradesh','12134','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(8,'Andhra Pradesh','adas','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(9,'Andhra Pradesh','rtrt','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(10,'Andhra Pradesh','jh','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(11,'Andhra Pradesh','dfdsf','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(12,'Arunachal Pradesh','adfaf','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(13,'Arunachal Pradesh','fsf','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(14,'Arunachal Pradesh','dgsfd','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(15,'Assam','reffe','XXXXXX12345','XXXXXX12345','dfa','1harsha@gmail.com','wqwewer67','24525'),(16,'Andhra Pradesh','453763272iuhfkadjfkjda','XXXXXX12345','XXXXXX12345','chitti','5chitti@gmail.com','2345','fdgh'),(17,'Arunachal Pradesh','dfaff','XXXXXX12345','XXXXXX12345','fdaf','hello@gmail.ocm','7898dfd','dfdf'),(18,'Assam','adsd','XXXXXX12345','XXXXXX12345','eaer','demo@gmail.com','1234t','343434'),(19,'Andhra Pradesh','adffdf','XXXXXX12345','XXXXXX12345','fadfadffd','fadfadfdf@gmail.cl','432434','dsfdfdf'),(20,'Assam','edwewe','XXXXXX12345','XXXXXX12345',NULL,NULL,NULL,NULL),(21,'Arunachal Pradesh','harehierh8596u9','harehierh8596u9','harehierh8596u9',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `hsrp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'harsha',123),(2,'harsha',321),(3,'chitti',100);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'harsha','emai@gmail.com','789794966','hyd'),(2,'gadasd','meoaeijo@gmail.com','123','fvgf');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `wheeler_reg` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `wheeler_reg` (`wheeler_reg`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`wheeler_reg`) REFERENCES `bookings` (`wheeler_reg_no`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (29,NULL,NULL,NULL,NULL,NULL,'2025-01-01 10:53:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-01 18:35:28
