-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 26 2023 г., 18:40
-- Версия сервера: 5.7.34
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `online_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `session_id`) VALUES
(32, 'product_64201e646db38', 2, '4ah1fncchqru31gdg8b90hghfk');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `section_id`) VALUES
(1, 'dresses', 1),
(2, 't-shirts', 1),
(3, 't-shirts', 2),
(4, 't-shirts', 3),
(5, 'sweatshirts', 1),
(6, 'sweatshirts', 2),
(7, 'sweatshirts', 3),
(8, 'trousers', 1),
(9, 'trousers', 2),
(10, 'jeans', 1),
(11, 'jeans', 2),
(12, 'jeans', 3),
(13, 'coats', 1),
(14, 'coats', 2),
(15, 'shorts', 1),
(16, 'shorts', 2),
(17, 'shirts', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `title`, `product_id`, `number`) VALUES
('10', 'product-10', 'product_64201e646db3a', 0),
('100', 'product-30', 'product_64201e646db1b', 1),
('101', 'product-31', 'product_64201e646db1a', 1),
('102', 'product-32', 'product_64201e646db19', 1),
('103', 'product-33', 'product_64201e646db18', 1),
('104', 'product-34', 'product_64201e646db17', 1),
('105', 'product-35', 'product_64201e646db16', 1),
('106', 'product-36', 'product_64201e646db15', 1),
('107', 'product-37', 'product_64201e646db14', 1),
('108', 'product-38', 'product_64201e646db13', 1),
('109', 'product-39', 'product_64201e646db12', 1),
('11', 'product-11', 'product_64201e646db39', 0),
('110', 'product-40', 'product_64201e646db0f', 1),
('111', 'product-41', 'product_64201e646db0e', 1),
('112', 'product-42', 'product_64201e646db0d', 1),
('113', 'product-43', 'product_64201e646db0c', 1),
('114', 'product-44', 'product_64201e646db0b', 1),
('115', 'product-45', 'product_64201e646db0a', 1),
('116', 'product-46', 'product_64201e646db09', 1),
('117', 'product-47', 'product_64201e646db08', 1),
('118', 'product-48', 'product_64201e646db07', 1),
('119', 'product-49', 'product_64201e646db06', 1),
('12', 'product-12', 'product_64201e646db38', 0),
('120', 'product-50', 'product_64201e646db04', 1),
('121', 'product-51', 'product_64201e646db03', 1),
('122', 'product-52', 'product_64201e646db02', 1),
('123', 'product-53', 'product_64201e646db00', 1),
('124', 'product-54', 'product_64201e646daf2', 1),
('125', 'product-55', 'product_64201e646daf1', 1),
('126', 'product-56', 'product_64201e646daf0', 1),
('127', 'product-57', 'product_64201e646daef', 1),
('128', 'product-58', 'product_64201e646daee', 1),
('129', 'product-59', 'product_64201e646daec', 1),
('13', 'product-13', 'product_64201e646db37', 0),
('130', 'product-60', 'product_64201e646dae9', 1),
('131', 'product-61', 'product_64201e646dae8', 1),
('132', 'product-62', 'product_64201e646dae7', 1),
('133', 'product-63', 'product_64201e646dae6', 1),
('134', 'product-64', 'product_64201e646dae5', 1),
('14', 'product-14', 'product_64201e646db36', 0),
('15', 'product-15', 'product_64201e646db35', 0),
('18', 'product-16', 'product_64201e646db34', 0),
('19', 'product-17', 'product_64201e646db33', 0),
('2', 'product-2', 'product_64201e646db30', 0),
('20', 'product-18', 'product_64201e646db32', 0),
('21', 'product-19', 'product_64201e646db31', 0),
('22', 'product-20', 'product_64201e646db2f', 0),
('23', 'product-21', 'product_64201e646db2e', 0),
('24', 'product-22', 'product_64201e646db2d', 0),
('25', 'product-23', 'product_64201e646db2c', 0),
('26', 'product-24', 'product_64201e646db2b', 0),
('27', 'product-25', 'product_64201e646db21', 0),
('28', 'product-26', 'product_64201e646db20', 0),
('29', 'product-27', 'product_64201e646db1f', 0),
('3', 'product-3', 'product_64201e646db1c', 0),
('30', 'product-28', 'product_64201e646db1e', 0),
('31', 'product-29', 'product_64201e646db1d', 0),
('32', 'product-31', 'product_64201e646db1a', 0),
('33', 'product-32', 'product_64201e646db19', 0),
('34', 'product-33', 'product_64201e646db18', 0),
('35', 'product-34', 'product_64201e646db17', 0),
('36', 'product-35', 'product_64201e646db16', 0),
('37', 'product-36', 'product_64201e646db15', 0),
('38', 'product-37', 'product_64201e646db14', 0),
('39', 'product-38', 'product_64201e646db13', 0),
('4', 'product-4', 'product_64201e646db10', 0),
('40', 'product-39', 'product_64201e646db12', 0),
('41', 'product-40', 'product_64201e646db0f', 0),
('42', 'product-41', 'product_64201e646db0e', 0),
('43', 'product-42', 'product_64201e646db0d', 0),
('44', 'product-43', 'product_64201e646db0c', 0),
('45', 'product-44', 'product_64201e646db0b', 0),
('46', 'product-45', 'product_64201e646db0a', 0),
('47', 'product-46', 'product_64201e646db09', 0),
('48', 'product-47', 'product_64201e646db08', 0),
('49', 'product-48', 'product_64201e646db07', 0),
('5', 'product-5', 'product_64201e646db05', 0),
('50', 'product-49', 'product_64201e646db06', 0),
('51', 'product-50', 'product_64201e646db04', 0),
('52', 'product-51', 'product_64201e646db03', 0),
('53', 'product-52', 'product_64201e646db02', 0),
('54', 'product-53', 'product_64201e646db00', 0),
('55', 'product-54', 'product_64201e646daf2', 0),
('56', 'product-55', 'product_64201e646daf1', 0),
('57', 'product-56', 'product_64201e646daf0', 0),
('58', 'product-57', 'product_64201e646daef', 0),
('59', 'product-58', 'product_64201e646daee', 0),
('6', 'product-6', 'product_64201e646daeb', 0),
('60', 'product-59', 'product_64201e646daec', 0),
('61', 'product-60', 'product_64201e646dae9', 0),
('62', 'product-61', 'product_64201e646dae8', 0),
('63', 'product-62', 'product_64201e646dae7', 0),
('64', 'product-63', 'product_64201e646dae6', 0),
('65', 'product-64', 'product_64201e646dae5', 0),
('66', 'product-30', 'product_64201e646db1b', 0),
('67', 'product-1', 'product_64201e646dab2', 1),
('68', 'product-1', 'product_64201e646dab2', 2),
('69', 'product-1', 'product_64201e646dab2', 3),
('7', 'product-7', 'product_64201e646dae3', 0),
('70', 'product-2', 'product_64201e646db30', 1),
('71', 'product-3', 'product_64201e646db1c', 1),
('72', 'product-4', 'product_64201e646db10', 1),
('73', 'product-5', 'product_64201e646db05', 1),
('74', 'product-6', 'product_64201e646daeb', 1),
('75', 'product-7', 'product_64201e646dae3', 1),
('76', 'product-8', 'product_64201e646dae0', 1),
('77', 'product-9', 'product_64201e646dac4', 1),
('78', 'product-10', 'product_64201e646db3a', 1),
('79', 'product-11', 'product_64201e646db39', 1),
('8', 'product-8', 'product_64201e646dae0', 0),
('80', 'product-12', 'product_64201e646db38', 1),
('81', 'product-13', 'product_64201e646db37', 1),
('82', 'product-14', 'product_64201e646db36', 1),
('83', 'product-15', 'product_64201e646db35', 1),
('84', 'product-16', 'product_64201e646db34', 1),
('85', 'product-17', 'product_64201e646db33', 1),
('86', 'product-18', 'product_64201e646db32', 1),
('87', 'product-19', 'product_64201e646db31', 1),
('88', 'product-20', 'product_64201e646db2f', 1),
('89', 'product-21', 'product_64201e646db2e', 1),
('9', 'product-9', 'product_64201e646dac4', 0),
('90', 'product-22', 'product_64201e646db2d', 1),
('91', 'product-23', 'product_64201e646db2c', 1),
('92', 'product-24', 'product_64201e646db2b', 1),
('93', 'product-25', 'product_64201e646db21', 1),
('94', 'product-26', 'product_64201e646db20', 1),
('95', 'product-27', 'product_64201e646db1f', 1),
('96', 'product-28', 'product_64201e646db1e', 1),
('97', 'product-29', 'product_64201e646db1d', 1),
('98', 'product-29', 'product_64201e646db1d', 2),
('99', 'product-29', 'product_64201e646db1d', 3),
('id-1', 'product-1', 'product_64201e646dab2', 0),
('image_642028a5cc6d9', 'Architecture.png', 'product_642028a5cc6df', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `phone`, `email`, `address`, `status`, `date`, `total`, `user_id`, `session_id`) VALUES
(3, 'Peter  ', 'Pan', '333-555', 'peter@pan.com', 'London Main street 12', 'awaiting payment', '2023-03-26 21:36:10', 140, 'user_642005744320c', '4ah1fncchqru31gdg8b90hghfk');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `colour` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `main_img_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `desc`, `price`, `size`, `colour`, `section_id`, `category_id`, `main_img_id`) VALUES
('product_64201e646dab2', 'Next TAILORED STANDARD - Day dress', 'Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.', '83', NULL, 'orange', 1, 1, 'id-1'),
('product_64201e646dac4', 'Sublevel Sweatshirt', 'Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '40', NULL, 'beige', 1, 5, '9'),
('product_64201e646dae0', 'ONLLUCY - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Regular Fit. Normal length. Short sleeve', '17', NULL, 'black', 1, 2, '8'),
('product_64201e646dae3', 'Anna Field Basic T-shirt', 'Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve', '11', NULL, 'black', 1, 2, '7'),
('product_64201e646dae5', 'Next VINTAGE - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '25', NULL, 'black', 3, 12, '65'),
('product_64201e646dae6', 'Next VINTAGE - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '25', NULL, 'blue', 3, 12, '64'),
('product_64201e646dae7', 'Cigit Sweatshirt', 'Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.', '20', NULL, 'beige', 3, 7, '63'),
('product_64201e646dae8', 'Cigit Sweatshirt', 'Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.', '20', NULL, 'green', 3, 7, '62'),
('product_64201e646dae9', 'Watapparel Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '25', NULL, 'black', 3, 4, '61'),
('product_64201e646daeb', 'Anna Field Basic T-shirt', 'Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve', '11', NULL, 'blue', 1, 2, '6'),
('product_64201e646daec', 'Pieces Kids TEE - Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '15', NULL, 'pink', 3, 4, '60'),
('product_64201e646daee', 'Name it NKFJAMA TOP DISNEY MICKEY MOUSE - Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '25', NULL, 'yellow', 3, 4, '59'),
('product_64201e646daef', 'Next DAISY STANDARD - Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '14', NULL, 'green', 3, 4, '58'),
('product_64201e646daf0', 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'orange', 2, 16, '57'),
('product_64201e646daf1', 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'pink', 2, 16, '56'),
('product_64201e646daf2', 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'black', 2, 16, '55'),
('product_64201e646db00', 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'beige', 2, 16, '54'),
('product_64201e646db02', 'Pepe Jeans JENSEN - Parka', 'Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.', '250', NULL, 'blue', 2, 14, '53'),
('product_64201e646db03', 'Pepe Jeans JENSEN - Parka', 'Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.', '250', NULL, 'green', 2, 14, '52'),
('product_64201e646db04', 'Buratti Short coat', 'Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.', '125', NULL, 'brown', 2, 14, '51'),
('product_64201e646db05', 'Anna Field Basic T-shirt', 'Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve', '11', NULL, 'white', 1, 2, '5'),
('product_64201e646db06', 'Buratti Short coat', 'Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.', '125', NULL, 'black', 2, 14, '50'),
('product_64201e646db07', 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'white', 2, 11, '49'),
('product_64201e646db08', 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'black', 2, 11, '48'),
('product_64201e646db09', 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'brown', 2, 11, '47'),
('product_64201e646db0a', 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'blue', 2, 11, '46'),
('product_64201e646db0b', 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'brown', 2, 9, '45'),
('product_64201e646db0c', 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'white', 2, 9, '44'),
('product_64201e646db0d', 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'green', 2, 9, '43'),
('product_64201e646db0e', 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'red', 2, 9, '42'),
('product_64201e646db0f', 'Pier One Sweatshirt', 'Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.', '25', NULL, 'black', 2, 6, '41'),
('product_64201e646db10', 'Morgan WRAP WITH CHAIN DETAIL - Party dress', 'Material: 96% polyester, 4% elastane. Neckline: Cache-coeur. Regular Fit. Short length. Short sleeve.', '69', NULL, 'black', 1, 1, '4'),
('product_64201e646db12', 'Pier One Sweatshirt', 'Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.', '25', NULL, 'grey', 2, 6, '40'),
('product_64201e646db13', 'Nike Sportswear CLUB - Sweatshirt', 'Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.', '55', NULL, 'orange', 2, 6, '39'),
('product_64201e646db14', 'Nike Sportswear CLUB - Sweatshirt', 'Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.', '55', NULL, 'blue', 2, 6, '38'),
('product_64201e646db15', 'INDICODE JEANS WILBUR - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '25', NULL, 'white', 2, 3, '37'),
('product_64201e646db16', 'INDICODE JEANS WILBUR - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '25', NULL, 'red', 2, 3, '36'),
('product_64201e646db17', 'INDICODE JEANS WILBUR - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '25', NULL, 'blue', 2, 3, '35'),
('product_64201e646db18', 'Urban Classics HEAVY - Basic T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '20', NULL, 'beige', 2, 3, '34'),
('product_64201e646db19', 'INDICODE JEANS LANGARM BRAYDEN - Shirt', 'Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.', '60', NULL, 'grey', 2, 17, '33'),
('product_64201e646db1a', 'INDICODE JEANS LANGARM BRAYDEN - Shirt', 'Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.', '60', NULL, 'blue', 2, 17, '32'),
('product_64201e646db1b', 'Selected Homme SLIMNEW MARK SHIRT - Formal shirt', 'Material: 100% cotton. Shark collar. Slim Fit.', '40', NULL, 'red', 2, 17, '66'),
('product_64201e646db1c', 'FS Collection SLEEVE HEM - Day dress', 'Material: 100% cotton. Neckline: Cache-coeur. Loose Fit. Long length. Short sleeve.', '48', NULL, 'white', 1, 1, '3'),
('product_64201e646db1d', 'Selected Homme SLIMNEW MARK SHIRT - Formal shirt', 'Material: 100% cotton. Shark collar. Slim Fit.', '40', NULL, 'white', 2, 17, '31'),
('product_64201e646db1e', 'BONOBO Jeans Shorts', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '36', NULL, 'green', 1, 15, '30'),
('product_64201e646db1f', 'BONOBO Jeans Shorts', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '36', NULL, 'brown', 1, 15, '29'),
('product_64201e646db20', 'Next TAILORED CITY - Shorts', 'Material: 53% polyester, 44% viscose, 3% elastane. Normal rise. Back pocket, side pockets. Regular Fit.', '51', NULL, 'blue', 1, 15, '28'),
('product_64201e646db21', 'Stradivarius MOM - Denim shorts', 'Material: 100% cotton. High rise. Back pocket, side pockets. Regular Fit.', '20', NULL, 'blue', 1, 15, '27'),
('product_64201e646db2b', 'Mango POLANA - Trenchcoat', 'Material: 100% cotton. Turn-down collar. Belt included, button row. Regular Fit. Knee-length.', '80', NULL, 'black', 1, 13, '26'),
('product_64201e646db2c', 'Ricano GRAZIA - Classic coat', 'Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.', '199', NULL, 'red', 1, 13, '25'),
('product_64201e646db2d', 'Ricano GRAZIA - Classic coat', 'Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.', '199', NULL, 'white', 1, 13, '24'),
('product_64201e646db2e', 'Stradivarius Short coat', 'Material: 70% polyester, 24% wool, 6% other fibres. Lapel collar. Flap pockets.', '56', NULL, 'beige', 1, 13, '23'),
('product_64201e646db2f', 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'white', 1, 10, '22'),
('product_64201e646db30', 'Next TAILORED STANDARD - Day dress', 'Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.', '83', NULL, 'green', 1, 1, '2'),
('product_64201e646db31', 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'purple', 1, 10, '21'),
('product_64201e646db32', 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'black', 1, 10, '20'),
('product_64201e646db33', 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'blue', 1, 10, '19'),
('product_64201e646db34', 'Reebok Classic SPARKLE - Tracksuit bottoms', 'Material: 70% cotton, 30% polyester. Normal rise. Side pockets. Regular Fit.', '55', NULL, 'purple', 1, 8, '18'),
('product_64201e646db35', 'Stradivarius Cargo trousers', 'Material: 100% cotton. Low rise. Pockets, elasticated waist. Relaxed Fit. ', '30', NULL, 'beige', 1, 8, '15'),
('product_64201e646db36', 'JDYLOUISVILLE CATIA WIDE PANT - Trousers', 'Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ', '33', NULL, 'dark blue', 1, 8, '14'),
('product_64201e646db37', 'JDYLOUISVILLE CATIA WIDE PANT - Trousers', 'Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ', '33', NULL, 'black', 1, 8, '13'),
('product_64201e646db38', 'Opus GART - Hoodie', 'Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '70', NULL, 'pink', 1, 5, '12'),
('product_64201e646db39', 'Opus GART - Hoodie', 'Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '70', NULL, 'green', 1, 5, '11'),
('product_64201e646db3a', 'Sublevel Sweatshirt', 'Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '40', NULL, 'grey', 1, 5, '10'),
('product_642028a5cc6df', 'Updated product', 'New new', '123', NULL, 'green', 1, 1, 'image_642028a5cc6d9');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `title`) VALUES
(1, 'women'),
(2, 'men'),
(3, 'kids');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `pass_hash`, `first_name`, `last_name`, `phone`, `address`) VALUES
('user_6420051d35e9f', 'admin@admin.com', '$2y$10$S/GwRaAUuF1kmhzF7Y47dOdaHx4rI8RJlOHWxUvB6/ZF1m0ldTyqi', 'Admin', 'Admin', '11-22-33', 'Helsinki'),
('user_642005744320c', 'peter@pan.com', '$2y$10$EvrpTDtqpDYXRxYIKtzynep/1D0ZKnZA2Qa/UrAYsi1w7orrRbCPi', 'Peter  ', 'Pan', '333-555', 'London Main street 12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `main_img_id` (`main_img_id`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `order` (`session_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
