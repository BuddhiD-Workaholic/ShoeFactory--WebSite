-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2021 at 09:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoefactory`
--

-- --------------------------------------------------------

--
-- Table structure for table `addedto`
--

DROP TABLE IF EXISTS `addedto`;
CREATE TABLE IF NOT EXISTS `addedto` (
  `CarOrderID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` int(11) NOT NULL,
  `Product_ID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  `TotPrice` float NOT NULL,
  `FeedbackS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CarOrderID`),
  KEY `ProductATFK` (`Product_ID`),
  KEY `Order_ID` (`Order_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addedto`
--

INSERT INTO `addedto` (`CarOrderID`, `Order_ID`, `Product_ID`, `Quantity`, `Size`, `TotPrice`, `FeedbackS`) VALUES
(1, 1, 8, 1, 6, 38800, 0),
(2, 1, 9, 1, 6, 22000, 0),
(3, 1, 12, 1, 6, 48000, 1),
(4, 2, 8, 1, 6, 38800, 1),
(5, 3, 9, 1, 6, 22000, 1),
(6, 4, 14, 1, 6, 87860, 0),
(7, 4, 22, 1, 6, 23210, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Product_ID` int(11) NOT NULL,
  `Category` varchar(60) NOT NULL,
  PRIMARY KEY (`Product_ID`,`Category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Product_ID`, `Category`) VALUES
(9, 'Air force'),
(9, 'Men'),
(9, 'Nike Air Jordan'),
(9, 'Stylist');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FisrtName` varchar(20) DEFAULT NULL,
  `SecondName` varchar(20) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `subject` varchar(60) DEFAULT NULL,
  `Message` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Cus_Email` varchar(50) NOT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `First_Name` varchar(30) DEFAULT NULL,
  `Second_Name` varchar(30) DEFAULT NULL,
  `ProfilePicture` varchar(44) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Cus_Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FAQ` varchar(400) DEFAULT NULL,
  `Answer` varchar(400) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`ID`, `FAQ`, `Answer`) VALUES
(2, 'Question 01', 'Answer 01'),
(3, 'Question 02', 'Answer 02'),
(4, 'Fasq 234', 'gsdf');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedBackID` int(11) NOT NULL AUTO_INCREMENT,
  `Discription` varchar(5000) DEFAULT 'Empty',
  `Cus_Email` varchar(50) DEFAULT NULL,
  `Product_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`FeedBackID`),
  KEY `CusFFK` (`Cus_Email`),
  KEY `ProductFFK` (`Product_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--



-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

DROP TABLE IF EXISTS `ordertable`;
CREATE TABLE IF NOT EXISTS `ordertable` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cus_Email` varchar(50) DEFAULT NULL,
  `PayAmount` float NOT NULL,
  `PaymentStatus` int(11) NOT NULL DEFAULT '0',
  `OrdertrackingStatus` varchar(100) DEFAULT 'Not Delivered',
  `OrderDate` date DEFAULT NULL,
  `ShippingDate` date DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `CusOrderFK` (`Cus_Email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PName` varchar(100) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `BrandName` varchar(60) DEFAULT NULL,
  `Details` varchar(800) NOT NULL,
  `Price` float DEFAULT NULL,
  `MainImg` varchar(400) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `productimg`
--

DROP TABLE IF EXISTS `productimg`;
CREATE TABLE IF NOT EXISTS `productimg` (
  `ImgData` varchar(400) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  PRIMARY KEY (`Product_ID`,`ImgData`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimg`
--

INSERT INTO `productimg` (`ImgData`, `Product_ID`) VALUES
('Uploads/Screenshot (2).png', 3),
('Uploads/Screenshot (3).png', 3),
('Uploads/Screenshot (5).png', 3),
('Uploads/Screenshot (123).png', 4),
('Uploads/Screenshot (124).png', 4),
('Uploads/Screenshot (125).png', 4),
('Uploads/Screenshot (13).png', 6),
('Uploads/Screenshot (2).png', 6),
('Uploads/Screenshot (5).png', 6),
('Uploads/Screenshot (13).png', 7),
('Uploads/Screenshot (2).png', 7),
('Uploads/Screenshot (5).png', 7),
('Uploads/air-max-genome-mens-shoe-f4SHr3 (1).png', 8),
('Uploads/air-max-genome-mens-shoe-f4SHr3 (2).png', 8),
('Uploads/air-max-genome-mens-shoe-f4SHr3.png', 8),
('Uploads/air-jordan-1-mid-shoe-vnwwTL (1).png', 9),
('Uploads/air-jordan-1-mid-shoe-vnwwTL (2).png', 9),
('Uploads/air-jordan-1-mid-shoe-vnwwTL.png', 9),
('Uploads/air-jordan-1-mid-shoe-vnwwTL (1).png', 10),
('Uploads/air-jordan-1-mid-shoe-vnwwTL (2).png', 10),
('Uploads/air-jordan-1-mid-shoe-vnwwTL.png', 10),
('Uploads/air-jordan-1-mid-shoe-vnwwTL (1).png', 11),
('Uploads/air-jordan-1-mid-shoe-vnwwTL (2).png', 11),
('Uploads/air-jordan-1-mid-shoe-vnwwTL.png', 11),
('Uploads/air-zoom-alphafly-next-mens-racing-shoe-2FN3N2 (1).png', 12),
('Uploads/air-zoom-alphafly-next-mens-racing-shoe-2FN3N2 (2).png', 12),
('Uploads/air-zoom-alphafly-next-mens-racing-shoe-2FN3N2.png', 12),
('Uploads/air-presto-mens-shoe-JlLlWz (1).png', 13),
('Uploads/air-presto-mens-shoe-JlLlWz (2).png', 13),
('Uploads/air-presto-mens-shoe-JlLlWz.png', 13),
('Uploads/custom-nike-air-zoom-type-n7-by-kyrie-irving (1).png', 14),
('Uploads/custom-nike-air-zoom-type-n7-by-kyrie-irving (2).png', 14),
('Uploads/custom-nike-air-zoom-type-n7-by-kyrie-irving.png', 14),
('Uploads/dunk-low-womens-shoe-P2m4gh (1).png', 15),
('Uploads/dunk-low-womens-shoe-P2m4gh (2).png', 15),
('Uploads/dunk-low-womens-shoe-P2m4gh.png', 15),
('Uploads/air-max-90-ltr-mens-shoe-VLtBwX (1).png', 16),
('Uploads/air-max-90-ltr-mens-shoe-VLtBwX (2).png', 16),
('Uploads/air-max-90-ltr-mens-shoe-VLtBwX.png', 16),
('Uploads/flex-experience-run-10-mens-running-shoe-extra-wide-BNSNRc (1).png', 17),
('Uploads/flex-experience-run-10-mens-running-shoe-extra-wide-BNSNRc (2).png', 17),
('Uploads/flex-experience-run-10-mens-running-shoe-extra-wide-BNSNRc.png', 17),
('Uploads/quest-4-mens-running-shoe-8k2ngj (1).png', 18),
('Uploads/quest-4-mens-running-shoe-8k2ngj (2).png', 18),
('Uploads/quest-4-mens-running-shoe-8k2ngj.png', 18),
('Uploads/quest-4-mens-running-shoe-8k2ngj (1).png', 19),
('Uploads/quest-4-mens-running-shoe-8k2ngj (2).png', 19),
('Uploads/quest-4-mens-running-shoe-8k2ngj.png', 19),
('Uploads/blazer-low-77-mens-shoe-LLBWGC (1).png', 20),
('Uploads/blazer-low-77-mens-shoe-LLBWGC (2).png', 20),
('Uploads/blazer-low-77-mens-shoe-LLBWGC (3).png', 20),
('Uploads/air-zoom-pegasus-38-womens-running-shoe-gg8GBK (1).png', 21),
('Uploads/air-zoom-pegasus-38-womens-running-shoe-gg8GBK (2).png', 21),
('Uploads/air-zoom-pegasus-38-womens-running-shoe-gg8GBK.png', 21),
('Uploads/wildhorse-7-womens-trail-running-shoe-Nrmvwh (1).png', 22),
('Uploads/wildhorse-7-womens-trail-running-shoe-Nrmvwh (2).png', 22),
('Uploads/wildhorse-7-womens-trail-running-shoe-Nrmvwh.png', 22),
('Uploads/superrep-cycle-mens-indoor-cycling-shoe-bsXw1J (1).png', 23),
('Uploads/superrep-cycle-mens-indoor-cycling-shoe-bsXw1J (2).png', 23),
('Uploads/superrep-cycle-mens-indoor-cycling-shoe-bsXw1J.png', 23);

-- --------------------------------------------------------

--
-- Table structure for table `searchandbuy`
--

DROP TABLE IF EXISTS `searchandbuy`;
CREATE TABLE IF NOT EXISTS `searchandbuy` (
  `Cus_Email` varchar(50) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  PRIMARY KEY (`Cus_Email`,`Product_ID`),
  KEY `ProductSBFK` (`Product_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webmaster`
--

DROP TABLE IF EXISTS `webmaster`;
CREATE TABLE IF NOT EXISTS `webmaster` (
  `WebMID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Password` char(10) DEFAULT NULL,
  PRIMARY KEY (`WebMID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webmaster`
--



-- --------------------------------------------------------

--
-- Table structure for table `wneewslater`
--

DROP TABLE IF EXISTS `wneewslater`;
CREATE TABLE IF NOT EXISTS `wneewslater` (
  `Email` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wneewslater`
--


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
