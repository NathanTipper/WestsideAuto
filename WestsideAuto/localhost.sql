-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 31, 2018 at 01:46 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `westsideauto`
--
CREATE DATABASE IF NOT EXISTS `westsideauto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `westsideauto`;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `drivers_license_no` int(11) NOT NULL,
  `TaxID` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `no_of_late_payments` int(11) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `empid` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip_code` varchar(7) NOT NULL,
  `state` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Invoice`
--

CREATE TABLE `Invoice` (
  `invoice_no` int(11) NOT NULL,
  `date_purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Purchased`
--

CREATE TABLE `Purchased` (
  `purchase_ID` int(11) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `seller` varchar(60) NOT NULL,
  `isAuction` tinyint(1) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_PurchasedRelationship`
--

CREATE TABLE `r_PurchasedRelationship` (
  `purchase_ID` int(11) NOT NULL,
  `VIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_VehicleUnderWarranty`
--

CREATE TABLE `r_VehicleUnderWarranty` (
  `warranty_name` varchar(50) NOT NULL,
  `VIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Vehicle`
--

CREATE TABLE `Vehicle` (
  `VIN` int(11) NOT NULL,
  `make` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `trim` varchar(25) NOT NULL,
  `year` year(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `current_condition` varchar(25) NOT NULL,
  `km` int(11) NOT NULL,
  `style` varchar(35) NOT NULL,
  `interior_color` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Warranty`
--

CREATE TABLE `Warranty` (
  `warranty_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `length_months` int(11) NOT NULL,
  `cost_per_month` double NOT NULL,
  `deductible` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`drivers_license_no`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `Purchased`
--
ALTER TABLE `Purchased`
  ADD PRIMARY KEY (`purchase_ID`);

--
-- Indexes for table `r_PurchasedRelationship`
--
ALTER TABLE `r_PurchasedRelationship`
  ADD UNIQUE KEY `purchase_ID_Index` (`purchase_ID`),
  ADD UNIQUE KEY `VIN_Purchase_Index` (`VIN`);

--
-- Indexes for table `r_VehicleUnderWarranty`
--
ALTER TABLE `r_VehicleUnderWarranty`
  ADD UNIQUE KEY `warranty_name_index` (`warranty_name`),
  ADD UNIQUE KEY `VIN_index` (`VIN`) USING BTREE;

--
-- Indexes for table `Vehicle`
--
ALTER TABLE `Vehicle`
  ADD PRIMARY KEY (`VIN`);

--
-- Indexes for table `Warranty`
--
ALTER TABLE `Warranty`
  ADD PRIMARY KEY (`warranty_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `r_PurchasedRelationship`
--
ALTER TABLE `r_PurchasedRelationship`
  ADD CONSTRAINT `VIN_purchase_constraint` FOREIGN KEY (`VIN`) REFERENCES `Vehicle` (`VIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ID_constraint` FOREIGN KEY (`purchase_ID`) REFERENCES `Purchased` (`purchase_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_VehicleUnderWarranty`
--
ALTER TABLE `r_VehicleUnderWarranty`
  ADD CONSTRAINT `VIN_constraint` FOREIGN KEY (`VIN`) REFERENCES `Vehicle` (`VIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warranty_name_constraint` FOREIGN KEY (`warranty_name`) REFERENCES `Warranty` (`warranty_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
