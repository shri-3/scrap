-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2019 at 12:14 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_roll` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user_roll`, `admin_name`, `password`) VALUES
(1, 1, 'meera', '234567');

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

DROP TABLE IF EXISTS `all_users`;
CREATE TABLE IF NOT EXISTS `all_users` (
  `id_all_users` int(11) NOT NULL AUTO_INCREMENT,
  `id_division` int(11) DEFAULT NULL COMMENT 'foregin key from division table',
  `id_depot` int(11) DEFAULT NULL COMMENT 'foregin key from depot table',
  `id_user_roll` int(11) NOT NULL COMMENT 'foregin key from user roll table',
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_all_users`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`id_all_users`, `id_division`, `id_depot`, `id_user_roll`, `user_name`, `password`, `created_at`) VALUES
(2, 5, 3, 2, 'Depot1', '123456', '2019-11-23 17:00:00'),
(3, 4, 2, 2, 'depot2', '1234568', '2019-11-23 17:10:10'),
(4, 6, NULL, 3, 'depot23', '1234565', '2019-11-23 18:01:37'),
(5, 3, 4, 2, 'shi', '12345', '2019-11-24 17:06:51'),
(6, 11, NULL, 3, 'shashi', '1234567', '2019-11-24 17:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

DROP TABLE IF EXISTS `depot`;
CREATE TABLE IF NOT EXISTS `depot` (
  `id_depot` int(11) NOT NULL AUTO_INCREMENT,
  `id_division` int(11) NOT NULL COMMENT 'foregin key from division table',
  `depot_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_depot`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`id_depot`, `id_division`, `depot_name`) VALUES
(3, 5, 'Marathali'),
(2, 4, 'Megistic'),
(4, 3, 'Xyzz'),
(5, 4, 'Xyzz');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id_division` int(11) NOT NULL AUTO_INCREMENT,
  `division_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_division`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_division`, `division_name`) VALUES
(10, 'Nagar'),
(3, 'Hello'),
(4, 'Shivaji'),
(5, 'Shivaji Nagar'),
(6, 'Hello2'),
(11, 'Bangalore22'),
(12, 'Bangalore2');

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

DROP TABLE IF EXISTS `item_list`;
CREATE TABLE IF NOT EXISTS `item_list` (
  `id_item_list` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_item_list`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`id_item_list`, `item_name`) VALUES
(1, 'Mouse'),
(2, 'Keybord'),
(6, 'Joystick'),
(4, 'Laptop'),
(7, 'Keybord'),
(8, 'Mouse1');

-- --------------------------------------------------------

--
-- Table structure for table `project_name`
--

DROP TABLE IF EXISTS `project_name`;
CREATE TABLE IF NOT EXISTS `project_name` (
  `id_project_name` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_project_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_name`
--

INSERT INTO `project_name` (`id_project_name`, `project_name`) VALUES
(1, 'Depot Scrap');

-- --------------------------------------------------------

--
-- Table structure for table `scrap`
--

DROP TABLE IF EXISTS `scrap`;
CREATE TABLE IF NOT EXISTS `scrap` (
  `id_scrap` int(11) NOT NULL AUTO_INCREMENT,
  `id_item_list` int(11) NOT NULL COMMENT 'foregin key from item table',
  `id_all_users` int(11) NOT NULL COMMENT 'foregin key from all user table',
  `scrap_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `model_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_scrap`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scrap`
--

INSERT INTO `scrap` (`id_scrap`, `id_item_list`, `id_all_users`, `scrap_name`, `company_name`, `model_no`, `serial_no`, `created_at`) VALUES
(7, 2, 2, 'Keyboard', 'Logitech', 'M56', '56894235', '2019-11-22 10:00:01'),
(6, 4, 4, 'Headphone', 'Java', 'DLJ56822', '26546323', '2019-11-23 15:25:44'),
(9, 6, 6, 'Mouse2', 'Iphone', 'JDG526478', 'SH5264789', '2019-11-24 17:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_roll`
--

DROP TABLE IF EXISTS `user_roll`;
CREATE TABLE IF NOT EXISTS `user_roll` (
  `id_user_roll` int(11) NOT NULL AUTO_INCREMENT,
  `user_roll_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user_roll`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roll`
--

INSERT INTO `user_roll` (`id_user_roll`, `user_roll_name`) VALUES
(1, 'Administrator'),
(2, 'Depot'),
(3, 'Division');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
