-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 02:29 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trouble_tracker`
--
CREATE DATABASE IF NOT EXISTS `trouble_tracker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trouble_tracker`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`) VALUES
(1, 'Civil Maintenance', 1),
(2, 'Public Works', 1),
(3, 'Illegal Dumping', 1),
(4, 'Animal Control', 1),
(5, 'Garbage Pile-up', 1),
(6, 'Safety Concern', 1),
(7, 'Suspicious activity', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

DROP TABLE IF EXISTS `newsfeed`;
CREATE TABLE IF NOT EXISTS `newsfeed` (
  `tt_feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `tt_image` varchar(100) NOT NULL COMMENT 'name of the image alone is saved',
  `tt_lat` double NOT NULL COMMENT 'latitude point of the coordinates',
  `tt_lng` double NOT NULL COMMENT 'longitude point of the coordinates',
  `tt_comments` text CHARACTER SET utf8 NOT NULL COMMENT 'comments over the current newsfeed',
  `tt_category` int(50) NOT NULL COMMENT 'type or category of newsfeed',
  `tt_address` text CHARACTER SET utf8 NOT NULL COMMENT 'address from where the newsfeed was made',
  `tt_timestamp` datetime NOT NULL COMMENT 'when the newsfeed was made',
  `tt_updated_time` datetime NOT NULL,
  `tt_publishstatus` enum('1','2','3','4') NOT NULL COMMENT '1- Open, 2- In progress, 3- Complete, 4- Reject',
  `tt_userId` int(11) NOT NULL,
  PRIMARY KEY (`tt_feed_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`tt_feed_id`, `tt_image`, `tt_lat`, `tt_lng`, `tt_comments`, `tt_category`, `tt_address`, `tt_timestamp`, `tt_updated_time`, `tt_publishstatus`, `tt_userId`) VALUES
(1, 'dog.png', -37.8501486, 144.99330150000003, ' dog is barking', 4, ' 249,chapel street,\r\nsouth yarra', '2017-02-16 21:11:11', '2017-02-16 21:11:11', '2', 1),
(2, '300px-03_01_2009-luna_entrance2.jpg', -33.8496825, 151.2113028, 'Safety improvements ', 6, ' 1 Olympic Dr, Milsons Point NSW 2061', '2017-02-16 22:01:41', '2017-02-16 22:01:41', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_uid` varchar(255) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `oauth_uid`, `Username`, `email`, `status`, `created_date`, `last_login`) VALUES
(1, '10158305121300714', 'Urvi Shah', 'urvi_8march@yahoo.co.in', 1, '2017-02-15 10:46:34', '2017-02-17 03:26:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
