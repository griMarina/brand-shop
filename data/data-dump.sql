-- MySQL dump 10.13  Distrib 8.0.32, for macos13.0 (arm64)
--
-- Host: localhost    Database: online_shop
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `quantity` int DEFAULT NULL,
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `section_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'dresses',1),(2,'t-shirts',1),(3,'t-shirts',2),(4,'t-shirts',3),(5,'sweatshirts',1),(6,'sweatshirts',2),(7,'sweatshirts',3),(8,'trousers',1),(9,'trousers',2),(10,'jeans',1),(11,'jeans',2),(12,'jeans',3),(13,'coats',1),(14,'coats',2),(15,'shorts',1),(16,'shorts',2),(17,'shirts',2);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `number` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES ('1','product-1','1',0),('10','product-10','10',0),('100','product-30','30',1),('101','product-31','31',1),('102','product-32','32',1),('103','product-33','33',1),('104','product-34','34',1),('105','product-35','35',1),('106','product-36','36',1),('107','product-37','37',1),('108','product-38','38',1),('109','product-39','39',1),('11','product-11','11',0),('110','product-40','40',1),('111','product-41','41',1),('112','product-42','42',1),('113','product-43','43',1),('114','product-44','44',1),('115','product-45','45',1),('116','product-46','46',1),('117','product-47','47',1),('118','product-48','48',1),('119','product-49','49',1),('12','product-12','12',0),('120','product-50','50',1),('121','product-51','51',1),('122','product-52','52',1),('123','product-53','53',1),('124','product-54','54',1),('125','product-55','55',1),('126','product-56','56',1),('127','product-57','57',1),('128','product-58','58',1),('129','product-59','59',1),('13','product-13','13',0),('130','product-60','60',1),('131','product-61','61',1),('132','product-62','62',1),('133','product-63','63',1),('134','product-64','64',1),('14','product-14','14',0),('15','product-15','15',0),('18','product-16','16',0),('19','product-17','17',0),('2','product-2','2',0),('20','product-18','18',0),('21','product-19','19',0),('22','product-20','20',0),('23','product-21','21',0),('24','product-22','22',0),('25','product-23','23',0),('26','product-24','24',0),('27','product-25','25',0),('28','product-26','26',0),('29','product-27','27',0),('3','product-3','3',0),('30','product-28','28',0),('31','product-29','29',0),('32','product-31','31',0),('33','product-32','32',0),('34','product-33','33',0),('35','product-34','34',0),('36','product-35','35',0),('37','product-36','36',0),('38','product-37','37',0),('39','product-38','38',0),('4','product-4','4',0),('40','product-39','39',0),('41','product-40','40',0),('42','product-41','41',0),('43','product-42','42',0),('44','product-43','43',0),('45','product-44','44',0),('46','product-45','45',0),('47','product-46','46',0),('48','product-47','47',0),('49','product-48','48',0),('5','product-5','5',0),('50','product-49','49',0),('51','product-50','50',0),('52','product-51','51',0),('53','product-52','52',0),('54','product-53','53',0),('55','product-54','54',0),('56','product-55','55',0),('57','product-56','56',0),('58','product-57','57',0),('59','product-58','58',0),('6','product-6','6',0),('60','product-59','59',0),('61','product-60','60',0),('62','product-61','61',0),('63','product-62','62',0),('64','product-63','63',0),('65','product-64','64',0),('66','product-30','30',0),('67','product-1','1',1),('68','product-1','1',2),('69','product-1','1',3),('7','product-7','7',0),('70','product-2','2',1),('71','product-3','3',1),('72','product-4','4',1),('73','product-5','5',1),('74','product-6','6',1),('75','product-7','7',1),('76','product-8','8',1),('77','product-9','9',1),('78','product-10','10',1),('79','product-11','11',1),('8','product-8','8',0),('80','product-12','12',1),('81','product-13','13',1),('82','product-14','14',1),('83','product-15','15',1),('84','product-16','16',1),('85','product-17','17',1),('86','product-18','18',1),('87','product-19','19',1),('88','product-20','20',1),('89','product-21','21',1),('9','product-9','9',0),('90','product-22','22',1),('91','product-23','23',1),('92','product-24','24',1),('93','product-25','25',1),('94','product-26','26',1),('95','product-27','27',1),('96','product-28','28',1),('97','product-29','29',1),('98','product-29','29',2),('99','product-29','29',3);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `colour` varchar(255) NOT NULL,
  `section_id` int NOT NULL,
  `category_id` int NOT NULL,
  `main_img_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `main_img_id` (`main_img_id`),
  KEY `category_id` (`category_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('1','Next TAILORED STANDARD - Day dress','Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.',83,NULL,'orange',1,1,'1'),('10','Sublevel Sweatshirt','Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',40,NULL,'grey',1,5,'10'),('11','Opus GART - Hoodie','Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',70,NULL,'green',1,5,'11'),('12','Opus GART - Hoodie','Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',70,NULL,'pink',1,5,'12'),('13','JDYLOUISVILLE CATIA WIDE PANT - Trousers','Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ',33,NULL,'black',1,8,'13'),('14','JDYLOUISVILLE CATIA WIDE PANT - Trousers','Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ',33,NULL,'dark blue',1,8,'14'),('15','Stradivarius Cargo trousers','Material: 100% cotton. Low rise. Pockets, elasticated waist. Relaxed Fit. ',30,NULL,'beige',1,8,'15'),('16','Reebok Classic SPARKLE - Tracksuit bottoms','Material: 70% cotton, 30% polyester. Normal rise. Side pockets. Regular Fit.',55,NULL,'purple',1,8,'18'),('17','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'blue',1,10,'19'),('18','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'black',1,10,'20'),('19','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'purple',1,10,'21'),('2','Next TAILORED STANDARD - Day dress','Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.',83,NULL,'green',1,1,'2'),('20','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'white',1,10,'22'),('21','Stradivarius Short coat','Material: 70% polyester, 24% wool, 6% other fibres. Lapel collar. Flap pockets.',56,NULL,'beige',1,13,'23'),('22','Ricano GRAZIA - Classic coat','Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.',199,NULL,'white',1,13,'24'),('23','Ricano GRAZIA - Classic coat','Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.',199,NULL,'red',1,13,'25'),('24','Mango POLANA - Trenchcoat','Material: 100% cotton. Turn-down collar. Belt included, button row. Regular Fit. Knee-length.',80,NULL,'black',1,13,'26'),('25','Stradivarius MOM - Denim shorts','Material: 100% cotton. High rise. Back pocket, side pockets. Regular Fit.',20,NULL,'blue',1,15,'27'),('26','Next TAILORED CITY - Shorts','Material: 53% polyester, 44% viscose, 3% elastane. Normal rise. Back pocket, side pockets. Regular Fit.',51,NULL,'blue',1,15,'28'),('27','BONOBO Jeans Shorts','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',36,NULL,'brown',1,15,'29'),('28','BONOBO Jeans Shorts','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',36,NULL,'green',1,15,'30'),('29','Selected Homme SLIMNEW MARK SHIRT - Formal shirt','Material: 100% cotton. Shark collar. Slim Fit.',40,NULL,'white',2,17,'31'),('3','FS Collection SLEEVE HEM - Day dress','Material: 100% cotton. Neckline: Cache-coeur. Loose Fit. Long length. Short sleeve.',48,NULL,'white',1,1,'3'),('30','Selected Homme SLIMNEW MARK SHIRT - Formal shirt','Material: 100% cotton. Shark collar. Slim Fit.',40,NULL,'red',2,17,'66'),('31','INDICODE JEANS LANGARM BRAYDEN - Shirt','Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.',60,NULL,'blue',2,17,'32'),('32','INDICODE JEANS LANGARM BRAYDEN - Shirt','Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.',60,NULL,'grey',2,17,'33'),('33','Urban Classics HEAVY - Basic T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',20,NULL,'beige',2,3,'34'),('34','INDICODE JEANS WILBUR - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',25,NULL,'blue',2,3,'35'),('35','INDICODE JEANS WILBUR - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',25,NULL,'red',2,3,'36'),('36','INDICODE JEANS WILBUR - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',25,NULL,'white',2,3,'37'),('37','Nike Sportswear CLUB - Sweatshirt','Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.',55,NULL,'blue',2,6,'38'),('38','Nike Sportswear CLUB - Sweatshirt','Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.',55,NULL,'orange',2,6,'39'),('39','Pier One Sweatshirt','Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.',25,NULL,'grey',2,6,'40'),('4','Morgan WRAP WITH CHAIN DETAIL - Party dress','Material: 96% polyester, 4% elastane. Neckline: Cache-coeur. Regular Fit. Short length. Short sleeve.',69,NULL,'black',1,1,'4'),('40','Pier One Sweatshirt','Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.',25,NULL,'black',2,6,'41'),('41','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'red',2,9,'42'),('42','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'green',2,9,'43'),('43','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'white',2,9,'44'),('44','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'brown',2,9,'45'),('45','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'blue',2,11,'46'),('46','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'brown',2,11,'47'),('47','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'black',2,11,'48'),('48','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'white',2,11,'49'),('49','Buratti Short coat','Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.',125,NULL,'black',2,14,'50'),('5','Anna Field Basic T-shirt','Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve',11,NULL,'white',1,2,'5'),('50','Buratti Short coat','Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.',125,NULL,'brown',2,14,'51'),('51','Pepe Jeans JENSEN - Parka','Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.',250,NULL,'green',2,14,'52'),('52','Pepe Jeans JENSEN - Parka','Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.',250,NULL,'blue',2,14,'53'),('53','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'beige',2,16,'54'),('54','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'black',2,16,'55'),('55','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'pink',2,16,'56'),('56','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'orange',2,16,'57'),('57','Next DAISY STANDARD - Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',14,NULL,'green',3,4,'58'),('58','Name it NKFJAMA TOP DISNEY MICKEY MOUSE - Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',25,NULL,'yellow',3,4,'59'),('59','Pieces Kids TEE - Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',15,NULL,'pink',3,4,'60'),('6','Anna Field Basic T-shirt','Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve',11,NULL,'blue',1,2,'6'),('60','Watapparel Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',25,NULL,'black',3,4,'61'),('61','Cigit Sweatshirt','Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.',20,NULL,'green',3,7,'62'),('62','Cigit Sweatshirt','Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.',20,NULL,'beige',3,7,'63'),('63','Next VINTAGE - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',25,NULL,'blue',3,12,'64'),('64','Next VINTAGE - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',25,NULL,'black',3,12,'65'),('7','Anna Field Basic T-shirt','Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve',11,NULL,'black',1,2,'7'),('8','ONLLUCY - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Regular Fit. Normal length. Short sleeve',17,NULL,'black',1,2,'8'),('9','Sublevel Sweatshirt','Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',40,NULL,'beige',1,5,'9');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'women'),(2,'men'),(3,'kids');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('user_641339f26eabf','admin@admin.com','$2y$10$yTlwVZdcxHsnGX.k35Z9UeZitndMD2TXWcaoz6nXbaSxV1p5M9Zay','admin','admin','123456789','Street 1'),('user_641b8338aac87','user@email.com','$2y$10$Anwk/MBkoCc3fs4ynB81R.lWG0ycz31rj9uiKBfKGpDQP2re0OO02','user','user','987654321','Street 2');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-23 19:10:44
