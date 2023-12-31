-- MariaDB dump 10.19  Distrib 10.11.0-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: profileapp
-- ------------------------------------------------------
-- Server version	10.11.0-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(25) NOT NULL,
  `title` varchar(4096) DEFAULT NULL,
  `content` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES
(1,'home','Home','<img src=\'https://www.w3schools.com/w3css/img_lights.jpg\' alt=\'Lights\' style=\'heigth:100%\'>'),
(2,'contact','Contact','<article>\r\n<p>Eerste Titel</p>\r\n<p>Adres<BR>Woonplaats<p>\r\n</article>\r\n<article>\r\n<p>Tweede Titel</p>\r\n<p>Email<BR>Telefoon<p>\r\n</article>'),
(3,'about','<link rel=\'stylesheet\' href=\'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\' />About','<article><p>Over mij</p><p>Ik ben student bij Windesheim Almere. Ik volg de opleiding Associate Degree Software Development.</p></article>\r\n<article><p>Over de opleiding</p><p>De opleiding is een tweejarige opleiding. Het is een opleiding waarbij je veel leert over programmeren en het ontwikkelen van software.</p></article>\r\n<article><p>Over de school</p><p>Windesheim Almere is een school waarbij je veel praktijkgericht bezig bent. Je leert veel over het vakgebied en je leert veel over jezelf.</p></article>\r\n<article><p>Over de toekomst</p><p>Ik wil graag verder studeren zodat ik in Almere mijn HBO-ICT bachelor kan halen.</p></article>\r\n<article><p>Locatie</p><div class=\'map-container\'><div id=\'map\' style=\'height: 100%;\'></div></div></article>\r\n<script src=\'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\'></script>\r\n<script>\r\n  var map = L.map(\'map\').setView([52.37156887996604, 5.219101315953748], 17); \r\n\r\n  L.tileLayer(\'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png\', {\r\n    attribution: \'&copy; <a href=\\\"https://www.openstreetmap.org/copyright\\\">OpenStreetMap</a> contributors\'\r\n  }).addTo(map);\r\n\r\n  L.marker([52.37156887996604, 5.219101315953748]).addTo(map)\r\n    .bindPopup(\'Windesheim in Almere locatie Circus\')\r\n    .openPopup();\r\n\r\n	function onMapClick(e) {\r\n		alert(\'You clicked the map at \' + e.latlng);\r\n	}\r\n	map.on(\'click\', onMapClick);\r\n</script>\r\n'),
(4,'details','Details','<h1>HobbyΓÇÖs</h1>\r\n<div class=\'table\'> \r\n%data%\r\n</div>'),
(5,'skills','Skills','<div class=\'table\'>\r\n%data%\r\n</div>');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hobbies`
--

LOCK TABLES `hobbies` WRITE;
/*!40000 ALTER TABLE `hobbies` DISABLE KEYS */;
INSERT INTO `hobbies` VALUES
(1,'Tennis','Tennis is een balsport voor twee spelers (enkelspel) of paren (dubbelspel), waarbij een bal van gemiddeld 67 mm diameter met een racket over een net gespeeld moet worden.','2023-10-17 17:37:49','2023-10-17 17:37:49'),
(2,'Voetbal','Voetbal is een wereldwijd populaire balsport waarbij twee ploegen van elf spelers moeten proberen de bal in het doel van de tegenstander te krijgen. ','2023-10-17 17:37:50','2023-10-17 17:37:50'),
(3,'Hockey','Hockey is een balsport voor teams. Het belangrijkste attribuut van de hockeyspeler is de stick, die wordt gebruikt om de bal te hanteren.','2023-10-17 17:37:51','2023-10-17 17:37:51');
/*!40000 ALTER TABLE `hobbies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hobbies_users`
--

DROP TABLE IF EXISTS `hobbies_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hobbies_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hobbyid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hobbies_users`
--

LOCK TABLES `hobbies_users` WRITE;
/*!40000 ALTER TABLE `hobbies_users` DISABLE KEYS */;
INSERT INTO `hobbies_users` VALUES
(2,1,3,'2023-10-18 07:55:29','2023-10-18 07:55:29'),
(3,2,2,'2023-10-18 07:55:29','2023-10-18 07:55:29'),
(4,2,3,'2023-10-18 07:55:29','2023-10-18 07:55:29'),
(15,3,1,'2023-10-27 00:32:59','2023-10-27 00:32:59'),
(17,3,4,'2023-10-27 00:35:23','2023-10-27 00:35:23'),
(18,1,1,'2023-10-27 15:16:37','2023-10-27 15:16:37'),
(21,2,4,'2023-11-03 22:53:39','2023-11-03 22:53:39');
/*!40000 ALTER TABLE `hobbies_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES
(1,'SL01','PHP en MySQL','2023-10-17 17:31:36','2023-10-17 17:31:36'),
(2,'FD','HTML, CSS en JS','2023-10-17 17:31:36','2023-10-17 17:31:36'),
(3,'PV','Scrum, Agile','2023-10-17 17:31:36','2023-10-17 17:31:36');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules_users`
--

DROP TABLE IF EXISTS `modules_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `grade` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules_users`
--

LOCK TABLES `modules_users` WRITE;
/*!40000 ALTER TABLE `modules_users` DISABLE KEYS */;
INSERT INTO `modules_users` VALUES
(1,1,2,0.1,'2023-10-17 17:31:40','2023-10-17 17:31:40'),
(2,1,1,5.6,'2023-10-17 17:31:41','2023-10-17 17:31:41');
/*!40000 ALTER TABLE `modules_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `about` varchar(2000) DEFAULT NULL,
  `icon` varchar(32) DEFAULT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `experience` varchar(1000) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES
(4,'Hondje','de Eerste','krok@hondje.nl','Ik ben zo\'n hondje.','Hond654446fb3b7c4030941028.png','woman','Als een hond kan ik goed irritant blaffen.','Ik kan alles<br>\r\nWant\r\nIk\r\nBen\r\nGoed','2023-11-03 00:32:44','2023-11-03 22:52:02');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remember_tokens`
--

DROP TABLE IF EXISTS `remember_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remember_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remember_tokens`
--

LOCK TABLES `remember_tokens` WRITE;
/*!40000 ALTER TABLE `remember_tokens` DISABLE KEYS */;
INSERT INTO `remember_tokens` VALUES
(20,4,'e0fb2cf1e4bec9e9563f7685af2225d7f9affd29433a13093b0c54fbfe3cdcf7','2023-12-03 14:45:54');
/*!40000 ALTER TABLE `remember_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text DEFAULT NULL,
  `expiration` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Barry','$2y$10$Oulife4DMSlg7gZ9RLwtG.Jp59oa2Hf4jSq8h1o3kofJyBFvf3Wwy','2023-10-24 23:32:11','2023-10-24 23:32:11'),
(2,'Rowin','$2y$10$dhYMHTKn3uWmG9bkHtpNRe9jonGpGY7i7K5LThDX2tUQGuzyTn6ui','2023-10-24 23:32:30','2023-10-24 23:32:30'),
(3,'Patrice','$2y$10$zz80rA07Pm5ZtvML3AMn8O/wwaf5wMoQxwU0OGbBn3ypYdmHH7fbu','2023-10-24 23:34:28','2023-10-24 23:34:28'),
(4,'Hond','$2y$10$EkYyUnDw./d4LN1.a77ZJO6EVK9/7UzmjCjtdRfK4FEC6vyUV9hSu','2023-10-24 23:34:43','2023-10-24 23:34:43');
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

-- Dump completed on 2023-11-03 23:55:19
