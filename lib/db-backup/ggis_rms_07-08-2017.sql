-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 10:42 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ggis_rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`fname`, `mname`, `lname`, `gender`, `email`, `contact`, `password`) VALUES
('Abhishek', '', 'Sharma', 1, 'admin@ggis.org', '9713161575', '$2a$08$bd5Y1lhWL.ECnSKzwxSUCeU2TrZ6IMagIXumLrDIXbuvN1r13m3zm');

-- --------------------------------------------------------

--
-- Table structure for table `batch_info`
--

CREATE TABLE `batch_info` (
  `year` int(11) NOT NULL,
  `1A` varchar(12) DEFAULT NULL,
  `1B` varchar(12) DEFAULT NULL,
  `1C` varchar(12) DEFAULT NULL,
  `2A` varchar(12) DEFAULT NULL,
  `2B` varchar(12) DEFAULT NULL,
  `2C` varchar(12) DEFAULT NULL,
  `3A` varchar(12) DEFAULT NULL,
  `3B` varchar(12) DEFAULT NULL,
  `3C` varchar(12) DEFAULT NULL,
  `4A` varchar(12) DEFAULT NULL,
  `4B` varchar(12) DEFAULT NULL,
  `4C` varchar(12) DEFAULT NULL,
  `5A` varchar(12) DEFAULT NULL,
  `5B` varchar(12) DEFAULT NULL,
  `5C` varchar(12) DEFAULT NULL,
  `6A` varchar(12) DEFAULT NULL,
  `6B` varchar(12) DEFAULT NULL,
  `6C` varchar(12) DEFAULT NULL,
  `7A` varchar(12) DEFAULT NULL,
  `7B` varchar(12) DEFAULT NULL,
  `7C` varchar(12) DEFAULT NULL,
  `8A` varchar(12) DEFAULT NULL,
  `8B` varchar(12) DEFAULT NULL,
  `8C` varchar(12) DEFAULT NULL,
  `9A` varchar(12) DEFAULT NULL,
  `9B` varchar(12) DEFAULT NULL,
  `9C` varchar(12) DEFAULT NULL,
  `10A` varchar(12) DEFAULT NULL,
  `10B` varchar(12) DEFAULT NULL,
  `10C` varchar(12) DEFAULT NULL,
  `11S` varchar(12) DEFAULT NULL,
  `11C` varchar(12) DEFAULT NULL,
  `12S` varchar(12) DEFAULT NULL,
  `12C` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_info`
--

INSERT INTO `batch_info` (`year`, `1A`, `1B`, `1C`, `2A`, `2B`, `2C`, `3A`, `3B`, `3C`, `4A`, `4B`, `4C`, `5A`, `5B`, `5C`, `6A`, `6B`, `6C`, `7A`, `7B`, `7C`, `8A`, `8B`, `8C`, `9A`, `9B`, `9C`, `10A`, `10B`, `10C`, `11S`, `11C`, `12S`, `12C`) VALUES
(2017, '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000', '000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `meta_info`
--

CREATE TABLE `meta_info` (
  `year` int(11) NOT NULL,
  `1` int(11) NOT NULL,
  `2` int(11) NOT NULL,
  `3` int(11) NOT NULL,
  `4` int(11) NOT NULL,
  `5` int(11) NOT NULL,
  `6` int(11) NOT NULL,
  `7` int(11) NOT NULL,
  `8` int(11) NOT NULL,
  `9` int(11) NOT NULL,
  `10` int(11) NOT NULL,
  `11` int(11) NOT NULL,
  `12` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_info`
--

INSERT INTO `meta_info` (`year`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`) VALUES
(2017, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `professor_info`
--

CREATE TABLE `professor_info` (
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(300) NOT NULL,
  `class` int(11) NOT NULL,
  `section` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_info`
--

INSERT INTO `professor_info` (`fname`, `mname`, `lname`, `gender`, `email`, `contact`, `password`, `class`, `section`) VALUES
('Swagansh', '', 'Deb', 0, 'mr.sd@gmail.com', '9713161575', '$2a$08$jUR9YBoBKWhIbDqT9BBKoOXcPU.Pb5fh0HssHeLEXOel4Wj9eTuUe', 1, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_info`
--
ALTER TABLE `batch_info`
  ADD PRIMARY KEY (`year`);

--
-- Indexes for table `meta_info`
--
ALTER TABLE `meta_info`
  ADD PRIMARY KEY (`year`);

--
-- Indexes for table `professor_info`
--
ALTER TABLE `professor_info`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
