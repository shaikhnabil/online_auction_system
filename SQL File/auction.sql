-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 11:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `mobile` int(12) NOT NULL,
  `pincode` int(6) NOT NULL,
  `street_address` varchar(30) NOT NULL,
  `landmark` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `add_payment_method`
--
CREATE TABLE IF NOT EXISTS `add_payment_method` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(6) NOT NULL,
  `cardname` varchar(30) NOT NULL,
  `cardnumber` int(16) NOT NULL,
  `expmonth` varchar(15) NOT NULL,
  `expyear` int(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `added_datetime` timestamp NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `dateRegistration` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `contactNo` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--


-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE IF NOT EXISTS `bidders` (
  `bidderId` int(11) NOT NULL AUTO_INCREMENT,
  `Amount` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `bidder_Email` varchar(30) NOT NULL,
  `date_bidded` date NOT NULL,
  `prod_Id` int(11) NOT NULL,
  PRIMARY KEY (`bidderId`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `car_Id` int(11) NOT NULL AUTO_INCREMENT,
  `image3` text NOT NULL,
  `description` text NOT NULL,
  `linkId` int(11) NOT NULL,
  PRIMARY KEY (`car_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ccc`
--


-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date_contacted` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--
--
-- Table structure for table `payment`
--
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `seller` varchar(30) NOT NULL,
  `seller_card_number` int(12) NOT NULL,
  `buyer_card_number` int(12) NOT NULL,
  `amount` int(8) NOT NULL,
  `payment_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `image1` text NOT NULL,
  `seller` varchar(30) NOT NULL,
  `initial_Price` int(11) NOT NULL,
  `current_Price` int(11) NOT NULL,
  `final_Price` int(11) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `is_Auction_Over` int(1) NOT NULL,
  `date_Added` datetime NOT NULL,
  `date_Started` datetime NOT NULL,
  `date_End` datetime NOT NULL,
  `is_verified` int(1) NOT NULL,
  `winner` int(1) NOT NULL,
  `winnder` varchar(30) NOT NULL,
  PRIMARY KEY (`product_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `contact_no` int(13) NOT NULL,
  `address` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `account_status` int(1) NOT NULL,
  `date_registration` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
