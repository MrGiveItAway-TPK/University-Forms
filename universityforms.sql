-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 11:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universityforms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Level` varchar(7) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `phnumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `Level`, `Name`, `specialization`, `phnumber`) VALUES
(0, 'm_taye', 'm_taye', 'Advisor', 'Dr.Muhammad Al-Tayee', 'IT', '1234567890'),
(1, 's_hanna', 's_hanna', 'HOD', 'Dr.Samer Hanna', 'IT', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `acnumber` int(9) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `phnumber` varchar(10) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `description` longtext NOT NULL,
  `type` varchar(20) NOT NULL,
  `adstatus` varchar(8) NOT NULL,
  `hodstatus` varchar(8) NOT NULL,
  `coursenumber` int(10) NOT NULL,
  `coursename` varchar(15) NOT NULL,
  `coursednumber` int(2) NOT NULL,
  `sdate` datetime NOT NULL DEFAULT current_timestamp(),
  `reqhours` int(2) NOT NULL,
  `gpa` float NOT NULL,
  `expecY` varchar(25) NOT NULL,
  `hodreason` varchar(255) NOT NULL,
  `adreason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `username` int(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `phnumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `Name`, `specialization`, `phnumber`) VALUES
(0, 201710379, '201710379', 'Munes Bani Fawaz', 'Software Engineering', '0789336602'),
(1, 201720212, '201720212', 'Ibrahim Hammad', 'Software Engineering', '0798678507');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
