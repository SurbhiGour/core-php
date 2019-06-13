-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 07:00 AM
-- Server version: 5.5.10
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pure_test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `type`, `phone_no`, `email`, `password`, `dob`) VALUES
(12, 0, 'Surbhi gour', 'Admin', '8896589658', 'surbhi@e-bc.in', '123456', '2019-05-31'),
(59, 0, 'rahul chkosi ', '', '8965236589', 'rahul@gmail.com', 'rahul', '2019-05-01'),
(61, 0, 'pooja', '', '7898789878', 'pooja@gmail.com', 'pooja', '2019-05-07'),
(62, 0, 'raj tiwari', '', '8987898789', 'raj@gmail.com', '1234', '2019-05-06'),
(63, 0, 'pallavi dubey', '', '8898569879', 'pallavi@gmail.com', '1234', '2019-05-01');
