-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2023 at 07:04 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `Birthday` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Skills` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProfilePic` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `Name`, `Birthday`, `Phone`, `Email`, `Education`, `Skills`, `ProfilePic`) VALUES
(21, 'Eloise', '2000-12-25', '0771114444', 'eloise@gmail.com', 'Ph.D.', 'Team Working', 'pic-9.jpg'),
(15, 'Amelia ', '1997-05-06', '0762223333', 'amelia@gmail.com', 'Bachelor Degree', 'Completed Diploma in English Language', 'pic-2.png'),
(16, 'Elizabeth', '1989-01-22', '0714445555', 'elizabeth@gmail.com', 'Ph.D.', 'Hard Working', 'pic-1.jpg'),
(17, 'Sophia', '1996-04-18', '0726669999', 'sophia@gmail.com', 'Associate Degree', 'Team Working', 'pic-3.jpg'),
(18, 'Aurora', '1999-09-28', '0785551111', 'aurora@gmail.com', 'Bachelor Degree', 'Completed Diploma in English Language', 'pic-4.png'),
(19, 'Isabella ', '1990-02-14', '0773332222', 'isabella@gmail.com', 'Master Degree', 'Completed HNDIT offered by SLIATE', 'pic-5.jpg'),
(20, 'Alice', '1988-11-20', '0769993333', 'alice@gmail.com', 'High School', 'Hard Working', 'pic-6.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
