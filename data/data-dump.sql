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
  KEY `session_id` (`session_id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `order` (`session_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;
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
INSERT INTO `image` VALUES ('0120f5be-b8b0-417e-bd81-3bcc5d8eb97d','product-26','f649d592-e06c-4d51-a428-71ff60399717',0),('03f87290-fa84-4b9e-8b6d-7cb1ce535671','product-46','154d999c-72e2-42fd-9fab-d352d456cb51',1),('04738ff9-6ba4-497d-ab75-13518a1c70a2','product-64','d3c3fdea-c5ff-436d-8bb4-01ed3e5e8aff',1),('05f9f39c-acc4-4b6a-9a7b-3bb1f45e6d5b','product-10','4e32833a-1d1d-4ed4-ad3b-c49f2df5bfa5',0),('06eded22-c6a2-4bca-ac65-48e016a94707','product-52','3079176f-fedf-4238-bb8d-8bfa7e53122f',0),('08c6fab0-f8b0-4738-95df-819690e78ee1','product-24','73c3855a-200e-4758-a387-6bc3f05bcc79',1),('0d995446-bb85-435a-b002-ed9a55c534c0','product-45','66a459c1-1ca1-4aba-9bad-78f311071b1d',0),('0f3033af-9625-4707-a13a-198c487e19bd','product-14','f81856f6-9115-44b7-8d7a-d2f1740e55fe',0),('11567e1d-e9ac-430b-9fcf-728413b64bf9','product-62','a86a5c31-7b16-4011-b05c-9e4f44f264ef',1),('16d2b3ea-c549-48da-899d-8a53678a6c4c','product-29','4b5f6736-4317-407b-95b8-0831ed0d9417',2),('1747b0f6-32df-48fe-ba7d-698852d9d1c9','product-58','cfee1543-dfc4-4ae1-a36e-8c3b8329c383',0),('17732744-19e7-4cc0-886d-fa21c46d3295','product-48','a98ab734-4cda-410b-8d22-a48a988f9237',1),('18bf003a-6ae0-4c64-b945-f1af11f00a91','product-6','91223cc3-a6ce-4eb2-9efa-be89aa384306',1),('19b18af0-38ae-4d89-8f2c-a12a1e918559','product-38','6ebbba11-7b41-4541-ae4e-464b7ccd4771',1),('1a7157c4-0697-4f0a-bc61-ae022c666c8e','product-40','f94fb417-81bc-4b65-9b48-37d144760cf2',1),('1cfc4508-df49-484e-a471-f34b8853b4a2','product-64','d3c3fdea-c5ff-436d-8bb4-01ed3e5e8aff',0),('1e213ce5-d593-407f-b6cd-bdb7e841b272','product-9','873c0952-3d92-42fb-9209-e3fe2a2d572b',1),('1f78e425-1e70-4500-b9c5-31e8db3ae4a6','product-56','130a3842-9548-41b7-91fb-83be3cc6de58',0),('223d1a79-7f7c-45fc-ab5e-29b9cfd10c6f','product-38','6ebbba11-7b41-4541-ae4e-464b7ccd4771',0),('2543798d-26db-4d4e-a502-f150882ab232','product-20','8cef5102-b5ef-48ca-b0b5-354cb040751e',0),('268902ee-9e87-4f7f-a4a7-5b0bee514338','product-11','8970c9e9-972c-4be5-ae22-4ace26f9d8f2',1),('281a917b-6792-4f28-acfb-281fab93a1ea','product-57','0f5b3d7b-d69c-44bc-bb2f-223dcf40ece6',0),('28c4ea3c-57c0-45ab-9db2-db76e9f97307','product-53','5920874a-0a7a-4786-a83d-49759935f4d5',0),('2953c66d-d82c-47a3-8ee2-dc9ef549d3d7','product-8','95571cd0-110a-4606-87df-20b1f3c70b1a',0),('2a365adf-86a7-4fec-97cf-f5530bb13804','product-54','1a95530d-fd90-4947-9774-a6f21d028502',0),('2b61d58e-d7bf-4580-a7ff-c6a9f4506aa5','product-14','f81856f6-9115-44b7-8d7a-d2f1740e55fe',1),('33945601-a043-4bc6-a0d1-34bf68eb213e','product-50','d1673176-4eff-4cbe-9cff-c647da5180ca',0),('38187fca-9138-4feb-b74b-b0b1c303cfcc','product-46','154d999c-72e2-42fd-9fab-d352d456cb51',0),('390f2e83-f2d5-4f3f-a433-ec891d6066cf','product-59','bded1547-f20e-4769-ac06-dde610047adc',1),('3a7491a5-bff8-482b-b4df-bf6997b31824','product-34','38224d3c-34bd-4a6d-b84d-f669ae742eaf',0),('3a8ae8ec-3954-4b75-bdac-42ef9d85ea11','product-18','57303017-19c8-47f8-9748-e92d3916be0f',1),('3afc52e1-5fc0-4fde-b317-5c55cd70bbf5','product-44','24c91b17-3a40-4dd0-a505-dab44785a828',0),('3e8f2e88-82ab-42aa-b3a9-f4850c184586','product-8','95571cd0-110a-4606-87df-20b1f3c70b1a',1),('418dd721-6d22-4af7-b585-bb1960b1633a','product-49','b0cc0f30-d733-4561-8b7c-c0d2b07a37c4',0),('41e2455d-3e2a-4f68-a3b6-b4391547c0d2','product-15','ef4eb5c5-3987-4e4e-b45b-d88f696d8eec',0),('4528e826-d14a-4bb7-881d-897a64c4a6c7','product-43','bc1d2461-1008-46ff-8ac9-9fec4295237e',0),('47b7aacf-a4af-46dc-ac0e-51597286bc8b','product-33','ce61d889-73fe-4cb5-9770-e624f3569ec9',1),('4b355df3-9a5c-4b2b-b003-2d814637565d','product-29','4b5f6736-4317-407b-95b8-0831ed0d9417',3),('4d164c1e-cb6f-4163-b085-1116afdaede9','product-36','1ea4fcc2-6a24-44c3-94f6-0cb2fc72a949',0),('4d8cd6b6-c3cd-496d-a890-3cef726a5220','product-55','9f66b861-bc55-4ccd-ae54-618a5021a7e3',1),('4eb1d877-ab8c-4656-b16d-79ec6a8d6aa8','product-23','b25b6196-6138-4f57-b27d-c19ba9dfc26c',1),('4fae1b46-5e9a-46fc-a88f-eb6eddb9f060','product-5','2f90ab6b-c94b-4da1-9843-47c6bfc2ea0a',1),('4fde006d-40e8-4f85-a4ba-f0a2b68b2046','product-21','092ac701-5ebc-4de0-a0c0-3f9517da1c2e',1),('500373e3-ceec-4c19-9c36-42d41023f629','product-3','8c71b8ca-265a-4371-a5db-8d652281105e',1),('5141ab75-6d08-4cf5-8e61-f57f25ea33a2','product-31','25bbb65b-b7a0-4f53-b75c-f0e36abe8314',0),('570d28bc-59db-4a0c-8bfc-7d9ddfe1e14e','product-62','a86a5c31-7b16-4011-b05c-9e4f44f264ef',0),('5a5792b8-3ce8-4382-a422-807f07dcbfc0','product-52','3079176f-fedf-4238-bb8d-8bfa7e53122f',1),('6151da3f-7799-4049-bfaf-7334f7bd1af6','product-44','24c91b17-3a40-4dd0-a505-dab44785a828',1),('62f495c6-744c-4945-84db-d4f8c5df4e6d','product-58','cfee1543-dfc4-4ae1-a36e-8c3b8329c383',1),('67c76b84-0689-4eeb-93df-23c488094440','product-36','1ea4fcc2-6a24-44c3-94f6-0cb2fc72a949',1),('68d57e52-2635-45f7-adb6-fa79f3a37bc6','product-50','d1673176-4eff-4cbe-9cff-c647da5180ca',1),('69d9e0bc-33a2-4070-bdd1-0bf5f733c23b','product-54','1a95530d-fd90-4947-9774-a6f21d028502',1),('6fcc63a8-6532-456f-bf2d-57d56fd1fd71','product-40','f94fb417-81bc-4b65-9b48-37d144760cf2',0),('714b5eb8-4168-472d-a0c8-ff453ae1d6a4','product-39','ba507a3a-4681-489d-89cc-c936b93ac6b8',1),('72fd632c-600a-41e6-91d9-38f55f3f1bdf','product-48','a98ab734-4cda-410b-8d22-a48a988f9237',0),('74b3c5b4-e383-4bde-911e-f587bf47f414','product-3','8c71b8ca-265a-4371-a5db-8d652281105e',0),('769c39f7-15b2-455e-a649-e94878835a2b','product-31','25bbb65b-b7a0-4f53-b75c-f0e36abe8314',1),('79efc943-9acf-4a29-ba86-69f3981f3367','product-61','c1b9e4bc-d238-4861-a487-d382e65aa2a5',0),('7bb03621-b37f-4855-8bad-6fb4e7250390','product-20','8cef5102-b5ef-48ca-b0b5-354cb040751e',1),('7e239e11-a1f8-4878-8e76-5f2aaf8d4fe4','product-63','a5f04f00-0b4f-4013-a2f2-b99788a36dba',0),('809c9de9-fef2-4166-ae48-dc4a73b9015b','product-1','61952dc5-771b-480b-ac28-65de09cda42a',3),('821ee6c9-79b0-4b43-88e6-41b74cb625d9','product-39','ba507a3a-4681-489d-89cc-c936b93ac6b8',0),('869e2ee8-663f-4503-8be2-f68cf011a963','product-6','91223cc3-a6ce-4eb2-9efa-be89aa384306',0),('86ff717d-734d-4cb5-9667-dd809670f702','product-63','a5f04f00-0b4f-4013-a2f2-b99788a36dba',1),('88d03528-c8a8-4c32-8edd-cae4ac752c7c','product-22','68ea0c16-e7f2-4b28-8328-91a071c4ef19',0),('8ba3a122-5021-426c-8e44-0191be80538e','product-53','5920874a-0a7a-4786-a83d-49759935f4d5',1),('8dc674a7-b47d-4738-b6e5-1b61018c2bdc','product-35','9d8caa1c-5202-4fa9-86a3-ec9772df3dc5',0),('8e1dedab-ebf1-4cb0-ac22-eb858710e597','product-32','ae834ce0-53bc-47d5-8ada-781de761bae4',1),('8e532782-4f76-44a5-b8fd-768d73481055','product-45','66a459c1-1ca1-4aba-9bad-78f311071b1d',1),('8ef52ccd-a5ab-4567-9334-51b558703032','product-43','bc1d2461-1008-46ff-8ac9-9fec4295237e',1),('8eff2db5-d036-436c-a0b5-5c60837c2b16','product-42','391c6260-d1d5-498f-ad0c-3c90b4a632dd',1),('8ff0be42-1477-4074-b079-556d43432050','product-51','99b1f150-a4b2-462e-ad67-787586673c06',0),('91eb0acc-a84e-454c-98c2-4ec27171498c','product-4','f2b0bbc9-a015-46af-a612-230413d26577',1),('92932126-9794-4ddf-b9a5-783cf0dd37da','product-16','fa0e0642-b304-4292-9da4-4bd5261143ff',0),('92c8127b-819a-451e-84bf-ac8e42daff6f','product-47','22239de4-c3c3-429d-9d67-aa219ee82510',0),('945b5d43-b077-47c8-862e-081e0228e6e4','product-15','ef4eb5c5-3987-4e4e-b45b-d88f696d8eec',1),('94fd09e9-4509-4b59-ae4c-30f2a9d46bec','product-30','c7856107-ee83-4a05-b219-85fad8dd9f0e',0),('97dee675-742a-4d54-aa9d-580429117834','product-18','57303017-19c8-47f8-9748-e92d3916be0f',0),('992867d5-d5e6-4b1a-93af-dd3e524696bb','product-13','539732a4-53d3-4c1a-8a54-8858a7158e1c',1),('993c081f-d5f2-48d1-8be6-9a71a0358468','product-9','873c0952-3d92-42fb-9209-e3fe2a2d572b',0),('9ee8ef5c-563c-4ec9-beb0-a5f739e21fa4','product-29','4b5f6736-4317-407b-95b8-0831ed0d9417',1),('a0656de5-0bad-403e-b122-8151b2a3ff97','product-35','9d8caa1c-5202-4fa9-86a3-ec9772df3dc5',1),('a1718d02-f9e0-4be2-aebb-3f762b7c978d','product-33','ce61d889-73fe-4cb5-9770-e624f3569ec9',0),('a219d19c-02be-4699-95c2-3515a1e1865d','product-25','c974930a-7ce4-4749-a5e5-2ff5bc103885',0),('a38b6e64-8308-4b4e-9c55-2adcd92d7541','product-1','61952dc5-771b-480b-ac28-65de09cda42a',2),('a48565ca-5a02-44ca-884e-b9a470665a3f','product-47','22239de4-c3c3-429d-9d67-aa219ee82510',1),('a7354dcd-6028-4d3e-8596-bd90db7357f5','product-16','fa0e0642-b304-4292-9da4-4bd5261143ff',1),('a75c6fc9-6bb0-4bbf-af8a-5972cdde4d1d','product-12','e936c5e9-ba50-46a3-9ad5-af4e23207b94',1),('a8203d81-b5c1-4daf-ab8e-0798cfdd4787','product-7','ec672fc6-2409-4899-84fb-61810f79021b',1),('a8bf5484-de59-4370-a9a9-0e78dbda8cca','product-51','99b1f150-a4b2-462e-ad67-787586673c06',1),('a9c98aad-6a70-41ad-82ca-53b770a2221e','product-37','e6e1b125-2828-43a4-aba7-8b390a63572e',0),('ab05ce8d-a046-4a99-b5b2-3ce6c23c97e0','product-17','7cf51d5e-1c87-44bc-8c54-f9dad4085351',0),('ab0b9da2-4896-4d29-8fbc-b1e0151eddb9','product-11','8970c9e9-972c-4be5-ae22-4ace26f9d8f2',0),('ab6b0715-d015-438d-aa56-ffd650bf2c94','product-17','7cf51d5e-1c87-44bc-8c54-f9dad4085351',1),('ae1f148d-d4c6-4903-a917-115bf02a608c','product-37','e6e1b125-2828-43a4-aba7-8b390a63572e',1),('aeca94ba-017d-4935-8dfa-cec61d0c7cbe','product-19','3b47b2ab-36c7-4315-a3d7-8e6a34546e28',1),('b4f7becf-15ed-4cdc-874d-66a94cabb1b9','product-27','cdc921a1-405b-4e5e-ab6a-0b54f0d019ed',1),('b5b7965e-bc9b-4fbf-bda9-e73d5c133d1e','product-12','e936c5e9-ba50-46a3-9ad5-af4e23207b94',0),('b5f66e7e-8bab-4252-b420-b0b1ce0552a1','product-24','73c3855a-200e-4758-a387-6bc3f05bcc79',0),('b6f5d95a-c43a-4b3a-9db5-32f35fd749b3','product-60','b3d7e830-11b8-40f5-889f-c616d8225b9f',0),('b93a5d90-2751-495a-b16c-578c9d9028ba','product-60','b3d7e830-11b8-40f5-889f-c616d8225b9f',1),('ba6fb791-41b0-4b0d-bc49-1e0f51820d9e','product-32','ae834ce0-53bc-47d5-8ada-781de761bae4',0),('bbf933f3-0462-46ea-95a6-a8c7003e5ef3','product-61','c1b9e4bc-d238-4861-a487-d382e65aa2a5',1),('be5ba997-9bee-4721-b042-601a031bffad','product-29','4b5f6736-4317-407b-95b8-0831ed0d9417',0),('beda1fae-0cd9-4e4d-bf19-bfa32a203f72','product-13','539732a4-53d3-4c1a-8a54-8858a7158e1c',0),('c0200afd-0e90-4930-a521-cec6782058e0','product-21','092ac701-5ebc-4de0-a0c0-3f9517da1c2e',0),('c05b4afb-2af2-49ab-bfb3-aa3082d7cb9c','product-2','74d57d6f-ce37-4b53-863e-4b04c2eebae5',0),('c0dede2e-4850-4b83-9039-19336b928e22','product-49','b0cc0f30-d733-4561-8b7c-c0d2b07a37c4',1),('c1595ea6-17f2-4eba-88ab-b113e6370c1c','product-41','4e5aad38-7a00-43f5-bc66-b0bb6e6f36b3',0),('c27e842b-a2c1-4b3d-a86f-125c976e49ea','product-7','ec672fc6-2409-4899-84fb-61810f79021b',0),('c5d5287b-d271-41cf-affb-605699f7ca6f','product-28','e1c7bc05-98c2-4ece-ae45-c4dd13e16f83',1),('c5e74ec9-4da1-464d-a50e-758178811188','product-27','cdc921a1-405b-4e5e-ab6a-0b54f0d019ed',0),('c8089b91-9a96-4529-9776-c587bfc83830','product-1','61952dc5-771b-480b-ac28-65de09cda42a',0),('cb20d72e-d2cf-4d9d-ac5e-4cd32110bcdb','product-23','b25b6196-6138-4f57-b27d-c19ba9dfc26c',0),('cef3aeb5-c5cf-445b-8ccf-74586401d6e3','product-22','68ea0c16-e7f2-4b28-8328-91a071c4ef19',1),('cf39378a-75a0-48bf-bfcb-90547a924351','product-25','c974930a-7ce4-4749-a5e5-2ff5bc103885',1),('d3472c9c-751a-4a6c-8b7c-b2457e13b34d','product-2','74d57d6f-ce37-4b53-863e-4b04c2eebae5',1),('d3a9fe26-209c-4475-b1d3-ee4e99fb6eaa','product-1','61952dc5-771b-480b-ac28-65de09cda42a',1),('d7e03d4a-5ff1-4cc1-927d-88be9c22daa2','product-5','2f90ab6b-c94b-4da1-9843-47c6bfc2ea0a',0),('dab24cc8-4edc-4312-8504-9fd1183c175d','product-42','391c6260-d1d5-498f-ad0c-3c90b4a632dd',0),('dbab4ab1-8f86-42bf-9b79-7599c1c37bf6','product-56','130a3842-9548-41b7-91fb-83be3cc6de58',1),('dc74c92b-ad44-413e-a05d-b3ca064150ac','product-59','bded1547-f20e-4769-ac06-dde610047adc',0),('ddd1fc31-5862-42af-97bb-f1ced9ef3169','product-4','f2b0bbc9-a015-46af-a612-230413d26577',0),('e38de47a-72e5-410d-affb-72baffb9db13','product-10','4e32833a-1d1d-4ed4-ad3b-c49f2df5bfa5',1),('e3bce01c-4639-42ae-941f-0e517cc491f2','product-41','4e5aad38-7a00-43f5-bc66-b0bb6e6f36b3',1),('efc3fd2d-db57-4d97-8268-d2a01c31cc63','product-57','0f5b3d7b-d69c-44bc-bb2f-223dcf40ece6',1),('fa59b1c0-a282-42b0-96dd-7fdee6adc348','product-34','38224d3c-34bd-4a6d-b84d-f669ae742eaf',1),('fb1be349-e684-447c-9eb3-7d7bd5745b66','product-55','9f66b861-bc55-4ccd-ae54-618a5021a7e3',0),('fb492375-c7e8-4f7a-877f-2584f38ee9af','product-30','c7856107-ee83-4a05-b219-85fad8dd9f0e',1),('fc601cc2-b17d-417f-96a2-54f5c3eb8031','product-28','e1c7bc05-98c2-4ece-ae45-c4dd13e16f83',0),('fdc64377-f9a2-45a2-9efe-67e7243a50fd','product-19','3b47b2ab-36c7-4315-a3d7-8e6a34546e28',0),('ffb406f9-d079-4276-85bc-c652bbba7cec','product-26','f649d592-e06c-4d51-a428-71ff60399717',1);
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
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('092ac701-5ebc-4de0-a0c0-3f9517da1c2e','Stradivarius Short coat','Material: 70% polyester, 24% wool, 6% other fibres. Lapel collar. Flap pockets.',56,NULL,'beige',1,13,'c0200afd-0e90-4930-a521-cec6782058e0'),('0f5b3d7b-d69c-44bc-bb2f-223dcf40ece6','Next DAISY STANDARD - Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',14,NULL,'green',3,4,'281a917b-6792-4f28-acfb-281fab93a1ea'),('130a3842-9548-41b7-91fb-83be3cc6de58','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'orange',2,16,'1f78e425-1e70-4500-b9c5-31e8db3ae4a6'),('154d999c-72e2-42fd-9fab-d352d456cb51','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'brown',2,11,'38187fca-9138-4feb-b74b-b0b1c303cfcc'),('1a95530d-fd90-4947-9774-a6f21d028502','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'black',2,16,'2a365adf-86a7-4fec-97cf-f5530bb13804'),('1ea4fcc2-6a24-44c3-94f6-0cb2fc72a949','INDICODE JEANS WILBUR - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',25,NULL,'white',2,3,'4d164c1e-cb6f-4163-b085-1116afdaede9'),('22239de4-c3c3-429d-9d67-aa219ee82510','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'black',2,11,'92c8127b-819a-451e-84bf-ac8e42daff6f'),('24c91b17-3a40-4dd0-a505-dab44785a828','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'brown',2,9,'3afc52e1-5fc0-4fde-b317-5c55cd70bbf5'),('25bbb65b-b7a0-4f53-b75c-f0e36abe8314','INDICODE JEANS LANGARM BRAYDEN - Shirt','Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.',60,NULL,'blue',2,17,'5141ab75-6d08-4cf5-8e61-f57f25ea33a2'),('2f90ab6b-c94b-4da1-9843-47c6bfc2ea0a','Anna Field Basic T-shirt','Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve',11,NULL,'white',1,2,'d7e03d4a-5ff1-4cc1-927d-88be9c22daa2'),('3079176f-fedf-4238-bb8d-8bfa7e53122f','Pepe Jeans JENSEN - Parka','Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.',250,NULL,'blue',2,14,'06eded22-c6a2-4bca-ac65-48e016a94707'),('38224d3c-34bd-4a6d-b84d-f669ae742eaf','INDICODE JEANS WILBUR - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',25,NULL,'blue',2,3,'3a7491a5-bff8-482b-b4df-bf6997b31824'),('391c6260-d1d5-498f-ad0c-3c90b4a632dd','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'green',2,9,'dab24cc8-4edc-4312-8504-9fd1183c175d'),('3b47b2ab-36c7-4315-a3d7-8e6a34546e28','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'purple',1,10,'fdc64377-f9a2-45a2-9efe-67e7243a50fd'),('4b5f6736-4317-407b-95b8-0831ed0d9417','Selected Homme SLIMNEW MARK SHIRT - Formal shirt','Material: 100% cotton. Shark collar. Slim Fit.',40,NULL,'white',2,17,'be5ba997-9bee-4721-b042-601a031bffad'),('4e32833a-1d1d-4ed4-ad3b-c49f2df5bfa5','Sublevel Sweatshirt','Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',40,NULL,'grey',1,5,'05f9f39c-acc4-4b6a-9a7b-3bb1f45e6d5b'),('4e5aad38-7a00-43f5-bc66-b0bb6e6f36b3','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'red',2,9,'c1595ea6-17f2-4eba-88ab-b113e6370c1c'),('539732a4-53d3-4c1a-8a54-8858a7158e1c','JDYLOUISVILLE CATIA WIDE PANT - Trousers','Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ',33,NULL,'black',1,8,'beda1fae-0cd9-4e4d-bf19-bfa32a203f72'),('57303017-19c8-47f8-9748-e92d3916be0f','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'black',1,10,'97dee675-742a-4d54-aa9d-580429117834'),('5920874a-0a7a-4786-a83d-49759935f4d5','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'beige',2,16,'28c4ea3c-57c0-45ab-9db2-db76e9f97307'),('61952dc5-771b-480b-ac28-65de09cda42a','Next TAILORED STANDARD - Day dress','Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.',83,NULL,'orange',1,1,'c8089b91-9a96-4529-9776-c587bfc83830'),('66a459c1-1ca1-4aba-9bad-78f311071b1d','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'blue',2,11,'0d995446-bb85-435a-b002-ed9a55c534c0'),('68ea0c16-e7f2-4b28-8328-91a071c4ef19','Ricano GRAZIA - Classic coat','Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.',199,NULL,'white',1,13,'88d03528-c8a8-4c32-8edd-cae4ac752c7c'),('6ebbba11-7b41-4541-ae4e-464b7ccd4771','Nike Sportswear CLUB - Sweatshirt','Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.',55,NULL,'orange',2,6,'223d1a79-7f7c-45fc-ab5e-29b9cfd10c6f'),('73c3855a-200e-4758-a387-6bc3f05bcc79','Mango POLANA - Trenchcoat','Material: 100% cotton. Turn-down collar. Belt included, button row. Regular Fit. Knee-length.',80,NULL,'black',1,13,'b5f66e7e-8bab-4252-b420-b0b1ce0552a1'),('74d57d6f-ce37-4b53-863e-4b04c2eebae5','Next TAILORED STANDARD - Day dress','Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.',83,NULL,'green',1,1,'c05b4afb-2af2-49ab-bfb3-aa3082d7cb9c'),('7cf51d5e-1c87-44bc-8c54-f9dad4085351','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'blue',1,10,'ab05ce8d-a046-4a99-b5b2-3ce6c23c97e0'),('873c0952-3d92-42fb-9209-e3fe2a2d572b','Sublevel Sweatshirt','Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',40,NULL,'beige',1,5,'993c081f-d5f2-48d1-8be6-9a71a0358468'),('8970c9e9-972c-4be5-ae22-4ace26f9d8f2','Opus GART - Hoodie','Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',70,NULL,'green',1,5,'ab0b9da2-4896-4d29-8fbc-b1e0151eddb9'),('8c71b8ca-265a-4371-a5db-8d652281105e','FS Collection SLEEVE HEM - Day dress','Material: 100% cotton. Neckline: Cache-coeur. Loose Fit. Long length. Short sleeve.',48,NULL,'white',1,1,'74b3c5b4-e383-4bde-911e-f587bf47f414'),('8cef5102-b5ef-48ca-b0b5-354cb040751e','Levi\'s® 501® CROP - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'white',1,10,'2543798d-26db-4d4e-a502-f150882ab232'),('91223cc3-a6ce-4eb2-9efa-be89aa384306','Anna Field Basic T-shirt','Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve',11,NULL,'blue',1,2,'869e2ee8-663f-4503-8be2-f68cf011a963'),('95571cd0-110a-4606-87df-20b1f3c70b1a','ONLLUCY - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Regular Fit. Normal length. Short sleeve',17,NULL,'black',1,2,'2953c66d-d82c-47a3-8ee2-dc9ef549d3d7'),('99b1f150-a4b2-462e-ad67-787586673c06','Pepe Jeans JENSEN - Parka','Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.',250,NULL,'green',2,14,'8ff0be42-1477-4074-b079-556d43432050'),('9d8caa1c-5202-4fa9-86a3-ec9772df3dc5','INDICODE JEANS WILBUR - Print T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',25,NULL,'red',2,3,'8dc674a7-b47d-4738-b6e5-1b61018c2bdc'),('9f66b861-bc55-4ccd-ae54-618a5021a7e3','Levi\'s® Shorts','Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.',60,NULL,'pink',2,16,'fb1be349-e684-447c-9eb3-7d7bd5745b66'),('a5f04f00-0b4f-4013-a2f2-b99788a36dba','Next VINTAGE - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',25,NULL,'blue',3,12,'7e239e11-a1f8-4878-8e76-5f2aaf8d4fe4'),('a86a5c31-7b16-4011-b05c-9e4f44f264ef','Cigit Sweatshirt','Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.',20,NULL,'beige',3,7,'570d28bc-59db-4a0c-8bfc-7d9ddfe1e14e'),('a98ab734-4cda-410b-8d22-a48a988f9237','Levi\'s® 501® ORIGINAL - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',110,NULL,'white',2,11,'72fd632c-600a-41e6-91d9-38f55f3f1bdf'),('ae834ce0-53bc-47d5-8ada-781de761bae4','INDICODE JEANS LANGARM BRAYDEN - Shirt','Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.',60,NULL,'grey',2,17,'ba6fb791-41b0-4b0d-bc49-1e0f51820d9e'),('b0cc0f30-d733-4561-8b7c-c0d2b07a37c4','Buratti Short coat','Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.',125,NULL,'black',2,14,'418dd721-6d22-4af7-b585-bb1960b1633a'),('b25b6196-6138-4f57-b27d-c19ba9dfc26c','Ricano GRAZIA - Classic coat','Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.',199,NULL,'red',1,13,'cb20d72e-d2cf-4d9d-ac5e-4cd32110bcdb'),('b3d7e830-11b8-40f5-889f-c616d8225b9f','Watapparel Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',25,NULL,'black',3,4,'b6f5d95a-c43a-4b3a-9db5-32f35fd749b3'),('ba507a3a-4681-489d-89cc-c936b93ac6b8','Pier One Sweatshirt','Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.',25,NULL,'grey',2,6,'821ee6c9-79b0-4b43-88e6-41b74cb625d9'),('bc1d2461-1008-46ff-8ac9-9fec4295237e','Lindbergh SLIM FIT CLASSIC BELT - Chinos','Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.',60,NULL,'white',2,9,'4528e826-d14a-4bb7-881d-897a64c4a6c7'),('bded1547-f20e-4769-ac06-dde610047adc','Pieces Kids TEE - Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',15,NULL,'pink',3,4,'dc74c92b-ad44-413e-a05d-b3ca064150ac'),('c1b9e4bc-d238-4861-a487-d382e65aa2a5','Cigit Sweatshirt','Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.',20,NULL,'green',3,7,'79efc943-9acf-4a29-ba86-69f3981f3367'),('c7856107-ee83-4a05-b219-85fad8dd9f0e','Selected Homme SLIMNEW MARK SHIRT - Formal shirt','Material: 100% cotton. Shark collar. Slim Fit.',40,NULL,'red',2,17,'94fd09e9-4509-4b59-ae4c-30f2a9d46bec'),('c974930a-7ce4-4749-a5e5-2ff5bc103885','Stradivarius MOM - Denim shorts','Material: 100% cotton. High rise. Back pocket, side pockets. Regular Fit.',20,NULL,'blue',1,15,'a219d19c-02be-4699-95c2-3515a1e1865d'),('cdc921a1-405b-4e5e-ab6a-0b54f0d019ed','BONOBO Jeans Shorts','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',36,NULL,'brown',1,15,'c5e74ec9-4da1-464d-a50e-758178811188'),('ce61d889-73fe-4cb5-9770-e624f3569ec9','Urban Classics HEAVY - Basic T-shirt','Material: 100% cotton. Neckline: Crew neck. Loose Fit.',20,NULL,'beige',2,3,'a1718d02-f9e0-4be2-aebb-3f762b7c978d'),('cfee1543-dfc4-4ae1-a36e-8c3b8329c383','Name it NKFJAMA TOP DISNEY MICKEY MOUSE - Print T-shirt','Material: 100% cotton. Crew neck. Loose Fit.',25,NULL,'yellow',3,4,'1747b0f6-32df-48fe-ba7d-698852d9d1c9'),('d1673176-4eff-4cbe-9cff-c647da5180ca','Buratti Short coat','Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.',125,NULL,'brown',2,14,'33945601-a043-4bc6-a0d1-34bf68eb213e'),('d3c3fdea-c5ff-436d-8bb4-01ed3e5e8aff','Next VINTAGE - Straight leg jeans','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',25,NULL,'black',3,12,'1cfc4508-df49-484e-a471-f34b8853b4a2'),('e1c7bc05-98c2-4ece-ae45-c4dd13e16f83','BONOBO Jeans Shorts','Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.',36,NULL,'green',1,15,'fc601cc2-b17d-417f-96a2-54f5c3eb8031'),('e6e1b125-2828-43a4-aba7-8b390a63572e','Nike Sportswear CLUB - Sweatshirt','Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.',55,NULL,'blue',2,6,'a9c98aad-6a70-41ad-82ca-53b770a2221e'),('e936c5e9-ba50-46a3-9ad5-af4e23207b94','Opus GART - Hoodie','Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve',70,NULL,'pink',1,5,'b5b7965e-bc9b-4fbf-bda9-e73d5c133d1e'),('ec672fc6-2409-4899-84fb-61810f79021b','Anna Field Basic T-shirt','Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve',11,NULL,'black',1,2,'c27e842b-a2c1-4b3d-a86f-125c976e49ea'),('ef4eb5c5-3987-4e4e-b45b-d88f696d8eec','Stradivarius Cargo trousers','Material: 100% cotton. Low rise. Pockets, elasticated waist. Relaxed Fit. ',30,NULL,'beige',1,8,'41e2455d-3e2a-4f68-a3b6-b4391547c0d2'),('f2b0bbc9-a015-46af-a612-230413d26577','Morgan WRAP WITH CHAIN DETAIL - Party dress','Material: 96% polyester, 4% elastane. Neckline: Cache-coeur. Regular Fit. Short length. Short sleeve.',69,NULL,'black',1,1,'ddd1fc31-5862-42af-97bb-f1ced9ef3169'),('f649d592-e06c-4d51-a428-71ff60399717','Next TAILORED CITY - Shorts','Material: 53% polyester, 44% viscose, 3% elastane. Normal rise. Back pocket, side pockets. Regular Fit.',51,NULL,'blue',1,15,'0120f5be-b8b0-417e-bd81-3bcc5d8eb97d'),('f81856f6-9115-44b7-8d7a-d2f1740e55fe','JDYLOUISVILLE CATIA WIDE PANT - Trousers','Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ',33,NULL,'dark blue',1,8,'0f3033af-9625-4707-a13a-198c487e19bd'),('f94fb417-81bc-4b65-9b48-37d144760cf2','Pier One Sweatshirt','Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.',25,NULL,'black',2,6,'6fcc63a8-6532-456f-bf2d-57d56fd1fd71'),('fa0e0642-b304-4292-9da4-4bd5261143ff','Reebok Classic SPARKLE - Tracksuit bottoms','Material: 70% cotton, 30% polyester. Normal rise. Side pockets. Regular Fit.',55,NULL,'purple',1,8,'92932126-9794-4ddf-b9a5-783cf0dd37da');
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
INSERT INTO `user` VALUES ('03833255-adea-4a15-844d-09f61021df5b','user@email.com','$2y$10$Anwk/MBkoCc3fs4ynB81R.lWG0ycz31rj9uiKBfKGpDQP2re0OO02','Peter','Pan','123321','45 Main Street, London'),('18be8567-3cad-4123-863b-2877048b8fe9','admin@admin.com','$2y$10$yTlwVZdcxHsnGX.k35Z9UeZitndMD2TXWcaoz6nXbaSxV1p5M9Zay','Admin','Admin','112233','Helsinki');
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

-- Dump completed on 2023-03-31 21:32:16
