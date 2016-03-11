-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 06:51 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockticker`
--

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `positions`;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `users` (
   `username` VARCHAR(30) NOT NULL,
   `password` VARCHAR(30) NOT NULL,
   `deviceid` VARCHAR(30) NOT NULL,
   PRIMARY KEY(`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `users` (`username`, `password`, `deviceid`) VALUES
('user1', 'password', '11111'),
('user2', 'password', '11111'),
('user3', 'password', '11111'),
('user4', 'password', '11111'),
('user5', 'password', '11111'),
('user6', 'password', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `positions` (
   `username` VARCHAR(30) NOT NULL,
   `datetime` varchar(19) NOT NULL,
   `latitude` DOUBLE(7,4) DEFAULT NULL,
   `longitude` DOUBLE(7,4) DEFAULT NULL,
   PRIMARY KEY(`username`, `datetime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `positions` (`username`, `datetime`, `latitude`, `longitude`) VALUES
('user1', '2016.02.01-09:01:00', 49.24438823, -123.00355196),
('user1', '2016.02.01-09:02:00', 49.24338823, -123.00255196),
('user1', '2016.02.01-09:03:00', 49.24488823, -123.00155196),
('user1', '2016.02.01-09:04:00', 49.24408823, -123.00055196),
('user1', '2016.02.01-09:05:00', 49.24198823, -123.00045196),
('user1', '2016.02.01-09:06:00', 49.24468823, -123.00035196),
('user1', '2016.02.01-09:07:00', 49.24438823, -123.00025196),
('user1', '2016.02.01-09:08:00', 49.24438823, -123.00015196),
('user1', '2016.02.01-09:09:00', 49.24438823, -123.00005196),
('user1', '2016.02.01-09:10:00', 49.24438823, -123.00000196),
('user2', '2016.02.01-09:04:00', 49, 129),
('user3', '2016.02.01-09:01:00', 48, 128);