-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 08:19 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `171_tenant`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_stall`
--

CREATE TABLE `applied_stall` (
  `app_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `business_name` varchar(128) DEFAULT NULL,
  `date_applied` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_approved` datetime DEFAULT NULL,
  `application_status` varchar(32) DEFAULT 'Unapproved',
  `applied_term` varchar(32) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_stall`
--

INSERT INTO `applied_stall` (`app_id`, `client_id`, `category_id`, `business_name`, `date_applied`, `date_approved`, `application_status`, `applied_term`, `start_date`, `end_date`) VALUES
(21, 29, 18, 'Calisthenics Philippines', '2019-01-25 19:12:22', NULL, 'Approved', '4 years', NULL, NULL),
(22, 29, 8, 'Oxygen', '2019-01-25 19:23:21', NULL, 'Disapproved', '2 years', NULL, NULL),
(23, 29, 8, 'Bench', '2019-01-25 19:48:45', NULL, 'Approved', '2 years', NULL, NULL),
(24, 30, 10, 'iStore', '2019-01-26 19:11:06', NULL, 'Approved', '4 years', NULL, NULL),
(25, 31, 9, 'DOTA 2', '2019-02-20 21:12:22', NULL, 'Approved', '3 years', '2019-02-20 00:00:00', '2019-02-28 00:00:00'),
(45, 31, 13, 'Artours Bistro', '2019-02-20 22:19:45', NULL, 'Approved', '3 years', '2019-02-21 00:00:00', '2019-02-28 00:00:00'),
(46, 31, 18, 'Calisthenics Philippines', '2019-02-20 22:45:56', NULL, 'Approved', '3 years', '2019-02-20 00:00:00', '2019-02-23 00:00:00'),
(47, 31, 19, 'Ana', '2019-02-20 22:48:12', NULL, 'Approved', '1 year', '2019-02-21 00:00:00', '2019-02-28 00:00:00'),
(48, 31, 13, 'Babaevs Pizza', '2019-02-20 22:52:19', NULL, 'Approved', '4 years', '2019-02-21 00:00:00', '2019-02-28 00:00:00'),
(49, 31, 20, 'Hehe', '2019-02-20 23:13:12', NULL, 'Approved', '2 years', '2019-02-21 00:00:00', '2019-02-27 00:00:00'),
(50, 31, 20, 'DOTA 2', '2019-02-20 23:16:02', NULL, 'Approved', '1 year', '2019-02-21 00:00:00', '2019-02-28 00:00:00'),
(51, 32, 18, 'Avenegers Tower', '2019-03-31 09:45:56', NULL, 'Approved', '4 years', '2019-03-31 00:00:00', '2019-06-30 00:00:00'),
(52, 33, 9, 'World of Warcraft Merch', '2019-03-31 10:04:09', NULL, 'Approved', '4 years', '2019-03-31 00:00:00', '2019-05-31 00:00:00'),
(53, 34, 14, 'Empire State of Mind', '2019-04-03 12:49:51', NULL, 'Approved', '4 years', '2019-04-03 00:00:00', '2019-04-05 00:00:00'),
(54, 35, 6, 'Rap Store', '2019-04-03 13:00:44', NULL, 'Approved', '4 years', '2019-04-03 00:00:00', '2019-04-30 00:00:00'),
(55, 36, 11, 'Music Store', '2019-04-03 13:17:01', NULL, 'Approved', '4 years', '2019-04-03 00:00:00', '2019-04-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `applied_stall_details`
--

CREATE TABLE `applied_stall_details` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL,
  `stall_application_status` varchar(32) DEFAULT 'Unapproved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_stall_details`
--

INSERT INTO `applied_stall_details` (`id`, `app_id`, `stall_id`, `stall_application_status`) VALUES
(27, 21, 13, 'Approved'),
(28, 21, 14, 'Unapproved'),
(29, 21, 15, 'Approved'),
(30, 21, 16, 'Approved'),
(31, 21, 17, 'Unapproved'),
(32, 22, 14, 'Disapproved'),
(33, 22, 17, 'Disapproved'),
(34, 23, 18, 'Approved'),
(35, 23, 19, 'Approved'),
(36, 24, 14, 'Approved'),
(37, 24, 17, 'Approved'),
(38, 25, 20, 'Approved'),
(41, 45, 20, 'Approved'),
(42, 46, 21, 'Approved'),
(43, 46, 22, 'Approved'),
(44, 47, 23, 'Approved'),
(45, 47, 24, 'Approved'),
(46, 48, 25, 'Approved'),
(47, 48, 26, 'Approved'),
(48, 49, 27, 'Approved'),
(49, 50, 28, 'Approved'),
(50, 50, 29, 'Approved'),
(51, 51, 30, 'Approved'),
(52, 52, 31, 'Approved'),
(53, 52, 32, 'Approved'),
(54, 53, 33, 'Approved'),
(55, 53, 34, 'Approved'),
(56, 54, 35, 'Approved'),
(57, 55, 36, 'Approved'),
(58, 55, 37, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `business_classification`
--

CREATE TABLE `business_classification` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_classification`
--

INSERT INTO `business_classification` (`category_id`, `category_name`) VALUES
(6, 'Arts, Crafts and Collectibles'),
(7, 'Books ang Magazines'),
(8, 'Clothing, Shoes and Accessories'),
(9, 'Computers, Accessories and Services'),
(10, 'Electronics and Telecom'),
(11, 'Entertainment and Media'),
(12, 'Financial Services and Products'),
(13, 'Food Retail and Service'),
(14, 'Gifts and Flowers'),
(15, 'Government'),
(16, 'Health and Personal Care'),
(17, 'Pets and Animals'),
(18, 'Sports'),
(19, 'Travel'),
(20, 'Vehicle Sales'),
(21, 'Vehicle Service and Accessories'),
(22, 'Toys and Hobbies'),
(23, 'Arcade');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contact` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fname`, `lname`, `email`, `address`, `contact`) VALUES
(29, 'Carlo Miguel', 'Dy', 'carlomigueldy@gmail.com', 'Maigo', '09167764350'),
(30, 'Nove', 'Lactuan', 'nove.lactuan@gmail.com', 'Tubod', '09252248799'),
(31, 'Artour', 'Babaev', 'artour.babaev@gmail.com', 'Canada', '09252248799'),
(32, 'Tom', 'Holland', 'tom.holland@gmail.com', 'Queens', '09167764338'),
(33, 'Tommy', 'Jenkins', 'leeroy.jenkins@gmail.com', 'Jenkins', '09124451234'),
(34, 'Alicia', 'Keys', 'alicia.keys@gmail.com', 'New York', '09224487741'),
(35, 'Emi', 'Nem', 'emi.nem@gmail.com', 'California', '09874561887'),
(36, 'Hal', 'Sey', 'hal.sey@gmail.com', 'Amsterdam', '09125548741');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `business_name` varchar(128) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `date_approved` datetime DEFAULT CURRENT_TIMESTAMP,
  `remark` varchar(32) DEFAULT 'Pending',
  `contract_term` varchar(32) NOT NULL DEFAULT 'Pending',
  `renewal_status` varchar(32) NOT NULL DEFAULT 'Pending',
  `verified` varchar(32) DEFAULT 'False'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `app_id`, `client_id`, `category_id`, `business_name`, `start_date`, `end_date`, `date_approved`, `remark`, `contract_term`, `renewal_status`, `verified`) VALUES
(18, 21, 29, 18, 'Calisthenics Philippines', '2019-01-25 00:00:00', '2019-01-28 00:00:00', '2019-01-25 19:13:49', 'Confirmed', '4 years', 'Pending', 'True'),
(20, 23, 29, 8, 'Bench', '2019-01-25 00:00:00', '2019-01-26 00:00:00', '2019-01-25 19:49:22', 'Confirmed', '4 years', 'Pending', 'True'),
(21, 24, 30, 10, 'iStore', '2019-01-26 00:00:00', '2019-01-31 00:00:00', '2019-01-26 19:11:16', 'Confirmed', '4 years', 'Pending', 'True'),
(28, 25, 31, 9, 'DOTA 2', '2019-02-20 00:00:00', '2019-02-28 00:00:00', '2019-02-20 21:18:33', 'Confirmed', '3 years', 'Pending', 'True'),
(29, 45, 31, 13, 'Artours Bistro', '2019-02-21 00:00:00', '2019-02-28 00:00:00', '2019-02-20 22:20:11', 'Confirmed', '3 years', 'Pending', 'True'),
(30, 46, 31, 18, 'Calisthenics Philippines', '2019-02-20 00:00:00', '2019-02-23 00:00:00', '2019-02-20 22:46:10', 'Confirmed', '3 years', 'Pending', 'True'),
(31, 47, 31, 19, 'Ana', '2019-02-21 00:00:00', '2019-02-28 00:00:00', '2019-02-20 22:48:25', 'Confirmed', '1 year', 'Pending', 'True'),
(32, 48, 31, 13, 'Babaevs Pizza', '2019-02-21 00:00:00', '2019-02-28 00:00:00', '2019-02-20 22:52:29', 'Confirmed', '4 years', 'Pending', 'True'),
(33, 49, 31, 20, 'Hehe', '2019-02-21 00:00:00', '2019-02-27 00:00:00', '2019-02-20 23:13:22', 'Confirmed', '2 years', 'Pending', 'True'),
(34, 50, 31, 20, 'DOTA 2', '2019-02-21 00:00:00', '2019-02-28 00:00:00', '2019-02-20 23:16:13', 'Confirmed', '1 year', 'Pending', 'True'),
(35, 51, 32, 18, 'Avenegers Tower', '2019-03-31 00:00:00', '2019-06-30 00:00:00', '2019-03-31 09:46:19', 'Confirmed', '4 years', 'Pending', 'True'),
(36, 52, 33, 9, 'World of Warcraft Merch', '2019-03-31 00:00:00', '2019-05-31 00:00:00', '2019-03-31 10:04:27', 'Confirmed', '4 years', 'Pending', 'True'),
(37, 53, 34, 14, 'Empire State of Mind', '2019-04-03 00:00:00', '2019-04-05 00:00:00', '2019-04-03 12:50:38', 'Confirmed', '4 years', 'Pending', 'True'),
(38, 54, 35, 6, 'Rap Store', '2019-04-03 00:00:00', '2019-04-30 00:00:00', '2019-04-03 13:00:59', 'Confirmed', '4 years', 'Pending', 'True'),
(39, 55, 36, 11, 'Music Store', '2019-04-03 00:00:00', '2019-04-30 00:00:00', '2019-04-03 13:17:14', 'Confirmed', '4 years', 'Pending', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `occupied_stalls`
--

CREATE TABLE `occupied_stalls` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `stall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupied_stalls`
--

INSERT INTO `occupied_stalls` (`id`, `contract_id`, `stall_id`) VALUES
(10, 18, 13),
(11, 21, 14),
(12, 18, 15),
(13, 18, 16),
(14, 21, 17),
(15, 20, 18),
(16, 20, 19),
(17, 29, 20),
(18, 30, 21),
(19, 30, 22),
(20, 31, 23),
(21, 31, 24),
(22, 32, 25),
(23, 32, 26),
(24, 33, 27),
(25, 34, 28),
(26, 34, 29),
(27, 35, 30),
(28, 36, 31),
(29, 36, 32),
(30, 37, 33),
(31, 37, 34),
(32, 38, 35),
(33, 39, 36),
(34, 39, 37);

-- --------------------------------------------------------

--
-- Table structure for table `renewal`
--

CREATE TABLE `renewal` (
  `renewal_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `date_applied_renewal` datetime DEFAULT CURRENT_TIMESTAMP,
  `renewal_status` varchar(32) DEFAULT 'Unapproved',
  `renewal_term` varchar(32) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renewal`
--

INSERT INTO `renewal` (`renewal_id`, `client_id`, `contract_id`, `date_applied_renewal`, `renewal_status`, `renewal_term`, `start_date`, `end_date`) VALUES
(21, 29, 20, '2019-01-25 20:22:26', 'Approved', '4 years', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `renewal_details`
--

CREATE TABLE `renewal_details` (
  `id` int(11) NOT NULL,
  `renewal_id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renewal_details`
--

INSERT INTO `renewal_details` (`id`, `renewal_id`, `stall_id`) VALUES
(7, 21, 18),
(8, 21, 19);

-- --------------------------------------------------------

--
-- Table structure for table `rental_payment`
--

CREATE TABLE `rental_payment` (
  `rentp_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `total_amount` double DEFAULT '0',
  `amount_paid` double DEFAULT '0',
  `balance` double DEFAULT '0',
  `date_paid` datetime DEFAULT NULL,
  `rent_month` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_payment`
--

INSERT INTO `rental_payment` (`rentp_id`, `contract_id`, `total_amount`, `amount_paid`, `balance`, `date_paid`, `rent_month`) VALUES
(2, 21, 3751.5, 3751.5, 0, '2019-01-26 00:00:00', 'January'),
(4, 21, 3751.5, 3751.5, 0, '2019-01-26 19:56:04', 'February'),
(5, 21, 3751.5, 3751.5, 0, '2019-02-20 20:59:34', 'March'),
(6, 21, 3751.5, 4248.5, -497, '2019-02-20 21:00:07', 'April'),
(7, 21, 4251.7, 0, 4251.7, NULL, 'May'),
(8, 21, 4251.7, 0, 4251.7, NULL, 'June'),
(9, 18, 4252.25, 0, 4252.25, NULL, NULL),
(10, 20, 2301.5, 2300, 1.5, '2019-02-20 21:00:55', 'January'),
(11, 20, 3452.25, 0, 3452.25, NULL, 'February'),
(12, 29, 1850.95, 0, 1850.95, NULL, 'January'),
(13, 30, 0, 0, 0, NULL, NULL),
(14, 31, 1500.85, 0, 0, NULL, NULL),
(15, 32, 4451.3, 0, 0, NULL, 'January'),
(16, 32, 4451.3, 0, 4451.3, NULL, 'February'),
(17, 33, 2000.5, 2000.5, 0, '2019-02-20 23:14:58', 'January'),
(18, 34, 3501.1, 3501.1, 0, '2019-02-20 23:16:52', 'January'),
(19, 34, 3501.1, 0, 3501.1, NULL, 'February'),
(20, 34, 3501.1, 3501.1, 0, '2019-02-20 23:21:03', 'March'),
(21, 34, 3501.1, 3501.1, 0, '2019-02-20 23:40:16', 'April'),
(22, 34, 3501.1, 3501.1, 0, '2019-02-21 00:01:56', 'May'),
(23, 35, 2500.92, 0, 2500.92, NULL, NULL),
(24, 36, 20004, 0, 20004, NULL, NULL),
(25, 37, 7501.950000000001, 0, 7501.950000000001, NULL, NULL),
(26, 38, 2500.25, 0, 2500.25, NULL, NULL),
(27, 39, 34011.4, 0, 34011.4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rental_payment_details`
--

CREATE TABLE `rental_payment_details` (
  `id` int(11) NOT NULL,
  `rentp_id` int(11) DEFAULT NULL,
  `stall_id` int(11) DEFAULT NULL,
  `paid` varchar(10) NOT NULL DEFAULT 'False',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount_paid` double NOT NULL DEFAULT '0',
  `date_paid` datetime DEFAULT NULL,
  `rent_month` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_payment_details`
--

INSERT INTO `rental_payment_details` (`id`, `rentp_id`, `stall_id`, `paid`, `balance`, `amount_paid`, `date_paid`, `rent_month`) VALUES
(1, 15, 25, 'False', '0.00', 0, '2019-03-31 10:08:44', ''),
(2, 15, 26, 'False', '0.00', 0, '2019-03-31 10:08:44', ''),
(3, 17, 27, 'False', '0.00', 0, '2019-03-31 10:08:44', ''),
(4, 18, 28, 'False', '0.00', 0, '2019-03-31 10:08:44', ''),
(5, 18, 29, 'True', '0.00', 0, '2019-03-31 10:08:44', ''),
(6, 20, 28, 'False', '0.00', 0, '2019-03-31 10:08:44', ''),
(7, 20, 29, 'True', '0.00', 0, '2019-03-31 10:08:44', ''),
(8, 21, 28, 'True', '0.00', 0, '2019-03-31 10:08:44', ''),
(9, 21, 29, 'True', '0.00', 0, '2019-03-31 10:08:44', ''),
(10, 22, 28, 'True', '0.00', 0, '2019-03-31 10:08:44', ''),
(11, 22, 29, 'True', '0.00', 0, '2019-03-31 10:08:44', ''),
(12, 23, 30, 'False', '0.00', 0, '2019-03-31 10:08:44', ''),
(13, 24, 31, 'False', '0.00', 0, '2019-03-31 10:08:44', 'January'),
(14, 24, 32, 'False', '0.00', 0, '2019-03-31 10:08:44', ''),
(15, 24, 31, 'False', '0.00', 0, NULL, 'January'),
(16, 24, 31, 'False', '0.00', 0, NULL, 'July'),
(17, 24, 31, 'False', '0.00', 0, NULL, 'May'),
(18, 24, 32, 'False', '0.00', 0, NULL, NULL),
(19, 24, 32, 'False', '0.00', 0, NULL, NULL),
(20, 24, 32, 'False', '0.00', 0, NULL, NULL),
(21, 11, 18, 'False', '0.00', 0, NULL, NULL),
(22, 25, 33, 'False', '0.00', 0, NULL, NULL),
(23, 25, 34, 'False', '0.00', 0, NULL, NULL),
(24, 25, 33, 'False', '2501.00', 0, NULL, NULL),
(25, 26, 35, 'False', '0.00', 0, NULL, NULL),
(26, 27, 36, 'False', '0.00', 3001, '2019-04-03 14:13:01', 'January'),
(27, 27, 37, 'False', '0.00', 2750.95, '2019-04-03 14:01:33', 'January'),
(28, 27, 36, 'False', '0.00', 3001, '2019-04-03 14:13:54', 'February'),
(29, 27, 37, 'False', '0.00', 2750.95, '2019-04-03 13:59:03', 'February'),
(30, 27, 37, 'False', '0.00', 2750.95, '2019-04-03 14:03:02', 'March'),
(31, 27, 37, 'False', '0.00', 2750.95, '2019-04-03 14:05:45', 'April'),
(32, 27, 37, 'False', '0.00', 2750.9, '2019-04-03 14:09:37', 'May'),
(33, 27, 37, 'False', '0.00', 2751, '2019-04-03 14:11:44', 'January'),
(34, 27, 37, 'False', '2751.00', 0, NULL, NULL),
(35, 27, 37, 'False', '0.00', 2750.95, '2019-04-03 14:12:43', 'January'),
(36, 27, 36, 'False', '0.00', 3000.95, '2019-04-03 14:14:09', 'March'),
(37, 27, 36, 'False', '3000.95', 0, NULL, NULL),
(38, 9, 13, 'False', '1000.50', 0, NULL, NULL);

--
-- Triggers `rental_payment_details`
--
DELIMITER $$
CREATE TRIGGER `payment_total_amount` AFTER INSERT ON `rental_payment_details` FOR EACH ROW BEGIN 
	UPDATE rental_payment SET total_amount = total_amount + (SELECT stall_price FROM stalls WHERE stall_id = new.stall_id), balance = balance + (SELECT stall_price FROM stalls WHERE stall_id = new.stall_id) WHERE rentp_id = new.rentp_id; 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stalls`
--

CREATE TABLE `stalls` (
  `stall_id` int(11) NOT NULL,
  `floor_no` varchar(1) NOT NULL,
  `block_no` varchar(20) NOT NULL,
  `block_dimension` varchar(11) NOT NULL,
  `stall_price` double NOT NULL,
  `price_date_effectivity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stalls`
--

INSERT INTO `stalls` (`stall_id`, `floor_no`, `block_no`, `block_dimension`, `stall_price`, `price_date_effectivity`) VALUES
(13, '1', '1A', '350x350', 1000.5, '2019-01-21 00:00:00'),
(14, '1', '1B', '450x450', 1750.95, '2019-01-21 00:00:00'),
(15, '1', '1C', '450x450', 1250.75, '2019-01-21 00:00:00'),
(16, '1', '1D', '350x350', 1000.5, '2019-01-21 00:00:00'),
(17, '1', '1E', '500x500', 2500.75, '2019-01-21 00:00:00'),
(18, '2', '2A', '350x350', 1150.75, '2019-01-22 00:00:00'),
(19, '2', '2B', '350x350', 1150.75, '2019-01-22 00:00:00'),
(20, '2', '2C', '450x450', 1850.95, '2019-01-22 00:00:00'),
(21, '2', '2D', '500x500', 2000.25, '2019-01-22 00:00:00'),
(22, '2', '2E', '500x500', 2000.25, '2019-01-22 00:00:00'),
(23, '3', '3A', '500x500', 1500.85, '2019-02-21 00:00:00'),
(24, '3', '3B', '600x600', 2000.65, '2019-02-21 00:00:00'),
(25, '3', '3C', '500x500', 2000.65, '2019-02-21 00:00:00'),
(26, '3', '3D', '500x500', 2450.65, '2019-02-21 00:00:00'),
(27, '3', '3F', '500x500', 2000.5, NULL),
(28, '4', '4A', '500x500', 2000.5, NULL),
(29, '4', '4B', '500x500', 1500.6, NULL),
(30, '5', '5A', '850x850', 2500.92, '2019-03-31 00:00:00'),
(31, '5', '5B', '850x850', 2500.25, '2019-03-31 00:00:00'),
(32, '5', '5C', '850x850', 2500.75, '2019-03-31 00:00:00'),
(33, '5', '5D', '850x850', 2500.85, '2019-04-03 00:00:00'),
(34, '5', '5E', '850x850', 2500.25, '2019-04-03 00:00:00'),
(35, '5', '5F', '850x850', 2500.25, '2019-04-03 00:00:00'),
(36, '6', '6A', '850x850', 3000.95, '2019-04-03 00:00:00'),
(37, '6', '6B', '850x850', 2750.95, '2019-04-03 00:00:00');

--
-- Triggers `stalls`
--
DELIMITER $$
CREATE TRIGGER `empty_stalls` AFTER INSERT ON `stalls` FOR EACH ROW BEGIN
	INSERT INTO occupied_stalls (stall_id) VALUES (new.stall_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `price_history` AFTER UPDATE ON `stalls` FOR EACH ROW BEGIN
	INSERT INTO stall_pricehistory (stall_price, stall_id, date_end, date_effectivity)
    VALUES (old.stall_price, new.stall_id,  new.price_date_effectivity, old.price_date_effectivity);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stall_pricehistory`
--

CREATE TABLE `stall_pricehistory` (
  `priceh_id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL,
  `stall_price` double NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `date_effectivity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stall_pricehistory`
--

INSERT INTO `stall_pricehistory` (`priceh_id`, `stall_id`, `stall_price`, `date_end`, `date_effectivity`) VALUES
(30, 14, 1250.75, '2019-01-21 00:00:00', '2019-01-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$jHkDiN56hsnaiahFqS2kueUOCglf1LUaX.WcrQVQ3kvribfNaIXKW', '2019-01-26 20:09:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_stall`
--
ALTER TABLE `applied_stall`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `fk_app_client_id` (`client_id`),
  ADD KEY `fk_app_category_id` (`category_id`);

--
-- Indexes for table `applied_stall_details`
--
ALTER TABLE `applied_stall_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_appd_app_id` (`app_id`),
  ADD KEY `fk_appd_stall_id` (`stall_id`);

--
-- Indexes for table `business_classification`
--
ALTER TABLE `business_classification`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `fk_cont_app_id` (`app_id`),
  ADD KEY `fk_cont_client_id` (`client_id`),
  ADD KEY `fk_cont_category_id` (`category_id`);

--
-- Indexes for table `occupied_stalls`
--
ALTER TABLE `occupied_stalls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_occ_contract_id` (`contract_id`),
  ADD KEY `fk_occ_stall_id` (`stall_id`);

--
-- Indexes for table `renewal`
--
ALTER TABLE `renewal`
  ADD PRIMARY KEY (`renewal_id`),
  ADD KEY `fk_renewal_client_id` (`client_id`),
  ADD KEY `fk_renewal_contract_id` (`contract_id`);

--
-- Indexes for table `renewal_details`
--
ALTER TABLE `renewal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rend_renewal_id` (`renewal_id`),
  ADD KEY `fk_rend_stall_id` (`stall_id`);

--
-- Indexes for table `rental_payment`
--
ALTER TABLE `rental_payment`
  ADD PRIMARY KEY (`rentp_id`),
  ADD KEY `fk_rent_contract_id` (`contract_id`);

--
-- Indexes for table `rental_payment_details`
--
ALTER TABLE `rental_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rentp` (`rentp_id`),
  ADD KEY `fk_stall` (`stall_id`);

--
-- Indexes for table `stalls`
--
ALTER TABLE `stalls`
  ADD PRIMARY KEY (`stall_id`),
  ADD UNIQUE KEY `unique_block` (`block_no`);

--
-- Indexes for table `stall_pricehistory`
--
ALTER TABLE `stall_pricehistory`
  ADD PRIMARY KEY (`priceh_id`),
  ADD KEY `fk_priceh_stall_id` (`stall_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_stall`
--
ALTER TABLE `applied_stall`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `applied_stall_details`
--
ALTER TABLE `applied_stall_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `business_classification`
--
ALTER TABLE `business_classification`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `occupied_stalls`
--
ALTER TABLE `occupied_stalls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `renewal`
--
ALTER TABLE `renewal`
  MODIFY `renewal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `renewal_details`
--
ALTER TABLE `renewal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rental_payment`
--
ALTER TABLE `rental_payment`
  MODIFY `rentp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rental_payment_details`
--
ALTER TABLE `rental_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `stalls`
--
ALTER TABLE `stalls`
  MODIFY `stall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stall_pricehistory`
--
ALTER TABLE `stall_pricehistory`
  MODIFY `priceh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied_stall`
--
ALTER TABLE `applied_stall`
  ADD CONSTRAINT `fk_app_category_id` FOREIGN KEY (`category_id`) REFERENCES `business_classification` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_app_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE;

--
-- Constraints for table `applied_stall_details`
--
ALTER TABLE `applied_stall_details`
  ADD CONSTRAINT `fk_appd_app_id` FOREIGN KEY (`app_id`) REFERENCES `applied_stall` (`app_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_appd_stall_id` FOREIGN KEY (`stall_id`) REFERENCES `stalls` (`stall_id`) ON DELETE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `fk_cont_app_id` FOREIGN KEY (`app_id`) REFERENCES `applied_stall` (`app_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cont_category_id` FOREIGN KEY (`category_id`) REFERENCES `business_classification` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cont_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE;

--
-- Constraints for table `occupied_stalls`
--
ALTER TABLE `occupied_stalls`
  ADD CONSTRAINT `fk_occ_contract_id` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_occ_stall_id` FOREIGN KEY (`stall_id`) REFERENCES `stalls` (`stall_id`) ON DELETE CASCADE;

--
-- Constraints for table `renewal`
--
ALTER TABLE `renewal`
  ADD CONSTRAINT `fk_renewal_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_renewal_contract_id` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`) ON DELETE CASCADE;

--
-- Constraints for table `renewal_details`
--
ALTER TABLE `renewal_details`
  ADD CONSTRAINT `fk_rend_renewal_id` FOREIGN KEY (`renewal_id`) REFERENCES `renewal` (`renewal_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rend_stall_id` FOREIGN KEY (`stall_id`) REFERENCES `stalls` (`stall_id`) ON DELETE CASCADE;

--
-- Constraints for table `rental_payment`
--
ALTER TABLE `rental_payment`
  ADD CONSTRAINT `fk_rent_contract_id` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`) ON DELETE CASCADE;

--
-- Constraints for table `rental_payment_details`
--
ALTER TABLE `rental_payment_details`
  ADD CONSTRAINT `fk_rentp` FOREIGN KEY (`rentp_id`) REFERENCES `rental_payment` (`rentp_id`),
  ADD CONSTRAINT `fk_stall` FOREIGN KEY (`stall_id`) REFERENCES `stalls` (`stall_id`);

--
-- Constraints for table `stall_pricehistory`
--
ALTER TABLE `stall_pricehistory`
  ADD CONSTRAINT `fk_priceh_stall_id` FOREIGN KEY (`stall_id`) REFERENCES `stalls` (`stall_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
