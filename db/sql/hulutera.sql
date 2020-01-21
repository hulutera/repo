-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2014 at 05:35 PM
-- Server version: 5.5.33-31.1
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hulutera`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse`
--

CREATE TABLE IF NOT EXISTS `abuse` (
  `abuseID` int(40) NOT NULL AUTO_INCREMENT,
  `abuseCategoryID` int(40) NOT NULL,
  `userID` int(40) NOT NULL,
  `carID` int(40) DEFAULT NULL,
  `computerID` int(40) DEFAULT NULL,
  `electronicsID` int(40) DEFAULT NULL,
  `houseID` int(40) DEFAULT NULL,
  `phoneID` int(40) DEFAULT NULL,
  `householdID` int(40) DEFAULT NULL,
  `othersID` int(40) DEFAULT NULL,
  `otherMessage` varchar(255) DEFAULT NULL,
  `IPaddress` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`abuseID`),
  KEY `abuseCategoryID` (`abuseCategoryID`),
  KEY `electronicsID` (`electronicsID`),
  KEY `userID` (`userID`),
  KEY `hID` (`houseID`),
  KEY `cID` (`carID`),
  KEY `dID` (`computerID`),
  KEY `phoneID` (`phoneID`),
  KEY `householdID` (`householdID`),
  KEY ` othersID` (`othersID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `abuse`
--

INSERT INTO `abuse` (`abuseID`, `abuseCategoryID`, `userID`, `carID`, `computerID`, `electronicsID`, `houseID`, `phoneID`, `householdID`, `othersID`, `otherMessage`, `IPaddress`) VALUES
(13, 10, 9, NULL, NULL, NULL, NULL, 30, NULL, NULL, 'Identity theft', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `abusecategory`
--

CREATE TABLE IF NOT EXISTS `abusecategory` (
  `abuseCategoryID` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`abuseCategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `abusecategory`
--

INSERT INTO `abusecategory` (`abuseCategoryID`, `name`) VALUES
(1, 'Bullying'),
(2, 'Copyright'),
(3, 'Discrimination'),
(5, 'Spam'),
(6, 'Identity theft'),
(7, 'Political violence'),
(8, 'Race violence'),
(9, 'Sex  abuse'),
(10, 'Sexual Content'),
(11, 'Other'),
(12, 'Religious violence'),
(13, 'Age abuse');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `cID` int(40) NOT NULL AUTO_INCREMENT,
  `uID` int(40) NOT NULL,
  `carCategoryID` int(40) NOT NULL,
  `contactMethodCategoryId` int(3) NOT NULL,
  `cPriceRent` varchar(40) DEFAULT NULL,
  `cPricesell` varchar(40) DEFAULT NULL,
  `cPriceNego` varchar(20) DEFAULT 'Negotiable',
  `cPriceRate` varchar(20) DEFAULT NULL,
  `currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `cMake` varchar(20) DEFAULT NULL,
  `cModel` varchar(20) DEFAULT NULL,
  `cYearOfMfg` year(4) DEFAULT NULL,
  `cNrOfSeats` int(40) DEFAULT NULL,
  `cFuelType` varchar(20) DEFAULT NULL,
  `cColor` varchar(20) DEFAULT NULL,
  `cGear` varchar(20) DEFAULT NULL,
  `cMilage` varchar(20) DEFAULT NULL,
  `cLocation` varchar(40) DEFAULT NULL,
  `cExtraInfo` mediumtext,
  `cTitle` varchar(125) NOT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cTotalView` int(10) DEFAULT NULL,
  `cStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `marketCategory` varchar(15) NOT NULL,
  `tempID` int(20) DEFAULT NULL,
  `tableType` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cID`),
  KEY `uID_FK1` (`uID`),
  KEY `ccategoryID_FK` (`carCategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`cID`, `uID`, `carCategoryID`, `contactMethodCategoryId`, `cPriceRent`, `cPricesell`, `cPriceNego`, `cPriceRate`, `currency`, `cMake`, `cModel`, `cYearOfMfg`, `cNrOfSeats`, `cFuelType`, `cColor`, `cGear`, `cMilage`, `cLocation`, `cExtraInfo`, `cTitle`, `UploadedDate`, `cTotalView`, `cStatus`, `marketCategory`, `tempID`, `tableType`) VALUES
(1, 2, 17, 0, '', '', '', 'month', 'Birr', 'aston-martin', 'ddf', 1991, 13, 'Diesel', 'white', 'Automatic', '160', 'Addis Ababa', '', 'egfg', '2013-12-01 13:28:36', NULL, 'Deleted', 'rent or sell', 13348, 1),
(2, 2, 17, 0, '', '', '', 'month', 'Birr', 'gmc', 'ghgh', 2006, 4, 'Diesel', 'black', 'Automatic', '130', 'Addis Ababa', 'My car is on sale.', 'Nice car for you', '2013-11-30 09:31:00', NULL, 'active', 'rent', 3633, 1),
(3, 2, 11, 0, '2000', '400000', 'negotiable', 'month', 'Birr', 'aston-martin', '', 2009, 0, '', '', 'Automatic', '', 'Addis Ababa', 'Nice ride. dshvhgsdvshgvghdv sdyvhdgvgshdv dghvsdghvshdgvs dghvshdvdhgvds dvshdvshgdv dyvsdvdshsdv yvsdsdvh dyvdhv', 'My ride to you!', '2013-12-11 16:21:54', NULL, 'active', 'sell', 12022, 1),
(5, 2, 14, 0, '', '', '', '', 'Birr', 'ford', '', 2000, 0, '', 'white', 'Manual', '40', 'Mekele', 'Beautiful car for you.', 'What a car!', '2013-08-31 14:18:21', NULL, '', 'No Action', 3867, 1),
(6, 2, 17, 0, '', '', '', '', 'Birr', 'acura', '', 2000, 0, '', '', 'Manual', '', 'Addis Ababa', 'Buy my car.', 'Car for sale.', '2013-09-06 09:37:20', NULL, '', 'No Action', 5226, 1),
(7, 1, 17, 0, '', '', '', '', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'myh', '2013-09-06 11:32:21', NULL, '', 'No Action', 2157, 1),
(8, 2, 1, 0, '', '', '', '', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'Checking', '2013-11-29 17:28:47', NULL, 'Deleted', 'No Action', 46721, 1),
(9, 2, 17, 0, '', '', '', 'month', 'Birr', '', 'bfn', 2005, 4, 'Diesel', 'gray', 'Manual', '110', 'Bahir Dar', 'Please buy my car', 'my fine car', '2013-12-11 14:33:25', NULL, 'pending', 'No Action', 77020, 1),
(10, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'Test car', '2013-12-16 11:22:55', NULL, 'pending', 'No Action', 3356, 1),
(11, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'Test car', '2013-12-17 13:10:19', NULL, 'pending', 'No Action', 21924, 1),
(12, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'test with price sell 2000 USD only', '2013-12-17 13:36:25', NULL, 'pending', 'No Action', 12449, 1),
(13, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', '4545', '2013-12-18 11:04:30', NULL, 'pending', 'No Action', 36316, 1),
(14, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', '54545', '2013-12-18 11:04:57', NULL, 'pending', 'No Action', 53847, 1),
(15, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'vdfvdf', '2013-12-18 11:06:25', NULL, 'pending', 'No Action', 84930, 1),
(16, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'gdgd', '2013-12-18 16:36:02', NULL, 'pending', 'No Action', 78247, 1),
(17, 2, 17, 0, '', '', 'Negotiable', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'tttt', '2013-12-18 16:46:35', NULL, 'pending', 'No Action', 1018, 1),
(18, 2, 17, 0, '', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'ttty', '2013-12-18 16:46:58', NULL, 'pending', 'No Action', 19614, 1),
(19, 2, 17, 0, '', '', 'Negotiable', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', '5656', '2013-12-18 16:55:20', NULL, 'pending', 'No Action', 60415, 1),
(20, 2, 17, 0, '', '', 'Negotiable', 'month', 'USD', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'fgerge', '2013-12-19 10:26:53', NULL, 'pending', 'No Action', 342, 1),
(21, 2, 17, 0, '', '54545', '', '000', 'USD', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'fsfs', '2013-12-19 10:30:33', NULL, 'pending', 'sell', 9267, 1),
(22, 2, 17, 0, '5600', '', '', 'month', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', '5ffhfh', '2013-12-19 10:31:48', NULL, 'pending', 'rent', 30312, 1),
(23, 2, 17, 0, '', '5555', '', '000', 'USD', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'car final check', '2013-12-19 11:55:39', NULL, 'pending', 'sell', 78817, 1),
(24, 10, 14, 0, '', '10000', '', '000', 'Birr', 'porsche', '', 1980, 0, '', 'yellow', 'Manual', '', 'Addis Ababa', '', 'porche for sell', '2013-12-21 18:35:46', NULL, 'pending', 'sell', 29635, 1),
(25, 1, 17, 0, '', '', 'Negotiable', '000', 'Birr', '', '', 0000, 0, '', '', 'semiAuto', '', 'Addis Ababa', '', 'myTestCar', '2013-12-29 15:18:29', NULL, 'pending', 'No Action', 692, 1),
(26, 2, 17, 0, '', '', '', '000', 'Birr', '', '', 0000, 0, '', '', 'Manual', '', 'Addis Ababa', '', 'hdvchdsgv', '2014-01-06 15:30:16', NULL, 'pending', 'No Action', 18342, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carcategory`
--

CREATE TABLE IF NOT EXISTS `carcategory` (
  `categoryID` int(40) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(40) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `carcategory`
--

INSERT INTO `carcategory` (`categoryID`, `categoryName`) VALUES
(1, 'Buses'),
(2, 'Compact Car'),
(3, 'Convertible'),
(4, 'Full Size Van'),
(5, 'Hatch Back'),
(6, 'Heavy Machine'),
(7, 'Lift back'),
(8, 'Luxury car'),
(9, 'Mini Bus'),
(10, 'Pick up'),
(11, 'Small car'),
(12, 'Sport car'),
(13, 'Station Wagon'),
(14, 'SUV'),
(15, 'Taxi'),
(16, 'Truck'),
(17, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `carimages`
--

CREATE TABLE IF NOT EXISTS `carimages` (
  `imageID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemID` int(40) NOT NULL,
  `picture_1` varchar(125) DEFAULT NULL,
  `picture_2` varchar(125) DEFAULT NULL,
  `picture_3` varchar(125) DEFAULT NULL,
  `picture_4` varchar(125) DEFAULT NULL,
  `picture_5` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`imageID`),
  KEY `item_ID` (`ItemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `carimages`
--

INSERT INTO `carimages` (`imageID`, `ItemID`, `picture_1`, `picture_2`, `picture_3`, `picture_4`, `picture_5`) VALUES
(1, 1, '809images_055.jpeg', NULL, NULL, NULL, NULL),
(2, 3, '152images_047.jpeg', '612images_014.jpeg', NULL, NULL, NULL),
(4, 5, '736images_054.jpeg', '576images_053.jpeg', NULL, NULL, NULL),
(5, 6, '420images_054.jpeg', '642images_053.jpeg', NULL, NULL, NULL),
(6, 8, '193images_054.jpeg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE IF NOT EXISTS `computer` (
  `dID` int(40) NOT NULL AUTO_INCREMENT,
  `uID` int(40) NOT NULL,
  `compCategoryID` int(40) NOT NULL,
  `contactMethodCategoryId` int(3) NOT NULL,
  `dPrice` varchar(40) DEFAULT NULL,
  `dPriceNego` varchar(20) DEFAULT NULL,
  `currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `dMade` varchar(20) DEFAULT NULL,
  `dOS` varchar(20) DEFAULT NULL,
  `dModel` varchar(20) DEFAULT NULL,
  `dProcessor` varchar(20) DEFAULT NULL,
  `dRAM` varchar(20) DEFAULT NULL,
  `dHardDrive` varchar(20) DEFAULT NULL,
  `dColor` varchar(20) DEFAULT NULL,
  `dLocation` varchar(40) DEFAULT NULL,
  `dExtraInfo` mediumtext,
  `dTitle` varchar(125) DEFAULT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dTotalView` int(10) DEFAULT NULL,
  `dStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `marketCategory` varchar(10) NOT NULL,
  `tempID` int(20) DEFAULT NULL,
  `tableType` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`dID`),
  KEY `uID_FK2` (`uID`),
  KEY `d_CategoryID_FK` (`compCategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`dID`, `uID`, `compCategoryID`, `contactMethodCategoryId`, `dPrice`, `dPriceNego`, `currency`, `dMade`, `dOS`, `dModel`, `dProcessor`, `dRAM`, `dHardDrive`, `dColor`, `dLocation`, `dExtraInfo`, `dTitle`, `UploadedDate`, `dTotalView`, `dStatus`, `marketCategory`, `tempID`, `tableType`) VALUES
(5, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '1', '1', '', NULL, 'Addis Ababa', 'Test ', 'Checking', '2013-12-01 15:12:37', NULL, 'pending', 'No Action', 97839, 3),
(6, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '1', '3', '2', NULL, 'Addis Ababa', 'new', 'Test items', '2013-11-29 22:16:14', NULL, 'Deleted', 'No Action', 77726, 3),
(7, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '5', '2', '3', NULL, 'Addis Ababa', 'Another one', 'mini', '2013-11-29 22:04:09', NULL, 'Deleted', 'No Action', 4612, 3),
(8, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '5', '2', '3', NULL, 'Addis Ababa', 'Another one', 'mini', '2013-12-01 15:12:30', NULL, 'pending', 'No Action', 94528, 3),
(9, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '2', '2', '3', NULL, 'Addis Ababa', '', 'The first item', '2013-12-01 15:12:21', NULL, 'active', 'No Action', 69239, 3),
(13, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', 'Description', 'Comp title', '2013-11-29 22:05:34', NULL, 'Deleted', 'No Action', 3033, 3),
(14, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'sfwef', '2013-12-01 15:12:14', NULL, 'active', 'No Action', 5729, 3),
(20, 1, 1, 0, '3232321312', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'myc', '2013-12-01 15:12:06', NULL, 'active', 'Sale', 14425, 3),
(21, 2, 1, 0, '10,000', 'Negotiable', 'Birr', '', 'windows', NULL, '3', '', '', NULL, 'Addis Ababa', '', 'Comp title', '2013-12-04 18:43:43', NULL, 'Deleted', 'Sale', 47542, 3),
(22, 9, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '3', '3', '3', NULL, 'Addis Ababa', 'Nice PC with Windows 8', 'Nice PC with Windows 8', '2013-12-02 15:23:10', NULL, 'Deleted', 'No Action', 82950, 3),
(23, 1, 1, 0, '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'sdsadasd', '2013-12-01 15:11:41', NULL, 'active', 'Sale', 94313, 3),
(24, 2, 4, 0, '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Awassa', '', 'LCD', '2013-12-11 14:37:36', NULL, 'pending', 'sell', 97130, 3),
(25, 2, 2, 0, '0', 'Negotiable', 'Birr', 'apple', 'unix', 'macbookAir', '', '', '', NULL, 'Addis Ababa', '', 'apple', '2013-12-16 21:56:53', NULL, 'pending', 'sell', 57836, 3),
(26, 2, 1, 0, '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'comp only with title', '2013-12-17 13:40:34', NULL, 'pending', 'sell', 98513, 3),
(27, 2, 2, 0, '0', 'Negotiable', 'Birr', 'acer', 'windows', NULL, '2', '2', '3', NULL, 'Addis Ababa', 'Nice PC', 'comp with all but not negotiable', '2013-12-17 13:42:40', NULL, 'pending', 'sell', 62641, 3),
(28, 2, 1, 0, '0', 'Negotiable', 'Birr', '', 'windows', NULL, '1.5 - 1.99GHz', '1.0 - 1.9GB', '200 - 299GB', NULL, 'Addis Ababa', '', 'checking the spec', '2013-12-17 13:54:37', NULL, 'pending', 'sell', 5432, 3),
(29, 2, 1, 0, '0', 'pending', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'price check without nego', '2013-12-17 15:13:29', NULL, '', 'sell', 49645, 3),
(30, 2, 1, 0, '0', 'pending', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'cascad', '2013-12-17 15:15:30', NULL, '', 'sell', 22620, 3),
(31, 2, 1, 0, '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'price fix comp', '2013-12-17 15:23:12', NULL, 'pending', 'sell', 22347, 3),
(32, 2, 1, 0, '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'nego comp', '2013-12-17 15:24:39', NULL, 'pending', 'sell', 78018, 3),
(33, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'price check without nego', '2013-12-17 15:26:58', NULL, 'pending', 'sell', 56533, 3),
(34, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'dasfsd', '2013-12-17 15:47:09', NULL, 'pending', 'sell', 49315, 3),
(35, 2, 1, 0, '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'fwfew', '2013-12-17 15:55:11', NULL, 'pending', 'sell', 11917, 3),
(36, 2, 1, 0, '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'sdxasdas', '2013-12-17 16:00:34', NULL, 'pending', 'sell', 9963, 3),
(37, 2, 1, 0, '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'dasdfe', '2013-12-17 16:02:32', NULL, 'pending', 'sell', 4802, 3),
(38, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'sdasdas', '2013-12-17 16:08:51', NULL, 'pending', 'sell', 6949, 3),
(39, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'fdsfsdf', '2013-12-17 16:12:30', NULL, 'pending', 'No Action', 35333, 3),
(40, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', '5454', '2013-12-17 16:28:02', NULL, 'pending', 'No Action', 42819, 3),
(41, 2, 1, 0, '', '', 'Birr', '000', 'windows', NULL, '000', '000', '000', NULL, 'Addis Ababa', '', 'nnnn', '2013-12-17 16:41:18', NULL, 'pending', 'No Action', 1421, 3),
(42, 2, 1, 0, '', '', 'Birr', '000', 'windows', NULL, '000', '000', '000', NULL, 'Addis Ababa', '', 'sfdfd', '2013-12-17 16:45:45', NULL, 'pending', 'sell', 79748, 3),
(43, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'cfsd', '2013-12-18 16:40:04', NULL, 'pending', 'sell', 29735, 3),
(44, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'yyyy', '2013-12-18 16:40:36', NULL, 'pending', 'sell', 1296, 3),
(45, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'wefe', '2013-12-19 09:16:24', NULL, 'pending', 'sell', 22015, 3),
(46, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'fgdg', '2013-12-19 11:05:09', NULL, 'pending', 'sell', 94215, 3),
(47, 2, 1, 0, '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', '545', '2013-12-19 11:52:08', NULL, 'pending', 'sell', 36639, 3),
(48, 2, 1, 0, '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'tttt', '2013-12-19 12:17:42', NULL, 'pending', 'sell', 37521, 3),
(49, 2, 1, 0, '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'fgdfg', '2013-12-19 12:18:35', NULL, 'pending', 'sell', 72825, 3),
(50, 2, 1, 0, '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'erwer', '2013-12-19 12:19:48', NULL, 'pending', 'sell', 9212, 3),
(51, 2, 1, 0, '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'dawf', '2013-12-19 12:25:03', NULL, 'pending', 'sell', 1745, 3),
(52, 2, 1, 0, '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'wetwe', '2013-12-19 12:26:47', NULL, 'pending', 'sell', 32611, 3),
(53, 2, 1, 0, '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'afew', '2013-12-19 12:28:27', NULL, 'pending', 'sell', 52117, 3),
(54, 2, 1, 0, '4545', '', 'USD', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'ertert', '2013-12-19 12:30:26', NULL, 'pending', 'sell', 4049, 3),
(55, 2, 1, 0, '5656', 'Negotiable', 'USD', '', 'windows', NULL, '', '', '', NULL, 'Addis Ababa', '', 'com', '2013-12-19 12:31:12', NULL, 'pending', 'sell', 95542, 3),
(56, 1, 1, 0, '12321', 'Negotiable', 'Birr', '', 'windows', NULL, '2.5 - 2.99GHz', '1.0 - 1.9GB', '300 - 499GB', NULL, 'Addis Ababa', 'TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer ', 'TestComputer', '2013-12-21 14:30:49', NULL, 'active', 'sell', 17650, 3);

-- --------------------------------------------------------

--
-- Table structure for table `computercategory`
--

CREATE TABLE IF NOT EXISTS `computercategory` (
  `categoryID` int(40) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(40) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `computercategory`
--

INSERT INTO `computercategory` (`categoryID`, `categoryName`) VALUES
(1, 'Laptop'),
(2, 'Notebook'),
(3, 'Stationary'),
(4, 'Tablets'),
(5, 'Workstations'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `computerimages`
--

CREATE TABLE IF NOT EXISTS `computerimages` (
  `ImageID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemID` int(40) NOT NULL,
  `picture_1` varchar(125) DEFAULT NULL,
  `picture_2` varchar(125) DEFAULT NULL,
  `picture_3` varchar(125) DEFAULT NULL,
  `picture_4` varchar(125) DEFAULT NULL,
  `picture_5` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ImageID`),
  UNIQUE KEY `item_ID` (`ItemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `computerimages`
--

INSERT INTO `computerimages` (`ImageID`, `ItemID`, `picture_1`, `picture_2`, `picture_3`, `picture_4`, `picture_5`) VALUES
(3, 5, '42images_191.jpeg', NULL, NULL, NULL, NULL),
(4, 6, '389images_206.jpeg', '725images_196.jpeg', NULL, NULL, NULL),
(5, 7, '411images_179.jpeg', '840images_155.jpeg', NULL, NULL, NULL),
(6, 8, '104images_179.jpeg', '595images_155.jpeg', NULL, NULL, NULL),
(7, 9, '899images_152.jpeg', NULL, NULL, NULL, NULL),
(8, 13, '282images_064.jpeg', '778images_090.jpeg', NULL, NULL, NULL),
(9, 22, '926images.jpeg', '810images1.jpeg', '575one.jpeg', '311images1.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactmethodcategory`
--

CREATE TABLE IF NOT EXISTS `contactmethodcategory` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `contactMethod` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contactmethodcategory`
--

INSERT INTO `contactmethodcategory` (`Id`, `contactMethod`) VALUES
(1, 'Email'),
(2, 'Phone'),
(3, 'Both');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `kID` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `company` varchar(125) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(125) DEFAULT NULL,
  `purpose` varchar(125) NOT NULL,
  `description` mediumtext NOT NULL,
  `messageStatus` varchar(10) NOT NULL,
  `timeReceived` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`kID`, `name`, `company`, `email`, `subject`, `purpose`, `description`, `messageStatus`, `timeReceived`) VALUES
(19, 'wende', 'hulutera', 'wendeworku@yahoo.com', 'Test four', 'Suggestion on Incorrect functionality', 'Checking in admin.', 'follow up', '2013-08-18 14:50:35'),
(21, 'jemil', 'pri', 'jemilsh@gmail.com', 'add', 'I can not find my ad', 'add', 'read', '2013-08-30 13:58:57'),
(22, 'jemil', 'pri', 'jemilsh@gmail.com', 'add', 'I can not find my ad', 'chrome ', 'read', '2013-08-30 13:59:21'),
(24, 'wende', 'hulutera', 'www@hulutera.com', 'check', 'I can not find my ad', 'check 1 2 3...hope it works.', 'read', '2013-09-08 14:33:14'),
(25, 'daniel', '', 'dan_assefa@yahoo.com', 'good job', 'General', 'I appreciate your great job. I just registered and posted a test ad. It is a whole new experience for such websites in Ethiopia. Keep it up.', 'read', '2013-12-21 18:40:42'),
(26, 'we', 'vhjsj', 'svhvhgv@hbhb.vgvg', 'djbjvjhf', 'My ad is not approved', 'dgjgffg', 'read', '2014-01-03 11:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE IF NOT EXISTS `electronics` (
  `eID` int(40) NOT NULL AUTO_INCREMENT,
  `uID` int(40) NOT NULL,
  `electronicsCategoryID` int(40) NOT NULL,
  `contactMethodCategoryId` int(3) NOT NULL,
  `ePricesell` varchar(40) DEFAULT NULL,
  `ePriceNego` varchar(20) DEFAULT 'Negotiable',
  `currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `eLocation` varchar(40) DEFAULT NULL,
  `eExtraInfo` mediumtext,
  `eTitle` varchar(125) DEFAULT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eTotalView` int(10) DEFAULT NULL,
  `eStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `marketCategory` varchar(10) NOT NULL,
  `tempID` int(20) DEFAULT NULL,
  `tableType` int(10) NOT NULL DEFAULT '5',
  PRIMARY KEY (`eID`),
  KEY `uID_FK1` (`uID`),
  KEY `electronicsCategrogyID` (`electronicsCategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`eID`, `uID`, `electronicsCategoryID`, `contactMethodCategoryId`, `ePricesell`, `ePriceNego`, `currency`, `eLocation`, `eExtraInfo`, `eTitle`, `UploadedDate`, `eTotalView`, `eStatus`, `marketCategory`, `tempID`, `tableType`) VALUES
(1, 2, 8, 0, '0', '', 'Birr', 'Addis Ababa', 'ddewdew', 'Elect', '2013-09-06 09:37:18', NULL, '', 'No Action', 11238, 5),
(2, 2, 2, 0, '0', 'Negotiable', 'Birr', 'Addis Ababa', '', 'camera', '2013-11-30 09:31:07', NULL, 'active', 'No Action', 99348, 5),
(6, 1, 8, 0, '0', '', 'Birr', 'Addis Ababa', '', 'adsdsds', '2013-11-17 19:51:53', NULL, '', 'No Action', 70435, 5),
(7, 1, 8, 0, '0', '', 'Birr', 'Addis Ababa', '', 'adsadsad', '2013-11-17 19:51:53', NULL, '', 'No Action', 55622, 5),
(8, 2, 1, 0, '0', 'Negotiable', 'Birr', 'Dire Dawa', '', 'my tv for you', '2013-12-11 14:36:17', NULL, 'pending', 'No Action', 28731, 5),
(9, 2, 8, 0, '0', '', 'Birr', 'Addis Ababa', '', 'sdfsdfsd', '2013-12-17 16:04:56', NULL, 'pending', 'No Action', 92420, 5),
(10, 2, 8, 0, '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'fdsf', '2013-12-18 16:41:13', NULL, 'pending', 'sell', 54729, 5),
(11, 2, 8, 0, '', '', 'Birr', 'Addis Ababa', '', 'gggg', '2013-12-18 16:41:34', NULL, 'pending', 'sell', 50623, 5),
(12, 2, 8, 0, '', '', 'Birr', 'Addis Ababa', '', 'fsdfd', '2013-12-18 16:57:04', NULL, 'pending', 'sell', 12320, 5),
(13, 2, 8, 0, '4444', 'Negotiable', 'Birr', 'Addis Ababa', '', 'Elect', '2013-12-19 11:56:13', NULL, 'pending', 'sell', 8026, 5),
(14, 2, 8, 0, '6565', '', 'Birr', 'Addis Ababa', '', 'dgsg', '2013-12-19 12:21:39', NULL, 'pending', 'sell', 4935, 5);

-- --------------------------------------------------------

--
-- Table structure for table `electronicscategory`
--

CREATE TABLE IF NOT EXISTS `electronicscategory` (
  `CategoryID` int(40) NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronicscategory`
--

INSERT INTO `electronicscategory` (`CategoryID`, `categoryName`) VALUES
(1, 'Camera'),
(2, 'Fridge'),
(3, 'Games'),
(4, 'Head Phone'),
(5, 'Watch'),
(6, 'Tape Recorder'),
(7, 'TV'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `electronicsimages`
--

CREATE TABLE IF NOT EXISTS `electronicsimages` (
  `ImageID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemID` int(40) NOT NULL,
  `picture_1` varchar(125) DEFAULT NULL,
  `picture_2` varchar(125) DEFAULT NULL,
  `picture_3` varchar(125) DEFAULT NULL,
  `picture_4` varchar(125) DEFAULT NULL,
  `picture_5` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ImageID`),
  UNIQUE KEY `ItemID` (`ItemID`),
  UNIQUE KEY `electronics_eID` (`ImageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `electronicsimages`
--

INSERT INTO `electronicsimages` (`ImageID`, `ItemID`, `picture_1`, `picture_2`, `picture_3`, `picture_4`, `picture_5`) VALUES
(1, 2, '353Nikon.jpeg', '691nikon 2.jpeg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `hID` int(40) NOT NULL AUTO_INCREMENT,
  `uID` int(40) NOT NULL,
  `houseCategoryID` int(40) NOT NULL,
  `contactMethodCategoryId` int(3) NOT NULL,
  `hPriceRent` varchar(40) DEFAULT NULL,
  `hPricesell` varchar(40) DEFAULT NULL,
  `hPriceNego` varchar(20) DEFAULT 'Negotiable',
  `hPriceRate` varchar(20) DEFAULT NULL,
  `currency` varchar(10) DEFAULT 'Birr',
  `hLocation` varchar(40) DEFAULT NULL,
  `hKebele` int(10) DEFAULT NULL,
  `hWereda` int(10) DEFAULT NULL,
  `hLotSize` int(10) DEFAULT NULL,
  `hBedrooms` int(10) DEFAULT NULL,
  `hToilet` int(10) DEFAULT NULL,
  `hBathroom` int(10) NOT NULL,
  `hYearOfBuilt` year(4) DEFAULT NULL,
  `hWater` varchar(10) DEFAULT NULL,
  `hElectricity` varchar(10) DEFAULT NULL,
  `hExtraInfo` mediumtext,
  `hTitle` varchar(125) DEFAULT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hTotalView` int(10) DEFAULT NULL,
  `hStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `marketCategory` varchar(15) NOT NULL,
  `tempID` int(20) NOT NULL,
  `tableType` int(10) NOT NULL DEFAULT '2',
  PRIMARY KEY (`hID`),
  KEY `uID_FK3` (`uID`),
  KEY `hCategoryID_FK` (`houseCategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`hID`, `uID`, `houseCategoryID`, `contactMethodCategoryId`, `hPriceRent`, `hPricesell`, `hPriceNego`, `hPriceRate`, `currency`, `hLocation`, `hKebele`, `hWereda`, `hLotSize`, `hBedrooms`, `hToilet`, `hBathroom`, `hYearOfBuilt`, `hWater`, `hElectricity`, `hExtraInfo`, `hTitle`, `UploadedDate`, `hTotalView`, `hStatus`, `marketCategory`, `tempID`, `tableType`) VALUES
(1, 2, 5, 0, '', '', '', '', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'house', '2013-09-06 09:37:15', NULL, '', 'No Action', 92638, 2),
(2, 2, 5, 0, '', '', '', '', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'dsds', '2013-12-01 13:29:36', NULL, '', 'sell', 53135, 2),
(3, 1, 5, 0, '', '', '', '', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'dddsadsa', '2013-09-06 11:32:13', NULL, '', 'Rent', 7705, 2),
(4, 2, 1, 0, '', '', '', '', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'house check', '2013-12-01 13:31:04', NULL, 'active', 'sell', 33419, 2),
(5, 2, 1, 0, '50000 birr', '', '', '6month', 'Birr', 'Adama', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'House', '2013-12-11 14:35:12', NULL, 'pending', 'Rent', 41748, 2),
(6, 2, 5, 0, '', '', '', 'month', '', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', 'Negotiable', 'wwwww', '2013-12-18 16:47:27', NULL, 'Birr', 'No Action', 74318, 2),
(7, 2, 5, 0, '', '', '', 'month', '', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', 'Negotiable', 'gdgf', '2013-12-18 16:48:38', NULL, 'Birr', 'No Action', 797, 2),
(8, 2, 5, 0, '', '', 'Negotiable', 'month', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'fsd', '2013-12-18 16:52:42', NULL, 'pending', 'No Action', 27910, 2),
(9, 2, 5, 0, '', '6565', '', 'month', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'gdfgdfg', '2013-12-18 16:53:32', NULL, 'pending', 'sell', 75723, 2),
(10, 2, 5, 0, '56565', '', 'Negotiable', '12month', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'gfgfg', '2013-12-18 16:54:18', NULL, 'pending', 'Rent', 7310, 2),
(11, 2, 5, 0, '567', '', 'Negotiable', 'month', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'hou', '2013-12-19 09:15:48', NULL, 'pending', 'Rent', 43115, 2),
(12, 2, 5, 0, '50', '', 'Negotiable', 'month', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'gdghdf', '2013-12-19 09:41:36', NULL, 'pending', 'Rent', 147, 2),
(13, 2, 5, 0, '', '454', '', 'month', 'Birr', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'ffdw', '2013-12-19 10:09:06', NULL, 'pending', 'sell', 37313, 2),
(14, 2, 5, 0, '', 'csdfsd', '', 'month', 'USD', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'adadfw', '2013-12-19 10:17:40', NULL, '', 'sell', 97113, 2),
(15, 2, 5, 0, '', '4545', '', 'month', 'USD', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'fdfd', '2013-12-19 10:22:18', NULL, 'pending', 'sell', 24813, 2),
(16, 2, 5, 0, '', '5656', '', 'month', 'USD', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'efewgte', '2013-12-24 20:33:59', NULL, 'active', 'sell', 35118, 2);

-- --------------------------------------------------------

--
-- Table structure for table `housecategory`
--

CREATE TABLE IF NOT EXISTS `housecategory` (
  `categoryID` int(40) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(40) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `housecategory`
--

INSERT INTO `housecategory` (`categoryID`, `categoryName`) VALUES
(1, 'Commercial'),
(2, 'Land'),
(3, 'Multi Family (condominium)'),
(4, 'Residential Rental'),
(5, 'Residential Sales'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE IF NOT EXISTS `household` (
  `hhID` int(40) NOT NULL AUTO_INCREMENT,
  `uID` int(40) NOT NULL,
  `hhCategoryID` int(40) NOT NULL,
  `contactMethodCategoryId` int(3) NOT NULL,
  `hhPricesell` varchar(50) DEFAULT NULL,
  `hhPriceNego` varchar(50) DEFAULT 'Negotiable',
  `currency` varchar(10) NOT NULL DEFAULT 'Birr',
  `hhLocation` varchar(40) DEFAULT NULL,
  `hhExtraInfo` mediumtext,
  `hhTitle` varchar(125) DEFAULT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hhTotalView` int(10) DEFAULT NULL,
  `hhStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `marketCategory` varchar(10) NOT NULL DEFAULT 'Sale',
  `tempID` int(20) DEFAULT NULL,
  `tableType` int(10) NOT NULL DEFAULT '6',
  PRIMARY KEY (`hhID`),
  KEY `uID_FK1` (`uID`),
  KEY `hhcategoryID_FK` (`hhCategoryID`),
  KEY `marketCategory` (`marketCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`hhID`, `uID`, `hhCategoryID`, `contactMethodCategoryId`, `hhPricesell`, `hhPriceNego`, `currency`, `hhLocation`, `hhExtraInfo`, `hhTitle`, `UploadedDate`, `hhTotalView`, `hhStatus`, `marketCategory`, `tempID`, `tableType`) VALUES
(2, 1, 1, 0, '123456878', '', 'Birr', 'Addis Ababa', '', 'my hh', '2013-09-06 11:24:42', 0, '', 'Sale', 27715, 6),
(3, 1, 1, 0, '123124124123', '', 'Birr', 'Addis Ababa', '', 'my hh', '2013-09-06 11:31:53', 0, '', 'Sale', 50225, 6),
(4, 2, 1, 0, '555', '', 'Birr', 'Addis Ababa', '', 'household check', '2013-11-29 17:51:17', 0, '', 'Sale', 72615, 6),
(5, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', 'a nice item for U.', 'FuBu', '2013-11-29 17:55:55', 0, '', 'No Action', 77237, 6),
(6, 1, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'test', '2013-11-17 19:51:53', 0, '', 'No Action', 4014, 6),
(7, 2, 1, 0, '0', 'Negotiable', 'Birr', 'Shashemene', '', 'Sofa', '2013-12-11 14:38:19', 0, 'pending', 'sell', 94746, 6),
(8, 2, 1, 0, '0', '', 'Birr', 'Addis Ababa', '', 'sxdasda', '2013-12-17 16:03:53', 0, 'pending', 'sell', 458, 6),
(9, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'hh pr', '2013-12-18 10:26:07', 0, 'pending', 'No Action', 74815, 6),
(10, 2, 1, 0, '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'dss', '2013-12-18 10:26:47', 0, 'pending', 'No Action', 840, 6),
(11, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'ffff', '2013-12-18 10:29:04', 0, 'pending', 'sell', 14012, 6),
(12, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', 'sadsa', 'fsfs', '2013-12-18 11:14:18', 0, 'pending', 'sell', 50749, 6),
(13, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'fdf', '2013-12-18 11:33:15', 0, 'pending', 'sell', 26714, 6),
(14, 2, 2, 0, '', '', 'Birr', 'Addis Ababa', '', 'fsdfdsf', '2013-12-18 11:37:06', 0, 'pending', 'sell', 77831, 6),
(15, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'sdasdas', '2013-12-18 12:45:48', 0, 'pending', 'sell', 19336, 6),
(16, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', 'dasdas', 'dsd', '2013-12-18 13:15:53', 0, 'pending', 'sell', 57844, 6),
(17, 2, 4, 0, '', '', 'Birr', 'Addis Ababa', '', 'dcsdfsd', '2013-12-18 13:17:56', 0, 'pending', 'sell', 50318, 6),
(18, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'sffwfe', '2013-12-18 15:25:55', 0, 'pending', 'sell', 56636, 6),
(19, 2, 1, 0, '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'ggggg', '2013-12-18 16:06:40', 0, 'pending', 'sell', 70436, 6),
(20, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'dgdg', '2013-12-18 16:07:37', 0, 'pending', 'sell', 85441, 6),
(21, 2, 1, 0, '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'gfgf', '2013-12-18 16:08:10', 0, 'pending', 'sell', 8138, 6),
(22, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'dvdsgvd', '2013-12-18 16:56:15', 0, 'pending', 'sell', 40324, 6),
(23, 2, 1, 0, '', '', 'Birr', 'Addis Ababa', '', 'gge', '2013-12-19 11:10:42', 0, 'pending', 'sell', 1916, 6),
(24, 2, 1, 0, '5555', '', 'USD', 'Addis Ababa', '', 'HH', '2013-12-25 15:08:12', 0, 'active', 'sell', 81431, 6),
(25, 2, 1, 0, '565656', 'Negotiable', 'Birr', 'Addis Ababa', '', 'hh', '2013-12-25 15:00:13', 0, 'active', 'sell', 135, 6),
(26, 2, 1, 0, '56656', '', 'USD', 'Addis Ababa', '', '6556565gfdgdf', '2013-12-19 12:21:09', 0, 'pending', 'sell', 734, 6);

-- --------------------------------------------------------

--
-- Table structure for table `householdcategory`
--

CREATE TABLE IF NOT EXISTS `householdcategory` (
  `categoryID` int(40) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(40) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `householdcategory`
--

INSERT INTO `householdcategory` (`categoryID`, `categoryName`) VALUES
(1, 'Furniture'),
(2, 'Kitchen Stuff'),
(3, 'Shower Stuff'),
(4, 'Other households'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `householdimages`
--

CREATE TABLE IF NOT EXISTS `householdimages` (
  `ImageID` int(40) DEFAULT NULL,
  `ItemID` int(40) NOT NULL AUTO_INCREMENT,
  `picture_1` varchar(125) DEFAULT NULL,
  `picture_2` varchar(125) DEFAULT NULL,
  `picture_3` varchar(125) DEFAULT NULL,
  `picture_4` varchar(125) DEFAULT NULL,
  `picture_5` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `houseimages`
--

CREATE TABLE IF NOT EXISTS `houseimages` (
  `ImagesID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemID` int(40) NOT NULL,
  `picture_1` varchar(125) DEFAULT NULL,
  `picture_2` varchar(125) DEFAULT NULL,
  `picture_3` varchar(125) DEFAULT NULL,
  `picture_4` varchar(125) DEFAULT NULL,
  `picture_5` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ImagesID`),
  KEY `house_hID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `latestupdate`
--

CREATE TABLE IF NOT EXISTS `latestupdate` (
  `latestID` int(40) NOT NULL AUTO_INCREMENT,
  `cID` int(40) DEFAULT NULL,
  `dID` int(40) DEFAULT NULL,
  `hID` int(40) DEFAULT NULL,
  `hhID` int(40) DEFAULT NULL,
  `eID` int(40) DEFAULT NULL,
  `pID` int(40) DEFAULT NULL,
  `oID` int(40) DEFAULT NULL,
  `LatestTime` int(40) DEFAULT NULL,
  PRIMARY KEY (`latestID`),
  UNIQUE KEY `oID` (`oID`),
  UNIQUE KEY `pID` (`pID`),
  UNIQUE KEY `hhID` (`hhID`,`pID`,`oID`),
  KEY `hID_FK` (`hID`),
  KEY `dID_FK` (`dID`),
  KEY `cID_FK` (`cID`),
  KEY `eID` (`eID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `latestupdate`
--

INSERT INTO `latestupdate` (`latestID`, `cID`, `dID`, `hID`, `hhID`, `eID`, `pID`, `oID`, `LatestTime`) VALUES
(13, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1378612439),
(14, NULL, NULL, NULL, NULL, NULL, 4, NULL, 1379522330),
(15, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1379177100),
(23, 8, NULL, NULL, NULL, NULL, NULL, NULL, 1378650938),
(33, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1385751600),
(34, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1385751598),
(36, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1385751595),
(37, NULL, NULL, NULL, NULL, NULL, 6, NULL, 1385751594),
(38, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1385804018),
(39, NULL, NULL, NULL, NULL, NULL, NULL, 36, 1387633662),
(40, NULL, 56, NULL, NULL, NULL, NULL, NULL, 1387636240),
(41, NULL, NULL, NULL, NULL, NULL, 30, NULL, 1387636985),
(42, 16, NULL, NULL, NULL, NULL, NULL, NULL, 1387455782),
(43, NULL, NULL, NULL, NULL, NULL, NULL, 35, 1387455755),
(44, NULL, NULL, NULL, NULL, NULL, 29, NULL, 1387455729),
(45, NULL, NULL, NULL, 25, NULL, NULL, NULL, 1387455629),
(46, NULL, NULL, NULL, 24, NULL, NULL, NULL, 1387454205),
(47, NULL, NULL, NULL, NULL, NULL, 24, NULL, 1387449177);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `uID` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `subject` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dateSent` datetime NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otherimages`
--

CREATE TABLE IF NOT EXISTS `otherimages` (
  `ImageID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemID` int(40) NOT NULL,
  `picture_1` varchar(125) DEFAULT NULL,
  `picture_2` varchar(125) DEFAULT NULL,
  `picture_3` varchar(125) DEFAULT NULL,
  `picture_4` varchar(125) DEFAULT NULL,
  `picture_5` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ImageID`),
  UNIQUE KEY `oImage_oID` (`ImageID`),
  UNIQUE KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE IF NOT EXISTS `others` (
  `oID` int(40) NOT NULL AUTO_INCREMENT,
  `uID` int(40) NOT NULL,
  `oPricesell` varchar(40) DEFAULT NULL,
  `oPriceNego` varchar(40) DEFAULT 'Negotiable',
  `currency` varchar(40) NOT NULL DEFAULT 'Birr',
  `contactMethodCategoryId` int(3) NOT NULL,
  `oLocation` varchar(40) DEFAULT NULL,
  `oExtraInfo` mediumtext,
  `oTitle` varchar(125) NOT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oTotalView` int(10) DEFAULT NULL,
  `oStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `marketCategory` varchar(10) NOT NULL,
  `tempID` int(20) DEFAULT NULL,
  `tableType` int(10) NOT NULL DEFAULT '7',
  PRIMARY KEY (`oID`),
  KEY `uID_FK1` (`uID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`oID`, `uID`, `oPricesell`, `oPriceNego`, `currency`, `contactMethodCategoryId`, `oLocation`, `oExtraInfo`, `oTitle`, `UploadedDate`, `oTotalView`, `oStatus`, `marketCategory`, `tempID`, `tableType`) VALUES
(8, 1, '9000', '', 'Birr', 0, 'Addis Ababa', '', 'my other 1', '2013-09-06 11:21:53', 0, 'Deleted', 'Sale', 1011, 7),
(9, 1, '123232', '', 'Birr', 0, 'Addis Ababa', '', 'tetet', '2013-09-06 11:21:53', 0, 'Deleted', 'Sale', 810, 7),
(10, 1, '121323', '', 'Birr', 0, 'Addis Ababa', '', 'my tt', '2013-09-06 11:21:53', 0, 'Deleted', 'Sale', 534, 7),
(11, 1, '12323', '', 'Birr', 0, 'Addis Ababa', '', 'dsdsdsda', '2013-09-08 13:28:41', 0, 'active', 'Sale', 5330, 7),
(12, 2, '8000', '', 'Birr', 0, 'Addis Ababa', '', 'others check', '2013-09-12 14:29:43', 0, '', 'Sale', 28038, 7),
(13, 2, '5666', '', 'Birr', 0, 'Addis Ababa', 'ggu', 'nice item', '2013-11-06 14:54:27', 0, 'Deleted', 'Sale', 9600, 7),
(14, 1, '0', '', 'Birr', 0, 'Addis Ababa', '', 'asdsddsa', '2013-11-17 19:52:15', 0, '', 'Sale', 13550, 7),
(15, 2, '0', '', 'Birr', 0, 'Addis Ababa', '', 'others price check', '2013-11-30 09:34:06', 0, 'active', 'Sale', 40139, 7),
(16, 1, '0', 'Negotiable', 'Birr', 0, 'Addis Ababa', '', 'newother', '2013-12-04 20:01:00', 0, 'pending', 'sell', 1214, 7),
(17, 9, '0', 'Negotiable', 'Birr', 0, 'Dire Dawa', 'help moving house... call us.\r\n\r\nor leave sms\r\nwe have different types of cars', 'help moving', '2013-12-07 22:44:01', 0, 'Deleted', 'sell', 6743, 7),
(18, 9, '0', 'Negotiable', 'Birr', 0, 'Addis Ababa', 'cheap price', 'We make moving home as easy as possible', '2013-12-08 01:02:14', 0, 'Deleted', 'sell', 41344, 7),
(19, 9, '0', 'Negotiable', 'Birr', 0, 'Addis Ababa', 'We make moving home as easy as possibleWe make moving home as easy as possibleWe make moving home as easy as possibleWe make moving home as easy as possibleWe make moving home as easy as possible', 'We make moving home as easy as possible', '2013-12-08 01:03:44', 0, 'pending', 'sell', 10732, 7),
(20, 9, '99', '', 'Birr', 0, 'Addis Ababa', '999', 'We make moving home as easy as possible', '2013-12-08 01:10:39', 0, 'pending', 'sell', 4919, 7),
(21, 1, '13123123', 'Negotiable', 'Birr', 0, 'Addis Ababa', '', 'myother', '2013-12-08 12:59:46', 0, 'pending', 'sell', 38846, 7),
(22, 2, '1000', '', 'USD', 0, 'Addis Ababa', '', 'biycle', '2013-12-11 15:04:40', 0, 'pending', 'sell', 25442, 7),
(23, 9, '333', '', 'Birr', 0, 'Addis Ababa', 'selling tre......', 'tre ', '2013-12-14 21:11:26', 0, 'pending', 'sell', 2823, 7),
(24, 2, '6565', '', 'Birr', 0, 'Addis Ababa', '', 'gfgdfg', '2013-12-17 16:06:35', 0, 'pending', 'sell', 28440, 7),
(25, 2, '5656', '', 'USD', 0, 'Addis Ababa', '', 'sdfsdf', '2013-12-17 16:24:02', 0, 'pending', 'sell', 6444, 7),
(26, 2, '4434', '', 'USD', 0, 'Debre Zeit', '', 'asdasdas', '2013-12-17 16:26:14', 0, 'pending', 'sell', 515, 7),
(27, 2, '5656', '', 'USD', 0, 'Addis Ababa', '', 'ryery', '2013-12-17 16:43:13', 0, 'pending', 'sell', 13732, 7),
(28, 2, '4344 dollar', '', 'USD', 0, 'Addis Ababa', '', 'sxadas', '2013-12-18 10:05:54', 0, 'pending', 'sell', 86324, 7),
(29, 2, '454', '', 'USD', 0, 'Addis Ababa', '', 'vdsvsdv', '2013-12-18 10:50:47', 0, 'pending', 'sell', 73424, 7),
(30, 2, '56565', 'Negotiable', 'Birr', 0, 'Addis Ababa', '', 'cscssds', '2013-12-18 10:52:22', 0, 'pending', 'sell', 80550, 7),
(31, 2, '5665', '', 'USD', 0, 'Addis Ababa', '', 'cdsv', '2013-12-18 13:15:19', 0, 'pending', 'sell', 25229, 7),
(32, 2, '4545', 'Negotiable', 'USD', 0, 'Addis Ababa', '', 'cgfcgf', '2013-12-18 15:30:59', 0, 'pending', 'sell', 73944, 7),
(33, 2, '676767', '', 'Birr', 0, 'Addis Ababa', '', 'cgfccgf', '2013-12-18 15:31:20', 0, 'pending', 'sell', 14912, 7),
(34, 2, '45', '', 'Birr', 0, 'Addis Ababa', '', 'ffw', '2013-12-18 16:06:06', 0, 'pending', 'sell', 20910, 7),
(35, 2, '6565', 'Negotiable', 'USD', 0, 'Addis Ababa', '', 'fwerwe', '2013-12-24 20:34:15', 0, 'active', 'sell', 77145, 7),
(36, 1, '100000', 'Negotiable', 'USD', 0, 'Addis Ababa', 'OtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTest', 'OtherTest', '2013-12-21 13:47:54', 0, 'active', 'sell', 8939, 7),
(37, 2, '78', '', 'Birr', 0, 'Addis Ababa', '', 'big img', '2014-01-06 11:57:34', 0, 'pending', 'sell', 6025, 7),
(38, 1, '12345', '', 'Birr', 1, 'Addis Ababa', '', 'myother', '2014-01-07 17:15:07', 0, 'Deleted', 'sell', 6959, 7);

-- --------------------------------------------------------

--
-- Table structure for table `othersimages`
--

CREATE TABLE IF NOT EXISTS `othersimages` (
  `ImageID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemID` int(40) NOT NULL,
  `picture_1` varchar(50) DEFAULT NULL,
  `picture_2` varchar(50) DEFAULT NULL,
  `picture_3` varchar(50) DEFAULT NULL,
  `picture_4` varchar(50) DEFAULT NULL,
  `picture_5` varchar(50) DEFAULT NULL,
  `oImgStatus` int(10) DEFAULT NULL,
  PRIMARY KEY (`ImageID`),
  UNIQUE KEY `oImage_oID` (`ImageID`),
  UNIQUE KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `othersimages`
--

INSERT INTO `othersimages` (`ImageID`, `ItemID`, `picture_1`, `picture_2`, `picture_3`, `picture_4`, `picture_5`, `oImgStatus`) VALUES
(1, 15, '663nikon 2.jpeg', NULL, NULL, NULL, NULL, NULL),
(2, 16, '990mbook.jpg', NULL, NULL, NULL, NULL, NULL),
(3, 17, '294index.jpeg', '925images.jpeg', '846images3.jpeg', '428index2.jpeg', '688images3.jpeg', NULL),
(4, 18, '153MOVING HOME 3.jpg', NULL, NULL, NULL, NULL, NULL),
(5, 19, '179index2.jpeg', NULL, NULL, NULL, NULL, NULL),
(6, 23, '64633.jpeg', '300images.jpeg', '435images3.jpeg', '8233.jpeg', '221index.jpeg', NULL),
(7, 37, '608Lighthouse.jpg', NULL, NULL, NULL, NULL, NULL),
(8, 38, '800bo.png', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE IF NOT EXISTS `phone` (
  `pID` int(40) NOT NULL AUTO_INCREMENT,
  `uID` int(40) NOT NULL,
  `pCamera` varchar(40) DEFAULT NULL,
  `pMake` varchar(20) DEFAULT NULL,
  `pModel` varchar(20) DEFAULT NULL,
  `pOS` varchar(20) DEFAULT NULL,
  `pPricesell` varchar(40) DEFAULT NULL,
  `pPriceNego` varchar(20) DEFAULT 'Negotiable',
  `currency` varchar(10) NOT NULL DEFAULT 'Birr',
  `pLocation` varchar(40) DEFAULT NULL,
  `pExtraInfo` mediumtext,
  `pTitle` varchar(125) NOT NULL,
  `UploadedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pTotalView` int(10) DEFAULT NULL,
  `pStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `marketCategory` varchar(10) DEFAULT 'Sale',
  `tempID` int(20) DEFAULT NULL,
  `tableType` int(10) NOT NULL DEFAULT '4',
  `contactMethodCategoryId` int(3) NOT NULL,
  PRIMARY KEY (`pID`),
  KEY `uID_FK1` (`uID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`pID`, `uID`, `pCamera`, `pMake`, `pModel`, `pOS`, `pPricesell`, `pPriceNego`, `currency`, `pLocation`, `pExtraInfo`, `pTitle`, `UploadedDate`, `pTotalView`, `pStatus`, `marketCategory`, `tempID`, `tableType`, `contactMethodCategoryId`) VALUES
(4, 1, '000', '000', '', '', '123456789', '', 'Birr', 'Addis Ababa', '', 'my phone', '2013-12-16 12:50:38', NULL, 'active', 'Sale', 23115, 4, 0),
(5, 1, '', '000', '', '000', '312321312132', '', 'Birr', 'Addis Ababa', '', 'mp', '2013-12-16 12:50:43', NULL, '', 'Sale', 43832, 4, 0),
(6, 2, '000', '000', '', '000', '3000', 'Negotiable', 'Birr', 'Addis Ababa', '', 'phone check', '2013-12-16 12:47:28', NULL, 'active', 'Sale', 15728, 4, 0),
(7, 9, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'one birr', '2013-12-08 01:02:13', NULL, 'Deleted', 'No Action', 41742, 4, 0),
(8, 9, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '333', '333', '2013-12-08 01:02:12', NULL, 'Deleted', 'No Action', 5029, 4, 0),
(9, 9, '12', '000', '', 'iphone', '', 'Negotiable', 'Birr', 'Addis Ababa', 'coooooooool ', 'phone nice ', '2013-12-08 01:02:55', NULL, 'pending', 'No Action', 84138, 4, 0),
(10, 2, '000', '2', '', '000', '', 'Negotiable', 'Birr', 'Gambela', '', 'BB for U', '2013-12-11 15:06:30', NULL, 'pending', 'sell', 8034, 4, 0),
(11, 9, '34', '009', 'latest 5s', 'iphone', '222', 'Negotiable', 'Birr', 'Addis Ababa', 'iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3iphone 3', 'iphone 3', '2013-12-16 13:11:20', NULL, 'active', 'sell', 3514, 4, 0),
(12, 9, '000', '000', 'tt', '000', '', '', 'Birr', 'Addis Ababa', '', 'f', '2013-12-16 13:27:52', NULL, 'active', 'sell', 35249, 4, 0),
(13, 2, 'check', 'check', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'phone check', '2013-12-16 12:39:00', NULL, 'pending', 'sell', 67018, 4, 0),
(14, 2, '000', '000', '', '000', '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'phone check', '2013-12-16 12:39:21', NULL, 'pending', 'sell', 56813, 4, 0),
(15, 2, '34', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'checking the specs', '2013-12-17 14:02:34', NULL, 'pending', 'sell', 8647, 4, 0),
(16, 2, '6.0 - 6.9 megapixles', '000', '', 'iphone', '', '', 'Birr', 'Addis Ababa', '', 'checking the spec', '2013-12-17 14:15:12', NULL, 'pending', 'sell', 95330, 4, 0),
(17, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'price', '2013-12-17 14:16:20', NULL, 'pending', 'sell', 91448, 4, 0),
(18, 2, '000', '000', '', '000', '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'price check', '2013-12-17 14:17:47', NULL, 'pending', 'sell', 9, 4, 0),
(19, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'dsfdsfd', '2013-12-17 16:04:25', NULL, 'pending', 'sell', 53616, 4, 0),
(20, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'ghhg', '2013-12-18 16:23:31', NULL, 'pending', 'sell', 12420, 4, 0),
(21, 2, '000', '000', '', '000', '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'hhhh', '2013-12-18 16:23:46', NULL, 'pending', 'sell', 60815, 4, 0),
(22, 2, '000', '000', '', '000', '', 'Negotiable', 'Birr', 'Addis Ababa', '', 'reerrr', '2013-12-18 16:24:34', NULL, 'pending', 'sell', 47839, 4, 0),
(23, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'dcsc', '2013-12-18 16:57:42', NULL, 'pending', 'sell', 3440, 4, 0),
(24, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'fghh', '2013-12-25 15:08:55', NULL, 'active', 'sell', 57910, 4, 0),
(25, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'dfaf', '2013-12-19 11:03:45', NULL, 'pending', 'sell', 18742, 4, 0),
(26, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'pho', '2013-12-19 11:05:59', NULL, 'pending', 'sell', 92814, 4, 0),
(27, 2, '000', '000', '', '000', '', '', 'Birr', 'Addis Ababa', '', 'now', '2013-12-19 11:06:55', NULL, 'pending', 'sell', 74139, 4, 0),
(28, 2, '000', '000', '', '000', '5656', '', 'USD', 'Addis Ababa', '', 'fsdfds', '2013-12-19 11:54:54', NULL, 'pending', 'sell', 8002, 4, 0),
(29, 2, '000', '000', '', '000', '5656', '', 'Birr', 'Addis Ababa', '', 'dgdfgdf', '2013-12-24 20:34:39', NULL, 'active', 'sell', 24629, 4, 0),
(30, 1, '4.0 - 4.9 megapixles', '13', 'WxS32', 'android', '4230', 'Negotiable', 'Birr', 'Addis Ababa', 'TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE TESTPHONE ', 'TESTPHONE', '2013-12-21 14:43:17', NULL, 'active', 'sell', 61813, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phoneimages`
--

CREATE TABLE IF NOT EXISTS `phoneimages` (
  `ImageID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemID` int(40) NOT NULL,
  `picture_1` varchar(125) DEFAULT NULL,
  `picture_2` varchar(125) DEFAULT NULL,
  `picture_3` varchar(125) DEFAULT NULL,
  `picture_4` varchar(125) DEFAULT NULL,
  `picture_5` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ItemID`),
  UNIQUE KEY `phone_pID` (`ImageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `phoneimages`
--

INSERT INTO `phoneimages` (`ImageID`, `ItemID`, `picture_1`, `picture_2`, `picture_3`, `picture_4`, `picture_5`) VALUES
(1, 9, '64333.jpeg', NULL, NULL, NULL, NULL),
(2, 11, '660images_015.jpeg', '559images_012.jpeg', '267images_020.jpeg', '360images_021.jpeg', '640images_017.jpeg'),
(3, 12, '259images_018.jpeg', '976images_013.jpeg', '373images_011.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tempuser`
--

CREATE TABLE IF NOT EXISTS `tempuser` (
  `tuID` int(40) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone` int(40) NOT NULL,
  `activation` varchar(40) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uTermAndCond` tinyint(1) NOT NULL,
  PRIMARY KEY (`tuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tempuser`
--

INSERT INTO `tempuser` (`tuID`, `username`, `email`, `password`, `firstname`, `lastname`, `address`, `phone`, `activation`, `regDate`, `uTermAndCond`) VALUES
(2, 'jemil', 'tojemil@yahoo.com', '$1$RKg8C.IL$1RmFIgtQk4mJQj/HotPSa.', 'j', 'b', 'Stockholm', 704058174, '145a106fd57a9da7582d7f22be9b8d7d', '2013-12-28 20:06:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uID` int(40) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `uFirstName` varchar(40) DEFAULT NULL,
  `uLastName` varchar(40) DEFAULT NULL,
  `uEmail` varchar(40) NOT NULL DEFAULT '',
  `uPhone` varchar(40) NOT NULL,
  `uAddress` varchar(40) DEFAULT NULL,
  `uPassword` varchar(100) NOT NULL DEFAULT '',
  `uRole` varchar(40) NOT NULL DEFAULT 'user',
  `uContactMethod` varchar(40) NOT NULL,
  `uTermAndCond` tinyint(1) NOT NULL,
  `uDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `uNewPassword` varchar(100) DEFAULT NULL,
  `activation` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `userName`, `uFirstName`, `uLastName`, `uEmail`, `uPhone`, `uAddress`, `uPassword`, `uRole`, `uContactMethod`, `uTermAndCond`, `uDate`, `uNewPassword`, `activation`) VALUES
(1, 'Abiy ', 'Terefe', 'Teshome', 'abiy.terefe@hotmail.com', '00727242210', 'Addis Ababa', '$1$HMyfjD80$zA.feICBx9eSMxF5hTmoF/', 'admin', 'Phone and Email', 0, '2014-01-08 18:44:35', '$1$Z3ePGkQZ$vxa/jfEHmvmKOz1E0nFj8.', '1def0fabca76ef6dcac4fb163de00ceb'),
(2, 'www', 'www', 'www', 'wendeworku@gmail.com', '1', 'ADD', '$1$I05KWw3Y$JkO3l5NRdMmNuK7eRMy8q0', 'admin', '', 0, '2014-01-02 19:28:46', '$1$znTU3uwD$0giEwL8TrMDZT1pHsyaPF0', NULL),
(3, 'jjj', 'jjj', 'jjj', 'jjj@hulutera.com', '1', 'ADD', '123', 'admin', '', 0, '0000-00-00 00:00:00', NULL, NULL),
(4, 'yyy', 'yyy', 'yyy', 'yyy@hulutera.com', '1', 'ADD', '123', 'mod', '', 0, '0000-00-00 00:00:00', NULL, NULL),
(7, 'www', 'wende', 'wefewfew', 'wendeworku@yahoo.com', '0', '', '123', 'user', 'both', 0, '2013-11-06 15:01:11', NULL, NULL),
(8, 'yidne', 'yidne', 'john', 'yidnekachew@gmail.com', '704353114', 'Solna', '$1$hVe9l8y4$hhQ3XeFX7Q3zFaeIwiwjm0', 'user', 'both', 0, '2014-01-14 14:28:10', '$1$XhUbKZt1$txhMiPX8Wh0ZyjdIwQx.z0', NULL),
(9, 'jemil', 's', 'b', 'jemilsh@gmail.com', '70405817', 'Sweden', '$1$UvWBigNj$wsThR3gxariqeixJDxR450', 'user', 'both', 0, '2014-01-13 20:34:27', '$1$zQdd51vI$UdcGl/HangAHmjQjjKqDV1', 'f986bbe2ec3bc5d92e5fbf5d715911b9'),
(10, 'negadiew', 'daniel', 'a', 'dan_assefa@yahoo.com', '0', '', 'leseitye2+', 'user', 'both', 0, '0000-00-00 00:00:00', NULL, NULL),
(11, 'abiy', 'Terefe', 'teshome', 'dochoex@gmail.com', '12121', 'aad', '$1$cPFgGknF$xwzIXuwNjpQY7EEpD1Ovc0', 'user', 'both', 0, '2014-01-09 06:42:08', '$1$cPFgGknF$xwzIXuwNjpQY7EEpD1Ovc0', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abuse`
--
ALTER TABLE `abuse`
  ADD CONSTRAINT `abuse_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `car` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_2` FOREIGN KEY (`computerID`) REFERENCES `computer` (`dID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_3` FOREIGN KEY (`phoneID`) REFERENCES `phone` (`pID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_4` FOREIGN KEY (`householdID`) REFERENCES `household` (`hhID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_5` FOREIGN KEY (`othersID`) REFERENCES `others` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_6` FOREIGN KEY (`abuseCategoryID`) REFERENCES `abusecategory` (`abuseCategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_7` FOREIGN KEY (`userID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_8` FOREIGN KEY (`electronicsID`) REFERENCES `electronics` (`eID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abuse_ibfk_9` FOREIGN KEY (`houseID`) REFERENCES `house` (`hID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`carCategoryID`) REFERENCES `carcategory` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carimages`
--
ALTER TABLE `carimages`
  ADD CONSTRAINT `carimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `car` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `computer_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `computer_ibfk_2` FOREIGN KEY (`compCategoryID`) REFERENCES `computercategory` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computerimages`
--
ALTER TABLE `computerimages`
  ADD CONSTRAINT `computerimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `computer` (`dID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electronics`
--
ALTER TABLE `electronics`
  ADD CONSTRAINT `electronics_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `electronics_ibfk_2` FOREIGN KEY (`electronicsCategoryID`) REFERENCES `electronicscategory` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electronicsimages`
--
ALTER TABLE `electronicsimages`
  ADD CONSTRAINT `electronicsimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `electronics` (`eID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_ibfk_2` FOREIGN KEY (`houseCategoryID`) REFERENCES `housecategory` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `household_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `household_ibfk_2` FOREIGN KEY (`hhCategoryID`) REFERENCES `householdcategory` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `householdimages`
--
ALTER TABLE `householdimages`
  ADD CONSTRAINT `householdimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `household` (`hhID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `houseimages`
--
ALTER TABLE `houseimages`
  ADD CONSTRAINT `houseimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `house` (`hID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `latestupdate`
--
ALTER TABLE `latestupdate`
  ADD CONSTRAINT `latestupdate_ibfk_10` FOREIGN KEY (`hhID`) REFERENCES `household` (`hhID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `latestupdate_ibfk_11` FOREIGN KEY (`pID`) REFERENCES `phone` (`pID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `latestupdate_ibfk_12` FOREIGN KEY (`oID`) REFERENCES `others` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `latestupdate_ibfk_13` FOREIGN KEY (`eID`) REFERENCES `electronics` (`eID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `latestupdate_ibfk_7` FOREIGN KEY (`cID`) REFERENCES `car` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `latestupdate_ibfk_8` FOREIGN KEY (`dID`) REFERENCES `computer` (`dID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `latestupdate_ibfk_9` FOREIGN KEY (`hID`) REFERENCES `house` (`hID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otherimages`
--
ALTER TABLE `otherimages`
  ADD CONSTRAINT `otherimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `others` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `others`
--
ALTER TABLE `others`
  ADD CONSTRAINT `others_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `othersimages`
--
ALTER TABLE `othersimages`
  ADD CONSTRAINT `othersimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `others` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phoneimages`
--
ALTER TABLE `phoneimages`
  ADD CONSTRAINT `phoneimages_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `phone` (`pID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
