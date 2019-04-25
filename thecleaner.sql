-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2019 at 02:57 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecleaner`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `customer_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_order_item` text NOT NULL,
  `cost_per_item` float NOT NULL,
  `total_cost_item` float NOT NULL,
  `order_date` datetime NOT NULL,
  `collection_date` datetime NOT NULL,
  `cust_order_id` int(11) NOT NULL,
  `vend_order_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_order_id`),
  KEY `cust_order_id` (`cust_order_id`),
  KEY `vend_order_id` (`vend_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_status`
--

DROP TABLE IF EXISTS `customer_order_status`;
CREATE TABLE IF NOT EXISTS `customer_order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_order_status` enum('unfulfilled','ready','collected') NOT NULL,
  `cust_ord_status_id` int(11) NOT NULL,
  `vend_ord_status_id` int(11) NOT NULL,
  PRIMARY KEY (`order_status_id`),
  KEY `cust_ord_status_id` (`cust_ord_status_id`),
  KEY `vend_ord_status_id` (`vend_ord_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

DROP TABLE IF EXISTS `customer_registration`;
CREATE TABLE IF NOT EXISTS `customer_registration` (
  `cust_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_first_name` varchar(30) NOT NULL,
  `cust_last_name` varchar(30) NOT NULL,
  `cust_email` varchar(54) NOT NULL,
  `cust_phone` varchar(30) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_dob` datetime NOT NULL,
  `cust_gender` enum('Male','Female') NOT NULL,
  `cust_vend_id` int(11) NOT NULL,
  `cust_reg_date` timestamp NOT NULL,
  PRIMARY KEY (`cust_reg_id`),
  KEY `cust_vend_id` (`cust_vend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_inventory`
--

DROP TABLE IF EXISTS `vendor_inventory`;
CREATE TABLE IF NOT EXISTS `vendor_inventory` (
  `vendor_inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `vend_id` int(11) NOT NULL,
  PRIMARY KEY (`vendor_inv_id`),
  KEY `vend_id` (`vend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_registration`
--

DROP TABLE IF EXISTS `vendor_registration`;
CREATE TABLE IF NOT EXISTS `vendor_registration` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(225) NOT NULL,
  `comp_address` text NOT NULL,
  `comp_email` varchar(50) NOT NULL,
  `comp_phone` varchar(30) NOT NULL,
  `comp_password` varchar(32) NOT NULL,
  `registered_date` timestamp NOT NULL,
  PRIMARY KEY (`vendor_id`),
  UNIQUE KEY `comp_email` (`comp_email`),
  UNIQUE KEY `comp_phone` (`comp_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`cust_order_id`) REFERENCES `customer_registration` (`cust_reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`vend_order_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_order_status`
--
ALTER TABLE `customer_order_status`
  ADD CONSTRAINT `customer_order_status_ibfk_1` FOREIGN KEY (`cust_ord_status_id`) REFERENCES `customer_order` (`customer_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_status_ibfk_2` FOREIGN KEY (`vend_ord_status_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD CONSTRAINT `customer_registration_ibfk_1` FOREIGN KEY (`cust_vend_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_inventory`
--
ALTER TABLE `vendor_inventory`
  ADD CONSTRAINT `vendor_inventory_ibfk_1` FOREIGN KEY (`vend_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
