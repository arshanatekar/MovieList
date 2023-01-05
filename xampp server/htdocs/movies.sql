-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 07:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movielist`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `moviename` varchar(255) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `actorname` varchar(255) NOT NULL,
  `actoressname` varchar(255) NOT NULL,
  `directorname` varchar(255) NOT NULL,
  `moviedescription` varchar(500) NOT NULL,
  `releasedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`moviename`, `rating`, `actorname`, `actoressname`, `directorname`, `moviedescription`, `releasedate`) VALUES
('dhamaal', '5', 'ritesh deshmukh', 'madhuri', 'sajid', 'good ', '2023-01-18'),
('golmaal', '4', 'ajay devgan', 'pareenidhhi', 'rohit shetty', 'good', '2023-01-13'),
('Doctor G', '3', 'Ayushman khurana', 'Rakul preet', 'Anubhuti kashyap', 'Uday Gupta finds himself the lone male student in the gynaecology department and his hesitancy leads to chaos, confusion, comedy and, eventually, great camaraderie with his female classmates.', '2022-10-14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
