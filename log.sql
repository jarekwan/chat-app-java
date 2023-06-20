-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Cze 2021, 13:47
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `log`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'jarwan', '$2y$10$ihL.hAXFa8cI4/r2Clv/AuyKF2xlv0Hm2OgOU.srfEjCQy3a36YQS', '2021-04-10 15:58:55'),
(6, 'ala', '$2y$10$kpLkanDYmdMXjPUdThEegOMYRtUx7ob12nEwKlf1Uf4CijxDlcyfO', '2021-04-10 16:01:11'),
(7, 'weee', '$2y$10$ew0hxFJLUPt4t8ArUiY4MOja9BZw1BzXkOMyDCfORb2j0xDtMtfQq', '2021-04-15 19:17:32'),
(9, 'AWA', '$2y$10$XxeKDSucEFXTNcJ1YhQv.OzpvoxYs.QTQF78yTvZTpanYa2.gEAoa', '2021-06-04 12:30:02'),
(10, 'QQQ', '$2y$10$VX3w0ZzXqnCrokjZoU2jW.VBROK3EBrMk9p8U5kPwXWL5h/qay6QC', '2021-06-04 12:43:36'),
(11, 'EEE', '$2y$10$nsOV/PYPiAKiJa8sU0O09eGwodTQSs55Q/RyudU./4.52pVy3XqHC', '2021-06-04 14:18:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
