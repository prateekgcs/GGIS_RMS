-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 10:18 AM
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
  `1A` varchar(8) NOT NULL,
  `1B` varchar(8) NOT NULL,
  `1C` varchar(8) NOT NULL,
  `2A` varchar(8) NOT NULL,
  `2B` varchar(8) NOT NULL,
  `2C` varchar(8) NOT NULL,
  `3A` varchar(8) NOT NULL,
  `3B` varchar(8) NOT NULL,
  `3C` varchar(8) NOT NULL,
  `4A` varchar(8) NOT NULL,
  `4B` varchar(8) NOT NULL,
  `4C` varchar(8) NOT NULL,
  `5A` varchar(8) NOT NULL,
  `5B` varchar(8) NOT NULL,
  `5C` varchar(8) NOT NULL,
  `6A` varchar(8) NOT NULL,
  `6B` varchar(8) NOT NULL,
  `6C` varchar(8) NOT NULL,
  `7A` varchar(8) NOT NULL,
  `7B` varchar(8) NOT NULL,
  `7C` varchar(8) NOT NULL,
  `8A` varchar(8) NOT NULL,
  `8B` varchar(8) NOT NULL,
  `8C` varchar(8) NOT NULL,
  `9A` varchar(8) NOT NULL,
  `9B` varchar(8) NOT NULL,
  `9C` varchar(8) NOT NULL,
  `10A` varchar(8) NOT NULL,
  `10B` varchar(8) NOT NULL,
  `10C` varchar(8) NOT NULL,
  `11S` varchar(8) NOT NULL,
  `11C` varchar(8) NOT NULL,
  `12S` varchar(8) NOT NULL,
  `12C` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('Shreyansh', '', 'Deb', 0, 'mr.sd@gmail.com', '9713161575', '$2a$08$bd5Y1lhWL.ECnSKzwxSUCeU2TrZ6IMagIXumLrDIXbuvN1r13m3zm', 1, 'A'),
('Prateek', '', 'Gupta', 0, 'prateekgcs@gmail.com', '9713161575', '$2a$08$bd5Y1lhWL.ECnSKzwxSUCeU2TrZ6IMagIXumLrDIXbuvN1r13m3zm', 5, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_info`
--
ALTER TABLE `batch_info`
  ADD PRIMARY KEY (`year`);

--
-- Indexes for table `professor_info`
--
ALTER TABLE `professor_info`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
