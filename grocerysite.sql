-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2022 at 11:10 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `productID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cartID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`productID`, `email`, `cartID`) VALUES
(2, 'kasuni@gmail.com', 13),
(3, 'kasuni@gmail.com', 12),
(1, 'kasuni@gmail.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tblgoods`
--

DROP TABLE IF EXISTS `tblgoods`;
CREATE TABLE IF NOT EXISTS `tblgoods` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `imagePath` varchar(1000) NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgoods`
--

INSERT INTO `tblgoods` (`productID`, `name`, `imagePath`, `price`) VALUES
(1, 'fish', 'images/products/fish.png', '500'),
(2, 'rice', 'images/products/rice.png', '850'),
(3, 'pumpkin', 'images/products/pumpkin.jpg', '400');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `email` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`email`, `qty`, `productName`, `date`) VALUES
('ashi@gmail.com', 1, 'fish', '2022-11-30'),
('ashi@gmail.com', 1, 'rice', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`name`, `email`, `address`, `phone`, `password`, `type`, `total`) VALUES
('piumi', 'p@gmail.com', 'panadura', '077123456789', '123', 1, 0),
('kasuni', 'kasuni@gmail.com', 'colombo', '0771234567', '123', 0, 0),
('ashanya', 'ashi@gmail.com', 'dehiwala', '0771234560', '123', 0, 1350);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
