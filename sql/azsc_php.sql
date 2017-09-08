-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2017 at 02:17 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `azsc_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `confirmpassword` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phno` varchar(45) DEFAULT NULL,
  `gender` varchar(45) NOT NULL,
  `createdDate` date NOT NULL DEFAULT '0000-00-00',
  `updatedDate` date NOT NULL DEFAULT '0000-00-00',
  `adminphoto` varchar(45) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `confirmpassword`, `address`, `phno`, `gender`, `createdDate`, `updatedDate`, `adminphoto`) VALUES
(31, 'soesoeHlaing', 'soesoe', 'soesoe', 'yangon', '234233', 'male', '2016-10-01', '2016-10-01', 'gallery4.jpg'),
(35, 'tuntun', 'moemoe', 'moemoe', 'yangon', '3423423', 'female', '2016-09-08', '2016-10-22', 'gallery4.jpg'),
(47, 'wai', 'ayeaye', 'ayeaye', 'Mawlamyine', '2342343423', 'male', '2016-10-13', '2016-10-31', 'admin.jpg'),
(48, 'TunTunAung', 'tuntun', 'tuntun', 'yangon', '2334324', 'male', '2016-10-17', '0000-00-00', 'dk.jpg'),
(52, 'admin', 'admin', 'admin', 'yangon', '242312', 'male', '2016-10-18', '0000-00-00', 'images/user.png'),
(53, 'mmm', 'sss', 'sss', '', '', 'male', '2016-10-31', '0000-00-00', 'admin.jpg'),
(54, 'yuyu', 'yu', 'yu', 'ksdkf', '1234234', 'male', '2016-10-31', '0000-00-00', 'images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category`) VALUES
('g001', 'slipper'),
('g002', 'sandal'),
('g003', 'shoe');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `colorid` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  PRIMARY KEY (`colorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`colorid`, `color`) VALUES
('c001', 'red'),
('c002', 'green'),
('c003', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemcode` varchar(45) NOT NULL,
  `pprice` decimal(10,0) NOT NULL,
  `sprice` decimal(10,0) NOT NULL,
  `sizeid` varchar(45) NOT NULL,
  `colorid` varchar(45) NOT NULL,
  `madeinid` varchar(45) NOT NULL,
  `categoryid` varchar(45) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `imagepath` varchar(45) NOT NULL,
  `createdDate` date NOT NULL DEFAULT '0000-00-00',
  `updatedDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`itemcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemcode`, `pprice`, `sprice`, `sizeid`, `colorid`, `madeinid`, `categoryid`, `qty`, `imagepath`, `createdDate`, `updatedDate`) VALUES
('S015', '10000', '40000', 's003', 'c001', 'm001', 'g001', '2', 'slip7.jpg', '2016-07-30', '2016-10-27'),
('S016', '20000', '30000', 's002', 'c003', 'm001', 'g002', '35', 'sh1.jpg', '2016-07-30', '2016-10-27'),
('S017', '20000', '25000', 's002', 'c003', 'm001', 'g002', '8', 'bsand2.jpg', '2016-07-30', '2016-10-27'),
('S111', '30000', '35000', 's002', 'c002', 'm001', 'g001', '50', 'slip8.jpg', '2016-10-26', '2016-10-27'),
('S122', '30000', '35000', 's001', 'c001', 'm001', 'g003', '50', 'sho18.jpg', '2016-10-26', '2016-10-27'),
('S133', '30000', '35000', 's002', 'c003', 'm003', 'g003', '50', 'bsand6.jpg', '2016-10-26', '2016-10-27'),
('S222', '40000', '45000', 's002', 'c003', 'm001', 'g001', '4', 'id10.jpg', '2016-10-18', '2016-10-27'),
('S311', '15000', '20000', 's002', 'c002', 'm003', 'g002', '8', 'idd.jpg', '2016-10-19', '2017-07-02'),
('S324', '25000', '30000', 's002', 'c002', 'm001', 'g002', '18', 'sand49.jpg', '2016-10-19', '2016-10-31'),
('S333', '20000', '25000', 's001', 'c002', 'm003', 'g003', '20', 'sho56.jpg', '2016-10-26', '2016-10-27'),
('S335', '10000', '15000', 's001', 'c002', 'm002', 'g002', '2', 'gsand1.jpg', '2016-10-18', '2016-10-27'),
('s432', '30000', '35000', 's003', 'c002', 'm003', 'g002', '3', 'd5.jpg', '2016-10-20', '2016-10-31'),
('S438', '20000', '25000', 's002', 'c003', 'm003', 'g001', '5', 'bslip2.jpg', '2016-10-20', '2016-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `itemnew`
--

CREATE TABLE IF NOT EXISTS `itemnew` (
  `itemcode` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `sizeid` varchar(45) NOT NULL,
  `colorid` varchar(45) NOT NULL,
  `madeinid` varchar(45) NOT NULL,
  `categoryid` varchar(45) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `imagepath` varchar(45) NOT NULL,
  PRIMARY KEY (`itemcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemnew`
--

INSERT INTO `itemnew` (`itemcode`, `price`, `sizeid`, `colorid`, `madeinid`, `categoryid`, `qty`, `imagepath`) VALUES
('A001', '30000', 's002', 'c002', 'm001', 'g002', '50', 'slip8.jpg'),
('A002', '40000', 's002', 'c002', 'm001', 'g001', '50', 'shoe03.jpg'),
('A003', '30000', 's001', 'c001', 'm001', 'g003', '50', 'sho18.jpg'),
('A101', '30000', 's002', 'c001', 'm001', 'g001', '100', 's.jpg'),
('A102', '35000', 's002', 'c001', 'm002', 'g003', '50', 'sand4.jpg'),
('A103', '30000', 's001', 'c003', 'm001', 'g003', '100', 'sho6.jpg'),
('A104', '30000', 's002', 'c003', 'm003', 'g001', '150', 'bsand6.jpg'),
('A105', '35000', 's001', 'c001', 'm001', 'g001', '100', 'sho17.jpg'),
('A107', '30000', 's001', 'c001', 'm002', 'g001', '100', 'rslip22.jpg'),
('A111', '25000', 's002', 'c001', 'm002', 'g001', '50', 'rsand1.jpg'),
('A113', '20000', 's001', 'c001', 'm002', 'g002', '100', 'sand5.jpg'),
('P003', '15000', 's002', 'c003', 'm003', 'g001', '15', 'sand16.jpg'),
('P004', '20000', 's001', 'c002', 'm003', 'g002', '20', 'gsand3.jpg'),
('P009', '20000', 's001', 'c002', 'm003', 'g001', '22', 'gslip2.jpg'),
('P012', '20000', 's002', 'c001', 'm003', 'g002', '15', 'sho1.jpg'),
('P014', '20000', 's001', 'c002', 'm003', 'g003', '25', 'sho56.jpg'),
('P015', '30000', 's003', 'c003', 'm003', 'g002', '15', 'bslip2.jpg'),
('P016', '20000', 's002', 'c002', 'm001', 'g003', '10', 'gsand4.jpg'),
('P017', '25000', 's001', 'c003', 'm002', 'g001', '25', 'bslip1.jpg'),
('P018', '20000', 's003', 'c002', 'm001', 'g002', '10', 'gslip4.jpg'),
('P020', '20000', 's001', 'c002', 'm003', 'g002', '20', 'sand44.jpg'),
('P023', '25000', 's002', 'c002', 'm001', 'g002', '25', 'sho54.jpg'),
('P111', '2000', 's002', 'c003', 'm001', 'g001', '50', 'bsand8.jpg'),
('P122', '30000', 's002', 'c003', 'm002', 'g002', '100', 'bsand3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `madein`
--

CREATE TABLE IF NOT EXISTS `madein` (
  `madeinid` varchar(45) NOT NULL,
  `madein` varchar(45) NOT NULL,
  PRIMARY KEY (`madeinid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `madein`
--

INSERT INTO `madein` (`madeinid`, `madein`) VALUES
('m001', 'Japan'),
('m002', 'Thailand'),
('m003', 'Myanmar');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `orderitemcode` varchar(45) NOT NULL,
  `customID` varchar(45) NOT NULL,
  `ordercategory` varchar(45) NOT NULL,
  `orderprice` decimal(10,0) NOT NULL,
  `totalprice` decimal(10,0) NOT NULL,
  `orderqty` decimal(10,0) NOT NULL,
  `orderimagepath` varchar(45) NOT NULL,
  `orderdate` date NOT NULL DEFAULT '0000-00-00',
  `orderdeadline` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID`, `orderitemcode`, `customID`, `ordercategory`, `orderprice`, `totalprice`, `orderqty`, `orderimagepath`, `orderdate`, `orderdeadline`) VALUES
(117, 's432', 'mya@gmail.com', 'sandal', '35000', '35000', '1', 'd5.jpg', '2016-10-31', '2016-11-23'),
(118, 'S324', 'mya@gmail.com', 'sandal', '30000', '60000', '2', 'sand49.jpg', '2016-10-31', '2016-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `sizeid` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  PRIMARY KEY (`sizeid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeid`, `size`) VALUES
('s001', 'small'),
('s002', 'medium'),
('s003', 'large');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `cpassword` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phno` varchar(45) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `customname`, `email`, `password`, `cpassword`, `address`, `phno`, `createdDate`, `updatedDate`) VALUES
(7, 'MyaMya', 'myamya@gmail.com', 'myamya', 'myamya', 'mawlamyine', '2947234234', '2016-10-24 10:30:03', '2016-10-24'),
(10, 'myapanyi', 'myapanyi@gmail.com', 'myapanyi', 'myapanyi', 'yangon', '4234234', '2016-10-24 11:08:09', '0000-00-00'),
(12, 'mya', 'mya@gmail.com', 'myamya', 'myamya', 'yangon', '0934342342', '2016-10-25 06:58:38', '0000-00-00'),
(13, 'may', 'may@gmail.com', '123', '123', 'Insein', '123', '2016-10-27 09:52:18', '0000-00-00'),
(14, 'yu', 'yu@gmail.com', 'yu', 'yu', 'yangon', '0934534534', '2016-10-27 10:42:40', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
