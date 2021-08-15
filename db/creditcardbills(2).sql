-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2021 at 05:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creditcardbills`
--

-- --------------------------------------------------------

--
-- Table structure for table `creditcard_bill`
--

CREATE TABLE `creditcard_bill` (
  `ccn` bigint(20) NOT NULL,
  `year` int(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `purchAmount` float NOT NULL,
  `minpay` float NOT NULL,
  `interest` float NOT NULL,
  `dateSettle` date NOT NULL,
  `delay` int(4) NOT NULL,
  `paidAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creditcard_bill`
--

INSERT INTO `creditcard_bill` (`ccn`, `year`, `month`, `purchAmount`, `minpay`, `interest`, `dateSettle`, `delay`, `paidAmount`) VALUES
(1111222233334444, 2021, '1', 10000, 3000, 1.05101, '2021-01-20', 5, 3153.03),
(1111222233334444, 2021, '2', 5000, 1500, 1.0303, '2021-02-18', 3, 1545.45),
(1111222233334444, 2021, '3', 30000, 9000, 1.10462, '2021-03-25', 10, 9941.6),
(1111222233334444, 2021, '4', 23000, 6900, 1.12682, '2021-04-27', 12, 7775.09),
(1234123412341234, 2021, '1', 102490, 30747, 1.0406, '2021-02-19', 4, 31995.5),
(1234123412341234, 2021, '2', 12347, 3704.1, 0, '2021-02-13', 0, 3704.1),
(9999888877776666, 2021, '2', 123000, 36900, 1.12682, '2021-02-27', 12, 41579.8),
(9999888877776666, 2021, '3', 34000, 10200, 0, '2021-03-10', 0, 10200);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ccn` bigint(16) NOT NULL,
  `cuspwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusName`, `address`, `email`, `ccn`, `cuspwd`) VALUES
('ayomal', 'school road danowita', 'ggwp@gmail.com', 1111222233334444, '$2y$10$2nW1JOc4DDiwEc9go2EJ..871wKE2UyGIiFmw76wENrXaYPMT35hO'),
('tom', '22B street Gotham', 'tomcat@gmail.com', 1234123412341234, '$2y$10$Gz.Oqs57ms57dc05N89JXeJk2oRQA2KrbK/W42C.ST2RqyvRVeZWW'),
('joe', 'australia junction,London', 'joe123@gmail.com', 9999888877776666, '$2y$10$IpKDSlf8gsnOQ5O8qT9DwO.9t2AfMKVbBPNsXIb983QthaFpcW2Ge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creditcard_bill`
--
ALTER TABLE `creditcard_bill`
  ADD PRIMARY KEY (`ccn`,`month`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ccn`) USING BTREE,
  ADD UNIQUE KEY `credit` (`ccn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creditcard_bill`
--
ALTER TABLE `creditcard_bill`
  ADD CONSTRAINT `creditcard_bill_ibfk_1` FOREIGN KEY (`ccn`) REFERENCES `customer` (`ccn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
