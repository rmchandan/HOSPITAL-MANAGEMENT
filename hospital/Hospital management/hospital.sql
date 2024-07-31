-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 04:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_amount` (OUT `total_amount` INT)  NO SQL
select sum(amount) into total_amount from bill$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `total_tax` (OUT `total_tax` INT)  NO SQL
select sum(tax) into total_tax from bill$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_no` int(11) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_no`, `patient_id`, `amount`, `tax`) VALUES
(1, '301', 150, 15),
(2, '301', 500, 50),
(3, '302', 450, 45),
(104, '5', 100, 10),
(110, '13', 500, 50);

--
-- Triggers `bill`
--
DELIMITER $$
CREATE TRIGGER `tax` BEFORE INSERT ON `bill` FOR EACH ROW set new.tax=new.amount*0.10
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(20) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `dept_head` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_head`) VALUES
('', '', ''),
('901', 'Dental', 'Anil'),
('902', 'Surgery', 'Dr.Kumar'),
('906', 'Dental', 'Dr.Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `doctor1`
--

CREATE TABLE `doctor1` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `doctor_phone` int(11) DEFAULT NULL,
  `doctor_sex` varchar(20) DEFAULT NULL,
  `doctor_address` varchar(20) DEFAULT NULL,
  `doctor_specialisation` varchar(20) DEFAULT NULL,
  `dept_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor1`
--

INSERT INTO `doctor1` (`doctor_id`, `doctor_name`, `doctor_phone`, `doctor_sex`, `doctor_address`, `doctor_specialisation`, `dept_id`) VALUES
(101, 'Vijay', 998800654, 'M', 'Bangalore', 'children specialist', 'Null'),
(102, 'Priya', 779876886, 'F', 'Tumkur', 'Ayurveda', 'Null'),
(103, 'Likitha', 2147483647, 'F', 'Tumkur', 'children specialist', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_no` int(11) DEFAULT NULL,
  `medicine_name` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_no`, `medicine_name`, `patient_id`, `amount`) VALUES
(11, 'dolo 650', '301', 50),
(12, 'paracetamol', '301', 50);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` varchar(20) NOT NULL,
  `patient_name` varchar(20) DEFAULT NULL,
  `patient_phone` int(11) DEFAULT NULL,
  `patient_sex` varchar(20) DEFAULT NULL,
  `patient_age` varchar(20) DEFAULT NULL,
  `patient_address` varchar(20) DEFAULT NULL,
  `problem` varchar(30) DEFAULT NULL,
  `doctor_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_phone`, `patient_sex`, `patient_age`, `patient_address`, `problem`, `doctor_id`) VALUES
('301', 'Haneesh', 2147483647, 'M', '18', 'Bangalore', 'cold', 'NULL'),
('302', 'Arpitha', 2147483647, 'F', '21', 'Gubbi', 'Fever', 'NULL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `doctor1`
--
ALTER TABLE `doctor1`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
