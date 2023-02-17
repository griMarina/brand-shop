-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Фев 17 2023 г., 12:53
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
  `quantity` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'dresses'),
(2, 't-shirts'),
(3, 'sweatshirt & hoodies'),
(4, 'trousers'),
(5, 'jeans'),
(6, 'coats'),
(7, 'shorts'),
(8, 'shirts');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `title`, `product_id`) VALUES
(1, 'product-1', 1),
(2, 'product-2', 2),
(3, 'product-3', 3),
(4, 'product-4', 4),
(5, 'product-5', 5),
(6, 'product-6', 6),
(7, 'product-7', 7),
(8, 'product-8', 8),
(9, 'product-9', 9),
(10, 'product-10', 10),
(11, 'product-11', 11),
(12, 'product-12', 12),
(13, 'product-13', 13),
(14, 'product-14', 14),
(15, 'product-15', 15),
(18, 'product-16', 16),
(19, 'product-17', 17),
(20, 'product-18', 18),
(21, 'product-19', 19),
(22, 'product-20', 20),
(23, 'product-21', 21),
(24, 'product-22', 22),
(25, 'product-23', 23),
(26, 'product-24', 24),
(27, 'product-25', 25),
(28, 'product-26', 26),
(29, 'product-27', 27),
(30, 'product-28', 28),
(31, 'product-29', 29),
(32, 'product-31', 31),
(33, 'product-32', 32),
(34, 'product-33', 33),
(35, 'product-34', 34),
(36, 'product-35', 35),
(37, 'product-36', 36),
(38, 'product-37', 37),
(39, 'product-38', 38),
(40, 'product-39', 39),
(41, 'product-40', 40),
(42, 'product-41', 41),
(43, 'product-42', 42),
(44, 'product-43', 43),
(45, 'product-44', 44),
(46, 'product-45', 45),
(47, 'product-46', 46),
(48, 'product-47', 47),
(49, 'product-48', 48),
(50, 'product-49', 49),
(51, 'product-50', 50),
(52, 'product-51', 51),
(53, 'product-52', 52),
(54, 'product-53', 53),
(55, 'product-54', 54),
(56, 'product-55', 55),
(57, 'product-56', 56),
(58, 'product-57', 57),
(59, 'product-58', 58),
(60, 'product-59', 59),
(61, 'product-60', 60),
(62, 'product-61', 61),
(63, 'product-62', 62),
(64, 'product-63', 63),
(65, 'product-64', 64),
(66, 'product-30', 30);

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
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `colour` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `main_img_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `desc`, `price`, `size`, `colour`, `section`, `main_img_id`, `category_id`) VALUES
(1, 'Next TAILORED STANDARD - Day dress', 'Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.', '83', NULL, 'orange', 'women', 1, 1),
(2, 'Next TAILORED STANDARD - Day dress', 'Material: 100% polyester. Neckline: Cache-coeur. Regular Fit. Short length. Long sleeve.', '83', NULL, 'green', 'women', 2, 1),
(3, 'FS Collection SLEEVE HEM - Day dress', 'Material: 100% cotton. Neckline: Cache-coeur. Loose Fit. Long length. Short sleeve.', '48', NULL, 'white', 'women', 3, 1),
(4, 'Morgan WRAP WITH CHAIN DETAIL - Party dress', 'Material: 96% polyester, 4% elastane. Neckline: Cache-coeur. Regular Fit. Short length. Short sleeve.', '69', NULL, 'black', 'women', 4, 1),
(5, 'Anna Field Basic T-shirt', 'Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve', '11', NULL, 'white', 'women', 5, 2),
(6, 'Anna Field Basic T-shirt', 'Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve', '11', NULL, 'blue', 'women', 6, 2),
(7, 'Anna Field Basic T-shirt', 'Material: 100% cotton. Neckline: Low-cut v-neck. Normal length. Short sleeve', '11', NULL, 'black', 'women', 7, 2),
(8, 'ONLLUCY - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Regular Fit. Normal length. Short sleeve', '17', NULL, 'black', 'women', 8, 2),
(9, 'Sublevel Sweatshirt', 'Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '40', NULL, 'beige', 'women', 9, 3),
(10, 'Sublevel Sweatshirt', 'Material: 66% cotton, 34% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '40', NULL, 'grey', 'women', 10, 3),
(11, 'Opus GART - Hoodie', 'Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '70', NULL, 'green', 'women', 11, 3),
(12, 'Opus GART - Hoodie', 'Material: 56% cotton, 44% polyester. Collar: Hood. Loose Fit. Normal length. Long sleeve', '70', NULL, 'pink', 'women', 12, 3),
(13, 'JDYLOUISVILLE CATIA WIDE PANT - Trousers', 'Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ', '33', NULL, 'black', 'women', 13, 4),
(14, 'JDYLOUISVILLE CATIA WIDE PANT - Trousers', 'Material: 95% polyester, 5% elastane. High rise. Inseam pockets, elasticated waist. Relaxed Fit. ', '33', NULL, 'dark blue', 'women', 14, 4),
(15, 'Stradivarius Cargo trousers', 'Material: 100% cotton. Low rise. Pockets, elasticated waist. Relaxed Fit. ', '30', NULL, 'beige', 'women', 15, 4),
(16, 'Reebok Classic SPARKLE - Tracksuit bottoms', 'Material: 70% cotton, 30% polyester. Normal rise. Side pockets. Regular Fit.', '55', NULL, 'purple', 'women', 18, 4),
(17, 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'blue', 'women', 19, 5),
(18, 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'black', 'women', 20, 5),
(19, 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'purple', 'women', 21, 5),
(20, 'Levi\'s® 501® CROP - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'white', 'women', 22, 5),
(21, 'Stradivarius Short coat', 'Material: 70% polyester, 24% wool, 6% other fibres. Lapel collar. Flap pockets.', '56', NULL, 'beige', 'women', 23, 6),
(22, 'Ricano GRAZIA - Classic coat', 'Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.', '199', NULL, 'white', 'women', 24, 6),
(23, 'Ricano GRAZIA - Classic coat', 'Material: 100% polyester. Lapel collar. Button panel. Regular Fit. Calf-length.', '199', NULL, 'red', 'women', 25, 6),
(24, 'Mango POLANA - Trenchcoat', 'Material: 100% cotton. Turn-down collar. Belt included, button row. Regular Fit. Knee-length.', '80', NULL, 'black', 'women', 26, 6),
(25, 'Stradivarius MOM - Denim shorts', 'Material: 100% cotton. High rise. Back pocket, side pockets. Regular Fit.', '20', NULL, 'blue', 'women', 27, 7),
(26, 'Next TAILORED CITY - Shorts', 'Material: 53% polyester, 44% viscose, 3% elastane. Normal rise. Back pocket, side pockets. Regular Fit.', '51', NULL, 'blue', 'women', 28, 7),
(27, 'BONOBO Jeans Shorts', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '36', NULL, 'brown', 'women', 29, 7),
(28, 'BONOBO Jeans Shorts', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '36', NULL, 'green', 'women', 30, 7),
(29, 'Selected Homme SLIMNEW MARK SHIRT - Formal shirt', 'Material: 100% cotton. Shark collar. Slim Fit.', '40', NULL, 'white', 'men', 31, 8),
(30, 'Selected Homme SLIMNEW MARK SHIRT - Formal shirt', 'Material: 100% cotton. Shark collar. Slim Fit.', '40', NULL, 'red', 'men', 66, 8),
(31, 'INDICODE JEANS LANGARM BRAYDEN - Shirt', 'Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.', '60', NULL, 'blue', 'men', 32, 8),
(32, 'INDICODE JEANS LANGARM BRAYDEN - Shirt', 'Material: 55% linen, 45% cotton. Collar: Button down. Regular Fit.', '60', NULL, 'grey', 'men', 33, 8),
(33, 'Urban Classics HEAVY - Basic T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '20', NULL, 'beige', 'men', 34, 2),
(34, 'INDICODE JEANS WILBUR - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '25', NULL, 'blue', 'men', 35, 2),
(35, 'INDICODE JEANS WILBUR - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '25', NULL, 'red', 'men', 36, 2),
(36, 'INDICODE JEANS WILBUR - Print T-shirt', 'Material: 100% cotton. Neckline: Crew neck. Loose Fit.', '25', NULL, 'white', 'men', 37, 2),
(37, 'Nike Sportswear CLUB - Sweatshirt', 'Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.', '55', NULL, 'blue', 'men', 38, 3),
(38, 'Nike Sportswear CLUB - Sweatshirt', 'Material: 80% cotton, 20% polyester. Crew neck. Normal length. Long sleeve.', '55', NULL, 'orange', 'men', 39, 3),
(39, 'Pier One Sweatshirt', 'Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.', '25', NULL, 'grey', 'men', 40, 3),
(40, 'Pier One Sweatshirt', 'Material: 60% cotton, 40% polyester. Crew neck. Normal length. Long sleeve.', '25', NULL, 'black', 'men', 41, 3),
(41, 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'red', 'men', 42, 4),
(42, 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'green', 'men', 43, 4),
(43, 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'white', 'men', 44, 4),
(44, 'Lindbergh SLIM FIT CLASSIC BELT - Chinos', 'Material: 98% cotton, 2% elastane. Normal rise. Belt included. Slim Fit. Ankle-length.', '60', NULL, 'brown', 'men', 45, 4),
(45, 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'blue', 'men', 46, 5),
(46, 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'brown', 'men', 47, 5),
(47, 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'black', 'men', 48, 5),
(48, 'Levi\'s® 501® ORIGINAL - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '110', NULL, 'white', 'men', 49, 5),
(49, 'Buratti Short coat', 'Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.', '125', NULL, 'black', 'men', 50, 6),
(50, 'Buratti Short coat', 'Material: 65% cotton, 30% polyester, 5% elastane. Standing collar. Inseam pockets. Slim Fit.', '125', NULL, 'brown', 'men', 51, 6),
(51, 'Pepe Jeans JENSEN - Parka', 'Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.', '250', NULL, 'green', 'men', 52, 6),
(52, 'Pepe Jeans JENSEN - Parka', 'Material: 100% cotton. Hood, flap pockets, inside pocket. Regular Fit. Knee-length.', '250', NULL, 'blue', 'men', 53, 6),
(53, 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'beige', 'men', 54, 7),
(54, 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'black', 'men', 55, 7),
(55, 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'pink', 'men', 56, 7),
(56, 'Levi\'s® Shorts', 'Material: 98% cotton, 2% elastane. Normal rise. Back pocket, side pockets. Short length.', '60', NULL, 'orange', 'men', 57, 7),
(57, 'Next DAISY STANDARD - Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '14', NULL, 'green', 'kids', 58, 2),
(58, 'Name it NKFJAMA TOP DISNEY MICKEY MOUSE - Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '25', NULL, 'yellow', 'kids', 59, 2),
(59, 'Pieces Kids TEE - Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '15', NULL, 'pink', 'kids', 60, 2),
(60, 'Watapparel Print T-shirt', 'Material: 100% cotton. Crew neck. Loose Fit.', '25', NULL, 'black', 'kids', 61, 2),
(61, 'Cigit Sweatshirt', 'Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.', '20', NULL, 'green', 'kids', 62, 3),
(62, 'Cigit Sweatshirt', 'Material: 97% cotton, 3% elastane. Crew neck. Regular Fit.', '20', NULL, 'beige', 'kids', 63, 3),
(63, 'Next VINTAGE - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '25', NULL, 'blue', 'kids', 64, 5),
(64, 'Next VINTAGE - Straight leg jeans', 'Material: 99% cotton, 1% elastane. High rise. Back pocket, side pockets. Regular Fit.', '25', NULL, 'black', 'kids', 65, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_img_id` (`main_img_id`),
  ADD KEY `category_id` (`category_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`main_img_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
