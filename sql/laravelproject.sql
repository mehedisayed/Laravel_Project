-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 07:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Children');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `fid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `iid` int(11) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `iprice` float NOT NULL,
  `scid` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iid`, `iname`, `iprice`, `scid`, `description`) VALUES
(1, 'DRESS SHIRT', 2280, 1, '95% Cotton 5% Spandex'),
(2, 'CONTRASTING COLLAR DRESS SHIRT', 2599, 1, 'Slim fit shirt with lapel collar and long sleeves with buttoned cuffs.'),
(3, 'TANJIM SQUAD RUBBERIZED PRINT T-SHIRT', 1999, 2, 'T-Shirt with round neck and short sleeves. Rubberized Squad print.'),
(4, 'BLACK TEES WITH NEON PRINT', 2289, 2, '95% Cotton 5% Spandex'),
(5, 'GREY CHECK SUIT', 7833, 3, 'Blazer with pointed lapel collar with removable pin and long sleeves with buttoned cuffs. Welt pocket at chest and flap pockets at hip. Interior pocket. Double back vent. Front button closure. Slim fit pants with front pockets and buttoned back welt pockets. Front zip and button closure.'),
(6, 'LIGHT WEIGHT CHECKED BLAZER', 5999, 3, 'Blazer with pointed lapel collar with removable pin and long sleeves with buttoned cuffs. Welt pocket at chest and flap pockets at hip. Interior pocket. Double back vent. Front button closure.');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `otid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `olid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderlog`
--

CREATE TABLE `orderlog` (
  `olid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlog`
--

INSERT INTO `orderlog` (`olid`, `uid`, `date`, `status`) VALUES
(1, 2, '2020-05-14', 'Payment Pendding'),
(2, 2, '2020-05-06', 'Shipping Ready'),
(3, 2, '2020-05-09', 'Shipping Ready'),
(4, 2, '2020-05-04', 'Payment Pendding'),
(5, 2, '2020-05-15', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(15) NOT NULL,
  `olid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `date`, `amount`, `status`, `olid`) VALUES
(1, '2020-05-14', 10000, 'Pendding', 1),
(2, '2020-05-14', 10000, 'Completed', 2),
(3, '2020-05-11', 10000, 'Completed', 3),
(4, '2020-05-15', 10000, 'Pendding', 4),
(5, '2020-05-14', 10000, 'Completed', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `scid` int(11) NOT NULL,
  `scname` varchar(25) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`scid`, `scname`, `cid`) VALUES
(1, 'Shirts', 1),
(2, 'T shirts', 1),
(3, 'Blazer & Suits', 1),
(4, 'Joggers', 1),
(5, 'Jeans', 1),
(6, 'Long Shirts', 2),
(7, 'Shrugs', 2),
(8, 'Ethnic Tops', 2),
(9, 'Bottoms', 2),
(10, 'Scarves', 2),
(11, 'Dress', 2),
(12, 'Bags', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(26) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `email`, `password`, `phone`, `gender`, `role`, `address`, `status`) VALUES
(1, 'Mehedi Sayed', 'sayedmehedi@hotmail.com', '12345678', 1731569019, 'Male', 'Admin', 'Dhaka,Bangladesh', 'Active'),
(2, 'Mehrab', 'mehrab@gmail.com', '12345678', 1731569019, 'Male', 'Customer', 'Lakshmipur,Bangladesh', 'Active'),
(3, 'Mahbub', 'sm@gmail.com', '12345678', 1629438110, 'Male', 'Manager', 'Dhaka', 'Active'),
(4, 'Shakill Ahmed', 'shakill@gmail.com', '12345678', 1629438110, 'Male', 'Employee', 'Dhaka', 'Active'),
(6, 'admin', 'admin@gmail.com', '12345678', 1629438110, 'Male', 'Admin', 'Dhaka', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`otid`);

--
-- Indexes for table `orderlog`
--
ALTER TABLE `orderlog`
  ADD PRIMARY KEY (`olid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `otid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderlog`
--
ALTER TABLE `orderlog`
  MODIFY `olid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
