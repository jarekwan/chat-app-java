-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Cze 2021, 13:57
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_cart_sessions_1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='products that can be added to cart' AUTO_INCREMENT=41 ;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`) VALUES
(27, 'BLACK', 'modern hi tech', '99.99', '2016-10-28 20:49:40', '2016-10-28 12:49:40'),
(28, 'WHITE', 'exclusive classic', '49.99', '2016-10-28 20:52:43', '2016-10-28 12:52:43'),
(29, 'YELLOW', 'african hand-mad', '29.99', '2016-10-28 20:56:23', '2016-10-28 12:56:23'),
(30, 'GREEN', 'african hand-mad', '29.99', '2016-10-28 20:58:02', '2016-10-28 12:58:02'),
(31, 'BLUE', 'african hand-mad', '29.99', '2016-10-28 20:59:20', '2016-10-28 12:59:20'),
(32, 'ORANGE', 'exclusive classic', '29.99', '2016-10-28 21:03:19', '2016-10-28 13:03:19'),
(33, 'PURPLE', 'dedicated', '29.99', '2016-10-28 21:05:30', '2016-10-28 13:05:30'),
(34, 'SATIN', 'modern hi tech', '29.99', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(35, 'GREY', 'exclusive classic', '32.24', '2016-10-28 21:08:05', '2016-10-28 13:08:05'),
(36, 'DARK BLUE', 'dedicated', '109.93', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(37, 'LIGHT BLUE', 'dedicated', '46.99', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(38, 'VIOLET', 'modern hi tech', '29.99', '2016-10-28 21:46:06', '2016-10-28 13:46:06'),
(40, 'BROWN', 'exclusive classic', '32.00', '2016-11-02 20:15:38', '2016-11-02 12:15:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='image files related to a product' AUTO_INCREMENT=105 ;

--
-- Zrzut danych tabeli `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
(83, 30, 'p41.jpg', '2016-10-28 20:58:02', '2016-10-28 12:58:02'),
(82, 29, 'p32.jpg', '2016-10-28 20:56:23', '2016-10-28 12:56:23'),
(81, 29, 'p31.jpg', '2016-10-28 20:56:23', '2016-10-28 12:56:23'),
(80, 28, 'p22.jpg', '2016-10-28 20:52:43', '2016-10-28 12:52:43'),
(79, 28, 'p21.jpg', '2016-10-28 20:52:43', '2016-10-28 12:52:43'),
(77, 27, 'p11.jpg', '2016-10-28 20:49:40', '2016-10-28 12:49:40'),
(78, 27, 'p12.jpg', '2016-10-28 20:49:40', '2016-10-28 12:49:40'),
(84, 31, 'p51.jpg', '2016-10-28 20:59:20', '2016-10-28 12:59:20'),
(85, 31, 'p52.jpg', '2016-10-28 20:59:20', '2016-10-28 12:59:20'),
(86, 32, 'p61.jpg', '2016-10-28 21:03:19', '2016-10-28 13:03:19'),
(87, 32, 'p62.jpg', '2016-10-28 21:03:19', '2016-10-28 13:03:19'),
(89, 33, 'p71.jpg', '2016-10-28 21:05:30', '2016-10-28 13:05:30'),
(90, 33, 'p72.jpg', '2016-10-28 21:05:30', '2016-10-28 13:05:30'),
(91, 34, 'p81.jpg', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(92, 34, 'p82.jpg', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(93, 34, 'p83.jpg', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(94, 35, 'p91.jpg', '2016-10-28 21:08:05', '2016-10-28 13:08:05'),
(95, 35, 'p92.jpg', '2016-10-28 21:08:05', '2016-10-28 13:08:05'),
(96, 36, 'p101.jpg', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(97, 36, 'p102.jpg', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(98, 36, 'p103.jpg', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(99, 37, 'p111.jpg', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(100, 37, 'p112.jpg', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(101, 37, 'p113.jpg', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(102, 38, 'p121.jpg', '2016-10-28 21:46:06', '2016-10-28 13:46:06'),
(103, 38, 'p122.jpg', '2016-10-28 21:46:06', '2016-10-28 13:46:06'),
(104, 40, 'p131.jpg', '2016-11-02 20:15:38', '2016-11-02 12:15:38'),
(51, 14, 'gardman-r687-4-tier-mini-greenhouse-1.jpg', '0000-00-00 00:00:00', '2015-03-19 08:45:42'),
(52, 14, 'gardman-r687-4-tier-mini-greenhouse-2.jpg', '0000-00-00 00:00:00', '2015-03-19 08:45:42'),
(53, 15, 'spalding-nba-street-basketball-1.jpg', '0000-00-00 00:00:00', '2015-03-19 08:48:34'),
(54, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-1.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(55, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-2.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(56, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-3.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(57, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-4.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(59, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-2.jpg', '0000-00-00 00:00:00', '2015-03-19 09:07:20'),
(73, 17, '29097235540_b2fefed80d_k.jpg', '2016-09-17 22:01:17', '2016-09-17 14:01:17'),
(74, 25, '14194449_1363884933625826_1306807357_n.jpg', '2016-09-18 01:03:15', '2016-09-17 17:03:15'),
(61, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-4.jpg', '0000-00-00 00:00:00', '2015-03-19 09:07:20'),
(71, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-5.jpg', '2016-08-17 15:53:17', '2016-08-17 07:53:17'),
(67, 19, 'products.jpg', '0000-00-00 00:00:00', '2015-03-26 03:29:34'),
(69, 20, 'tp-link-mr3420-2.jpg', '2016-08-08 14:12:59', '2016-08-08 06:12:59'),
(70, 21, 'd-link-universal-modem.jpg', '2016-08-08 14:24:19', '2016-08-08 06:24:19'),
(75, 25, '29097235540_b2fefed80d_k.jpg', '2016-09-18 01:03:15', '2016-09-17 17:03:15'),
(76, 20, 'aaa.png', '2016-10-13 16:31:58', '2016-10-13 08:31:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
