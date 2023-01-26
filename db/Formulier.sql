-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2023 at 08:51 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `ID` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `infix` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) NOT NULL,
  `phonenumber` varchar(18) NOT NULL,
  `streetname` varchar(100) NOT NULL,
  `housenumber` varchar(10) NOT NULL,
  `locality` varchar(58) NOT NULL,
  `postalcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `country` varchar(61) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `persoon`
--

INSERT INTO `persoon` (`ID`, `firstname`, `infix`, `lastname`, `phonenumber`, `streetname`, `housenumber`, `locality`, `postalcode`, `country`) VALUES
(1, 'Beyoncé', 'van', 'Eekelen', '+31 6 13596077', 'Conradkade', '61', 'Den Haag', '2517 BS', 'Nederland'),
(2, 'Susana', '', 'Verveer', '+31 6 42446158', 'Parallelweg', '11', 'Weert', '6001 HM', 'Nederland'),
(3, 'Niels', 'van', 'Opstal', '+31 6 80963917', 'Ankerstraat', '57', 'Den Haag', '2586 RJ', 'Nederland'),
(4, 'Jamie', '', 'Rasenberg', '+31 6 30796987', 'Loolaan', '49 3', 'Apeldoorn', '7314 AE', 'Nederland');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
