-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2020 at 12:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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

CREATE TABLE `category_abuse` (
  `id` int(40) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_prio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_abuse`
--

INSERT INTO `category_abuse` (`id`, `field_name`, `field_prio`) VALUES
(1, 'Bullying', 80),
(2, 'Copyright', 70),
(3, 'Discrimination', 40),
(5, 'Spam', 99),
(6, 'Identity theft', 50),
(7, 'Political violence', 60),
(8, 'Race violence', 30),
(9, 'Sex  abuse', 20),
(10, 'Sexual Content', 10),
(11, 'Other', 95),
(12, 'Religious violence', 85),
(13, 'Age abuse', 56);

-- --------------------------------------------------------

--
-- Table structure for table `category_car`
--

CREATE TABLE `category_car` (
  `id` int(40) NOT NULL,
  `field_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `category_computer` (
  `id` int(40) NOT NULL,
  `field_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `category_electronic` (
  `id` int(40) NOT NULL,
  `field_name` varchar(20) NOT NULL
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

CREATE TABLE `category_house` (
  `id` int(40) NOT NULL,
  `field_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `category_household` (
  `id` int(40) NOT NULL,
  `field_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_household`
--

INSERT INTO `category_household` (`id`, `field_name`) VALUES
(1, 'Furniture'),
(2, 'Kitchen Appliances'),
(3, 'Shower Appliances'),
(4, 'Home Decor'),
(5, 'Bedroom Appliances'),
(6, 'Baby Gears'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `category_other`
--

CREATE TABLE `category_other` (
  `id` int(40) NOT NULL,
  `field_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_other`
--

INSERT INTO `category_other` (`id`, `field_name`) VALUES
(1, 'Clothes'),
(2, 'Shoes'),
(3, 'Jewellery'),
(4, 'Tools'),
(5, 'Sport'),
(6, 'Entertainment'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `category_phone`
--

CREATE TABLE `category_phone` (
  `id` int(40) NOT NULL,
  `field_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_phone`
--

INSERT INTO `category_phone` (`id`, `field_name`) VALUES
(1, 'Cell Phones'),
(2, 'Smart Phone'),
(3, 'Fixed Phone'),
(4, 'PDA'),
(5, 'Smart Watch'),
(6, 'Phone Accessories'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `item_all`
--

CREATE TABLE `item_all` (
  `id` int(50) NOT NULL,
  `id_table` int(50) NOT NULL,
  `field_name` varchar(50) NOT NULL
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

CREATE TABLE `item_car` (
  `id` int(40) NOT NULL,
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
  `field_image` longtext DEFAULT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` longtext DEFAULT NULL,
  `field_title` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_report` varchar(125) DEFAULT NULL,
  `field_market_category` varchar(15) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_car`
--

INSERT INTO `item_car` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_rent`, `field_price_sell`, `field_price_nego`, `field_price_rate`, `field_price_currency`, `field_make`, `field_model`, `field_model_year`, `field_no_of_seat`, `field_fuel_type`, `field_color`, `field_gear_type`, `field_milage`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_report`, `field_market_category`, `field_table_type`) VALUES
(139, 1, 7, 1, 'phone', '6767', NULL, 'Yes', 'hourly', 'ETB', 'aston-martin', 'hhhh', 2014, 11, 'Bensine', 'brown', 'Manual', '350000-399999', '[\"hulutera (1).jpg\"]', 'Adama', NULL, 'test car', '2020-07-25 16:49:06', NULL, 'active', NULL, 'rent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_computer`
--

CREATE TABLE `item_computer` (
  `id` int(40) NOT NULL,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_make` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `field_os` varchar(20) DEFAULT NULL,
  `field_model` varchar(20) DEFAULT NULL,
  `field_processor` varchar(20) DEFAULT NULL,
  `field_ram` varchar(20) DEFAULT NULL,
  `field_hard_drive` varchar(20) DEFAULT NULL,
  `field_color` varchar(20) DEFAULT NULL,
  `field_image` longtext DEFAULT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext DEFAULT NULL,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_report` varchar(125) DEFAULT NULL,
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_computer`
--

INSERT INTO `item_computer` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_make`, `field_os`, `field_model`, `field_processor`, `field_ram`, `field_hard_drive`, `field_color`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_report`, `field_market_category`, `field_table_type`) VALUES
(64, 1, 7, 1, 'phone', '6700', 'Yes', 'ETB', 'acer', 'Windows', 'tt45', '1.0 - 1.49GHz', '1.0 - 1.9GB', 'Under 100GB', 'black', '[\"hulutera (1).jpg\"]', 'Bahir Dar', NULL, 'comp test', '2020-07-25 16:50:12', NULL, 'active', NULL, 'sell', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_electronic`
--

CREATE TABLE `item_electronic` (
  `id` int(40) NOT NULL,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT 'Negotiable',
  `field_price_currency` varchar(20) NOT NULL DEFAULT 'Birr',
  `field_image` longtext DEFAULT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext DEFAULT NULL,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_report` varchar(125) DEFAULT NULL,
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_electronic`
--

INSERT INTO `item_electronic` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_report`, `field_market_category`, `field_table_type`) VALUES
(19, 1, 7, 6, 'e-mail', '67676', 'Yes', 'ETB', '[\"hulutera (6).jpg\"]', 'Addis Ababa', NULL, 'Elec test', '2020-07-25 17:09:01', NULL, 'active', NULL, 'sell', 5);

-- --------------------------------------------------------

--
-- Table structure for table `item_house`
--

CREATE TABLE `item_house` (
  `id` int(40) NOT NULL,
  `id_temp` int(20) NOT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_rent` varchar(40) DEFAULT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT 'Negotiable',
  `field_price_rate` varchar(20) DEFAULT NULL,
  `field_price_currency` varchar(10) DEFAULT 'Birr',
  `field_image` longtext DEFAULT NULL,
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
  `field_extra_info` mediumtext DEFAULT NULL,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_report` varchar(125) DEFAULT NULL,
  `field_market_category` varchar(15) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_house`
--

INSERT INTO `item_house` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_rent`, `field_price_sell`, `field_price_nego`, `field_price_rate`, `field_price_currency`, `field_image`, `field_location`, `field_kebele`, `field_wereda`, `field_lot_size`, `field_nr_bedroom`, `field_toilet`, `field_bathroom`, `field_build_year`, `field_water`, `field_electricity`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_report`, `field_market_category`, `field_table_type`) VALUES
(28, 1, 7, 1, 'phone', NULL, '666', 'Yes', NULL, 'ETB', '[\"hulutera (2).jpg\"]', 'Gonder', 1, 1, 67, 2, 1, 9, 2013, 'No', 'Yes', NULL, 'house test', '2020-07-25 17:23:58', NULL, 'active', NULL, 'sell', 2),
(29, 2, 7, 1, 'phone', NULL, '666', 'Yes', NULL, 'ETB', '[\"hulutera_user_id_7_item_temp_id_2_peter.jpg\"]', 'Gonder', 1, 1, 67, 2, 1, 9, 2013, 'No', 'Yes', NULL, 'house test', '2020-07-25 17:24:20', NULL, 'active', NULL, 'sell', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_household`
--

CREATE TABLE `item_household` (
  `id` int(40) NOT NULL,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(40) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(50) DEFAULT NULL,
  `field_price_nego` varchar(50) DEFAULT 'Negotiable',
  `field_price_currency` varchar(10) NOT NULL DEFAULT 'Birr',
  `field_image` longtext DEFAULT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` longtext CHARACTER SET utf8 DEFAULT NULL,
  `field_title` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_report` varchar(125) DEFAULT NULL,
  `field_market_category` varchar(10) NOT NULL DEFAULT 'Sale',
  `field_table_type` int(10) NOT NULL DEFAULT 6
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_household`
--

INSERT INTO `item_household` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_report`, `field_market_category`, `field_table_type`) VALUES
(32, 1, 7, 2, 'phone', '67676', 'Yes', 'ETB', '[\"hulutera (7).jpg\"]', 'Addis Ababa', NULL, 'yuy', '2020-07-25 16:35:30', NULL, 'active', NULL, 'sell', 6);

-- --------------------------------------------------------

--
-- Table structure for table `item_latest_update`
--

CREATE TABLE `item_latest_update` (
  `id` int(40) NOT NULL,
  `id_item` int(40) NOT NULL,
  `field_item_name` varchar(50) NOT NULL,
  `field_upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_latest_update`
--

INSERT INTO `item_latest_update` (`id`, `id_item`, `field_item_name`, `field_upload_time`) VALUES
(53, 139, 'car', '2020-07-27 22:34:36'),
(54, 28, 'house', '2020-07-27 22:35:00'),
(55, 29, 'house', '2020-07-27 22:35:05'),
(56, 64, 'computer', '2020-07-27 22:35:16'),
(57, 19, 'electronic', '2020-07-27 22:35:27'),
(58, 36, 'phone', '2020-07-27 22:35:43'),
(59, 37, 'phone', '2020-07-27 22:35:45'),
(60, 32, 'household', '2020-07-27 22:35:56'),
(61, 48, 'other', '2020-07-27 22:36:10'),
(62, 49, 'other', '2020-07-27 22:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `item_other`
--

CREATE TABLE `item_other` (
  `id` int(40) NOT NULL,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(40) DEFAULT 'Negotiable',
  `field_price_currency` varchar(40) NOT NULL DEFAULT 'Birr',
  `field_image` longtext DEFAULT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `field_title` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_report` varchar(125) DEFAULT NULL,
  `field_market_category` varchar(10) NOT NULL,
  `field_table_type` int(10) NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_other`
--

INSERT INTO `item_other` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_report`, `field_market_category`, `field_table_type`) VALUES
(48, 1, 7, 1, 'e-mail', '60000', 'Yes', 'ETB', '[\"hulutera (1).jpg\"]', 'Bahir Dar', NULL, 'o test', '2020-07-26 09:15:06', NULL, 'active', NULL, 'sell', 7),
(49, 2, 7, 2, 'phone', '7800', 'Yes', 'ETB', '[\"hulutera_user_id_7_item_temp_id_2_peter.jpg\"]', 'Jimma', NULL, 'o test', '2020-07-26 09:02:57', NULL, 'active', NULL, 'sell', 7);

-- --------------------------------------------------------

--
-- Table structure for table `item_phone`
--

CREATE TABLE `item_phone` (
  `id` int(40) NOT NULL,
  `id_temp` int(20) DEFAULT NULL,
  `id_user` int(40) NOT NULL,
  `id_category` int(11) NOT NULL,
  `field_contact_method` varchar(50) NOT NULL,
  `field_price_sell` varchar(40) DEFAULT NULL,
  `field_price_nego` varchar(20) DEFAULT 'Negotiable',
  `field_price_currency` varchar(10) NOT NULL DEFAULT 'Birr',
  `field_make` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `field_model` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `field_os` varchar(20) DEFAULT NULL,
  `field_camera` varchar(40) DEFAULT NULL,
  `field_image` longtext DEFAULT NULL,
  `field_location` varchar(40) DEFAULT NULL,
  `field_extra_info` longtext CHARACTER SET utf8 DEFAULT NULL,
  `field_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `field_upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_total_view` int(10) DEFAULT NULL,
  `field_status` varchar(10) NOT NULL DEFAULT 'pending',
  `field_report` varchar(125) DEFAULT NULL,
  `field_market_category` varchar(10) DEFAULT 'Sale',
  `field_table_type` int(10) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_phone`
--

INSERT INTO `item_phone` (`id`, `id_temp`, `id_user`, `id_category`, `field_contact_method`, `field_price_sell`, `field_price_nego`, `field_price_currency`, `field_make`, `field_model`, `field_os`, `field_camera`, `field_image`, `field_location`, `field_extra_info`, `field_title`, `field_upload_date`, `field_total_view`, `field_status`, `field_report`, `field_market_category`, `field_table_type`) VALUES
(36, 1, 7, 2, 'phone', '6767', 'Yes', 'ETB', 'Alcatel', 'gfgf', 'Android', '11.0 - 15.9 MP', '[\"hulutera (5).jpg\"]', 'Addis Ababa', NULL, 'fgfg', '2020-07-25 16:45:14', NULL, 'active', NULL, 'sell', 4),
(37, 2, 7, 2, 'phone', '6767', 'Yes', 'ETB', 'Alcatel', 'gfgf', 'Android', '11.0 - 15.9 MP', '[\"hulutera_user_id_7_item_temp_id_2_peter.jpg\"]', 'Addis Ababa', NULL, 'fgfg', '2020-07-25 16:45:41', NULL, 'active', NULL, 'sell', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(40) NOT NULL,
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
  `field_register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_new_password` varchar(100) DEFAULT NULL,
  `field_activation` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `user_all` (
  `id` int(40) NOT NULL,
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
  `field_register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_new_password` varchar(100) DEFAULT NULL,
  `field_activation` varchar(255) DEFAULT NULL,
  `field_account_status` varchar(125) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_all`
--

INSERT INTO `user_all` (`id`, `field_user_name`, `field_first_name`, `field_last_name`, `field_email`, `field_phone_nr`, `field_address`, `field_password`, `field_privilege`, `field_contact_method`, `field_term_and_condition`, `field_register_date`, `field_new_password`, `field_activation`, `field_account_status`) VALUES
(1, 'Abiy ', 'Terefe', 'Teshome', 'abiy.terefe@hotmail.com', '00727242210', 'Addis Ababa', '$1$HMyfjD80$zA.feICBx9eSMxF5hTmoF/', 'webmaster', 'Phone and Email', 1, '2020-06-22 07:26:43', '$1$Z3ePGkQZ$vxa/jfEHmvmKOz1E0nFj8.', '1def0fabca76ef6dcac4fb163de00ceb', 'active'),
(2, 'www', 'www', 'www', 'wendeworku@gmail.com', '1', 'ADD', '$1$I05KWw3Y$JkO3l5NRdMmNuK7eRMy8q0', 'webmaster', '', 1, '2020-06-22 07:26:46', '$1$znTU3uwD$0giEwL8TrMDZT1pHsyaPF0', NULL, 'active'),
(7, 'www', 'wende', 'wefewfew', 'wendeworku@yahoo.com', '0', '', 'dlRLZFJsNGdyZz09', 'webmaster', 'both', 1, '2020-07-25 13:36:24', NULL, NULL, 'active'),
(10, 'negadiew', 'daniel', 'assefa', 'dan_assefa@yahoo.com', '0', NULL, 'leseitye2+', 'user', 'both', 1, '2020-06-22 07:26:51', NULL, NULL, 'active'),
(12, 'Abtershome', 'አብየ', 'ተረፈ ተሾመ', 'dochoex@gmail.com', '0727242210', 'aad', 'clRMSkgxOGtxcms9', 'webmaster', 'both', 1, '2020-06-22 07:26:52', '$1$Q20dsDSJ$yjcLNniZuyjFf5tm0nogg/', NULL, 'active'),
(16, 'aasdasdsad', 'asdasdasd', 'asdasdasd', 'abter@hotmail.com', '0123456789', NULL, '3GKbQw93+uM=', 'user', 'both', 1, '2020-04-25 09:26:35', NULL, '264d0ba0f9e39b4044ea18bf48cc310424c8323b', 'inactive'),
(17, 'asdsad', 'asds', 'asd', 'dochoex@gmail.com', '0972422410', NULL, 'jTLJH18lq7E=', 'user', 'both', 1, '2020-04-25 08:47:14', NULL, '565fbc2bf39ca94ba43b40253e109d50cc8dfb0d', 'active'),
(30, 'asdsad', 'asds', 'asd', 'dochoex@gmail.com', '0972422410', NULL, 'jTLJH18lq7E=', 'user', 'both', 1, '2020-04-25 08:47:14', NULL, '565fbc2bf39ca94ba43b40253e109d50cc8dfb0d', 'active'),
(37, 'asdsad', 'asds', 'asd', 'dochoex@gmail.com', '0972422410', NULL, 'jTLJH18lq7E=', 'user', 'both', 1, '2020-04-25 08:47:14', NULL, '565fbc2bf39ca94ba43b40253e109d50cc8dfb0d', 'active'),
(38, 'asdsad', 'asds', 'asd', 'dochoex@gmail.com', '0972422410', NULL, 'jTLJH18lq7E=', 'user', 'both', 1, '2020-04-25 08:47:14', NULL, '565fbc2bf39ca94ba43b40253e109d50cc8dfb0d', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

CREATE TABLE `user_temp` (
  `id` int(40) NOT NULL,
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
  `field_register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_new_password` varchar(100) DEFAULT NULL,
  `field_activation` varchar(60) DEFAULT NULL,
  `field_account_status` varchar(125) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_temp`
--

INSERT INTO `user_temp` (`id`, `field_user_name`, `field_first_name`, `field_last_name`, `field_email`, `field_phone_nr`, `field_address`, `field_password`, `field_privilege`, `field_contact_method`, `field_term_and_condition`, `field_register_date`, `field_new_password`, `field_activation`, `field_account_status`) VALUES
(60, 'asdsad', 'asds', 'asd', 'dochoex@gmail.com', '0972422410', NULL, 'jTLJH18lq7E=', 'user', 'both', 1, '2020-04-25 08:47:14', NULL, '565fbc2bf39ca94ba43b40253e109d50cc8dfb0d', 'inactive'),
(61, 'aasdasdsad', 'asdasdasd', 'asdasdasd', 'abter@hotmail.com', '0123456789', NULL, '3GKbQw93+uM=', 'user', 'both', 1, '2020-04-25 09:26:35', NULL, '264d0ba0f9e39b4044ea18bf48cc310424c8323b', 'inactive'),
(62, 'dochoex', 'asdasdasd', 'asdasdsad', 'asdasdsad@hotmail.com', '0123456789', NULL, '3GKbQw93+uM=', 'user', 'both', 1, '2020-04-25 09:27:43', NULL, 'b468feed2bd5f8e103eb6d954866af1366df3b40', 'inactive'),
(63, 'asdasdsad', 'asdsad', 'asdasdas', 'asdasd@asdasd.com', '0134546468', NULL, '3GKbQw93+uM=', 'user', 'both', 1, '2020-04-25 09:28:24', NULL, '17830efb26b6641bd5d10de57ac581ee05314b2d', 'inactive'),
(64, 'asdsad', 'asdasds', 'asdasdasd', 'asdasd@asdsad.com', '1243564323321', NULL, 'iyTIFR5w', 'user', 'both', 1, '2020-04-25 09:31:01', NULL, 'e8668dccf7912296086a3dc108c87415efcdb923', 'inactive'),
(65, 'abtershome', 'AAAA', 'BBB', 'AAA@CCCC.COM', '0123456789', NULL, 'clRMSkgxOGtxcms9', 'user', 'both', 1, '2020-04-25 18:06:38', NULL, 'c341d273c54c04b161659a2c259a96d6ea52505f', 'inactive'),
(66, 'asdsds', 'asdsds', 'asdsds', 'asdsd@asdsads.com', '12132132456', NULL, 'aXlUSUJ3bG4vL009', 'user', 'both', 1, '2020-04-26 16:51:23', NULL, '8b7e0511559104389399bcacec574876b14aae1d', 'inactive'),
(67, 'BBBBB', 'BBBBBBB', 'BBBBBB', 'BBBB@BBBB.COM', '1234567891247', NULL, 'cUJYdU5pOVc=', 'user', 'both', 1, '2020-04-26 16:54:23', NULL, 'b122d432cca54cfeec424f242091c97d82bd86a1', 'inactive'),
(68, 'VVVVVVVVV', 'VVVVVV', 'VVVVVVV', 'VVVVV@DDFDFDFD.COM', '123456789789', NULL, 'dkFINklqcz0=', 'user', 'both', 1, '2020-04-26 17:00:22', NULL, 'c3500865f0fdeb51aa807a26c840680a23ea8e9f', 'inactive'),
(69, 'ABULE', 'ABABA', 'ABABA', 'ABABA@ABABA.com', '12345678901', NULL, 'clRMSkgxOGtxcms9', 'user', 'both', 1, '2020-05-01 07:27:15', NULL, 'ff4842b89248b48af62309ac1db07a7b37b8e725', 'inactive'),
(70, 'XXXXX', 'YYYYY', 'ZZZZZ', 'XXXX.YYYY@ZZZZ.COM', '123456789123', NULL, 'clRMSkgxOGtxcms9', 'user', 'both', 1, '2020-05-01 09:06:45', NULL, '41e4e402ca8544c29305f30a6fc5ded5e30420b6', 'inactive'),
(71, 'asdasd', 'asdsadsa', 'asdasds', 'asdasd@asdasd.vmo', '897987844563212', NULL, 'aXlUSUZSNXcrdlBN', 'user', 'both', 1, '2020-05-16 19:17:11', NULL, 'f3df8ab0f74390cbc0274a09dc88c3be7934f3f3', 'inactive'),
(72, 'aaaaaaaa', 'aaaaaa', 'aaaaaaa', 'wendeworku@yaaa.com', '07777777777', NULL, 'dlRLZFJsNGdyZz09', 'user', 'e-mail', 1, '2020-07-25 11:35:30', NULL, '89ca09983f03f67b5517f535054290d3d1d385d0', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `util_abuse`
--

CREATE TABLE `util_abuse` (
  `id` int(40) NOT NULL,
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
  `field_ip_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `util_abuse`
--

INSERT INTO `util_abuse` (`id`, `id_category`, `id_user`, `id_car`, `id_computer`, `id_electronic`, `id_house`, `id_phone`, `id_household`, `id_other`, `field_message`, `field_ip_address`) VALUES
(1, 2, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `util_contact_us`
--

CREATE TABLE `util_contact_us` (
  `id` int(40) NOT NULL,
  `field_name` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_company` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `field_subject` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `field_purpose` varchar(125) CHARACTER SET utf8 NOT NULL,
  `field_description` mediumtext CHARACTER SET utf8 NOT NULL,
  `field_message_status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `field_received_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `util_message` (
  `id` int(11) NOT NULL,
  `field_receiver` int(11) NOT NULL,
  `field_sender` int(11) NOT NULL,
  `field_subject` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_body` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_sent_date` datetime NOT NULL,
  `field_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_abuse`
--
ALTER TABLE `category_abuse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_car`
--
ALTER TABLE `category_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_computer`
--
ALTER TABLE `category_computer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_electronic`
--
ALTER TABLE `category_electronic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_house`
--
ALTER TABLE `category_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_household`
--
ALTER TABLE `category_household`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_other`
--
ALTER TABLE `category_other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_phone`
--
ALTER TABLE `category_phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_all`
--
ALTER TABLE `item_all`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_car`
--
ALTER TABLE `item_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID_FK1` (`id_user`),
  ADD KEY `ccategoryID_FK` (`id_category`);

--
-- Indexes for table `item_computer`
--
ALTER TABLE `item_computer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID_FK2` (`id_user`),
  ADD KEY `d_CategoryID_FK` (`id_category`);

--
-- Indexes for table `item_electronic`
--
ALTER TABLE `item_electronic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID_FK1` (`id_user`),
  ADD KEY `electronicsCategrogyID` (`id_category`);

--
-- Indexes for table `item_house`
--
ALTER TABLE `item_house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID_FK3` (`id_user`),
  ADD KEY `hCategoryID_FK` (`id_category`);

--
-- Indexes for table `item_household`
--
ALTER TABLE `item_household`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID_FK1` (`id_user`),
  ADD KEY `hhcategoryID_FK` (`id_category`),
  ADD KEY `marketCategory` (`field_market_category`);

--
-- Indexes for table `item_latest_update`
--
ALTER TABLE `item_latest_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_other`
--
ALTER TABLE `item_other`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID_FK1` (`id_user`);

--
-- Indexes for table `item_phone`
--
ALTER TABLE `item_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID_FK1` (`id_user`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_all`
--
ALTER TABLE `user_all`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_temp`
--
ALTER TABLE `user_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `util_abuse`
--
ALTER TABLE `util_abuse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abuseCategoryID` (`id_category`),
  ADD KEY `electronicsID` (`id_electronic`),
  ADD KEY `userID` (`id_user`),
  ADD KEY `hID` (`id_house`),
  ADD KEY `cID` (`id_car`),
  ADD KEY `dID` (`id_computer`),
  ADD KEY `phoneID` (`id_phone`),
  ADD KEY `householdID` (`id_household`),
  ADD KEY ` othersID` (`id_other`);

--
-- Indexes for table `util_contact_us`
--
ALTER TABLE `util_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `util_message`
--
ALTER TABLE `util_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_abuse`
--
ALTER TABLE `category_abuse`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_car`
--
ALTER TABLE `category_car`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category_computer`
--
ALTER TABLE `category_computer`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_house`
--
ALTER TABLE `category_house`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_household`
--
ALTER TABLE `category_household`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_other`
--
ALTER TABLE `category_other`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_phone`
--
ALTER TABLE `category_phone`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_car`
--
ALTER TABLE `item_car`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `item_computer`
--
ALTER TABLE `item_computer`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `item_electronic`
--
ALTER TABLE `item_electronic`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `item_house`
--
ALTER TABLE `item_house`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `item_household`
--
ALTER TABLE `item_household`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `item_latest_update`
--
ALTER TABLE `item_latest_update`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `item_other`
--
ALTER TABLE `item_other`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `item_phone`
--
ALTER TABLE `item_phone`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_all`
--
ALTER TABLE `user_all`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_temp`
--
ALTER TABLE `user_temp`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `util_abuse`
--
ALTER TABLE `util_abuse`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `util_contact_us`
--
ALTER TABLE `util_contact_us`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  ADD CONSTRAINT `util_abuse_ibfk_10` FOREIGN KEY (`id_category`) REFERENCES `category_abuse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_2` FOREIGN KEY (`id_computer`) REFERENCES `item_computer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_3` FOREIGN KEY (`id_phone`) REFERENCES `item_phone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_4` FOREIGN KEY (`id_household`) REFERENCES `item_household` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_5` FOREIGN KEY (`id_other`) REFERENCES `item_other` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `user_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_8` FOREIGN KEY (`id_electronic`) REFERENCES `item_electronic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `util_abuse_ibfk_9` FOREIGN KEY (`id_house`) REFERENCES `item_house` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
