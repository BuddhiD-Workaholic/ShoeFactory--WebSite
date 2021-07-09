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

INSERT INTO `customer` (`Cus_Email`, `MobileNumber`, `Address`, `First_Name`, `Second_Name`, `ProfilePicture`, `Gender`, `DOB`, `Password`, `Status`) VALUES
('buddhi2002625@gmail.com', '0704323860', 'No 73/10a,Thewatta,Suduwalla road,T\r\nSri lanka', 'BUddhi ', 'Dhanajaya', 'Uploads/ezgif.com-gif-maker-removebg.png', 'Male', '1997-05-20', '123123123', 0),
('buddhi@gmail.cnet', '0704323861', 'No 73/10a,Thewatta,Suduwalla road,T\r\nSri lanka', 'BUddhifd', 'dgfdsdf', 'sdfsdf', 'Male', '1994-12-08', '1231231231', 1);

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

INSERT INTO `feedback` (`FeedBackID`, `Discription`, `Cus_Email`, `Product_ID`) VALUES
(1, 'Empty', 'buddhi2002625@gmail.com', 8),
(2, 'Empty', 'buddhi2002625@gmail.com', 9),
(3, 'Empty', 'buddhi2002625@gmail.com', 12),
(4, 'This item is really Good, I had a really good time waering these. Really looking forwared to some awsome nike products soon!', 'buddhi2002625@gmail.com', 8),
(5, 'Empty', 'buddhi2002625@gmail.com', 8),
(6, 'Empty', 'buddhi2002625@gmail.com', 9),
(7, 'Ho9efjsdfih', 'buddhi2002625@gmail.com', 9),
(8, 'This is a prosduct\r\n', 'buddhi2002625@gmail.com', 8),
(9, 'Empty', 'buddhi2002625@gmail.com', 14),
(10, 'Empty', 'buddhi2002625@gmail.com', 22);

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

INSERT INTO `ordertable` (`Order_ID`, `Cus_Email`, `PayAmount`, `PaymentStatus`, `OrdertrackingStatus`, `OrderDate`, `ShippingDate`) VALUES
(1, 'buddhi2002625@gmail.com', 108800, 1, 'Not Delivered', '2021-06-27', '2021-07-11'),
(2, 'buddhi2002625@gmail.com', 38800, 1, 'Not Delivered', '2021-06-27', '2021-07-11'),
(3, 'buddhi2002625@gmail.com', 22000, 1, 'Not Delivered', '2021-06-27', '2021-07-11'),
(4, 'buddhi2002625@gmail.com', 111070, 1, 'Not Delivered', '2021-06-28', '2021-07-12');

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

INSERT INTO `product` (`Product_ID`, `PName`, `Quantity`, `BrandName`, `Details`, `Price`, `MainImg`) VALUES
(13, 'Nike Air Presto', 50, 'Nike', 'With a sleek design that is more comfortable than your favorite joggers, the Nike Air Presto is made to feel good and look fast. Its stretchy sleeve creates a cozy  sock-like fit while the supersoft foam adds spring to your step. Put them on and you will never want to take them off.\r\n<br>\r\nBenefits\r\n<br>\r\nStretchy mesh upper creates a cozy, sock-like fit while adding breathability.<br>\r\nIconic mid-foot TPU cage adds textural contrast to the stretchy synthetic upper while helping support your foot.<br>\r\nNike Air cushioning adds comfort that lasts.<br>\r\n5 dots on the midsole reference the Nike Alpha Project, which the OG Air Presto emerged from and which focused on the advancement of innovation and performance.<br>\r\nFlex grooves in the sole help with the natural motion of the foot.', 24800, 'Uploads/air-presto-mens-shoe-JlLlWz.jpg'),
(8, 'Nike Air Max Genome', 54, 'Nike', 'Inspired by the early 2000s look, the Air Max Genome adds a fresh face to the Air Max house. Its techy upper features a mixture of materials including sleek no-sew skins, airy mesh and durable plastic details. The low-profile, full-length Air unit adds comfort to match its sleek design that is sure to become your new favorite Air Max. This product is made with at least 20% recycled materials by weight.', 38800, 'Uploads/air-max-genome-mens-shoe-f4SHr3.jpg'),
(9, 'Air Jordan 1 Mid', 52, 'Nike', 'The Air Jordan 1 Mid Shoe is inspired by the first AJ1, offering fans of Jordan retros a chance to follow in the footsteps of greatness. Fresh color trims the clean, classic materials, injecting some newness into the familiar design.\r\n\r\n<br>\r\nBenefits: \r\n<br>\r\nAn Air-Sole unit provides lightweight cushioning.\r\nReal and synthetic leather in the upper offers durability and structure.\r\nA solid rubber outsole gives you traction on a variety of surfaces.\r\nTextile tongue feels soft and comfortable.\r\nShown: White/Black/Tropical Twist\r\nStyle: 554724-132', 22000, 'Uploads/air-jordan-1-mid-shoe-vnwwTL.jpg'),
(12, 'Nike Air Zoom Alphafly NEXT%', 56, 'Nike', 'Gear up for your next personal best with the Nike Air Zoom Alphafly NEXT%. Responsive foam and 2 Zoom Air units combine to push your running game forward for your next marathon or road race.\r\n<br>\r\nProduct Details\r\n<br>\r\nWeight: 7.4oz/210g (Menâ€™s size 8.5)\r\nOffset: 4mm (Forefoot: 35mm, Heel: 39mm)\r\nThe stack heights and materials in the shoe adhere to the guidelines set by World Athletics.\r\nShown: Hyper Turquoise/Black/Oracle Aqua/White\r\nStyle: CI9925-300', 48000, 'Uploads/air-zoom-alphafly-next-mens-racing-shoe-2FN3N2.jpg'),
(14, 'Nike Air Zoom-Type N7 by Kyrie Irving', 44, 'Nike', 'The Nike Air Zoom-Type N7 By Kyrie Irving features curated materials, individualized details and colors chosen by the basketball icon himself, celebrating the traditional practices of his tribe. Kyrie journey back to his roots as a member of the Standing Rock Sioux tribe led to a warm welcome from his native family, reflected in his choice of a quilted star pattern and distinctive stitched details.', 87860, 'Uploads/custom-nike-air-zoom-type-n7-by-kyrie-irving.jpg'),
(15, 'Nike Dunk Low | Womens', 44, 'Nike', 'Created for the hardwood but taken to the streets, the 80s b-ball icon returns with perfectly shined overlays and classic team colors. With its iconic hoops design, the Nike Dunk Low channels 80s vintage back onto the streets while its padded, low-cut collar lets you take your game anywhereâ€”in comfort.\r\n<br>\r\nBenefits\r\n<br>\r\nThe crisp leather on the upper has a slight sheen, ages to soft perfection and features durable overlays reminiscent of 80s b-ball.\r\nThe foam midsole offers lightweight, responsive cushioning.\r\nThe padded, low-cut collar adds a sleek look that feels comfortable.', 16560, 'Uploads/dunk-low-womens-shoe-P2m4gh.jpg'),
(16, 'Air Max 90 LTR', 42, 'Nike', 'The Nike Air Max 90 LTR stays true to its OG running roots with the iconic Waffle outsole, stitched overlays of smoothed leather and classic, color-accented TPU plates. The monochromatic upper provides versatile styling options while Max Air cushioning adds comfort to your step.\r\n<br>\r\n', 19999, 'Uploads/air-max-90-ltr-mens-shoe-VLtBwX.jpg'),
(17, 'Nike Flex Experience Run 10', 20, 'Nike', 'Streamlined and versatile, the Nike Flex Experience Run 10 is built for movement and flexibility. Its redesigned upper features a clean look and lightweight cushioning in the heel. Midfoot support details offer a secure feel. Keep it on after runs and enjoy comfort all day long.\r\n<br>\r\nMore Benefits\r\n<br>\r\nPull loop at the heel for easy on and off.<br>\r\nShown: Platinum Tint/Wolf Grey/Summit White/Chile Red<br>\r\nStyle: DH5423-009<br>', 12000, 'Uploads/flex-experience-run-10-mens-running-shoe-extra-wide-BNSNRc.jpg'),
(18, 'Nike Quest 4', 20, 'Nike', 'The pursuit of speed continues with the Nike Quest 4. Higher foam heights and cushioned comfort combine with a lightweight upper that offers secure support. Intuitive details make it a staple for the everyday runner.\r\n<br>\r\nMINIMAL AND LIGHTWEIGHT, MADE FOR SPEED.\r\n<br>\r\nThe pursuit of speed continues with the Nike Quest 4. Higher foam heights and cushioned comfort combine with a lightweight upper that offers secure support. Intuitive details make it a staple for the everyday runner.\r\n\r\n', 14000, 'Uploads/quest-4-mens-running-shoe-8k2ngj.jpg'),
(20, 'Nike Blazer Low 77 | LimitedED', 12, 'Nike', 'Praised by the streets for its classic simplicity and comfort, the Nike Blazer Low 77 returns with a low-profile, old-school hoops look. Celebrating art and DIY style, the paint splatter upper invites you to add your own artistic touch. Or, wear the canvas as is and turn heads with this must-have wardrobe staples 1-of-a-kind design.', 20000, 'Uploads/blazer-low-77-mens-shoe-LLBWGC.jpg'),
(21, 'Nike Air Zoom Pegasus 38 | Women', 22, 'Nike', 'Your workhorse with wings returns. The Nike Air Zoom Pegasus 38 continues to put a spring in your step, using the same responsive foam as its predecessor. Breathable mesh in the upper combines the comfort and durability you want with a wider fit at the toes.\r\n<br>\r\nMore Benefits\r\n<br>\r\nMore foam in the tongue provides a comfortable and soft feel.<br>\r\nRubber sole is made with about 9% Nike Grind material, which can lead to slight color variation.<br>\r\nShown: Sail/Pink Glaze/Crimson Bliss/Ocean Cube<br>\r\nStyle: CW7358-103', 24320, 'Uploads/air-zoom-pegasus-38-womens-running-shoe-gg8GBK.jpg'),
(22, 'Nike Wildhorse 7 | Women', 14, 'Nike', 'Take on those tough and extreme trail runs with the rugged build of the Nike Wildhorse 7. The upper delivers durable ventilation with support where you need it. Foam midsole cushioning provides responsiveness on every mile.\r\n<br>\r\nMore Benefits\r\n<br>\r\nA Dynamic Fit System through the midfoot helps hug and support your foot as your run through rocky trails.<br>\r\nSegmented rock plate helps shield your foot on rough terrain.<br>\r\nUtility tab in the back for easy on and off.<br>\r\nShown: Light Soft Pink/Magic Ember/Bicoastal/Aluminum<br>', 23210, 'Uploads/wildhorse-7-womens-trail-running-shoe-Nrmvwh.jpg'),
(23, 'Nike SuperRep Cycle | ATHLETIC', 16, 'Nike', 'The Nike SuperRep Cycle brings a breathable design to the high-heat, fast pace of indoor cycling. Adjustable straps secure your foot during intense movement as you push forward. Cleats are not included.\r\n<br>\r\nMore Benefits\r\n<br>\r\nRubber under the heel and toe gives you traction while walking to and from your bike.\r\nClosure opens wide to easily slip your foot in and out.', 12890, 'Uploads/superrep-cycle-mens-indoor-cycling-shoe-bsXw1J.jpg');

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

INSERT INTO `webmaster` (`WebMID`, `Name`, `PhoneNumber`, `Address`, `UserName`, `Password`) VALUES
(1, 'Ramesh Gunasekara M', '0716031184', 'dfggdfgdfg df dfg dfgsdfg sdfg sdfg', 'Adm/123@Gunasekaras', '123123123'),
(6, 'Tylor', '0711231231', 'sdfsdfsd sd sdfsdf', 'Adm/213@tylor', '123123123');

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

INSERT INTO `wneewslater` (`Email`) VALUES
('sdfsdfsdfsdf@gamil.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
