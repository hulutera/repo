-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2020 at 09:52 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hulutera_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_abuse`
--

DROP TABLE IF EXISTS `category_abuse`;
CREATE TABLE IF NOT EXISTS `category_abuse` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_abuse`
--

INSERT INTO `category_abuse` (`id`, `field_name`) VALUES
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
-- Table structure for table `category_car`
--

DROP TABLE IF EXISTS `category_car`;
CREATE TABLE IF NOT EXISTS `category_car` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_car`
--

INSERT INTO `category_car` (`id`, `field_name`) VALUES
(1, 'Bus'),
(2, 'Compact Car'),
(3, 'Convertible'),
(4, 'Full Size Van'),
(5, 'Hatchback'),
(6, 'Heavy Machinery'),
(7, 'Liftback'),
(8, 'Luxury car'),
(9, 'Minibus'),
(10, 'Pickup'),
(11, 'Small car'),
(12, 'Sport car'),
(13, 'Station Wagon'),
(14, 'SUV'),
(15, 'Taxi'),
(16, 'Truck'),
(17, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `category_computer`
--

DROP TABLE IF EXISTS `category_computer`;
CREATE TABLE IF NOT EXISTS `category_computer` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_computer`
--

INSERT INTO `category_computer` (`id`, `field_name`) VALUES
(1, 'Laptop'),
(2, 'Notebook'),
(3, 'Stationary'),
(4, 'Tablets'),
(5, 'Workstations'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `category_electronic`
--

DROP TABLE IF EXISTS `category_electronic`;
CREATE TABLE IF NOT EXISTS `category_electronic` (
  `id` int(40) NOT NULL,
  `field_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_electronic`
--

INSERT INTO `category_electronic` (`id`, `field_name`) VALUES
(1, 'Camera'),
(2, 'Refrigerator'),
(3, 'Games'),
(4, 'Headphone'),
(5, 'Watch'),
(6, 'Tape Recorder'),
(7, 'TV'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `category_house`
--

DROP TABLE IF EXISTS `category_house`;
CREATE TABLE IF NOT EXISTS `category_house` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_house`
--

INSERT INTO `category_house` (`id`, `field_name`) VALUES
(1, 'Commercial'),
(2, 'Land'),
(3, 'Condominium'),
(4, 'Residential'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `category_household`
--

DROP TABLE IF EXISTS `category_household`;
CREATE TABLE IF NOT EXISTS `category_household` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_household`
--

INSERT INTO `category_household` (`id`, `field_name`) VALUES
(1, 'Furniture'),
(2, 'Kitchen Stuff'),
(3, 'Shower Stuff'),
(4, 'Other households'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `category_other`
--

DROP TABLE IF EXISTS `category_other`;
CREATE TABLE IF NOT EXISTS `category_other` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_phone`
--

DROP TABLE IF EXISTS `category_phone`;
CREATE TABLE IF NOT EXISTS `category_phone` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_phone`
--

INSERT INTO `category_phone` (`id`, `field_name`) VALUES
(1, 'Cell Phones'),
(2, 'Smart Phone'),
(3, 'Fixed Phone');

-- --------------------------------------------------------

--
-- Table structure for table `item_all`
--

DROP TABLE IF EXISTS `item_all`;
CREATE TABLE IF NOT EXISTS `item_all` (
  `id` int(50) NOT NULL,
  `id_table` int(50) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_all`
--

INSERT INTO `item_all` (`id`, `id_table`, `field_name`) VALUES
(1, 1, 'car'),
(2, 3, 'computer'),
(3, 5, 'electronics'),
(4, 2, 'house'),
(5, 6, 'household'),
(6, 7, 'others'),
(7, 4, 'phone');

-- --------------------------------------------------------

--
-- Table structure for table `item_car`
--

DROP TABLE IF EXISTS `item_car`;
CREATE TABLE IF NOT EXISTS `item_car` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL DEFAULT 'phone',
  `field_price_rent` varchar(40) DEFAULT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT 'Negotiable',
  `field_price_rate` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_make` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `field_model` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `field_model_year` year(4) DEFAULT NULL,
  `field_no_of_seat` int(40) DEFAULT NULL,
  `field_fuel_type` varchar(20) DEFAULT NULL,
  `field_color` varchar(20) DEFAULT NULL,
  `field_gear_type` varchar(20) DEFAULT NULL,
  `field_milage` varchar(20) DEFAULT NULL,
  `field_image` longtext,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` longtext,
  `field_title` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(15) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uID_FK1` (`id_user`),
  KEY `ccategoryID_FK` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_car`
--

INSERT INTO `item_car` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_rent`, `field_price_sell`, `field_price_nego`, `field_price_rate`, `field_price_currency`, `field_make`, `field_model`, `field_model_year`, `field_no_of_seat`, `field_fuel_type`, `field_color`, `field_gear_type`, `field_milage`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_market_category`, `field_table_type`) VALUES
(119, 1, 12, 11, 'phone', '1500', '35000', 'Yes', 'hourly', 'ETB', 'saab', 'Saad 9.5 2.0 Turbo', 2005, 1, 'Besine', '#c0c0c0', 'Manual', '40000-44999', '[\"hulutera_user_id_12_item_temp_id_1_20170505_202717.jpg\",\"hulutera_user_id_12_item_temp_id_1_20170506_072350-COLLAGE.jpg\",\"hulutera_user_id_12_item_temp_id_1_20170506_072702-COLLAGE.jpg\",\"hulutera_user_id_12_item_temp_id_1_20170506_075420-COLLAGE.jpg\",\"hulutera_user_id_12_item_temp_id_1_20170506_075447.jpg\"]', 'Addis Ababa', NULL, 'My First Car', '2020-03-25 11:18:43', NULL, 'pending', 'rent and sell', 1),
(120, 2, 12, 2, 'phone', '12234', '0', 'No', 'á‰ á‰€áŠ•', 'USD', 'audi', 'asdasdsad', 2005, 66, 'Besine/Electric', '#009f6b', 'Manual', '2500000-2999999', '[\"hulutera_user_id_12_item_temp_id_2_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'sdadsasda', '2020-04-11 08:39:49', NULL, 'pending', 'rent and sell', 1),
(121, 3, 12, 2, 'both', NULL, '12300', 'yes', NULL, 'ETB', 'aston-martin', 'my model', 2005, 1, 'bensine', 'silver', 'manual', '2500000-2999999', '[\"hulutera (2).jpg\"]', 'Addis Ababa', NULL, 'My car', '2020-04-14 05:19:55', NULL, 'pending', 'rent and sell', 1),
(122, 4, 12, 2, 'both', NULL, '12300', 'yes', NULL, 'ETB', 'aston-martin', 'my model', 2005, 1, 'bensine', 'silver', 'manual', '2500000-2999999', '[\"hulutera_user_id_12_item_temp_id_4_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'My car', '2020-04-14 05:21:49', NULL, 'pending', 'rent and sell', 1),
(123, 5, 12, 2, 'both', NULL, '12300', 'yes', NULL, 'ETB', 'aston-martin', 'my model', 2005, 1, 'bensine', 'silver', 'manual', '2500000-2999999', '[\"hulutera (1).jpg\"]', 'Addis Ababa', NULL, 'My car', '2020-04-14 06:12:33', NULL, 'pending', 'sell', 1),
(124, 6, 12, 2, 'both', '1200', '12000', 'yes', 'daily', 'ETB', 'aston-martin', 'my model', 2005, 1, 'bensine', 'silver', 'manual', '2500000-2999999', '[\"hulutera_user_id_12_item_temp_id_6_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'My car', '2020-04-14 06:13:47', NULL, 'pending', 'rent and sell', 1),
(125, 7, 12, 2, 'both', '1200', '14500', 'yes', 'daily', 'ETB', 'aston-martin', 'model', 2005, 1, 'bensine', 'silver', 'manual', '2500000-2999999', '[\"hulutera_user_id_12_item_temp_id_7_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'title', '2020-04-14 06:15:56', NULL, 'pending', 'rent and sell', 1),
(126, 8, 12, 2, 'e-mail', '12312323', '123123', 'yes', 'yearly', 'USD', 'chevrolet-truck', 'asdsadsd', 2019, 86, 'bensine', 'red', 'manual', '1000000-1499999', '[\"hulutera_user_id_12_item_temp_id_8_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'asdsad', '2020-04-14 06:43:02', NULL, 'pending', 'rent and sell', 1),
(127, 9, 12, 2, 'e-mail', NULL, '466454', 'yes', 'default', 'ETB', 'gmc', 'xxxxxxxx', 2019, 71, 'electric', 'black', 'automatic', '500000-999999', '[\"hulutera_user_id_12_item_temp_id_9_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'asdasdasd', '2020-04-14 08:23:17', NULL, 'pending', 'sell', 1),
(128, 10, 12, 13, 'both', '45000', '450000', 'yes', 'monthly', 'ETB', 'saab', '9.5 Tubro 2.0', 2005, 1, 'bensine', 'silver', 'manual', '3000000-3499999', '[\"hulutera_user_id_12_item_temp_id_10_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'saab', '2020-04-14 21:51:53', NULL, 'pending', 'rent and sell', 1),
(129, 11, 12, 15, 'both', '12312312', '23123', 'yes', 'daily', 'ETB', 'audi', 'asdsads', 2003, 25, 'bensine-electric', 'yellow', 'manual', '1000000-1499999', '[\"hulutera_user_id_12_item_temp_id_11_SAAB-9-5-00.jpg\"]', 'Mekele', NULL, 'kemey', '2020-04-15 20:31:26', NULL, 'pending', 'rent and sell', 1),
(130, 12, 12, 2, 'both', '12345', '8854', 'yes', 'hourly', 'ETB', 'infiniti', 'ok45123', 2020, NULL, 'bensine', 'black', 'automatic', '0-499999', '[\"hulutera_user_id_12_item_temp_id_12_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'lovely car', '2020-04-15 21:50:31', NULL, 'pending', 'rent and sell', 1),
(131, 13, 12, 16, 'phone', '1232', NULL, 'yes', 'hourly', 'ETB', 'gmc-truck', 'asdsad', 2007, 55, 'diesel', 'green', 'automatic', '500000-999999', '[\"hulutera (1).jpg\"]', 'Asella', NULL, 'asd', '2020-04-18 16:53:58', NULL, 'pending', 'rent', 1),
(132, 14, 12, 16, 'phone', '1234', NULL, 'yes', 'daily', 'ETB', 'ford', 'asds', 2008, 75, 'bensine-electric', 'black', 'manual', '500000-999999', '[\"hulutera (2).jpg\"]', 'Ambo', NULL, 'a', '2020-04-20 04:16:26', NULL, 'pending', 'rent', 1),
(133, 15, 12, 2, 'both', '1234', NULL, 'yes', 'hourly', 'ETB', 'audi', 'asdacaw', 2020, NULL, 'bensine', 'black', 'manual', '0-499999', '[\"hulutera_user_id_12_item_temp_id_15_SAAB-9-5-00.jpg\"]', 'Debre Birhan', NULL, 'xadk', '2020-04-20 05:22:22', NULL, 'pending', 'rent', 1),
(134, 15, 12, 2, 'both', '1234', NULL, 'yes', 'hourly', 'ETB', 'audi', 'asdacaw', 2020, NULL, 'bensine', 'black', 'manual', '0-499999', '[\"hulutera_user_id_12_item_temp_id_15_SAAB-9-5-00.jpg\"]', 'Debre Birhan', NULL, 'xadk', '2020-04-20 05:22:22', NULL, 'pending', 'rent', 1),
(135, 16, 12, 2, 'both', '45150', NULL, 'yes', 'daily', 'ETB', 'audi', 'asdacaw', 2020, NULL, 'bensine', 'black', 'manual', '0-499999', '[\"hulutera_user_id_12_item_temp_id_16_SAAB-9-5-00.jpg\"]', 'Debre Birhan', NULL, 'xadk', '2020-04-20 05:38:18', NULL, 'pending', 'rent', 1),
(136, 17, 12, 2, 'both', '12000', NULL, 'Yes', 'monthly', 'ETB', 'bentley', 'K45T', 2011, 6, 'Bensine', 'green', 'Semi-automatic', '200000-249999', '[\"hulutera_user_id_12_item_temp_id_17_download.jpg\"]', 'Addis Ababa', NULL, 'my new car', '2020-05-16 06:49:15', NULL, 'pending', 'rent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_computer`
--

DROP TABLE IF EXISTS `item_computer`;
CREATE TABLE IF NOT EXISTS `item_computer` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_made` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `field_os` varchar(20) DEFAULT NULL,
  `field_model` varchar(20) DEFAULT NULL,
  `field_processor` varchar(20) DEFAULT NULL,
  `field_ram` varchar(20) DEFAULT NULL,
  `field_hard_drive` varchar(20) DEFAULT NULL,
  `field_color` varchar(20) DEFAULT NULL,
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `uID_FK2` (`id_user`),
  KEY `d_CategoryID_FK` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_computer`
--

INSERT INTO `item_computer` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_made`, `field_os`, `field_model`, `field_processor`, `field_ram`, `field_hard_drive`, `field_color`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_market_category`, `field_table_type`) VALUES
(5, 97839, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '1', '1', '', NULL, '', 'Addis Ababa', 'Test ', 'Checking', '2020-02-04 22:22:29', NULL, 'active', 'No Action', 3),
(6, 77726, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '1', '3', '2', NULL, '', 'Addis Ababa', 'new', 'Test items', '2013-11-29 22:16:14', NULL, 'Deleted', 'No Action', 3),
(7, 4612, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '5', '2', '3', NULL, '', 'Addis Ababa', 'Another one', 'mini', '2013-11-29 22:04:09', NULL, 'Deleted', 'No Action', 3),
(8, 94528, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '5', '2', '3', NULL, '', 'Addis Ababa', 'Another one', 'mini', '2020-02-04 22:22:30', NULL, 'active', 'No Action', 3),
(9, 69239, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '2', '2', '3', NULL, '', 'Addis Ababa', '', 'The first item', '2013-12-01 15:12:21', NULL, 'active', 'No Action', 3),
(13, 3033, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', 'Description', 'Comp title', '2013-11-29 22:05:34', NULL, 'Deleted', 'No Action', 3),
(14, 5729, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'sfwef', '2013-12-01 15:12:14', NULL, 'active', 'No Action', 3),
(20, 14425, 1, 1, '0', '3232321312', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'myc', '2013-12-01 15:12:06', NULL, 'active', 'Sale', 3),
(21, 47542, 2, 1, '0', '10,000', 'Negotiable', 'Birr', '', 'windows', NULL, '3', '', '', NULL, '', 'Addis Ababa', '', 'Comp title', '2013-12-04 18:43:43', NULL, 'Deleted', 'Sale', 3),
(23, 94313, 1, 1, '0', '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'sdsadasd', '2013-12-01 15:11:41', NULL, 'active', 'Sale', 3),
(24, 97130, 2, 4, '0', '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Awassa', '', 'LCD', '2020-02-04 22:22:22', NULL, 'active', 'sell', 3),
(25, 57836, 2, 2, '0', '0', 'Negotiable', 'Birr', 'apple', 'unix', 'macbookAir', '', '', '', NULL, '', 'Addis Ababa', '', 'apple', '2020-02-04 22:22:20', NULL, 'active', 'sell', 3),
(26, 98513, 2, 1, '0', '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'comp only with title', '2020-02-04 22:22:18', NULL, 'active', 'sell', 3),
(27, 62641, 2, 2, '0', '0', 'Negotiable', 'Birr', 'acer', 'windows', NULL, '2', '2', '3', NULL, '', 'Addis Ababa', 'Nice PC', 'comp with all but not negotiable', '2020-02-04 22:22:18', NULL, 'active', 'sell', 3),
(28, 5432, 2, 1, '0', '0', 'Negotiable', 'Birr', '', 'windows', NULL, '1.5 - 1.99GHz', '1.0 - 1.9GB', '200 - 299GB', NULL, '', 'Addis Ababa', '', 'checking the spec', '2020-02-04 22:22:18', NULL, 'active', 'sell', 3),
(29, 49645, 2, 1, '0', '0', 'pending', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'price check without nego', '2013-12-17 15:13:29', NULL, '', 'sell', 3),
(30, 22620, 2, 1, '0', '0', 'pending', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'cascad', '2013-12-17 15:15:30', NULL, '', 'sell', 3),
(31, 22347, 2, 1, '0', '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'price fix comp', '2020-02-04 22:22:17', NULL, 'active', 'sell', 3),
(32, 78018, 2, 1, '0', '0', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'nego comp', '2020-02-04 22:22:17', NULL, 'active', 'sell', 3),
(33, 56533, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'price check without nego', '2020-02-04 22:22:17', NULL, 'active', 'sell', 3),
(34, 49315, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'dasfsd', '2020-02-02 20:16:46', NULL, 'active', 'sell', 3),
(35, 11917, 2, 1, '0', '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'fwfew', '2020-02-02 20:16:38', NULL, 'active', 'sell', 3),
(36, 9963, 2, 1, '0', '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'sdxasdas', '2020-02-02 20:16:38', NULL, 'active', 'sell', 3),
(37, 4802, 2, 1, '0', '0', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'dasdfe', '2020-02-02 20:16:37', NULL, 'active', 'sell', 3),
(38, 6949, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'sdasdas', '2020-02-02 20:14:26', NULL, 'active', 'sell', 3),
(39, 35333, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'fdsfsdf', '2020-02-02 20:14:25', NULL, 'active', 'No Action', 3),
(40, 42819, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', '5454', '2020-02-02 20:14:23', NULL, 'active', 'No Action', 3),
(41, 1421, 2, 1, '0', '', '', 'Birr', '000', 'windows', NULL, '000', '000', '000', NULL, '', 'Addis Ababa', '', 'nnnn', '2020-02-02 20:14:22', NULL, 'active', 'No Action', 3),
(42, 79748, 2, 1, '0', '', '', 'Birr', '000', 'windows', NULL, '000', '000', '000', NULL, '', 'Addis Ababa', '', 'sfdfd', '2020-02-02 20:14:19', NULL, 'active', 'sell', 3),
(43, 29735, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'cfsd', '2020-01-24 16:15:53', NULL, 'active', 'sell', 3),
(44, 1296, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'yyyy', '2020-01-24 16:15:52', NULL, 'active', 'sell', 3),
(45, 22015, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'wefe', '2020-01-24 16:15:46', NULL, 'active', 'sell', 3),
(46, 94215, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'fgdg', '2020-01-24 16:15:38', NULL, 'active', 'sell', 3),
(47, 36639, 2, 1, '0', '', '', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', '545', '2020-01-24 16:15:37', NULL, 'active', 'sell', 3),
(48, 37521, 2, 1, '0', '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'tttt', '2020-01-24 16:15:35', NULL, 'active', 'sell', 3),
(49, 72825, 2, 1, '0', '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'fgdfg', '2020-01-24 16:15:35', NULL, 'active', 'sell', 3),
(50, 9212, 2, 1, '0', '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'erwer', '2020-01-24 16:15:34', NULL, 'active', 'sell', 3),
(51, 1745, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'dawf', '2020-01-24 16:15:34', NULL, 'active', 'sell', 3),
(52, 32611, 2, 1, '0', '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'wetwe', '2020-01-24 16:15:34', NULL, 'active', 'sell', 3),
(53, 52117, 2, 1, '0', '', '', 'USD', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'afew', '2020-01-24 16:15:33', NULL, 'active', 'sell', 3),
(54, 4049, 2, 1, '0', '4545', '', 'USD', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'ertert', '2020-01-24 16:15:33', NULL, 'active', 'sell', 3),
(55, 95542, 2, 1, '0', '5656', 'Negotiable', 'USD', '', 'windows', NULL, '', '', '', NULL, '', 'Addis Ababa', '', 'com', '2020-01-24 16:15:32', NULL, 'active', 'sell', 3),
(56, 17650, 1, 1, '0', '12321', 'Negotiable', 'Birr', '', 'windows', NULL, '2.5 - 2.99GHz', '1.0 - 1.9GB', '300 - 499GB', NULL, '', 'Addis Ababa', 'TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer TestComputer ', 'TestComputer', '2013-12-21 14:30:49', NULL, 'active', 'sell', 3),
(57, 17651, 12, 4, 'email', '78978', 'Yes', 'ETB', 'alienware', 'Windows', 'adsfasds', '1.0 - 1.49GHz', 'Under 1GB', '200 - 299GB', '#000000', '[\"hulutera (3).jpg\"]', 'Bahir Dar', NULL, 'asdsads', '2020-03-28 11:53:54', NULL, 'pending', 'sell', 1),
(58, 17652, 12, 4, 'email', '78978', 'Yes', 'ETB', 'alienware', 'Windows', 'adsfasds', '1.0 - 1.49GHz', 'Under 1GB', '200 - 299GB', '#000000', '[\"hulutera_user_id_12_item_temp_id_17652_dell-latitude-7400-core-i5-16gb-512gb-ssd-14.jpg\"]', 'Bahir Dar', NULL, 'asdsads', '2020-03-28 11:54:19', NULL, 'pending', 'sell', 1),
(59, 17653, 12, 4, 'email', '78978', 'Yes', 'ETB', 'alienware', 'Windows', 'adsfasds', '1.0 - 1.49GHz', 'Under 1GB', '200 - 299GB', '#000000', '[\"hulutera_user_id_12_item_temp_id_17653_dell-latitude-7400-core-i5-16gb-512gb-ssd-14.jpg\"]', 'Bahir Dar', NULL, 'asdsads', '2020-03-28 11:54:49', NULL, 'pending', 'sell', 1),
(60, 17654, 12, 2, 'both', '465465', 'yes', 'ETB', 'apple', 'Unix', 'asdsads', '2.0 - 2.49GHz', 'Over 4.0GB', 'Over 500GB', 'red', '[\"hulutera (7).jpg\"]', 'Addis Ababa', NULL, 'asdasdasd', '2020-04-18 05:07:51', NULL, 'pending', 'sell', 3),
(61, 17654, 12, 2, 'both', '465465', 'yes', 'ETB', 'apple', 'Unix', 'asdsads', '2.0 - 2.49GHz', 'Over 4.0GB', 'Over 500GB', 'red', '[\"hulutera (7).jpg\"]', 'Addis Ababa', NULL, 'asdasdasd', '2020-04-18 05:07:51', NULL, 'pending', 'sell', 3),
(62, 17655, 12, 2, 'both', '7840', 'yes', 'ETB', 'apple', 'Unix', 'asdsads', '2.0 - 2.49GHz', 'Over 4.0GB', 'Over 500GB', 'red', '[\"hulutera_user_id_12_item_temp_id_17655_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'asdasdasd', '2020-04-18 05:09:26', NULL, 'pending', 'sell', 3),
(63, 17656, 12, 2, 'both', '9999', 'yes', 'ETB', 'sony', 'Linux', 'sadsad ', '1.0 - 1.49GHz', '1.0 - 1.9GB', 'Under 200GB', 'green', '[\"hulutera_user_id_12_item_temp_id_17656_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'asdasd', '2020-04-18 05:12:19', NULL, 'pending', 'sell', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_electronic`
--

DROP TABLE IF EXISTS `item_electronic`;
CREATE TABLE IF NOT EXISTS `item_electronic` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT 'Negotiable',
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  KEY `uID_FK1` (`id_user`),
  KEY `electronicsCategrogyID` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_electronic`
--

INSERT INTO `item_electronic` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_market_category`, `field_table_type`) VALUES
(1, 11238, 2, 8, '0', '0', '', 'Birr', '', 'Addis Ababa', 'ddewdew', 'Elect', '2013-09-06 09:37:18', NULL, '', 'No Action', 5),
(2, 99348, 2, 2, '0', '0', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'camera', '2013-11-30 09:31:07', NULL, 'active', 'No Action', 5),
(6, 70435, 1, 8, '0', '0', '', 'Birr', '', 'Addis Ababa', '', 'adsdsds', '2013-11-17 19:51:53', NULL, '', 'No Action', 5),
(7, 55622, 1, 8, '0', '0', '', 'Birr', '', 'Addis Ababa', '', 'adsadsad', '2013-11-17 19:51:53', NULL, '', 'No Action', 5),
(8, 28731, 2, 1, '0', '0', 'Negotiable', 'Birr', '', 'Dire Dawa', '', 'my tv for you', '2020-02-04 22:22:23', NULL, 'active', 'No Action', 5),
(9, 92420, 2, 8, '0', '0', '', 'Birr', '', 'Addis Ababa', '', 'sdfsdfsd', '2020-02-02 20:16:35', NULL, 'active', 'No Action', 5),
(10, 54729, 2, 8, '0', '', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'fdsf', '2020-01-24 16:15:52', NULL, 'active', 'sell', 5),
(11, 50623, 2, 8, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'gggg', '2020-01-24 16:15:52', NULL, 'active', 'sell', 5),
(12, 12320, 2, 8, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'fsdfd', '2020-01-24 16:15:48', NULL, 'active', 'sell', 5),
(13, 8026, 2, 8, '0', '4444', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'Elect', '2020-01-24 16:15:36', NULL, 'active', 'sell', 5),
(14, 4935, 2, 8, '0', '6565', '', 'Birr', '', 'Addis Ababa', '', 'dgsg', '2020-01-24 16:15:34', NULL, 'active', 'sell', 5),
(15, 4936, 12, 3, 'email', '1200', 'Yes', 'ETB', '[\"hulutera_user_id_12_item_temp_id_4936_SAAB-9-5-00.jpg\"]', 'Addis Ababa', 'Cool Game', 'My Electronic input ', '2020-04-01 19:33:22', NULL, 'pending', 'sell', 1),
(16, 4937, 12, 3, 'email', '12002', 'Yes', 'ETB', '[\"hulutera_user_id_12_item_temp_id_4937_SAAB-9-5-00.jpg\"]', 'Addis Ababa', 'Cool Game', 'My Electronic input ', '2020-04-01 19:35:51', NULL, 'pending', 'sell', 1),
(17, 4937, 12, 3, 'email', '12002', 'Yes', 'ETB', '[\"hulutera_user_id_12_item_temp_id_4937_SAAB-9-5-00.jpg\"]', 'Addis Ababa', 'Cool Game', 'My Electronic input ', '2020-04-01 19:35:51', NULL, 'pending', 'sell', 1),
(18, 4938, 12, 2, 'both', '78000', 'yes', 'ETB', '[\"hulutera (2).jpg\"]', 'Addis Ababa', NULL, 'my electecton', '2020-04-18 10:27:49', NULL, 'pending', 'sell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_electronic_memory`
--

DROP TABLE IF EXISTS `item_electronic_memory`;
CREATE TABLE IF NOT EXISTS `item_electronic_memory` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_made` varchar(20) DEFAULT NULL,
  `field_type` varchar(20) DEFAULT NULL,
  `field_size` varchar(20) DEFAULT NULL,
  `field_color` varchar(20) DEFAULT NULL,
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext,
  `field_title` varchar(125) DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `uID_FK2` (`id_user`),
  KEY `d_CategoryID_FK` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_electronic_sound`
--

DROP TABLE IF EXISTS `item_electronic_sound`;
CREATE TABLE IF NOT EXISTS `item_electronic_sound` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_made` varchar(20) DEFAULT NULL,
  `field_type` varchar(20) DEFAULT NULL,
  `field_size` varchar(20) DEFAULT NULL,
  `field_color` varchar(20) DEFAULT NULL,
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext,
  `field_title` varchar(125) DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `uID_FK2` (`id_user`),
  KEY `d_CategoryID_FK` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_electronic_tv`
--

DROP TABLE IF EXISTS `item_electronic_tv`;
CREATE TABLE IF NOT EXISTS `item_electronic_tv` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_made` varchar(20) DEFAULT NULL,
  `field_screen_size` varchar(20) DEFAULT NULL,
  `field_panel` varchar(20) DEFAULT NULL,
  `field_energy_class` varchar(20) NOT NULL,
  `field_color` varchar(20) DEFAULT NULL,
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext,
  `field_title` varchar(125) DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `uID_FK2` (`id_user`),
  KEY `d_CategoryID_FK` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_electronic_white`
--

DROP TABLE IF EXISTS `item_electronic_white`;
CREATE TABLE IF NOT EXISTS `item_electronic_white` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_made` varchar(20) DEFAULT NULL,
  `field_type` varchar(20) DEFAULT NULL,
  `field_size` varchar(20) DEFAULT NULL,
  `field_color` varchar(20) DEFAULT NULL,
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext,
  `field_title` varchar(125) DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `uID_FK2` (`id_user`),
  KEY `d_CategoryID_FK` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_house`
--

DROP TABLE IF EXISTS `item_house`;
CREATE TABLE IF NOT EXISTS `item_house` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) NOT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_rent` varchar(40) DEFAULT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT 'Negotiable',
  `field_price_rate` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(10) DEFAULT 'Birr',
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_kebele` int(10) DEFAULT NULL,
  `field_wereda` int(10) DEFAULT NULL,
  `field_lot_size` int(10) DEFAULT NULL,
  `field_nr_bedroom` int(10) DEFAULT NULL,
  `field_toilet` int(10) DEFAULT NULL,
  `field_bathroom` int(10) DEFAULT NULL,
  `field_build_year` year(4) DEFAULT NULL,
  `field_water` varchar(10) DEFAULT NULL,
  `field_electricity` varchar(10) DEFAULT NULL,
  `field_extra_info` mediumtext,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(15) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `uID_FK3` (`id_user`),
  KEY `hCategoryID_FK` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_house`
--

INSERT INTO `item_house` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_rent`, `field_price_sell`, `field_price_nego`, `field_price_rate`, `field_price_currency`, `field_image`, `field_location`, `field_kebele`, `field_wereda`, `field_lot_size`, `field_nr_bedroom`, `field_toilet`, `field_bathroom`, `field_build_year`, `field_water`, `field_electricity`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_market_category`, `field_table_type`) VALUES
(4, 33419, 2, 1, '0', '', '', '', '', 'Birr', '', 'Addis Ababa', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'house check', '2013-12-01 13:31:04', NULL, 'active', 'sell', 2),
(5, 41748, 2, 1, '0', '50000 birr', '', '', '6month', 'Birr', '', 'Adama', 0, 0, 0, 1, 1, 0, 0000, '1', '1', '', 'House', '2020-02-04 22:22:23', NULL, 'active', 'Rent', 2),
(17, 35119, 12, 4, 'phone', '1000', '0', 'Yes', 'monthly', 'ETB', '[\"hulutera (2).jpg\"]', 'Addis Ababa', 3, 3, NULL, 2, 2, 3, 2005, 'Yes', 'Yes', NULL, 'qawsdasdsads', '2020-04-02 05:39:00', NULL, 'pending', 'rent and sell', 1),
(18, 35119, 12, 4, 'phone', '1000', '0', 'Yes', 'monthly', 'ETB', '[\"hulutera (2).jpg\"]', 'Addis Ababa', 3, 3, NULL, 2, 2, 3, 2005, 'Yes', 'Yes', NULL, 'qawsdasdsads', '2020-04-02 05:39:00', NULL, 'pending', 'rent and sell', 1),
(19, 35120, 12, 3, 'phone', '4500', '0', 'Yes', 'monthly', 'ETB', '[\"hulutera_user_id_12_item_temp_id_35120_SAAB-9-5-00.jpg\"]', 'Addis Ababa', 3, 3, NULL, 2, 2, 3, 2005, 'Yes', 'Yes', NULL, 'zzzzzzzzzzzzzz', '2020-04-02 05:40:04', NULL, 'pending', 'rent and sell', 1),
(20, 35121, 12, 4, 'phone', '12400', '0', 'Yes', 'monthly', 'ETB', '[\"hulutera (1).jpg\"]', 'Addis Ababa', 1, 3, NULL, 2, 5, 3, 2018, 'Yes', 'Yes', NULL, 'asdsadsadsads', '2020-04-02 17:53:19', NULL, 'pending', 'rent and sell', 1),
(21, 35121, 12, 4, 'phone', '12400', '0', 'Yes', 'monthly', 'ETB', '[\"hulutera (1).jpg\"]', 'Addis Ababa', 1, 3, NULL, 2, 5, 3, 2018, 'Yes', 'Yes', NULL, 'asdsadsadsads', '2020-04-02 17:53:19', NULL, 'pending', 'rent and sell', 1),
(22, 35122, 12, 4, 'phone', '1200', '0', 'Yes', 'monthly', 'ETB', '[\"hulutera_user_id_12_item_temp_id_35122_SAAB-9-5-00.jpg\"]', 'Addis Ababa', 1, 3, NULL, 2, 5, 3, 2018, 'Yes', 'Yes', NULL, 'asdsadsadsads', '2020-04-02 17:55:41', NULL, 'pending', 'rent and sell', 1),
(23, 35123, 12, 1, 'both', '12323', NULL, 'yes', 'daily', 'USD', '[\"hulutera (9).jpg\"]', 'Mekele', 2, 2, NULL, 16, 17, 18, 1950, 'yes', 'yes', NULL, 'xasde', '2020-04-20 06:36:04', NULL, 'pending', 'rent', 1),
(24, 35123, 12, 1, 'both', '12323', NULL, 'yes', 'daily', 'USD', '[\"hulutera (9).jpg\"]', 'Mekele', 2, 2, NULL, 16, 17, 18, 1950, 'yes', 'yes', NULL, 'xasde', '2020-04-20 06:36:04', NULL, 'pending', 'rent', 1),
(25, 35124, 12, 2, 'both', NULL, '1232', 'yes', NULL, 'USD', '[\"hulutera (4).jpg\"]', 'Adama', 3, 4, NULL, NULL, NULL, NULL, NULL, 'ongoing', 'no', NULL, 'qweqwe', '2020-04-20 10:44:40', NULL, 'pending', 'sell', 1),
(26, 35125, 12, 2, 'both', NULL, '120000', 'yes', NULL, 'USD', '[\"hulutera_user_id_12_item_temp_id_35125_SAAB-9-5-00.jpg\"]', 'Adama', 3, 4, 4500, NULL, NULL, NULL, NULL, 'ongoing', 'no', NULL, 'my land', '2020-04-20 10:49:34', NULL, 'pending', 'sell', 1),
(27, 35126, 12, 4, 'e-mail', '4510', '9999000', 'yes', 'monthly', 'ETB', '[\"hulutera_user_id_12_item_temp_id_35126_SAAB-9-5-00.jpg\"]', 'Bahir Dar', 3, 3, NULL, 11, 17, 18, 1940, 'yes', 'yes', NULL, 'my villa', '2020-04-20 10:51:23', NULL, 'pending', 'rent and sell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_household`
--

DROP TABLE IF EXISTS `item_household`;
CREATE TABLE IF NOT EXISTS `item_household` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(50) DEFAULT NULL,
  `field_price_nego` varchar(50) DEFAULT 'Negotiable',
  `field_price_currency` varchar(10) NOT NULL DEFAULT 'Birr',
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` longtext CHARACTER SET utf8,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL DEFAULT 'Sale',
  `field_table_type` int(10) NOT NULL DEFAULT '6',
  PRIMARY KEY (`id`),
  KEY `uID_FK1` (`id_user`),
  KEY `hhcategoryID_FK` (`id_category`),
  KEY `marketCategory` (`field_market_category`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_household`
--

INSERT INTO `item_household` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_market_category`, `field_table_type`) VALUES
(2, 27715, 1, 1, '0', '123456878', '', 'Birr', '', 'Addis Ababa', '', 'my hh', '2013-09-06 11:24:42', 0, '', 'Sale', 6),
(3, 50225, 1, 1, '0', '123124124123', '', 'Birr', '', 'Addis Ababa', '', 'my hh', '2013-09-06 11:31:53', 0, '', 'Sale', 6),
(4, 72615, 2, 1, '0', '555', '', 'Birr', '', 'Addis Ababa', '', 'household check', '2013-11-29 17:51:17', 0, '', 'Sale', 6),
(5, 77237, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', 'a nice item for U.', 'FuBu', '2013-11-29 17:55:55', 0, '', 'No Action', 6),
(6, 4014, 1, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'test', '2013-11-17 19:51:53', 0, '', 'No Action', 6),
(7, 94746, 2, 1, '0', '0', 'Negotiable', 'Birr', '', 'Shashemene', '', 'Sofa', '2020-02-04 22:22:22', 0, 'active', 'sell', 6),
(8, 458, 2, 1, '0', '0', '', 'Birr', '', 'Addis Ababa', '', 'sxdasda', '2020-02-02 20:16:37', 0, 'active', 'sell', 6),
(9, 74815, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'hh pr', '2020-02-02 20:14:18', 0, 'active', 'No Action', 6),
(10, 840, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'dss', '2020-02-02 20:14:17', 0, 'active', 'No Action', 6),
(11, 14012, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'ffff', '2020-02-02 20:14:16', 0, 'active', 'sell', 6),
(12, 50749, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', 'sadsa', 'fsfs', '2020-02-01 15:12:18', 0, 'active', 'sell', 6),
(13, 26714, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'fdf', '2020-02-01 15:12:15', 0, 'active', 'sell', 6),
(14, 77831, 2, 2, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'fsdfdsf', '2020-02-01 15:12:13', 0, 'active', 'sell', 6),
(15, 19336, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'sdasdas', '2020-02-01 15:12:11', 0, 'active', 'sell', 6),
(16, 57844, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', 'dasdas', 'dsd', '2020-02-01 15:12:06', 0, 'active', 'sell', 6),
(17, 50318, 2, 4, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'dcsdfsd', '2020-02-01 15:11:56', 0, 'active', 'sell', 6),
(18, 56636, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'sffwfe', '2020-01-24 16:15:57', 0, 'active', 'sell', 6),
(19, 70436, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'ggggg', '2020-01-24 16:15:55', 0, 'active', 'sell', 6),
(20, 85441, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'dgdg', '2020-01-24 16:15:55', 0, 'active', 'sell', 6),
(21, 8138, 2, 1, '0', '', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'gfgf', '2020-01-24 16:15:54', 0, 'active', 'sell', 6),
(22, 40324, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'dvdsgvd', '2020-01-24 16:15:48', 0, 'active', 'sell', 6),
(23, 1916, 2, 1, '0', '', '', 'Birr', '', 'Addis Ababa', '', 'gge', '2020-01-24 16:15:37', 0, 'active', 'sell', 6),
(24, 81431, 2, 1, '0', '5555', '', 'USD', '', 'Addis Ababa', '', 'HH', '2013-12-25 15:08:12', 0, 'active', 'sell', 6),
(25, 135, 2, 1, '0', '565656', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'hh', '2013-12-25 15:00:13', 0, 'active', 'sell', 6),
(26, 734, 2, 1, '0', '56656', '', 'USD', '', 'Addis Ababa', '', '6556565gfdgdf', '2020-01-24 16:15:34', 0, 'active', 'sell', 6),
(27, 735, 12, 3, 'phone', '120000', 'Yes', 'ETB', '[\"hulutera_user_id_12_item_temp_id_735_SAAB-9-5-00.jpg\"]', 'Dire Dawa', 'my new household', 'new household ', '2020-04-01 19:42:37', NULL, 'pending', 'sell', 1),
(28, 736, 12, 2, 'phone', '45', 'yes', 'ETB', '[\"hulutera_user_id_12_item_temp_id_736_SAAB-9-5-00.jpg\"]', 'Adama', NULL, 'my dist', '2020-04-18 10:59:15', NULL, 'pending', 'sell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_latest_update`
--

DROP TABLE IF EXISTS `item_latest_update`;
CREATE TABLE IF NOT EXISTS `item_latest_update` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_item` int(40) NOT NULL,
  `field_item_name` varchar(50) NOT NULL,
  `field_upload_time` int(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_latest_update`
--

INSERT INTO `item_latest_update` (`id`, `id_item`, `field_item_name`, `field_upload_time`) VALUES
(13, 11, 'other', 1378612439),
(14, 4, 'phone', 1379522330),
(15, 13, 'other', 1379177100),
(23, 8, 'car', 1378650938),
(33, 2, 'car', 1385751600),
(34, 3, 'car', 1385751598),
(36, 2, 'electronic', 1385751595),
(37, 6, 'phone', 1385751594),
(38, 15, 'other', 1385804018),
(39, 36, 'other', 1387633662),
(40, 56, 'computer', 1387636240),
(42, 16, 'car', 1387455782),
(43, 35, 'other', 1387455755),
(44, 29, 'phone', 1387455729),
(45, 25, 'household', 1387455629),
(46, 24, 'household', 1387454205),
(47, 24, 'phone', 1387449177);

-- --------------------------------------------------------

--
-- Table structure for table `item_other`
--

DROP TABLE IF EXISTS `item_other`;
CREATE TABLE IF NOT EXISTS `item_other` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(40) DEFAULT 'Negotiable',
  `field_price_currency` varchar(40) NOT NULL DEFAULT 'Birr',
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext CHARACTER SET utf8,
  `field_title` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT '7',
  PRIMARY KEY (`id`),
  KEY `uID_FK1` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_other`
--

INSERT INTO `item_other` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_market_category`, `field_table_type`) VALUES
(8, 1011, 1, 0, '0', '9000', '', 'Birr', '', 'Addis Ababa', '', 'my other 1', '2013-09-06 11:21:53', 0, 'Deleted', 'Sale', 7),
(9, 810, 1, 0, '0', '123232', '', 'Birr', '', 'Addis Ababa', '', 'tetet', '2013-09-06 11:21:53', 0, 'Deleted', 'Sale', 7),
(10, 534, 1, 0, '0', '121323', '', 'Birr', '', 'Addis Ababa', '', 'my tt', '2013-09-06 11:21:53', 0, 'Deleted', 'Sale', 7),
(11, 5330, 1, 0, '0', '12323', '', 'Birr', '', 'Addis Ababa', '', 'dsdsdsda', '2013-09-08 13:28:41', 0, 'active', 'Sale', 7),
(12, 28038, 2, 0, '0', '8000', '', 'Birr', '', 'Addis Ababa', '', 'others check', '2013-09-12 14:29:43', 0, '', 'Sale', 7),
(13, 9600, 2, 0, '0', '5666', '', 'Birr', '', 'Addis Ababa', 'ggu', 'nice item', '2013-11-06 14:54:27', 0, 'Deleted', 'Sale', 7),
(14, 13550, 1, 0, '0', '0', '', 'Birr', '', 'Addis Ababa', '', 'asdsddsa', '2013-11-17 19:52:15', 0, '', 'Sale', 7),
(15, 40139, 2, 0, '0', '0', '', 'Birr', '', 'Addis Ababa', '', 'others price check', '2013-11-30 09:34:06', 0, 'active', 'Sale', 7),
(16, 1214, 1, 0, '0', '0', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'newother', '2020-02-04 22:22:29', 0, 'active', 'sell', 7),
(21, 38846, 1, 0, '0', '13123123', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'myother', '2020-02-04 22:22:24', 0, 'active', 'sell', 7),
(22, 25442, 2, 0, '0', '1000', '', 'USD', '', 'Addis Ababa', '', 'biycle', '2020-02-04 22:22:22', 0, 'active', 'sell', 7),
(24, 28440, 2, 0, '0', '6565', '', 'Birr', '', 'Addis Ababa', '', 'gfgdfg', '2020-02-02 20:16:33', 0, 'active', 'sell', 7),
(25, 6444, 2, 0, '0', '5656', '', 'USD', '', 'Addis Ababa', '', 'sdfsdf', '2020-02-02 20:14:25', 0, 'active', 'sell', 7),
(26, 515, 2, 0, '0', '4434', '', 'USD', '', 'Debre Zeit', '', 'asdasdas', '2020-02-02 20:14:24', 0, 'active', 'sell', 7),
(27, 13732, 2, 0, '0', '5656', '', 'USD', '', 'Addis Ababa', '', 'ryery', '2020-02-02 20:14:20', 0, 'active', 'sell', 7),
(28, 86324, 2, 0, '0', '4344 dollar', '', 'USD', '', 'Addis Ababa', '', 'sxadas', '2020-02-02 20:14:18', 0, 'active', 'sell', 7),
(29, 73424, 2, 0, '0', '454', '', 'USD', '', 'Addis Ababa', '', 'vdsvsdv', '2020-02-02 20:14:16', 0, 'active', 'sell', 7),
(30, 80550, 2, 0, '0', '56565', 'Negotiable', 'Birr', '', 'Addis Ababa', '', 'cscssds', '2020-02-02 20:14:15', 0, 'active', 'sell', 7),
(31, 25229, 2, 0, '0', '5665', '', 'USD', '', 'Addis Ababa', '', 'cdsv', '2020-02-01 15:12:09', 0, 'active', 'sell', 7),
(32, 73944, 2, 0, '0', '4545', 'Negotiable', 'USD', '', 'Addis Ababa', '', 'cgfcgf', '2020-01-24 16:15:56', 0, 'active', 'sell', 7),
(33, 14912, 2, 0, '0', '676767', '', 'Birr', '', 'Addis Ababa', '', 'cgfccgf', '2020-01-24 16:15:56', 0, 'active', 'sell', 7),
(34, 20910, 2, 0, '0', '45', '', 'Birr', '', 'Addis Ababa', '', 'ffw', '2020-01-24 16:15:55', 0, 'active', 'sell', 7),
(35, 77145, 2, 0, '0', '6565', 'Negotiable', 'USD', '', 'Addis Ababa', '', 'fwerwe', '2013-12-24 20:34:15', 0, 'active', 'sell', 7),
(36, 8939, 1, 0, '0', '100000', 'Negotiable', 'USD', '', 'Addis Ababa', 'OtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTestOtherTest', 'OtherTest', '2013-12-21 13:47:54', 0, 'active', 'sell', 7),
(37, 6025, 2, 0, '0', '78', '', 'Birr', '', 'Addis Ababa', '', 'big img', '2020-01-24 16:15:30', 0, 'active', 'sell', 7),
(38, 6959, 1, 0, '1', '12345', '', 'Birr', '', 'Addis Ababa', '', 'myother', '2014-01-07 17:15:07', 0, 'Deleted', 'sell', 7),
(41, 43429, 12, NULL, '3', '12345', '1', 'Birr', '', 'Addis Ababa', 'ht logo', 'ht logo', '2020-02-02 20:05:34', 0, 'active', 'sell', 7),
(42, 1650, 12, NULL, '3', '12345', '1', 'Birr', '', 'Addis Ababa', 'ht logo', 'ht logo', '2020-02-02 20:05:31', 0, 'active', 'sell', 7),
(43, 1651, 12, NULL, 'email', '1200', 'Yes', 'ETB', '[\"hulutera_user_id_12_item_temp_id_1651_SAAB-9-5-00.jpg\"]', 'Addis Ababa', 'new other', 'new other', '2020-04-01 19:49:26', NULL, 'pending', 'sell', 1),
(44, 1652, 12, NULL, 'both', '43124334', 'no', 'USD', '[\"hulutera_user_id_12_item_temp_id_1652_SAAB-9-5-00.jpg\"]', 'Adama', NULL, 'asdasds', '2020-04-18 11:55:03', NULL, 'pending', 'sell', 1),
(45, 1653, 12, NULL, 'both', '99999', 'no', 'USD', '[\"hulutera_user_id_12_item_temp_id_1653_SAAB-9-5-00.jpg\"]', 'Gonder', NULL, 'asdasds', '2020-04-18 11:56:14', NULL, 'pending', 'sell', 1),
(46, 1654, 12, NULL, 'both', '12000', 'yes', 'ETB', '[\"hulutera_user_id_12_item_temp_id_1654_SAAB-9-5-00.jpg\"]', 'Bahir Dar', NULL, 'asdsad', '2020-04-20 10:59:45', NULL, 'pending', 'sell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_phone`
--

DROP TABLE IF EXISTS `item_phone`;
CREATE TABLE IF NOT EXISTS `item_phone` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(11) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT 'Negotiable',
  `field_price_currency` varchar(10) NOT NULL DEFAULT 'Birr',
  `field_made` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `field_model` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `field_os` varchar(20) DEFAULT NULL,
  `field_camera` varchar(40) DEFAULT NULL,
  `field_image` longtext NOT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` longtext CHARACTER SET utf8,
  `field_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_market_category` varchar(10) DEFAULT 'Sale',
  `field_table_type` int(10) NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`),
  KEY `uID_FK1` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_phone`
--

INSERT INTO `item_phone` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_made`, `field_model`, `field_os`, `field_camera`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_market_category`, `field_table_type`) VALUES
(4, 23115, 1, 0, '0', '123456789', '', 'Birr', '000', '', '', '000', '', 'Addis Ababa', '', 'my phone', '2013-12-16 12:50:38', NULL, 'active', 'Sale', 4),
(5, 43832, 1, 0, '0', '312321312132', '', 'Birr', '000', '', '000', '', '', 'Addis Ababa', '', 'mp', '2013-12-16 12:50:43', NULL, '', 'Sale', 4),
(6, 15728, 2, 0, '0', '3000', 'Negotiable', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'phone check', '2013-12-16 12:47:28', NULL, 'active', 'Sale', 4),
(10, 8034, 2, 0, '0', '', 'Negotiable', 'Birr', '2', '', '000', '000', '', 'Gambela', '', 'BB for U', '2020-02-04 22:22:22', NULL, 'active', 'sell', 4),
(13, 67018, 2, 0, '0', '', '', 'Birr', 'check', '', '000', 'check', '', 'Addis Ababa', '', 'phone check', '2020-02-04 22:22:20', NULL, 'active', 'sell', 4),
(14, 56813, 2, 0, '0', '', 'Negotiable', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'phone check', '2020-02-04 22:22:20', NULL, 'active', 'sell', 4),
(15, 8647, 2, 0, '0', '', '', 'Birr', '000', '', '000', '34', '', 'Addis Ababa', '', 'checking the specs', '2020-02-04 22:22:18', NULL, 'active', 'sell', 4),
(16, 95330, 2, 0, '0', '', '', 'Birr', '000', '', 'iphone', '6.0 - 6.9 megapixles', '', 'Addis Ababa', '', 'checking the spec', '2020-02-04 22:22:18', NULL, 'active', 'sell', 4),
(17, 91448, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'price', '2020-02-04 22:22:17', NULL, 'active', 'sell', 4),
(18, 9, 2, 0, '0', '', 'Negotiable', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'price check', '2020-02-04 22:22:17', NULL, 'active', 'sell', 4),
(19, 53616, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'dsfdsfd', '2020-02-02 20:16:36', NULL, 'active', 'sell', 4),
(20, 12420, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'ghhg', '2020-01-24 16:15:54', NULL, 'active', 'sell', 4),
(21, 60815, 2, 0, '0', '', 'Negotiable', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'hhhh', '2020-01-24 16:15:54', NULL, 'active', 'sell', 4),
(22, 47839, 2, 0, '0', '', 'Negotiable', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'reerrr', '2020-01-24 16:15:54', NULL, 'active', 'sell', 4),
(23, 3440, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'dcsc', '2020-01-24 16:15:47', NULL, 'active', 'sell', 4),
(24, 57910, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'fghh', '2013-12-25 15:08:55', NULL, 'active', 'sell', 4),
(25, 18742, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'dfaf', '2020-01-24 16:15:38', NULL, 'active', 'sell', 4),
(26, 92814, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'pho', '2020-01-24 16:15:37', NULL, 'active', 'sell', 4),
(27, 74139, 2, 0, '0', '', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'now', '2020-01-24 16:15:37', NULL, 'active', 'sell', 4),
(28, 8002, 2, 0, '0', '5656', '', 'USD', '000', '', '000', '000', '', 'Addis Ababa', '', 'fsdfds', '2020-01-24 16:15:37', NULL, 'active', 'sell', 4),
(29, 24629, 2, 0, '0', '5656', '', 'Birr', '000', '', '000', '000', '', 'Addis Ababa', '', 'dgdfgdf', '2013-12-24 20:34:39', NULL, 'active', 'sell', 4),
(30, 24630, 12, 1, 'email', '45000', 'Yes', 'ETB', 'Blackberry', 'asdsads', 'Android OS', '1.0 - 3.9 megapixles', '[\"hulutera (5).jpg\"]', 'Addis Ababa', NULL, 'phioer', '2020-04-01 20:37:15', NULL, 'pending', 'sell', 3),
(31, 24630, 12, 1, 'email', '45000', 'Yes', 'ETB', 'Blackberry', 'asdsads', 'Android OS', '1.0 - 3.9 megapixles', '[\"hulutera (5).jpg\"]', 'Addis Ababa', NULL, 'phioer', '2020-04-01 20:37:15', NULL, 'pending', 'sell', 3),
(32, 24631, 12, 2, 'email', '45465645', 'Yes', 'ETB', 'Alcatel', 'asdasds', 'Windows', '1.0 - 3.9 megapixles', '[\"hulutera_user_id_12_item_temp_id_24631_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'asddsd', '2020-04-01 20:42:47', NULL, 'pending', 'sell', 3),
(33, 24631, 12, 2, 'email', '45465645', 'Yes', 'ETB', 'Alcatel', 'asdasds', 'Windows', '1.0 - 3.9 megapixles', '[\"hulutera_user_id_12_item_temp_id_24631_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'asddsd', '2020-04-01 20:42:47', NULL, 'pending', 'sell', 3),
(34, 24632, 12, 2, 'email', '45465645', 'Yes', 'ETB', 'Alcatel', 'asdasds', 'Windows', '1.0 - 3.9 megapixles', '[\"hulutera_user_id_12_item_temp_id_24632_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'asdfdsfds', '2020-04-02 04:18:45', NULL, 'pending', 'sell', 3),
(35, 24633, 12, 2, 'email', '45465645', 'Yes', 'ETB', 'Alcatel', 'aaaaaaaaaaaaaaaaaa', 'Windows', '1.0 - 3.9 megapixles', '[\"hulutera_user_id_12_item_temp_id_24633_SAAB-9-5-00.jpg\"]', 'Addis Ababa', NULL, 'aaaaaaaaaaaaa', '2020-04-02 04:18:59', NULL, 'pending', 'sell', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE IF NOT EXISTS `user_admin` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_user_name` varchar(50) NOT NULL,
  `field_first_name` varchar(40) DEFAULT NULL,
  `field_last_name` varchar(40) DEFAULT NULL,
  `field_email` varchar(40) NOT NULL DEFAULT '',
  `field_phone_nr` varchar(40) NOT NULL,
  `field_address` varchar(40) DEFAULT NULL,
  `field_password` varchar(100) NOT NULL DEFAULT '',
  `field_privilege` varchar(40) NOT NULL DEFAULT 'user',
  `field_contact_method` varchar(40) NOT NULL,
  `field_term_and_condition` tinyint(1) NOT NULL,
  `field_register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_new_password` varchar(100) DEFAULT NULL,
  `field_activation` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `field_user_name`, `field_first_name`, `field_last_name`, `field_email`, `field_phone_nr`, `field_address`, `field_password`, `field_privilege`, `field_contact_method`, `field_term_and_condition`, `field_register_date`, `field_new_password`, `field_activation`) VALUES
(1, 'Abiy ', 'Terefe', 'Teshome', 'abiy.terefe@hotmail.com', '00727242210', 'Addis Ababa', '$1$HMyfjD80$zA.feICBx9eSMxF5hTmoF/', 'admin', 'Phone and Email', 0, '2014-01-08 18:44:35', '$1$Z3ePGkQZ$vxa/jfEHmvmKOz1E0nFj8.', '1def0fabca76ef6dcac4fb163de00ceb'),
(2, 'www', 'www', 'www', 'wendeworku@gmail.com', '1', 'ADD', '$1$I05KWw3Y$JkO3l5NRdMmNuK7eRMy8q0', 'admin', '', 0, '2014-01-02 19:28:46', '$1$znTU3uwD$0giEwL8TrMDZT1pHsyaPF0', NULL),
(3, 'jjj', 'jjj', 'jjj', 'jjj@hulutera.com', '1', 'ADD', '123', 'admin', '', 0, '2020-02-05 06:36:20', NULL, NULL),
(4, 'yyy', 'yyy', 'yyy', 'yyy@hulutera.com', '1', 'ADD', '123', 'mod', '', 0, '2020-02-06 07:00:23', NULL, NULL),
(7, 'www', 'wende', 'wefewfew', 'wendeworku@yahoo.com', '0', '', '123', 'user', 'both', 0, '2013-11-06 15:01:11', NULL, NULL),
(8, 'yidne', 'yidne', 'john', 'yidnekachew@gmail.com', '704353114', 'Solna', '$1$hVe9l8y4$hhQ3XeFX7Q3zFaeIwiwjm0', 'user', 'both', 0, '2014-01-14 14:28:10', '$1$XhUbKZt1$txhMiPX8Wh0ZyjdIwQx.z0', NULL),
(9, 'jemil', 's', 'b', 'jemilsh@gmail.com', '70405817', 'Sweden', '$1$UvWBigNj$wsThR3gxariqeixJDxR450', 'user', 'both', 0, '2014-01-13 20:34:27', '$1$zQdd51vI$UdcGl/HangAHmjQjjKqDV1', 'f986bbe2ec3bc5d92e5fbf5d715911b9'),
(10, 'negadiew', 'daniel', 'a', 'dan_assefa@yahoo.com', '0', '', 'leseitye2+', 'user', 'both', 0, '2020-02-06 04:19:00', NULL, NULL),
(11, 'abiy', 'Terefe', 'teshome', 'dochoex@gmail.com', '12121', 'aad', '$1$Q20dsDSJ$yjcLNniZuyjFf5tm0nogg/', 'webmaster', 'both', 0, '2020-01-24 16:05:10', '$1$Q20dsDSJ$yjcLNniZuyjFf5tm0nogg/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_all`
--

DROP TABLE IF EXISTS `user_all`;
CREATE TABLE IF NOT EXISTS `user_all` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_user_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `field_first_name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `field_last_name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `field_email` varchar(40) NOT NULL DEFAULT '',
  `field_phone_nr` varchar(40) NOT NULL,
  `field_address` varchar(40) DEFAULT NULL,
  `field_password` varchar(100) NOT NULL DEFAULT '',
  `field_privilege` varchar(40) NOT NULL DEFAULT 'user',
  `field_contact_method` varchar(40) NOT NULL,
  `field_term_and_condition` tinyint(1) NOT NULL,
  `field_register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_new_password` varchar(100) DEFAULT NULL,
  `field_activation` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_all`
--

INSERT INTO `user_all` (`id`, `field_user_name`, `field_first_name`, `field_last_name`, `field_email`, `field_phone_nr`, `field_address`, `field_password`, `field_privilege`, `field_contact_method`, `field_term_and_condition`, `field_register_date`, `field_new_password`, `field_activation`) VALUES
(1, 'Abiy ', 'Terefe', 'Teshome', 'abiy.terefe@hotmail.com', '00727242210', 'Addis Ababa', '$1$HMyfjD80$zA.feICBx9eSMxF5hTmoF/', 'admin', 'Phone and Email', 1, '2020-05-02 18:32:52', '$1$Z3ePGkQZ$vxa/jfEHmvmKOz1E0nFj8.', '1def0fabca76ef6dcac4fb163de00ceb'),
(2, 'www', 'www', 'www', 'wendeworku@gmail.com', '1', 'ADD', '$1$I05KWw3Y$JkO3l5NRdMmNuK7eRMy8q0', 'admin', '', 1, '2020-05-02 18:32:39', '$1$znTU3uwD$0giEwL8TrMDZT1pHsyaPF0', NULL),
(7, 'www', 'wende', 'wefewfew', 'wendeworku@yahoo.com', '0', '', '123', 'user', 'both', 1, '2020-05-02 18:32:47', NULL, NULL),
(10, 'negadiew', 'daniel', 'assefa', 'dan_assefa@yahoo.com', '0', '', 'leseitye2+', 'user', 'both', 1, '2020-05-02 18:32:31', NULL, NULL),
(12, 'አብይ', 'አብየ', 'ተረፈ ተሾመ', 'dochoex@gmail.com', '0727242210', 'aad', 'clRMSkgxOGtxcms9', 'webmaster', 'both', 1, '2020-05-03 10:56:44', '$1$Q20dsDSJ$yjcLNniZuyjFf5tm0nogg/', NULL),
(13, 'abtershome', 'AAAAC', 'BBBB', 'AAAA@BBB.COM', '0123456789', NULL, 'Geek2019', 'user', 'both', 1, '2020-05-01 09:17:35', NULL, 'c341d273c54c04b161659a2c259a96d6ea52505f'),
(14, 'XXXXX', 'YYYYY', 'ZZZZZ', 'XXXX.YYYY@ZZZZ.COM', '123456789123', NULL, 'clRMSkgxOGtxcms9', 'user', 'both', 1, '2020-05-01 09:06:45', NULL, '41e4e402ca8544c29305f30a6fc5ded5e30420b6');

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

DROP TABLE IF EXISTS `user_temp`;
CREATE TABLE IF NOT EXISTS `user_temp` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_user_name` varchar(50) NOT NULL,
  `field_first_name` varchar(40) DEFAULT NULL,
  `field_last_name` varchar(40) DEFAULT NULL,
  `field_email` varchar(40) NOT NULL DEFAULT '',
  `field_phone_nr` varchar(40) NOT NULL,
  `field_address` varchar(40) DEFAULT NULL,
  `field_password` varchar(100) NOT NULL DEFAULT '',
  `field_privilege` varchar(40) NOT NULL DEFAULT 'user',
  `field_contact_method` varchar(40) NOT NULL,
  `field_term_and_condition` tinyint(1) NOT NULL,
  `field_register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field_new_password` varchar(100) DEFAULT NULL,
  `field_activation` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_temp`
--

INSERT INTO `user_temp` (`id`, `field_user_name`, `field_first_name`, `field_last_name`, `field_email`, `field_phone_nr`, `field_address`, `field_password`, `field_privilege`, `field_contact_method`, `field_term_and_condition`, `field_register_date`, `field_new_password`, `field_activation`) VALUES
(60, 'asdsad', 'asds', 'asd', 'dochoex@gmail.com', '0972422410', NULL, 'jTLJH18lq7E=', 'user', 'both', 1, '2020-04-25 08:47:14', NULL, '565fbc2bf39ca94ba43b40253e109d50cc8dfb0d'),
(61, 'aasdasdsad', 'asdasdasd', 'asdasdasd', 'abter@hotmail.com', '0123456789', NULL, '3GKbQw93+uM=', 'user', 'both', 1, '2020-04-25 09:26:35', NULL, '264d0ba0f9e39b4044ea18bf48cc310424c8323b'),
(62, 'dochoex', 'asdasdasd', 'asdasdsad', 'asdasdsad@hotmail.com', '0123456789', NULL, '3GKbQw93+uM=', 'user', 'both', 1, '2020-04-25 09:27:43', NULL, 'b468feed2bd5f8e103eb6d954866af1366df3b40'),
(63, 'asdasdsad', 'asdsad', 'asdasdas', 'asdasd@asdasd.com', '0134546468', NULL, '3GKbQw93+uM=', 'user', 'both', 1, '2020-04-25 09:28:24', NULL, '17830efb26b6641bd5d10de57ac581ee05314b2d'),
(64, 'asdsad', 'asdasds', 'asdasdasd', 'asdasd@asdsad.com', '1243564323321', NULL, 'iyTIFR5w', 'user', 'both', 1, '2020-04-25 09:31:01', NULL, 'e8668dccf7912296086a3dc108c87415efcdb923'),
(65, 'abtershome', 'AAAA', 'BBB', 'AAA@CCCC.COM', '0123456789', NULL, 'clRMSkgxOGtxcms9', 'user', 'both', 1, '2020-04-25 18:06:38', NULL, 'c341d273c54c04b161659a2c259a96d6ea52505f'),
(66, 'asdsds', 'asdsds', 'asdsds', 'asdsd@asdsads.com', '12132132456', NULL, 'aXlUSUJ3bG4vL009', 'user', 'both', 1, '2020-04-26 16:51:23', NULL, '8b7e0511559104389399bcacec574876b14aae1d'),
(67, 'BBBBB', 'BBBBBBB', 'BBBBBB', 'BBBB@BBBB.COM', '1234567891247', NULL, 'cUJYdU5pOVc=', 'user', 'both', 1, '2020-04-26 16:54:23', NULL, 'b122d432cca54cfeec424f242091c97d82bd86a1'),
(68, 'VVVVVVVVV', 'VVVVVV', 'VVVVVVV', 'VVVVV@DDFDFDFD.COM', '123456789789', NULL, 'dkFINklqcz0=', 'user', 'both', 1, '2020-04-26 17:00:22', NULL, 'c3500865f0fdeb51aa807a26c840680a23ea8e9f'),
(69, 'ABULE', 'ABABA', 'ABABA', 'ABABA@ABABA.com', '12345678901', NULL, 'clRMSkgxOGtxcms9', 'user', 'both', 1, '2020-05-01 07:27:15', NULL, 'ff4842b89248b48af62309ac1db07a7b37b8e725'),
(70, 'XXXXX', 'YYYYY', 'ZZZZZ', 'XXXX.YYYY@ZZZZ.COM', '123456789123', NULL, 'clRMSkgxOGtxcms9', 'user', 'both', 1, '2020-05-01 09:06:45', NULL, '41e4e402ca8544c29305f30a6fc5ded5e30420b6'),
(71, 'asdasd', 'asdsadsa', 'asdasds', 'asdasd@asdasd.vmo', '897987844563212', NULL, 'aXlUSUZSNXcrdlBN', 'user', 'both', 1, '2020-05-16 19:17:11', NULL, 'f3df8ab0f74390cbc0274a09dc88c3be7934f3f3');

-- --------------------------------------------------------

--
-- Table structure for table `util_abuse`
--

DROP TABLE IF EXISTS `util_abuse`;
CREATE TABLE IF NOT EXISTS `util_abuse` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_category` int(40) NOT NULL,
  `id_user` int(40) NOT NULL,
  `id_car` int(40) DEFAULT NULL,
  `id_computer` int(40) DEFAULT NULL,
  `id_electronic` int(40) DEFAULT NULL,
  `id_house` int(40) DEFAULT NULL,
  `id_phone` int(40) DEFAULT NULL,
  `id_household` int(40) DEFAULT NULL,
  `id_other` int(40) DEFAULT NULL,
  `field_message` varchar(255) DEFAULT NULL,
  `field_ip_address` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abuseCategoryID` (`id_category`),
  KEY `electronicsID` (`id_electronic`),
  KEY `userID` (`id_user`),
  KEY `hID` (`id_house`),
  KEY `cID` (`id_car`),
  KEY `dID` (`id_computer`),
  KEY `phoneID` (`id_phone`),
  KEY `householdID` (`id_household`),
  KEY ` othersID` (`id_other`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `util_contact_us`
--

DROP TABLE IF EXISTS `util_contact_us`;
CREATE TABLE IF NOT EXISTS `util_contact_us` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_company` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `field_subject` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_purpose` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_description` mediumtext CHARACTER SET utf8 NOT NULL,
  `field_message_status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `field_received_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `util_contact_us`
--

INSERT INTO `util_contact_us` (`id`, `field_name`, `field_company`, `field_email`, `field_subject`, `field_purpose`, `field_description`, `field_message_status`, `field_received_date`) VALUES
(19, 'wende', 'hulutera', 'wendeworku@yahoo.com', 'Test four', 'Suggestion on Incorrect functionality', 'Checking in admin.', 'follow up', '2013-08-18 14:50:35'),
(21, 'jemil', 'pri', 'jemilsh@gmail.com', 'add', 'I can not find my ad', 'add', 'read', '2013-08-30 13:58:57'),
(22, 'jemil', 'pri', 'jemilsh@gmail.com', 'add', 'I can not find my ad', 'chrome ', 'read', '2013-08-30 13:59:21'),
(24, 'wende', 'hulutera', 'www@hulutera.com', 'check', 'I can not find my ad', 'check 1 2 3...hope it works.', 'read', '2013-09-08 14:33:14'),
(25, 'daniel', '', 'dan_assefa@yahoo.com', 'good job', 'General', 'I appreciate your great job. I just registered and posted a test ad. It is a whole new experience for such websites in Ethiopia. Keep it up.', 'read', '2013-12-21 18:40:42'),
(26, 'we', 'vhjsj', 'svhvhgv@hbhb.vgvg', 'djbjvjhf', 'My ad is not approved', 'dgjgffg', 'read', '2014-01-03 11:02:14'),
(27, 'asdasd', 'ASDASD', 'ASASAS@VBBSD.COM', 'ASDASD', '2', 'ASDASDASDAS', 'unread', '2020-05-16 17:57:54'),
(28, 'asdasd', 'ASDASD', 'ASASAS@VBBSD.COM', 'ASDASD', '2', 'ASDASDASDAS', 'unread', '2020-05-16 17:58:10'),
(29, 'aasdsad', 'asdasdsad', 'sadsadaads@adasds.asdsad', 'asdasdsad', '3', 'asdasdasdasdasdsadsa', 'unread', '2020-05-16 17:58:45'),
(30, 'ድስፍስድስድፍስድፍ', 'ስድፍስድፍስድፍስድፍስድፍስፍድ', 'sadsadf@asdasds.com', 'ፍድስድስፍስፍድፍድሥፍድ', '3', 'ስድፍስድፍድስፍድስፍድስፍድስፍድስድፍሥፍድድስፍስፍድፍድስፍድስፍስድፍድስፍድስፍ እርርትትዩጅይህንጅህግጅህንፍግ', 'unread', '2020-05-16 18:24:05'),
(31, 'fdsfsdfd', 'sdfsdfds', 'sdfsdfsd@asdsd.com', 'sdfsdfsdf', '7', 'ertrtretreter', 'unread', '2020-05-16 19:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `util_message`
--

DROP TABLE IF EXISTS `util_message`;
CREATE TABLE IF NOT EXISTS `util_message` (
  `id` int(11) NOT NULL,
  `field_receiver` int(11) NOT NULL,
  `field_sender` int(11) NOT NULL,
  `field_subject` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_body` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_sent_date` datetime NOT NULL,
  `field_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_car`
--
ALTER TABLE `item_car`
  ADD CONSTRAINT `item_car_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_car_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_computer`
--
ALTER TABLE `item_computer`
  ADD CONSTRAINT `item_computer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_computer_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category_computer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_electronic`
--
ALTER TABLE `item_electronic`
  ADD CONSTRAINT `item_electronic_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_electronic_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category_electronic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_house`
--
ALTER TABLE `item_house`
  ADD CONSTRAINT `item_house_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_house_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category_house` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_household`
--
ALTER TABLE `item_household`
  ADD CONSTRAINT `item_household_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_household_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category_household` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_other`
--
ALTER TABLE `item_other`
  ADD CONSTRAINT `item_other_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_phone`
--
ALTER TABLE `item_phone`
  ADD CONSTRAINT `item_phone_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `util_abuse`
--
ALTER TABLE `util_abuse`
  ADD CONSTRAINT `util_abuse_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `item_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_2` FOREIGN KEY (`id_computer`) REFERENCES `item_computer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_3` FOREIGN KEY (`id_phone`) REFERENCES `item_phone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_4` FOREIGN KEY (`id_household`) REFERENCES `item_household` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_5` FOREIGN KEY (`id_other`) REFERENCES `item_other` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_6` FOREIGN KEY (`id_category`) REFERENCES `category_abuse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_8` FOREIGN KEY (`id_electronic`) REFERENCES `item_electronic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_9` FOREIGN KEY (`id_house`) REFERENCES `item_house` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
