-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2019 at 07:54 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kafka_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `email`, `password`, `gender`, `company`) VALUES
(17, 'test', 'raju.yadav', 'tester1@evolutionco.com', 'test', 'M', 'test'),
(18, 'test', 'raju.yadav1', 'tester1@evolutionco.com', 'test', 'M', 'test'),
(19, 'test', 'raju.yadav2', 'tester1@evolutionco.com', 'test', 'M', 'test'),
(20, 'sonu vermA', 'sonu.verma0715', 'sonu@evolutionco.com', 'sonu', 'M', 'ECO'),
(21, 'sonu vermA', 'sonu.verma0715', 'sonu@evolutionco.com', 'sonu', 'M', 'ECO'),
(22, 'sonu vermA', 'rajendra', 'sonu@evolutionco.com', 'saCI630ioVfWw', 'M', 'ECO'),
(23, 'mumbai', 'DWS00009', 'sonu@evolutionco.com', '123456789', 'M', 'eco'),
(24, 'asdfadsf', 'Mayesh Arunatheyar', 'mayesh@evo.com', 'sa1aY64JOY94w', 'M', 'eco');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
