-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2016 at 04:49 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipment`
--

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `username` varchar(100) NOT NULL,
  `fromName` varchar(100) NOT NULL,
  `fromEmail` varchar(100) NOT NULL,
  `fromAddress` varchar(100) NOT NULL,
  `fromCity` varchar(100) NOT NULL,
  `fromState` varchar(100) NOT NULL,
  `fromZip` varchar(100) NOT NULL,
  `toName` varchar(100) NOT NULL,
  `toEmail` varchar(100) NOT NULL,
  `toAddress` varchar(100) NOT NULL,
  `toCity` varchar(100) NOT NULL,
  `toState` varchar(100) NOT NULL,
  `toZip` varchar(100) NOT NULL,
  `trackingnum` varchar(100) NOT NULL,
  `express1` varchar(100) NOT NULL,
  `exp1trackingnum` varchar(100) NOT NULL,
  `express2` varchar(100) NOT NULL,
  `exp2trackingnum` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `email`, `password`, `address`, `city`, `state`, `zip`) VALUES
('', 'chao', 'chao.fusion@gmail.com', '11111111', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
